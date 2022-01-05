<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['profile_image', 'location' , 'phone' , 'facebook' , 'instagram' , 'twitter'];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
