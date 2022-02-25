<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name' , 'city_id'];

    use HasFactory;

    public function state()
    {
        return $this->belongsTo(State::class, 'states_id');
    }
}
