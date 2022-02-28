<?php

namespace App\Helpers;

 class  Constants{

     const  APPROVED = "approved";
     const  PENDING = "pending";
     const  REJECTED = "rejected";


     const DEBIT_TRANSACTION = "Debit";
     const CREDIT_TRANSACTION = "Credit";
     const COMPLETED = "Completed";


     const WALLET_PAYMENT = "Wallet";
     const WALLET_DEFAULT = "balance";
     const WALLET_REFERRAL = "referral_earnings";
     const WALLET_NON_REFERRAL = "non_referral_earnings";

     const WALLET_TYPES = [
         self::WALLET_DEFAULT,
         self::WALLET_REFERRAL,
         self::WALLET_NON_REFERRAL,
     ];

     const WALLET_OPTIONS =  [
        self::WALLET_DEFAULT => "Main",
        self::WALLET_REFERRAL => "Referral Earnings",
        self::WALLET_NON_REFERRAL => "Non-referral Earnings",
     ];
     static public function walletName(string $account)
     {
         return self::WALLET_OPTIONS[$account];
     }

     const ACTIVE = 1;
     const INACTIVE = 0;

     const BOOL_OPTIONS = [
        self::ACTIVE => "Yes",
        self::INACTIVE => "No",
     ];
     const USER_DEFAULT_PROFILE = 'public\users\assets\img\2.jpg';

     const WEB_GUARD = "web";
     const PLAN_GUARD = "plan";

     const PERMISSION_GUARDS = [
        self::WEB_GUARD => "Site Role",
        self::PLAN_GUARD => "Subscription Plan"
     ];

     const LAND = "land";
     const LUXURY = "house";

     const RENT = "rent";
     const SELL = "sell";

     const DEFAULT_USER = "User";
     const ADMIN_USER = "Admin";

    const DEV_EMAIL = "email";

 }