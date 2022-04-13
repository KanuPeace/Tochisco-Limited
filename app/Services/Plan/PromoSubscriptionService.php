<?php

namespace App\Services\Plan;

use App\Constants\AdPromotionConstants;
use App\Constants\PaymentConstants;
use App\Constants\StatusConstants;
use App\Constants\TransactionConstants;
use App\Models\Ad;
use App\Models\AdPromotion;
use App\Models\AdPromotionSubscription;
use App\Models\Payment;
use App\Models\User;
use App\Services\Finance\TransactionService;
use App\Services\Finance\WalletService;

class PromoSubscriptionService
{

    public static function subscribeToPlan(
        User $user,
        AdPromotion $adPromotion,
        $payment_id,
        $payment_method
    ) {

        $payment = Payment::find($payment_id);

        $meta = json_decode($payment->meta_data, true);
        $duration = $meta["duration"];
        $ad_id = $meta["ad_id"];

        $subscription = AdPromotionSubscription::create([
            "user_id" => $user->id,
            "ad_id" => $ad_id,
            "promo_id" => $adPromotion->id,
            "referral_bonus" => 0,
            "payment_id" => $payment_id,
            "daily_price" => $adPromotion->daily_price,
            "payment_method" => $payment_method,
            "paid_on" => now(),
            "duration" => $duration,
            "discount" => $meta["dicounted_price"],
            "payable_amount" => $meta["payable_amount"],
            "expires_at" => now()->addDays($duration),
            "status" => StatusConstants::ACTIVE
        ]);

        $published_at = in_array(
            $adPromotion->type,
            [AdPromotionConstants::BOOSTER_AD, AdPromotionConstants::BROADCAST_AD]
        ) ? now() : null;

        Ad::where("id", $subscription->ad_id)->update([
            "is_sponsored" => 1,
            "sponsor_expires_at" => $subscription->expires_at,
            "published_at" => $published_at
        ]);
        return $subscription;
    }

    public static function subscribeFromWallet(User $user, AdPromotion $adPromotion, int $payment_id)
    {
        $subscription = self::subscribeToPlan($user, $adPromotion, $payment_id, "Wallet");
        $amount = $subscription->payable_amount;
        WalletService::debit(
            WalletService::WALLET_CURRENT,
            $user->id,
            $amount,
        );
        TransactionService::create([
            "user_id" => $user->id,
            "amount" => $amount,
            "fee" => 0,
            "description" => "Subscribed to " . $adPromotion->name . " plan.",
            "activity" => PaymentConstants::SUBSCRIBE_TO_PROMO_PLAN,
            "batch_no" => null,
            "type" => TransactionConstants::DEBIT,
            "status" => StatusConstants::COMPLETED
        ]);
    }
}
