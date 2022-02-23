<?php

namespace App\Http\Controllers\Users;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\PropertyCategory;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard(User $user, Post $posts )
    {
        // $posts = $user->posts()->with(['user'])->paginate(5);
        $user = auth()->user();
        $types = [Constants::RENT, Constants::SELL];
        $categories = PropertyCategory::get();
        $latestPost = Post::latest()->orderby("created_at", "desc")->paginate(10);
        $posts = Post::latest()->get();
        return view('users.dashboard', [
            'user' => $user,
            'types' => $types,
            'posts' => $posts,
            'categories' =>  $categories,
            'latestPost' =>  $latestPost
        ]);
    }

  

    public function show(Post $post)
    {
        $comments = Comment::get();
        return view('web.post_details', [
            'post' => $post,
            'comments' =>  $comments,
            // "metaData" => PageMetaData::blogDetailsPage($post)
        ]);
    }

    
    public function list(PropertyCategory $categories)
    {
        // dd($categories);
        $posts = $categories->post()->get();
         return view('web.category.post', [
           'posts' => $posts,
           'categories' => $categories,
       ]);
    }

    public function specificCategory(PropertyCategory $categories)
    {
        $posts = $categories->posts()->with(['categories'])->get();
        $categories = PropertyCategory::all();
        return view('web.category.specific-category' , [
            'posts' => $posts,
            'categories' => $categories,

        ]);
    }

}
