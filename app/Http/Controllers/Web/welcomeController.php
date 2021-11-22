<?php

namespace App\Http\Controllers\Web;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PropertyCategory;
use Illuminate\Http\Request;

class welcomeController extends Controller
{
    public function index( Post $posts )
    {
 
        $types = [Constants::RENT, Constants::SELL];
        $categories = PropertyCategory::get();
        $posts = Post::latest()->get();
        return view('welcome' , [
            'types' => $types,
            'posts' => $posts,
            'categories' =>  $categories,
        ]);
    } 
}
