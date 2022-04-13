<?php

namespace App\Services\Finance;

use App\Constants\CurrencyConstants;
use App\Services\Providers\ProviderService;
use App\Services\Providers\ProviderUserTransactionService;

class WithdrawFromWalletService
{

    public static function byProvider($provider_id, float $amount)
    {
        $user = auth()->user();
        $provider = ProviderService::getById($provider_id);
        $wallet = WalletService::getByCurrencyType($user->id, CurrencyConstants::DOLLAR_CURRENCY);

        ProviderUserTransactionService::sendMoneyFromUserWalletToProviderClient(
            $wallet,
            $provider,
            $amount
        );
    }


}
