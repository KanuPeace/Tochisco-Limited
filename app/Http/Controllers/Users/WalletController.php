<?php

namespace App\Http\Controllers\Users;
use App\Constants\StatusConstants;
use App\Constants\TransactionActivityConstants;
use App\Constants\TransactionConstants;
use App\Exceptions\Finance\Wallet\WalletException;
use App\Helpers\Constants;
use App\Helpers\CouponService;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use Illuminate\Http\Request;
use App\Models\CouponCode;
use App\Models\User;
use App\Models\Vendor;
use App\Models\WalletTransfer;
use App\Models\WithdrawalRequest;
use App\Services\Finance\TransactionService;
use App\Services\Finance\WalletService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class WalletController extends Controller
{
    public $couponService;
    public function __construct()
    {
        $this->couponService = new CouponService;
    }
    public function deposit()
    {
        return view("dashboards.user.wallet.deposit");
    }

    public function coupon_deposit(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validate([
                "coupon_code" => "required|string|exists:coupon_codes,code"
            ]);
            $user = auth()->user();
            $coupon = CouponCode::where("code", $data["coupon_code"])->first();
            $process = $this->couponService->deposit($user, $coupon);
            if (!$process["success"]) {
                return back()->with("error_message", $process["message"]);
            }

            DB::commit();
            return back()->with("success_message", "Deposit successful");
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function withdraw()
    {
        $user = auth()->user();
        $wallet = WalletService::get($user->id);
        $current_balance = WalletService::WALLET_CURRENT;
        $wallet_balance = format_money($wallet->$current_balance);
        $account = $user->bankAccount ?? new BankAccount();
        return view("dashboards.user.wallet.withdraw", ["wallet_balance" => $wallet_balance, "account" => $account]);
    }


    public function withdraw_request(Request $request)
    {
        DB::beginTransaction();

        try {
            $id = $request->account_id;
            $data = $request->validate([
                "amount" => "required|string",
                "bank_name" => "required|string",
                "account_name" => "required|string",
                "account_number" => "required|string|unique:bank_accounts,account_number,$id",
            ]);

            $user = auth()->user();
            if (empty($user->bankAccount)) {
                BankAccount::create([
                    "user_id" => $user->id,
                    "bank_name" => $data["bank_name"],
                    "account_name" => $data["account_name"],
                    "account_number" => $data["account_number"],
                ]);
            }


            $fee = 0;
            $amount = $data["amount"];
            $total = $amount + $fee;

            $current_balance = WalletService::WALLET_CURRENT;
            $balance = WalletService::get($user->id)->$current_balance;
            if ($total > $balance) {
                return back()->with("error_message", "Insufficient fund");
            }

            $withdrawal = WithdrawalRequest::create([
                "user_id" => $user->id,
                "reference" => WithdrawalRequest::genReference(),
                "amount" => $amount,
                "bank_name" => $data["bank_name"],
                "account_name" => $data["account_name"],
                "account_number" => $data["account_number"],
                "status" => Constants::PENDING,
                "request_date" => now(),
            ]);

            WalletService::debit(
                $current_balance,
                $user->id,
                $total,
            );

            TransactionService::create([
                "user_id" => $user->id,
                "amount" => $amount,
                "fee" => $fee,
                "description" => "Withdrawal request made with reference #$withdrawal->reference",
                "activity" => TransactionActivityConstants::WITHDRAW_FROM_WALLET,
                "batch_no" => null,
                "type" => TransactionConstants::DEBIT,
                "status" => StatusConstants::PENDING
            ]);

            DB::commit();
            return redirect()->route('home')->with("success_message", "Withdraw successful. THe admin would process your request within 24 working hours.");
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function transfer(Request $request)
    {

        $user = auth()->user();
        $wallet = WalletService::get($user->id);
        $current_balance = WalletService::WALLET_CURRENT;
        $wallet_balance = format_money($wallet->$current_balance);

        if ($request->getMethod() == "GET") {
            return view("dashboards.user.transfer.index", ["wallet_balance" => $wallet_balance]);
        }

        try {
            $data = $request->validate([
                "username" => "required|string|exists:users,username",
                "amount" => "required|string",
                "account_name" => "required|string",
                "pin" => "required|string",
                "description" => "nullable|string",
            ]);

            $user = auth()->user();
            $wallet = WalletService::get($user->id);

            if (empty($wallet->pin)){
                return back()->withInput($data)
                ->with("error_message", "Kindly set a pin first before you proceed to transfer");
            }

            if (!Hash::check($data["pin"], $wallet->pin)) {
                return back()->withInput($data)->with("error_message", "Wallet pin is incorrect");
            }

            $receiver = User::where("username", $data["username"])->first();

            if ($user->id == $receiver->id) {
                return back()->withInput($data)->with("error_message", "You cannot transfer funds to yourself");
            }

            WalletService::transfer(
                $user->id,
                $data["amount"],
                $receiver->id,
                $data["description"] ?? null
            );
            return back()->with("success_message", "Transfer successful");
        } catch (WalletException $e) {
            return back()->with("error_message", $e->getMessage());
        } catch (Exception $e) {
            return back()->with("error_message", "An error occured while processing your request");
        }
    }

    public function transfer_history()
    {
        $user = auth()->user();
        $transfers = WalletTransfer::where("sender_id" , $user->id)->with("receiver")->latest()->paginate();
        return view("dashboards.user.transfer.history" , [
            "transfers" => $transfers
        ]);
    }

    public function fundWallet()
    {
        return view("dashboards.user.fund_wallet.index");
    }

}
