<?php

namespace App\Services\Coupon;

use App\Constants\StatusConstants;
use App\Models\CouponCode;
use App\Models\User;
use App\Models\Vendor;
use App\Services\Finance\WalletService;

class CouponService
{
    public static function deposit(User $user, CouponCode $coupon)
    {
        $vendor = Vendor::where("user_id", $coupon->vendor_id)->first();

        if ($coupon->vendor_id == $user->id) {
            return [
                "success" => false,
                "message" => "Invalid transaction occurred"
            ];
        }

        if (!empty($coupon->used_by)) {
            if ($coupon->used_by == $user->id) {
                $message = "This coupon has been used by you!";
            } else {
                $message = "This coupon has been used by another user!";
            }
            return [
                "success" => false,
                "message" => $message
            ];
        }

        $coupon->update([
            "used_by" => $user->id,
            "used_on" => now()
        ]);

        if (!empty($vendor)) {
            $vendor->update([
                "coupons_unsold" => CouponCode::where("vendor_id", $coupon->vendor_id)->whereNull("used_by")->count(),
                "coupons_sold" => CouponCode::where("vendor_id", $coupon->vendor_id)->whereNotNull("used_by")->count(),
            ]);
        }

        WalletService::credit(
            WalletService::WALLET_CURRENT,
            $user,
            $coupon->price,
            "Credit via coupon code $coupon->code",
            StatusConstants::COMPLETED
        );

        return [
            "success" => true,
            "message" => "Deposit successful",
            "coupon" => $coupon
        ];
    }

}
