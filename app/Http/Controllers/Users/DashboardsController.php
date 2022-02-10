<?php

namespace App\Http\Controllers\Users;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\PropertyCategory;
use App\Models\User;


class DashboardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function index(User $user, Post $posts )
    {
        // $posts = $user->posts()->with(['user'])->paginate(5);
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function list(PropertyCategory $categories)
    {
        // dd($categories);
        $posts = $categories->post()->get();
         return view('web.category.post', [
           'posts' => $posts,
           'categories' => $categories,
       ]);
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $comments = Comment::get();
        return view('web.post_details', [
            'post' => $post,
            'comments' =>  $comments,
            // "metaData" => PageMetaData::blogDetailsPage($post)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
