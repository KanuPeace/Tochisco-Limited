<?php

namespace App\Services\Plan;

use App\Constants\AdPromotionConstants;
use App\Constants\StatusConstants;
use App\Models\Ad;
use App\Models\AdPromotionSubscription;

class AdPromoManagerService
{


    public static function syncSubscriptions()
    {
        Ad::whereDate("sponsor_expires_at", "<=", now())->update([
            "is_sponsored" => 0,
            "sponsor_expires_at" => null
        ]);

        AdPromotionSubscription::whereDate("expires_at", "<=", now())
            ->where("status", StatusConstants::ACTIVE)
            ->update([
                "status" => StatusConstants::INACTIVE
            ]);
    }

    public static function syncPublishDates()
    {
        Ad::whereDate("sponsor_expires_at", ">", now())
            ->whereNotNull("sponsor_expires_at")
            ->whereDate("published_at", "<=", now())
            ->whereHas("promotionSubscriptions", function ($query) {

                $query->whereHas("promo", function ($sub_query) {
                    $sub_query->whereIn("type", [
                        AdPromotionConstants::BOOSTER_AD,
                        AdPromotionConstants::BROADCAST_AD
                    ]);
                })->whereDate("expires_at", ">", now());
            })->update([
                "published_at" => now()
            ]);
    }
}
