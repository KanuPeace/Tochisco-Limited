<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyCategory extends Model
{
    use HasFactory;

    protected $fillable = [
       'name', 'categories'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class ,'category_id');
    }
}
