<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['name'];

    use HasFactory;

    public function city()
    {
        return $this->hasMany(City::class ,'states_id');
    }
}
