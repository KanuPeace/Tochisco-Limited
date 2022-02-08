<?php

namespace App\Helpers;

use App\Exceptions\WalletException;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet as ModelsWallet;

class Wallet
{

    public static function get(User $user)
    {
        $wallet = ModelsWallet::where("user_id", $user->id)->first();

        if (empty($wallet)) {
            $wallet = ModelsWallet::create([
                "user_id" => $user->id,
                "balance" => 0,
                "pin" => null
            ]);
        }

        return $wallet;
    }

    public static function credit(
        string $walletAccount,
        User $user,
        float $amount,
        string $description,
        string $status,
        bool $updateWallet = true,
        bool $withTransaction = true
    ) {
        if (!in_array($walletAccount, Constants::WALLET_TYPES)) {
            throw new WalletException("Invalid wallet type" , Constants::ERROR_CODE);
        }

        if ($updateWallet) {
            $wallet = self::get($user);
            $wallet->update([
                $walletAccount => $wallet->$walletAccount + $amount
            ]);
        }

        if ($withTransaction) {
            Transaction::create([
                "user_id" => $user->id,
                "reference" => Transaction::genReference(),
                "amount" => $amount,
                "fee" => 0,
                "total" => $amount,
                "type" => Constants::CREDIT_TRANSACTION,
                "wallet_type" => $walletAccount,
                "description" => $description,
                "status" => $status
            ]);
        }
    }

    public static function debit(
        string $walletAccount,
        User $user,
        float $amount,
        float $fee,
        string $description,
        string $status,
        bool $updateWallet = true,
        bool $withTransaction = true
    ) {

        if (!in_array($walletAccount, Constants::WALLET_TYPES)) {
            throw new WalletException("Invalid wallet type");
        }
        $accountName = Constants::walletName($walletAccount);

        if ($updateWallet) {
            $wallet = self::get($user);
            $total = $amount + $fee;

            $accountBalance = $wallet->$walletAccount;
            $debitAmount = $accountBalance - $total;

            if ($debitAmount < 0) {
                throw new WalletException("Insuffient balance in $accountName wallet" , Constants::ERROR_CODE);
            }

            $wallet->update([
                $walletAccount => $debitAmount
            ]);
        }

        if ($withTransaction) {
            Transaction::create([
                "user_id" => $user->id,
                "reference" => Transaction::genReference(),
                "amount" => $amount,
                "fee" => $fee,
                "total" => $total,
                "type" => Constants::DEBIT_TRANSACTION,
                "wallet_type" => $walletAccount,
                "description" => $description,
                "status" => $status
            ]);
        }
    }


    public static function transfer(
        string $walletAccount,
        User $user,
        string $status,
        float $amount = null,
        float $fee = null
    ) {

        if (!in_array($walletAccount, [Constants::WALLET_REFERRAL, Constants::WALLET_NON_REFERRAL])) {
            throw new WalletException("Invalid wallet type" , Constants::ERROR_CODE);
        }

        $wallet = self::get($user);
        $accountBalance = $wallet->$walletAccount;
        $accountName = Constants::walletName($walletAccount);

        if (!$accountBalance > 0) {
            throw new WalletException("Insuffient balance in $accountName wallet" , Constants::ERROR_CODE);
        }

        if ($amount > $accountBalance) {
                throw new WalletException("Amount is greater than balance" , Constants::ERROR_CODE);
        }

        $amount = $amount ?? $accountBalance;
        $fee = $fee ?? 0;
        $total = $amount + $fee;

        $wallet->update([
            $walletAccount => $wallet->$walletAccount - $total,
            "balance" => $wallet->balance + $total,
        ]);

        $formattedAmount = format_money($amount);


        Transaction::create([
            "user_id" => $user->id,
            "reference" => Transaction::genReference(),
            "amount" => $amount,
            "fee" => 0,
            "total" => $total,
            "type" => Constants::CREDIT_TRANSACTION,
            "wallet_type" => $walletAccount,
            "description" => "Transfer $formattedAmount to Main wallet from $accountName wallet",
            "status" => $status
        ]);

        Transaction::create([
            "user_id" => $user->id,
            "reference" => Transaction::genReference(),
            "amount" => $amount,
            "fee" => $fee,
            "total" => $total,
            "type" => Constants::DEBIT_TRANSACTION,
            "wallet_type" => $walletAccount,
            "description" => "Transfer $formattedAmount from $accountName wallet to Main wallet",
            "status" => $status
        ]);

    }
}
