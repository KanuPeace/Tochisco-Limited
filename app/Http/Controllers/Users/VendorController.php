<?php

namespace App\Http\Controllers\Users;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Helpers\MediaHandler;
use App\Models\Vendor;
use App\Helpers\Wallet;
use App\Helpers\Wallet as HelpersWallet;
use App\Models\CouponCode;
use App\Models\Plan;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $mediaHandler;
    public function __construct(MediaHandler $mediaHandler)
    {
        $this->mediaHandler = $mediaHandler;
    }

    public function application()
    {
        $user = auth()->user();
        return view("dashboards.user.vendor.apply", ["user" => $user]);
    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "business_name" => "required|string|unique:vendors,business_name",
            "phone" => "required|string",
            "logo" => "nullable|image"
        ]);

        $user = auth()->user();
        $check = Vendor::where("user_id", $user->id)->count();
        if ($check > 0) {
            return back()->with('error_message', 'You already applied as a vendor!');
        }

        if (!empty($logo = $request->file("logo"))) {
            $filePath = putFileInPrivateStorage($logo, "temp");
            $logoFile = $this->mediaHandler->saveFromFilePath(storage_path("app/$filePath"), "vendor_logos", null, $user->id);
            $data["logo_id"] = $logoFile->id;
            unset($data["logo"]);
        }

        $data["user_id"] = $user->id;
        $data["payment_ref"] = Vendor::newRefCode();
        Vendor::create($data);
        return redirect()->route("user.vendor.dashboard")->with('success_message', 'Vendor application submitted successfully.');

    }

    public function dashboard()
    {
        $user = auth()->user();
        $wallet = Wallet::get($user);
        $vendor = Vendor::where("user_id", $user->id)->first();

        if (empty($vendor)) {
            return redirect()->route("user.vendor.application");
        }
        $coupons = CouponCode::where("vendor_id", $user->id)->orderby("created_at" , "desc")
        ->paginate(Constants::PAGINATION_SIZE);

        $sn = $coupons->firstItem();
        $plans = Plan::active()->where("price", ">", 0)->get(["name", "price"]);
        $plans->push(new Plan(["name" => "Two thousand Naira" , "price" => 4]));
        $plans->push(new Plan(["name" => "One thousand Naira" , "price" => 2]));
        $min_deposit = Constants::MIN_VENDOR_DEPOSIT_NGN;
        return view("dashboards.user.vendor.dashboard", [
            "sn" => $sn,
            "user" => $user,
            "wallet" => $wallet,
            "vendor" => $vendor,
            "coupons" => $coupons,
            "plans" => $plans,
            "min_deposit" => $min_deposit
        ]);
    }

    public function manualPayment(Request $request)
    {
        $data = $request->validate([
            "amount" => "required|numeric|min:".Constants::MIN_VENDOR_DEPOSIT_NGN
        ]);

        $user = auth()->user();
        $vendor = Vendor::where("user_id", $user->id)->first();
        $amount = $data["amount"] / Constants::NGN_USD_RATE;

        $description = "Paid to Bank with Reference Number: #$vendor->payment_ref";
        HelpersWallet::credit(
            Constants::WALLET_DEFAULT,
            $user,
            $amount,
            $description,
            Constants::PENDING,
            false,
            true
        );

        $vendor->update([
            "payment_ref" => Vendor::newRefCode()
        ]);

        sendMailHelper([
            "data" => [
                "user" => $user,
                "naira_amount" => $data["amount"],
                "amount" => $amount,
                "description" => $description
            ],
            "to" => "flairworldstechnology@gmail.com",
            "template" => "emails.payments.new",
            "subject" => "New Vendor Payment",
        ]);


        return back()->with('success_message', 'Payment recorded successfully!');
    }

    public function generateCodes(Request $request)
    {
        $data = $request->validate([
            "price" => "required|string",
            "quantity" => "required|gt:0",
        ]);

        $user = auth()->user();
        $vendor = Vendor::where("user_id", $user->id)->first();

        if (!$vendor->isApproved()) {
            return back()->with("error_message", "Kindly wait for your profile to be approved!");
        }

        $price = $data["price"];
        $quantity = $data["quantity"];
        $profit = 0;

        $total = $price * $quantity;

        // Check for profit type
        if (Constants::VENDOR_COUPON_PROFIT_TYPE == Constants::PERCENTAGE) {
            $profit =  (Constants::VENDOR_COUPON_PROFIT_PERCENT * $total) / 100;
            $total = $total - $profit;
        }

        $wallet = Wallet::get($user);

        if ($wallet->balance < $total) {
            return back()->with('error_message', 'Insufficient funds!');
        }

        Wallet::debit(
            Constants::WALLET_DEFAULT,
            $user,
            $total,
            0,
            "Generated $quantity of " . format_money($price) . " coupons",
            Constants::COMPLETED,
            true,
            true
        );

        for ($i = 0; $i < $quantity; $i++) {
            CouponCode::create(
                [
                    "vendor_id" => $user->id,
                    "code" => CouponCode::getCode(),
                    "price" => $price
                ]
            );
        }

        $vendor->update([
            "coupons_bought" => $vendor->coupons_bought + $quantity
        ]);

        return back()->with('success_message', 'Codes generated successfully!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $vendor = Vendor::findOrFail($id);
        return view("dashboards.user.vendor.edit", ["vendor" => $vendor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vendor = Vendor::findorfail($id);
        $data = $request->validate([
            "business_name" => "nullable|string|unique:vendors,business_name,$id",
            "phone_number" => "nullable|string",
            "logo" => "nullable|image"
        ]);

        $newLogoId = null;
        if (!empty($logo = $request->file("logo"))) {
            $filePath = putFileInPrivateStorage($logo, "temp");
            $logoFile = $this->mediaHandler->saveFromFilePath(storage_path("app/$filePath"), "vendor_logos", null);
            $data["logo_id"] = $logoFile->id;
            $newLogoId = $data["logo_id"];
            unset($data["logo"]);
        }

        $oldLogo = $vendor->logo;
        $vendor->update($data);
        if ($newLogoId) {
            $oldLogo->cleanDelete();
        }


        return redirect()->route("user.vendor.dashboard")->with("success_message", "Changes saved successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
