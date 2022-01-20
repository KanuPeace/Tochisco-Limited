<?php
namespace App\QueryBuilder;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionQueryBuilder {

    static function filterIndex(Request $request)
    {
        $builder = Subscription::with("user");

        if(!empty($key = $request->user_id)){
            $builder = $builder->where("user_id" , $key);
        }

        return $builder->orderby("created_at", "desc");
    }
}
