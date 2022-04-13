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

class UserPlanService
{

    public static function getActiveSubscription($user_id): ?Subscription
    {
        return Subscription::where("user_id" , $user_id)
        ->whereDate("expires_at" , ">" , today())
        ->where("status" , StatusConstants::ACTIVE)
        ->whereHas("plan")
        ->with("plan")
        ->latest()
        ->first();
    }

    public static function calculatePromoDiscountedPrice($user_id , $promo_price): array
    {
        $original_price = $promo_price;
        $has_subscription = false;
        $dicounted_price = 0;
        $discount = 0;
        $subscription = self::getActiveSubscription($user_id);
        if(!empty($subscription)){
            $has_subscription = true;
            $discount = $subscription->plan->discount;
            $dicount_percent = ($discount / 100);
            $dicounted_price = $promo_price * $dicount_percent;
        }
        return [
            "original_price" => $original_price,
            "dicounted_price" => $dicounted_price ?? 0,
            "dicount_percent" => $discount ?? 0,
            "has_subscription" => $has_subscription,
            "payable_amount" => $original_price - $dicounted_price
        ];
    }
}
