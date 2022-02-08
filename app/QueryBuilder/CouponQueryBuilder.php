<?php
namespace App\QueryBuilder;

use App\Models\CouponCode;
use App\Models\Transaction;
use Illuminate\Http\Request;

class CouponQueryBuilder {

    static function filterIndex(Request $request)
    {
        $builder = CouponCode::with("user")->with("vendor");

        if(!empty($key = $request->search)){
            $builder = $builder->where("code" , "like", "%$key%");
        }

        return $builder->orderby("id", "desc");
    }
}
