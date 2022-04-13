<?php

namespace App\Services\Finance;

use App\Constants\StatusConstants;
use App\Constants\TransactionActivityConstants;
use App\Constants\TransactionConstants;
use App\Models\User;

class DefaultUserWalletsService
{
    const SIGNUP_BONUS = 100000;

    public static function setup(User $user)
    {
        $creditAmount = self::SIGNUP_BONUS;
        WalletService::create($user->id);
        WalletService::credit(
            WalletService::WALLET_LOCKED,
            $user->id,
            $creditAmount,
            true
        );

        TransactionService::create([
            "user_id" => $user->id,
            "amount" => $creditAmount,
            "fee" => 0,
            "description" => "Signup bonus",
            "activity" => TransactionActivityConstants::SIGNUP_BONUS,
            "batch_no" => null,
            "type" => TransactionConstants::CREDIT,
            "status" => StatusConstants::COMPLETED
        ]);
    }

}
