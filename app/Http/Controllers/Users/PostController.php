<?php

namespace App\Http\Controllers\Users;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PropertyCategory;
use Illuminate\Http\Request;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = PropertyCategory::get();
        $types = [Constants::RENT, Constants::SELL];
        $posts = Post::latest()->get();
      return view('Dashboards.users.post.index' , [
        'posts' => $posts,
        'types' => $types,
        'categories' =>  $categories,
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = PropertyCategory::get();
        $types = [Constants::RENT, Constants::SELL];
        $posts = Post::latest()->get();
        return view('Dashboards.users.post.create', [
            'posts' => $posts,
            'types' => $types,
            'categories' =>  $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $allowedTypes = Constants::SELL . "," . Constants::RENT;
        $request->validate([
            "category_id" => "required|string|exists:property_categories,id",
            "type" => "required|string|in:$allowedTypes",
            "title" => "required|string|max:2500",
            "body" => "required|string|min:10",
            "no_of_bedrooms" => "required",
            "no_of_sittingrooms" => "required",
            "location" => "required",
            "price" => "required",
            "cover_image" => "required|image",
        ]);

        // dd($request->image);
        $image = time() . '_' . $request->name . '.' .
            $request->cover_image->extension();
        $request->cover_image->move(public_path('propertyImages'), $image);



        $request = Post::create([
            'category_id' => $request->input('category_id'),
            'type' => $request->input('type'),
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'no_of_bedrooms' => $request->input('no_of_bedrooms'),
            'no_of_sittingrooms' => $request->input('no_of_sittingrooms'),
            'location' => $request->input('location'),
            'price' => $request->input('price'),
            'cover_image' => $image,


        ]);

        return back()->with('success_message',  'Post added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
