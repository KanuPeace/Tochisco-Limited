<?php

namespace App\Services\Auth;

use App\Helpers\Constants;
use App\Models\User;
use App\Services\Notifications\AppMailer;
use App\Services\WalletService;

class SanctumService
{
    const SESSION_KEY = "sanctum_auth_token";
    const WEB_TOKEN_NAME = "sanctum_web_auth_token";
    const WEB_META_NAME = "sanctum_auth_token";

    public static function getToken()
    {
        if (!empty($user = auth("web")->user())) {

            $token = session(self::SESSION_KEY, null);
            if(empty($user->tokens()->count())){
                $token = null;
            }
            if (empty($token)) {
                $user->tokens()->where('name', self::WEB_TOKEN_NAME)->delete();
                $token = $user->createToken(self::WEB_TOKEN_NAME)->plainTextToken;
                session([self::SESSION_KEY => $token]);
            }
            return $token;
        }
    }
}
