<?php

namespace App\Constants;

class AppConstants
{
    const REGISTER_BONUS = 250000;
    const ELIGIBLE_ELITE_POINTS_LIMIT = 2;
    const ZERO = 0;
    const ONE = 1;

    const MAX_PROFILE_PIC_SIZE = 2048;

    const MALE = 'Male';
    const FEMALE = 'Female';
    const OTHERS = 'Others';


    const GENDERS = [
        self::MALE,
        self::FEMALE,
        self::OTHERS,
    ];

    const PILL_CLASSES = [
        StatusConstants::COMPLETED => "success",
        StatusConstants::PENDING => "primary",
        StatusConstants::PROCESSING => "info",
        StatusConstants::CANCELLED => "danger",
        StatusConstants::ACTIVE => "success",
        StatusConstants::INACTIVE => "warning",
        StatusConstants::DELETED => "danger",
        TransactionConstants::DEBIT => "danger",
        TransactionConstants::CREDIT => "success",
    ];


    const PAGINATION_SIZE_WEB = 50;
}
