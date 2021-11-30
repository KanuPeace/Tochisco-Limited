<?php

namespace App\Helpers;

class Constants
{

    const ACTIVE = 1;
    const INACTIVE = 0;

    const REGISTER_BONUS = 100000;

    const DEBIT_TRANSACTION = "Debit";
    const CREDIT_TRANSACTION = "Credit";

    const APPROVED = "Approved";
    const SUSPENDED = "Suspended";
    const PENDING = "Pending";
    const COMPLETED = "Completed";
    const PROCESSING = "Processing";
    const CANCELLED = "Cancelled";
    const DECLINED = "Declined";

    const PENDING_STATUS = "Pending";
    const ACTIVE_STATUS = "Active";
    const INACTIVE_STATUS = "Inactive";
    const DECLINED_STATUS = "Declined";

    const WALLET_PAYMENT = "Wallet";


    const DEFAULT_USER = "User";
    const ADMIN_USER = "Admin";

    const NGN_USD_RATE = 500;

    const PAGINATION_SIZE = 20;

    const PERCENTAGE = "Percent";
    const FIXED = "Fixed";

    const VENDOR_COUPON_PROFIT_TYPE = self::PERCENTAGE;
    const VENDOR_COUPON_PROFIT_FIXED = 100;
    const VENDOR_COUPON_PROFIT_PERCENT = 10;

    const BLOG = "Blog";
    const VLOG = "Vlog";

    const BOOL_OPTIONS = [
        self::ACTIVE => "Yes",
        self::INACTIVE => "No",
    ];


    const WEB_GUARD = "web";
    const PLAN_GUARD = "plan";

    const PERMISSION_GUARDS = [
        self::WEB_GUARD => "Site Role",
        self::PLAN_GUARD => "Subscription Plan"
    ];

    const SERVER_ERR_CODE = 500;
    const BAD_REQ_ERR_CODE = 400;
    const AUTH_ERR_CODE = 401;
    const FORBIDDEN_ERR_CODE = 403;
    const VALIDATION_ERR_CODE = 422;
    const GOOD_REQ_CODE = 200;
    const DEFAULT_USER_TYPE = "User"; // represents "User"
    const GUEST_USER_TYPE = "Guest"; // represents "Guest"
    const ADMIN_USER_TYPE = "Admin"; // represents "Admin"
    const AUTH_TOKEN_EXP = 60; // auth otp token expiry in minutes
    const OTP_DEFAULT_LENGTH = 7;
    const MAX_PROFILE_PIC_SIZE = 2048;

    const MALE = 'Male';
    const FEMALE = 'Female';
    const OTHERS = 'Others';


    const PENDING_TRANSACTION = 0;
    const SUCCESSFUL_TRANSACTION = 1;
    const FAILED_TRANSACTION = 2;
    const CANCELLED_TRANSACTION = 3;
    const GG_PROVIDER = 'google';
    const FB_PROVIDER = 'facebook';

    const PAGINATION_SIZE_WEB = 50;
    const PAGINATION_SIZE_API = 20;



    const PASSWORD_PIN = "password";

    const TEMPLATE_PICTURE = "picture";
    const TEMPLATE_MUSIC = "music";

    const ZERO = 0;


    const WITHDRAWAL_ORDER_OPTIONS = [
        "created_at_desc" => [
            "label" => "Most Recent",
            "column" => "created_at",
            "order" => "desc"
        ],
        "created_at_asc" => [
            "label" => "Oldest",
            "column" => "created_at",
            "order" => "asc"
        ],
    ];

    const DEV_EMAIL = "sudo@flairbo.com";
}
    