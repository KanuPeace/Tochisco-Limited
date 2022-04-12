<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Referral;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function index(Request $request)
    {
        $referrer_id = $request->referrer_id;

        $queryBuilder = Referral::whereHas("user")
            ->whereHas("referrer")
            ->with("user")
            ->with("referrer")
            ->orderby("created_at", "desc");

        if (!empty($referrer_id)) {
            $queryBuilder = $queryBuilder->where("referrer_id", $referrer_id);
        }

        $referrals = $queryBuilder->paginate(20);
        $sn = $referrals->firstItem();
        return view("admin.referrals.index", compact('referrals', 'sn'));
    }
}
