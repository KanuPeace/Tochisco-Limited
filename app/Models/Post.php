<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'type',
        'title',
        'body',
        'location',
        'no_of_bedrooms',
        'no_of_sittingrooms',
        'price',
        'cover_image',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(PropertyCategory::class);
    }
}
