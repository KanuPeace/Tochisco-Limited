<?php

namespace App\QueryBuilder;

use App\Helpers\Constants;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserQueryBuilder
{

    static function filterIndex(Request $request)
    {
        $builder = User::whereNotIn("email", [Constants::DEV_EMAIL])->with("plan");

        if (!empty($key = $request->search)) {
            $builder = $builder->whereRaw("concat(first_name, ' ', last_name , ' ' , email) like '%$key%' ");
        }
        if (!empty($key = $request->role)) {
            $builder = $builder->where("role", $key);
        }
        if (!empty($key = $request->plan)) {
            $builder = $builder->whereHas("plan", function ($query) use ($key) {
                $query->where("plan_name", $key);
            });
        }
        return $builder;
    }
}
