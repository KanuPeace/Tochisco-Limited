<?php

namespace App\Http\Controllers;

use App\Helpers\Constants;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PropertyCategory;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Post $posts)
    {

        $types = [Constants::RENT, Constants::SELL];
        $categories = PropertyCategory::get();
        $latestPost = Post::latest()->orderby("created_at", "desc")->paginate(10);
        $posts = Post::latest()->get();
        return view('web.welcome', [
            'types' => $types,
            'posts' => $posts,
            'categories' =>  $categories,
            ' latestPost' =>  $latestPost
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

    public function search(Request $request)
    {
        $search = $_GET['query'];
        $categories = PropertyCategory::where('name', 'like', '%' . $search . '%')->get();
        $posts = Post::where('name', 'like', '%' . $search . '%')->get();
        return view('web.welcome', [
            "posts" => $posts,
            "categories" => $categories,
            // "metaData" => PageMetaData::searchPage()
        ]);
    }

    public function specificCategory(PropertyCategory $categories)
    {
        $posts = $categories->posts()->with(['categories'])->get();
        return view('web.category.specific-category', [
            'posts' => $posts,
            'categories' => $categories,

        ]);
    }
}
