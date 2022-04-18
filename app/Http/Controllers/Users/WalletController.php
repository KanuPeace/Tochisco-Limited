<?php

namespace App\Http\Controllers\Users;

use App\Helpers\Constants;
use App\Helpers\CouponService;
use App\Helpers\PlanSubscription;
use App\Helpers\Wallet as HelpersWallet;
use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use Illuminate\Http\Request;
use App\Models\CouponCode;
use App\Models\Referral;
use App\Models\Vendor;
use App\Models\WithdrawalRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

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
        $wallet = HelpersWallet::get($user);
        $wallet_balance = format_money($wallet->balance);
        $account = BankAccount::where("user_id", $user->id)->firstOrNew();
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

            $amount = $data["amount"];
            $fee = $amount * 0.02;
            $total = $amount + $fee;

            $balance = HelpersWallet::get($user)->balance;
            if ($total > $balance) {
                return back()->with("error_message", "Insufficient fund");
            }

            $withdrawal = WithdrawalRequest::create([
                "user_id" => $user->id,
                "reference" => WithdrawalRequest::genReference(),
                "amount" => $amount,
                "fee" => $fee,
                "bank_name" => $data["bank_name"],
                "account_name" => $data["account_name"],
                "account_number" => $data["account_number"],
                "status" => Constants::PENDING,
                "request_date" => now(),
            ]);

            HelpersWallet::debit(
                Constants::WALLET_DEFAULT,
                $user,
                $amount,
                $fee,
                "Withdrawal request made with reference #$withdrawal->reference",
                Constants::COMPLETED
            );

            sendMailHelper([
                "data" => [
                    "user" => $user,
                    "withdrawal" => $withdrawal,
                ],
                "to" => "flairworldstechnology@gmail.com",
                "template" => "emails.withdrawal_requests.new",
                "subject" => "New Withdrawal Request",
            ]);


            DB::commit();
            return redirect()->back()->with("success_message", "Withdraw request sent successfully. Please wait will your request is being processed!");
        } catch (\Throwable $th) {
            DB::rollBack();
            if ($th->getCode() == Constants::ERROR_CODE) {
                return back()->with("error_message", $th->getMessage());
            }
            return back()->with("error_message", "An unknown error occured while processing your request!");
        }
    }


    public function transferToMain(Request $request, $account)
    {
        DB::beginTransaction();

        try {
            if (!in_array($account, [Constants::WALLET_REFERRAL, Constants::WALLET_NON_REFERRAL])) {
                return back()->with("error_message", "Invalid wallet type provided");
            }

            $user = auth()->user();
            $wallet = HelpersWallet::get($user);
            $plan = $this->subscriptionService->currentSubscription($user->id)
                ?? $this->subscriptionService->lastSubscription($user->id);

            if (empty($plan)) {
                return back()->with("error_message", "You are currently not subscribed to any plan!");
            }

            $transfer_limit = 0;
            $ref_limit = 0;
            $ref_count = 0;
            if ($account == Constants::WALLET_REFERRAL) {
                $transfer_limit = $plan->ref_withdrawal_limit;
            } elseif ($account == Constants::WALLET_NON_REFERRAL) {
                $transfer_limit = $plan->non_ref_withdrawal_limit;
            }


            if ($wallet->$account < $transfer_limit) {
                return back()->with("error_message", "You can`t transfer at this time. Transfer limit is " . format_money($transfer_limit));
            }

            // $ref_limit = $plan->min_refs;
            // $ref_count = Referral::where("referrer_id", $user->id)->count();

            // if ($ref_count < $ref_limit) {
            //     return back()->with("error_message", "You can`t transfer at this time.You need to have at least $ref_limit referrals");
            // }

            HelpersWallet::transfer(
                $account,
                $user,
                Constants::COMPLETED
            );

            DB::commit();
            return back()->with("success_message", "Transfer successful");
        } catch (\Throwable $th) {
            DB::rollBack();
            if ($th->getCode() == Constants::ERROR_CODE) {
                return back()->with("error_message", $th->getMessage());
            }
            return back()->with("error_message", "An unknown error occured while processing your request!");
        }
    }

}
