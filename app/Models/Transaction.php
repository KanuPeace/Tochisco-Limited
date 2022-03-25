<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;


class Transaction extends Model
{
    use HasFactory , SoftDeletes , Loggable;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class , "user_id");
    }

    public static function genReference(){

        // Generate a random code
        $code = strtoupper(getRandomToken(6));

        // Check if the code exists in the user table
        if(self::where("reference" , $code)->count() > 0){

            // If it is in the database , call the function again
            return self::genReference();
        }

        // Else return the generated code
        return $code;
    }
}
