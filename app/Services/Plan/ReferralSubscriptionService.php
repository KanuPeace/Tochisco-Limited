<?php

namespace App\Services\Plan;

use App\Constants\StatusConstants;
use App\Constants\TransactionActivityConstants;
use App\Constants\TransactionConstants;
use App\Models\PlanCommission;
use App\Models\ReferralBonus;
use App\Models\ReferralLevel;
use App\Services\Finance\TransactionService;
use App\Services\Finance\WalletService;
use App\Services\Notifications\Network\NetworkNotificationService;
use Exception;
use Illuminate\Support\Facades\DB;

class ReferralSubscriptionService
{

    public static function rewardGenerations($user_id, $amount)
    {
        DB::beginTransaction();
        try {
            $bonuses = collect();
            $referralLevels = ReferralLevel::with("user")
                ->where("new_user_id", $user_id)
                ->orderby("level", "desc")
                ->get();

            $batch_no = TransactionService::generateBatchNo();

            foreach ($referralLevels as $referralLevel) {
                $user = $referralLevel->user;
                $subscription = SubscriptionService::currentSubscription($user_id);
                $referrerSubscription = SubscriptionService::currentSubscription($user_id);

                if (empty($subscription) || empty($referrerSubscription)) {
                    continue;
                }
                $level = $referralLevel->level;
                $plan_id = $subscription->plan_id;


                $commission = PlanCommission::where("plan_id", $referrerSubscription->plan_id)
                    ->where("level", $level)
                    ->where("is_active", 1)
                    ->first();

                if (empty($commission)) {
                    continue;
                }
                $percentage = $commission->percentage_commission;
                $credit_amount = $amount * ($percentage / 100);

                WalletService::credit(
                    WalletService::WALLET_CURRENT,
                    $user->id,
                    $credit_amount,
                    true
                );
                TransactionService::create([
                    "user_id" => $user->id,
                    "amount" => $credit_amount,
                    "fee" => 0,
                    "description" => "Referral Earning from Level $level subscription!",
                    "activity" => TransactionActivityConstants::REFERRAL_BONUS,
                    "batch_no" => $batch_no,
                    "type" => TransactionConstants::CREDIT,
                    "status" => StatusConstants::COMPLETED
                ]);

                $bonus = ReferralBonus::create([
                    "plan_id" => $plan_id,
                    "new_user_id" => $referralLevel->new_user_id,
                    "referrer_id" => $referralLevel->referrer_id,
                    "user_id" => $referralLevel->user_id,
                    "amount" => $credit_amount,
                    "level" => $level,
                    "percentage_commission" => $percentage,
                ]);

                $bonuses->push($bonus);
            }

            DB::commit();

            foreach ($bonuses as $bonus) {
                NetworkNotificationService::subscriptionBonus($bonus);
            }

        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
