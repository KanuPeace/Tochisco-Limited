<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyCategory extends Model
{
    use HasFactory;

    protected $fillable = [
       'name',
    ];

    public function post()
    {
        return $this->hasMany(Post::class);
    }
}
