<?php

namespace App\Helpers;

use App\Models\CouponCode;
use App\Models\User;
use App\Models\Vendor;
use Exception;

class CouponService
{
    public function deposit(User $user, CouponCode $coupon)
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

        Wallet::credit(
            $user,
            $coupon->price,
            "Credit via coupon code $coupon->code",
            Constants::COMPLETED
        );

        return [
            "success" => true,
            "message" => "Deposit successful",
            "coupon" => $coupon
        ];
    }
}
