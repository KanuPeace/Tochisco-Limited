<?php

namespace App\Services\Notifications\Network;

use App\Models\ReferralBonus;
use App\Services\Notifications\AppMailerService;

class NetworkNotificationService
{
    public static function subscriptionBonus(ReferralBonus $referralBonus)
    {
        $user = $referralBonus->user;
        AppMailerService::send([
            "data" => [
                "user" => $user,
                "amount" => $referralBonus->amount . " " . $referralBonus->currency->short_name,
            ],
            "to" => $user->email,
            "template" => "emails.network.subscription_bonus",
            "subject" => "Flairbo Subscription Bonus",
        ]);
    }
}
