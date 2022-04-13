<?php

namespace App\Constants;

class PaymentConstants
{


    const PAY_WITH_CARD = "Card";
    const PAY_WITH_BANK = "Bank";

    const PAYMENT_OPTIONS = [
        self::PAY_WITH_BANK,
        self::PAY_WITH_CARD
    ];
    
    const SUBSCRIBE_TO_MEMBERSHIP_PLAN = "SUBSCRIBE_TO_MEMBERSHIP_PLAN";
    const SUBSCRIBE_TO_PROMO_PLAN = "SUBSCRIBE_TO_PROMO_PLAN";
    const FUND_WALLET_WITH_CARD = "FUND_WALLET_WITH_CARD";
}
