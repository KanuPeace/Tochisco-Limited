<?php
namespace App\Traits;

use App\Models\Plan;
use App\Models\User;

trait RegisterTrait{

    public function ref_invite($ref_code)
    {
        $referrerUser = User::where("ref_code", $ref_code)->first();
        if (!empty($referrerUser)) {
            $this->referralService->initiateInvite($referrerUser);
        }
        return redirect()->route("register");
    }


    public function showRegistrationForm()
    {
        $referrer = $this->referralService->getSessionReferrer();
        $plans = Plan::active()->where("price", ">", 0)->get(["name", "price"]);
        return view('auth.register', ["referrer" => $referrer, "plans" => $plans]);
    }



}
