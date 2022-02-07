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
        $latestPost = Post::latest()->orderby("created_at", "desc")->paginate(10); 
        $posts = Post::latest()->get();
        return view('welcome' , [
            'types' => $types,
            'posts' => $posts,
            'categories' =>  $categories,
            ' latestPost' =>  $latestPost
        ]);
    } 

    public function list(PropertyCategory $categories)
    {
        $posts = $categories->post()->get();
         return view('web.category.post', [
           'posts' => $posts,
           'categories' => $categories,
       ]);
    }

    public function specificCategory(PropertyCategory $categories)
    {
        $posts = $categories->posts()->with(['categories'])->get();
        return view('web.category.specific-category' , [
            'posts' => $posts,
        ]);
    }

}
