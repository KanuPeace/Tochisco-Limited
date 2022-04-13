<?php

namespace App\Constants;

class TransactionActivityConstants
{


    const FUND_WITH_FLUTTERWAVE = "FUND_WITH_FLUTTERWAVE";
    const FUND_WITH_BANK = "FUND_WITH_BANK";
    const REFERRAL_BONUS = "REFERRAL_BONUS";
    const SIGNUP_BONUS = "SIGNUP_BONUS";
    const WITHDRAW_FROM_WALLET = "WITHDRAW_FROM_WALLET";
    const PROMO_SUBSCRIPTION_FROM_WALLET = "PROMO_SUBSCRIPTION_FROM_WALLET";
    const MEMBERSHIP_SUBSCRIPTION_FROM_WALLET = "MEMBERSHIP_SUBSCRIPTION_FROM_WALLET";
    const WALLET_TRANSFER = "WALLET_TRANSFER";
    const SHARE_ACTIVITY_BONUS = "SHARE_ACTIVITY_BONUS";
    const MEMBERSHIP_SUBSCRIPTION_ELITE_BONUS = "MEMBERSHIP_SUBSCRIPTION_ELITE_BONUS";
    const MODIFY_WALLET = "MODIFY_WALLET";
    const ELITE_SHARING_COMMISSION = "ELITE_SHARING_COMMISSION";

    const OPTIONS = [
        self::FUND_WITH_FLUTTERWAVE => "Fund with Flutterwave",
        self::FUND_WITH_BANK => "Fund with Bank",
        self::REFERRAL_BONUS => "Referral Bonus",
        self::SIGNUP_BONUS => "Signup Bonus",
        self::WITHDRAW_FROM_WALLET => "Withdraw from wallet",
        self::PROMO_SUBSCRIPTION_FROM_WALLET => "Ad Promo Subscription from wallet",
        self::MEMBERSHIP_SUBSCRIPTION_FROM_WALLET => "Membership Subscription from wallet",
        self::SHARE_ACTIVITY_BONUS => "Share Activity Bonus",
        self::MEMBERSHIP_SUBSCRIPTION_ELITE_BONUS => "Membership Subscription Elite Bonus",
        self::MODIFY_WALLET => "Modify Wallet",
        self::ELITE_SHARING_COMMISSION => "Elite Sharing Commission"
    ];
}
