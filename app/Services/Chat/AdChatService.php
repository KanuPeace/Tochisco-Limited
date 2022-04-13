<?php

namespace App\Services\Chat;

use App\Models\Chat;
use App\Services\Ads\AdService;
use Exception;
use Illuminate\Http\Request;

class AdChatService
{
    public static  function initiate($ad_id, $message)
    {
        // try {
            $ad = AdService::getById($ad_id);
            ChatService::initiate(new Request([
                "ad_id" => $ad_id,
                "recipient_id" => $ad->user_id,
                "message" => $message,
            ]));
        // } catch (Exception $e) {
        //     throw $e;
        // }
    }

}
