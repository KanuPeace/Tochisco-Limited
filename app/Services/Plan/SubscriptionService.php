<?php

namespace App\Services\Plan;

use App\Constants\PaymentConstants;
use App\Constants\StatusConstants;
use App\Constants\TransactionActivityConstants;
use App\Constants\TransactionConstants;
use App\Models\CouponCode;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use App\Services\Finance\TransactionService;
use App\Services\Finance\WalletService;
use Exception;
use Spatie\Permission\Models\Permission;

class SubscriptionService
{

    public static function syncPermissions(User $user, Plan $plan)
    {
        $permissions= Permission::whereIn("name" , $plan->getFeatures())->get();
        return $user->syncPermissions($permissions);
    }

    public static function removePermissions(User $user)
    {
        return $user->removePermissions();
    }

    public static function subscribeToPlan(
        User $user,
        Plan $plan,
        $payment_method,
        $payment_id = null
    ) {
        return Subscription::create([
            "user_id" => $user->id,
            "plan_id" => $plan->id,
            "referral_bonus" => 0,
            "payment_id" => $payment_id,
            "price" => $plan->price,
            "payment_method" => $payment_method,
            "paid_on" => now(),
            "expires_at" => now()->addDays($plan->duration),
            "status" => StatusConstants::ACTIVE
        ]);
    }

    public static function subscribeFromWallet(User $user, Plan $plan)
    {
        $subscription = self::subscribeToPlan($user, $plan, "Wallet", null);
        $amount = $subscription->price;
        WalletService::debit(
            WalletService::WALLET_CURRENT,
            $user->id,
            $amount,
        );
        TransactionService::create([
            "user_id" => $user->id,
            "amount" => $amount,
            "fee" => 0,
            "description" => "Subscribed to ".$plan->name." plan.",
            "activity" => PaymentConstants::SUBSCRIBE_TO_MEMBERSHIP_PLAN,
            "batch_no" => null,
            "type" => TransactionConstants::DEBIT,
            "status" => StatusConstants::COMPLETED
        ]);

        ReferralSubscriptionService::rewardGenerations($user->id , $amount);
    }

    public static function lastSubscription($user_id)
    {
        return Subscription::where("user_id" , $user_id)
        ->where("expires_at", "<", now())
        ->orWhere("status" , StatusConstants::INACTIVE)
        ->orderby("expires_at" , "desc")
        ->first();
    }

    public static function currentSubscription($user_id)
    {
        return Subscription::where("user_id" , $user_id)
        ->where("expires_at", ">", now())
        ->where("status" , StatusConstants::ACTIVE)
        ->orderby("expires_at" , "desc")
        ->first();
    }

    // public static function resubscriptionBonus(User $user)
    // {
    //     if(!empty(self::lastSubscription($user))){
    //         $current = self::currentSubscription($user);
    //         $bonus = $current->price * (StatusConstants::RESUBCRIPTION_BONUS_PERCENT / 100);
    //         WalletService::credit(
    //             StatusConstants::WALLET_DEFAULT,
    //             $user,
    //             $bonus,
    //             "Welcome back re-subscription bonus",
    //             StatusConstants::COMPLETED
    //         );
    //     }
    // }
}
