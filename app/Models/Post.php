<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'content_type',
        'cover_video',
        'cover_image',
        'content_desccription',
        'price',
        'slug',
        'no_of_bedrooms',
        'no_of_sittingrooms',
        'location',
        'user_id'

    ];

    protected $primaryKey = 'user_id';


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(PropertyCategory::class);
    }

    public function coverImage()
    {
        return $this->hasOne(File::class, "id", "cover_image");
    }

    public function coverVideo()
    {
        return $this->hasOne(File::class, "id", "cover_video");
    }
}
