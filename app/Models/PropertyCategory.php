<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'type',
        ' "title',
        'body',
        'no_of_bedrooms',
        'no_of_sittingrooms',
        'price',
        'cover_image',
    ];
}
