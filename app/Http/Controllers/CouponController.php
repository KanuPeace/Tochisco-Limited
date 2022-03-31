<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QueryBuilder\CouponQueryBuilder;
use App\Services\Auth\AuthorizationService;

class CouponController extends Controller
{
    public function index(Request $request) {
        AuthorizationService::hasPermissionTo("can_read_coupons");
        $coupons = CouponQueryBuilder::filterIndex($request)->paginate(50)->appends($request->query());
        $sn = $coupons->firstItem();
        return view("admin.coupons.index", ["coupons" => $coupons , "sn" => $sn ]);
    }
}
