<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;


class BankAccount extends Model
{
    use HasFactory , Loggable;

    protected $guarded = ["id"];

    public function user()
    {
        return $this->belongsTo(User::class , "user_id");
    }

    public  static function getNewCode()
    {
        return strtoupper(getRandomToken(6));
    }

}
