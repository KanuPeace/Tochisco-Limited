<?php

namespace App\Services\Payment;

use App\Constants\PaymentConstants;
use App\Constants\StatusConstants;
use App\Constants\TransactionActivityConstants;
use App\Constants\TransactionConstants;
use App\Exceptions\Payment\PaymentException;
use App\Models\AdPromotion;
use App\Models\Payment;
use App\Models\Plan;
use App\Models\User;
use App\Services\Finance\TransactionService;
use App\Services\Finance\WalletService;
use App\Services\Plan\PromoSubscriptionService;
use App\Services\Plan\SubscriptionService;

class PaymentService
{

    public static function getByReference($reference): Payment
    {
        $payment = Payment::where("reference", $reference)->first();

        if (empty($payment)) {
            throw new PaymentException("Payment not found");
        }
        return $payment;
    }

    public static function getById($id): Payment
    {
        $payment = Payment::where("id", $id)->first();

        if (empty($payment)) {
            throw new PaymentException("Payment not found");
        }
        return $payment;
    }

    public static function handlePaymentAction($reference)
    {
        $payment = self::getByReference($reference);

        if ($payment->activity == PaymentConstants::SUBSCRIBE_TO_MEMBERSHIP_PLAN) {
            $plan = Plan::find($payment->plan_id);
            $user = User::find($payment->user_id);
            SubscriptionService::subscribeFromWallet($user, $plan);
            WalletService::credit(
                WalletService::WALLET_ELITE_POINTS,
                $user->id,
                $plan->elite_points
            );
            TransactionService::create([
                "user_id" => $user->id,
                "amount" => $plan->elite_points,
                "fee" => 0,
                "description" => "Earnings for subscribing to membership plan",
                "activity" => TransactionActivityConstants::MEMBERSHIP_SUBSCRIPTION_ELITE_BONUS,
                "batch_no" => null,
                "type" => TransactionConstants::CREDIT,
                "status" => StatusConstants::COMPLETED
            ]);
        }

        if ($payment->activity == PaymentConstants::SUBSCRIBE_TO_PROMO_PLAN) {
            $plan = AdPromotion::find($payment->plan_id);
            $user = User::find($payment->user_id);
            PromoSubscriptionService::subscribeFromWallet($user, $plan , $payment->id);
        }

        if ($payment->activity == PaymentConstants::FUND_WALLET_WITH_CARD) {
            $user = User::find($payment->user_id);
            $transaction = TransactionService::getById($payment->transaction_id);
            WalletService::credit(WalletService::WALLET_CURRENT, $user->id, $transaction->amount);
            $transaction->update([
                "status" => StatusConstants::COMPLETED
            ]);
        }

        $payment->update([
            "status" => StatusConstants::COMPLETED
        ]);
    }

    public static function create($data): Payment
    {
        // $data = self::validate($data);
        $data["reference"] = self::generateReferenceNo();
        $payment = Payment::create($data);
        return $payment;
    }

    public static function generateReferenceNo()
    {
        $key = "PRF_" . getRandomToken(7, true);
        $check = Payment::where("reference", $key)->count();
        if ($check > 0) {
            return self::generateReferenceNo();
        }
        return $key;
    }

}
