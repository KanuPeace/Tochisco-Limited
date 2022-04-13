<?php

namespace App\Constants;

class StatusConstants
{
    const ACTIVE = "Active";
    const INACTIVE = "Inactive";
    const CREATED = "Created";
    const STARTED = "Started";
    const APPROVED = "Approved";
    const SUSPENDED = "Suspended";
    const PENDING = "Pending";
    const COMPLETED = "Completed";
    const PROCESSING = "Processing";
    const CANCELLED = "Cancelled";
    const DECLINED = "Declined";
    const ENDED = "Ended";
    const DELETED = "Deleted";


    const SUBSCRIPTION_OPTIONS = [
        self::ACTIVE => self::ACTIVE,
        self::INACTIVE => self::INACTIVE,
    ];
}
