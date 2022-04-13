<?php

namespace App\Services\Auth;

use App\Helpers\Constants;
use App\Models\User;
use App\Services\Finance\DefaultUserWalletsService;
use App\Services\Notifications\User\AccountNotificationService;
use App\Services\Notifications\AppMailerService;
use Illuminate\Support\Facades\Hash;

class RegisterationService
{


    public static function generateUsername($firstname, $lastname, int $suffix = null)
    {
        $username = $firstname . $lastname[0] ?? "";
        $username .= "$suffix";

        $check = User::where("username", $username)->count();
        if ($check > 0) {
            return self::generateUsername($firstname, $lastname, ((int)$suffix) + 1);
        }
        return $username;
    }


    public static function sendWelcomeMessage($user)
    {
        AppMailerService::send([
            "data" => [
                "user" => $user,
            ],
            "to" => $user->email,
            "template" => "emails.user.welcome",
            "subject" => "Welcome to Flairbo",
        ]);
    }

    public static function createUser(array $data): User
    {
        $data["username"] = self::generateUsername($data["first_name"], $data["last_name"]);
        $data["ref_code"] = strtoupper(getRandomToken(8));
        $data["password"] = Hash::make($data['password']);
        // Remove on production
        $data["email_verified_at"] = now();
        return User::create($data);
    }

    public static function postRegisterActions(User $user)
    {
        AccountNotificationService::welcomeNewUser($user);
        DefaultUserWalletsService::setup($user);
    }
}


