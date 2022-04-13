<?php

namespace App\Services\Finance;

use App\Constants\StatusConstants;
use App\Constants\TransactionActivityConstants;
use App\Constants\TransactionConstants;
use App\Exceptions\TransactionException;
use App\Models\Transaction;
use App\Notifications\TransactionNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class TransactionService
{

    public static function validate($data)
    {
        $validator = Validator::make($data, [
            "user_id" => "bail|required|exists:users,id",
            "amount" => "bail|required|numeric|gt:0",
            "fee" => "bail|required|numeric|gt:-1",
            "description" => "bail|required|string",
            "activity" => "bail|nullable|string",
            "batch_no" => "bail|nullable|string",
            "type" => "bail|required|string|" . Rule::in([
                TransactionConstants::CREDIT,
                TransactionConstants::DEBIT
            ]),
            "status" => "bail|nullable|string|" . Rule::in([
                StatusConstants::COMPLETED,
                StatusConstants::PENDING,
                StatusConstants::PROCESSING
            ]),
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        return $validator->validated();
    }

    public static function create($data , bool $notify = true): Transaction
    {
        $data = self::validate($data);
        $data["reference"] = self::generateReferenceNo();
        $data["total"] = $data["amount"] + $data["fee"];
        $transaction = Transaction::create($data);

        if($notify){
            Notification::sendNow($transaction->user , new TransactionNotification($transaction));
        }
        return $transaction;
    }

    public static function generateBatchNo()
    {
        $key = "BN_" . getRandomToken(5, true);
        $check = Transaction::where("batch_no", $key)->count();
        if ($check > 0) {
            return self::generateBatchNo();
        }
        return $key;
    }

    public static function generateReferenceNo()
    {
        $key = "RF_" . getRandomToken(8, true);
        $check = Transaction::where("reference", $key)->count();
        if ($check > 0) {
            return self::generateReferenceNo();
        }
        return $key;
    }

    public static function getByReference($reference): Transaction
    {
        $transaction = Transaction::where("reference", $reference)->first();

        if (empty($transaction)) {
            throw new TransactionException(
                "Transaction not found",
            );
        }
        return $transaction;
    }

    public static function getById($id): Transaction
    {
        $transaction = Transaction::where("id", $id)->first();

        if (empty($transaction)) {
            throw new TransactionException(
                "Transaction not found",
            );
        }
        return $transaction;
    }

    public static function markAs(string $reference, string $status)
    {
        return Transaction::where("reference", $reference)->update(["status" => $status]);
    }

    public static function formatAmount($amount , $activity)
    {
        if(in_array($activity , [
            TransactionActivityConstants::SHARE_ACTIVITY_BONUS,
            TransactionActivityConstants::REFERRAL_BONUS,
        ]))
        {
            $amount = number_format($amount , 2) . " Elite Points";
        }
        else{
            $amount = format_money($amount , 2);
        }
        return $amount;
    }


}
