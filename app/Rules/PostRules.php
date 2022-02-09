<?php 

namespace App\Rules;

use App\Helpers\Constants;
use Illuminate\Http\Request;

class PostRules{
    public function getPostRules(Request $request){
        $allowedOptions = Constants::ACTIVE . "," . Constants::INACTIVE;
        $allowedTypes = Constants::RENT . "," . Constants::SELL;
        return  $request->validate([
            'category_id' => "required|string",
            'name' => 'required|string',
            'content_desccription' => 'required:string',
            "type" => "required|string|in:$allowedTypes",
            'cover_image' => 'required|image',
            "cover_video" => 'required',
            'price' => 'required',
            'no_of_bedrooms' => 'required',
            'no_of_sittingrooms' => 'required',
            'location' => 'required',
            "is_sponsored" => "required|string|in:$allowedOptions",
            "is_top_story" => "required|string|in:$allowedOptions",
            "is_featured" => "required|string|in:$allowedOptions",
            "is_published" => "required|string|in:$allowedOptions",
            "can_comment" => "required|string|in:$allowedOptions",
        ]);
    }
}