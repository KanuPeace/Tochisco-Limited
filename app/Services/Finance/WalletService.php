<?php

namespace App\Services\Finance;

use App\Constants\StatusConstants;
use App\Constants\TransactionActivityConstants;
use App\Constants\TransactionConstants;
use App\Exceptions\Finance\Wallet\WalletException;
use App\Models\User;
use App\Models\Wallet;
use App\Models\WalletTransfer;
use Exception;
use Illuminate\Support\Facades\DB;

class WalletService
{

    const WALLET_CURRENT = "current_balance";
    const WALLET_LOCKED = "locked_balance";
    const WALLET_TOTAL = "total_earnings";
    const WALLET_ELITE_POINTS = "elite_points";

    const WALLET_TYPES = [
        self::WALLET_CURRENT,
        self::WALLET_LOCKED,
        self::WALLET_ELITE_POINTS
    ];

    static public function walletName(string $account)
    {
        return [
            self::WALLET_CURRENT => "Main",
            self::WALLET_LOCKED => "Locked",
            self::WALLET_TOTAL => "Total",
            self::WALLET_ELITE_POINTS => "Elite Points"
        ][$account];
    }


    public static function create($user_id): Wallet
    {
        return Wallet::where("user_id", $user_id)->firstOrCreate([
            "user_id" => $user_id,
            "current_balance" => 0,
            "locked_balance" => 0,
            "total_earnings" => 0,
            "elite_points" => 0,
            "pin" => null,
            "payment_ref" => self::newRefCode()
        ]);
    }


    public static function get($user_id): Wallet
    {
        $wallet = Wallet::where("user_id", $user_id)->first();

        if (empty($wallet)) {
            return self::create($user_id);
        }

        return $wallet;
    }


    public static function credit(string $walletType,  $user_id, float $amount, bool $add_to_total = false)
    {
        if (!in_array($walletType, self::WALLET_TYPES)) {
            throw new WalletException("Invalid wallet type provided.");
        }

        $wallet = self::get($user_id);
        $balance = $wallet->$walletType;
        $data[$walletType] = $balance + $amount;

        if ($add_to_total) {
            $data["total_earnings"] = $wallet->total_earnings + $amount;
        }
        $wallet->update($data);
    }

    public static function debit(string $walletType,  $user_id, float $amount)
    {
        if (!in_array($walletType, self::WALLET_TYPES)) {
            throw new WalletException("Invalid wallet type provided.");
        }

        $wallet = self::get($user_id);
        $balance = $wallet->$walletType;

        if ($balance < $amount) {
            throw new WalletException("Insuffient fund");
        }

        $wallet->update([
            $walletType => $balance - $amount,
        ]);
    }


    public static function transfer($user_id, float $amount, $receiver_id, $description = null): WalletTransfer
    {
        DB::beginTransaction();
        try {
            if($user_id == $receiver_id){
                throw new WalletException("You can`t transfer to yourself.");
            }

            $walletType = self::WALLET_CURRENT;

            $fee = 0;
            $total = $amount + $fee;
            $batch_no = TransactionService::generateBatchNo();

            $user = User::find($user_id);
            $receiver = User::find($receiver_id);



            self::debit($walletType, $user_id, $total);
            TransactionService::create([
                "user_id" => $user_id,
                "amount" => $amount,
                "fee" => $fee,
                "description" => "Transfer to " . $receiver->names() . " with username " . $receiver->username,
                "activity" => TransactionActivityConstants::WALLET_TRANSFER,
                "batch_no" => $batch_no,
                "type" => TransactionConstants::DEBIT,
                "status" => StatusConstants::COMPLETED
            ]);
            self::credit($walletType, $receiver_id, $amount);
            TransactionService::create([
                "user_id" => $receiver_id,
                "amount" => $amount,
                "fee" => 0,
                "description" => $description ?? "Transfer from " . $user->names(),
                "activity" => TransactionActivityConstants::WALLET_TRANSFER,
                "batch_no" => $batch_no,
                "type" => TransactionConstants::CREDIT,
                "status" => StatusConstants::COMPLETED
            ]);

            $transfer = WalletTransfer::create([
                "sender_id" => $user_id,
                "receiver_id" => $receiver_id,
                "reference" => self::generateTransferBatchNo(),
                "batch_no" => $batch_no,
                "amount" => $amount,
                "fee" => $fee,
                "description" => $description,
                "status" => StatusConstants::COMPLETED
            ]);

            DB::commit();
            return $transfer;
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public static function generateTransferBatchNo()
    {
        $key = "RF_" . getRandomToken(5, true);
        $check = WalletTransfer::where("batch_no", $key)->count();
        if ($check > 0) {
            return self::generateTransferBatchNo();
        }
        return $key;
    }

    public static function newRefCode()
    {
        // Generate a random code
        $code = strtoupper(getRandomToken(6));
        // Check if the code exists in the user table
        if (Wallet::where("payment_ref", $code)->count() > 0) {
            // If it is in the database , call the function again
            return self::newRefCode();
        }
        // Else return the generated code
        return $code;
    }
}
