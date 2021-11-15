<?php

namespace App\Http\Controllers\Users;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Models\PropertyCategory;
use Illuminate\Http\Request;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PropertyCategory  $property)
    {
      $property = PropertyCategory::get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function store(Request $request , PropertyCategory $property)
    {
        dd($request->all($property));

        $allowedOptions = Constants::ACTIVE . "," . Constants::INACTIVE;
        $allowedTypes = Constants::SELL . "," . Constants::RENT;
        $cover = empty($post_id) ? "required" : "";
        return $request->validate([
            "category_id" => "required|string|exists:property_categories,id",
            "type" => "required|string|in:$allowedTypes",
            "title" => "required|string|max:2500",
            "body" => "required|string|min:10",
            "no_of_bedrooms" => "required",
            "no_of_sittingrooms" => "required",
            "location" => "required",
            "price" => "required",
            "is_sponsored" => "required|string|in:$allowedOptions",
            "is_top_story" => "required|string|in:$allowedOptions",
            "is_featured" => "required|string|in:$allowedOptions",
            "is_published" => "required|string|in:$allowedOptions",
            "can_comment" => "required|string|in:$allowedOptions",
            "cover_image" => "image",
        ]);
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