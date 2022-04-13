<?php

namespace App\Services\Finance;

use App\Constants\CurrencyConstants;
use App\Constants\StatusConstants;
use App\Constants\TransactionActivityConstants;
use App\Constants\TransactionConstants;
use App\Exceptions\Finance\FundWalletException;
use App\Models\User;
use App\Models\Transaction;
use App\Services\PayementGateways\FlutterwaveService;
use Exception;
use Illuminate\Support\Facades\DB;

class FundWalletService
{



    public static function byGateway(string $gateway, float $amount): array
    {
        $user = auth()->user();
        if ($gateway == CurrencyConstants::FLUTTERWAVE) {
            return self::withFlutterwave($user, $amount);
        }
        throw new FundWalletException("Gateway is currently inactve");
    }

    public static function withFlutterwave(User $user, float $amount): array
    {
        DB::beginTransaction();
        try {
            $callbackUrl = route("user.payment.callback", ["gateway" => CurrencyConstants::FLUTTERWAVE]);
            $flutterwaveService = new FlutterwaveService;

            $transaction = TransactionService::create([
                "user_id" => $user->id,
                "amount" => $amount,
                "fee" => 0,
                "description" => "Fund via Flutterwave",
                "activity" => TransactionActivityConstants::FUND_WITH_FLUTTERWAVE,
                "batch_no" => null,
                "type" => TransactionConstants::CREDIT,
                "status" => StatusConstants::PENDING
            ] , false);


            $initializeData = $flutterwaveService
                ->setCustomization(null, "Fund with Card")
                ->setPaymentOption("Card")
                ->setCustomerData([
                    "name" => $user->first_name,
                    "email" => $user->email
                ])
                ->setMetaData([
                    "user_id" => $user->id,
                    "activity" => $transaction->activity,
                ])
                ->initialize($transaction->reference, $callbackUrl, $amount);

            if ($initializeData["status"] != "success") {
                throw new FundWalletException($initializeData["message"]);
            }

            DB::commit();
            return [
                "link" => $initializeData["data"]["link"],
                "transaction" => $transaction,
                "success" => true,
                "message" => $initializeData["message"]
            ];
        } catch (Exception $e) {
            throw $e;
            DB::rollback();
            throw new FundWalletException("Couldn`t initiate transaction with Flutterwave");
        }
    }


    public static function processGatewayCallback(Transaction $transaction): array
    {
        DB::beginTransaction();
        try {
            if ($transaction->status == StatusConstants::COMPLETED) {
                throw new FundWalletException("Transaction has been completed!");
            }

            WalletService::credit(
                WalletService::WALLET_CURRENT,
                $transaction->user_id,
                $transaction->amount
            );
            $transaction->update(["status" => StatusConstants::COMPLETED]);
            DB::commit();
            return [
                "link" => route("home"),
                "success" => true,
                "message" => "Wallet funded successfully"
            ];
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
