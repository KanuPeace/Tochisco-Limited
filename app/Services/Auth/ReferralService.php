<?php

namespace App\Services\Auth;

use App\Constants\CurrencyConstants;
use App\Constants\StatusConstants;
use App\Constants\TransactionActivityConstants;
use App\Constants\TransactionConstants;
use App\Helpers\Constants;
use App\Models\Referral;
use App\Models\ReferralLevel;
use App\Models\User;
use App\Services\Finance\CurrencyService;
use App\Services\Finance\TransactionService;
use App\Services\Finance\UserTransactionService;
use App\Services\Finance\WalletService;
use App\Services\System\ExceptionService;
use Exception;

class ReferralService
{
    const REFERRAL_SESSION_KEY = "ref_invite_code";
    const REFERRAL_BONUS_AMOUNT = 20;

    public static function initiateInvite($user)
    {
        session()->put(
            self::REFERRAL_SESSION_KEY,
            [
                "name" => $user->first_name,
                "ref_code" => $user->ref_code
            ]
        );
    }

    public static function getSessionReferrer()
    {
        $ref_session_key = self::REFERRAL_SESSION_KEY;
        $referrer = null;
        if (session()->has($ref_session_key)) {
            $referrer = session()->get($ref_session_key);
        }
        return $referrer;
    }

    public static function newReferral(User $newUser, $ref_code)
    {
        try {
            $newUser->refresh();

            $data = [
                "user_id" => $newUser->id,
                "referrer_id" => User::first()->id,
                "is_auto" => 1,
            ];

            if (!empty($ref_code)) {
                $referrerUser = User::where("ref_code", $ref_code)->first();
                if (!empty($referrerUser)) {
                    $data["referrer_id"] = $referrerUser->id;
                    $data["is_auto"] = 0;
                }
            }

            $referral = Referral::create($data);
            self::recordLevels($referral->referrer_id, $referral->user_id, 1);
        } catch (\Throwable $th) {
            ExceptionService::logAndBroadcast($th);
            throw $th;
        }
    }

    // public static function rewardReferrer(Referral $referral)
    // {
    //     $creditAmount = self::REFERRAL_BONUS_AMOUNT;
    //     $wallet = WalletService::getByCurrencyType($referral->referrer_id, self::REFERRAL_BONUS_CURRENCY);
    //     WalletService::credit($wallet, $creditAmount);
    //     UserTransactionService::create([
    //         "user_id" => $wallet->user_id,
    //         "currency_id" => $wallet->currency_id,
    //         "amount" => $creditAmount,
    //         "fees" => 0,
    //         "description" => "Currency swap",
    //         "activity" => TransactionActivityConstants::REFERRAL_BONUS,
    //         "batch_no" => null,
    //         "type" => TransactionConstants::CREDIT,
    //         "status" => StatusConstants::COMPLETED
    //     ]);
    // }



    public static function recordLevels($referrer_id, $new_user_id, $level = null)
    {
        if ($level > 12) {
            return;
        }
        $level = $level ?? 1;

        if ($level == 1) {
            $referralRecord = Referral::where("user_id", $new_user_id)->first();
        } else {
            $referralRecord = Referral::where("user_id", $referrer_id)->first();
        }
        if (!empty($referralRecord)) {
            $referralLevel = ReferralLevel::create([
                "user_id" => $referralRecord->referrer_id,
                "referrer_id" => $referrer_id,
                "new_user_id" => $new_user_id,
                "level" => $level
            ]);

            $level = $referralLevel->level;

            if ($level == 1) {
                $elite_points = 5;
                WalletService::credit(
                    WalletService::WALLET_ELITE_POINTS,
                    $referralRecord->referrer_id,
                    $elite_points,
                );
                TransactionService::create([
                    "user_id" => $referralRecord->referrer_id,
                    "amount" => $elite_points,
                    "fee" => 0,
                    "description" => "Referral elite bonus points",
                    "activity" => TransactionActivityConstants::REFERRAL_BONUS,
                    "batch_no" => null,
                    "type" => TransactionConstants::CREDIT,
                    "status" => StatusConstants::COMPLETED
                ]);
            }
            return self::recordLevels($referralRecord->referrer_id, $new_user_id, $level + 1);
        }
        return;
    }
}
