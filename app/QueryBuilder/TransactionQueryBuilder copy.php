<?php
namespace App\QueryBuilders;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionQueryBuilder {

    static function filterIndex(Request $request)
    {
        $builder = Transaction::with("user");

        if(!empty($key = $request->user_id)){
            $builder = $builder->where("user_id" , $key);
        }

        if (!empty($key = $request->search)) {
            $builder = $builder->whereRaw("concat(description, ' ', reference , ' ' ) like '%$key%' ");
        }

        if(!empty($key = $request->type)){
            $builder = $builder->where("type" , $key);
        }


        if(!empty($key = $request->activity)){
            $builder = $builder->where("activity" , $key);
        }

        if (!empty($key = $request->from)) {
            $builder = $builder->whereDate("created_at", ">=", $key);
        }

        if (!empty($key = $request->to)) {
            $builder = $builder->whereDate("created_at", "<=", $key);
        }

        return $builder;
    }
}
