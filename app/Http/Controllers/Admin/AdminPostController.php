<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Helpers\Constants;
use Illuminate\Http\Request;
use App\Models\PropertyCategory;

use App\Models\Post;


class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $posts = Post::whereHas("user")->get();
            return view('admin.posts.index' ,[
                'posts' => $posts
            // "sn" => $sn, "boolOptions" => $boolOptions,

            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $boolOptions = Constants::BOOL_OPTIONS;
        $types = [Constants::RENT, Constants::SELL];
        $maxPost = 5;
        $todays_post = Post::where('user_id', auth()->id())
            ->whereDate("created_at", today())->count();


        if ($todays_post > $maxPost) {
            return view('dashboards.503_error');
        } else {
            $categories =  PropertyCategory::get();
            return view(
                'admin.posts.create',
                [
                    'categories' => $categories,
                    'types' => $types,
                    'boolOptions' =>  $boolOptions,
                ]);
        }

    //    return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $allowedOptions = Constants::ACTIVE . "," . Constants::INACTIVE;
        $allowedTypes = Constants::RENT. "," . Constants::SELL;
        $request->validate([
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

        $meidiaImage = time() . '_' . $request->name . '.' .
            $request->cover_image->extension();

        $request->cover_image->move(public_path('postImages'), $meidiaImage);


        $meidiaVideo = time() . '-' . $request->name . '.' .
            $request->cover_video->extension();
        $request->cover_video->move(public_path('postVideos'), $meidiaVideo);

        $request = Post::create([
            'category_id' =>  $request->input('category_id'),
            'name' =>  $request->input('name'),
            'content_desccription' =>  $request->input('content_desccription'),
            'type' =>  $request->input('type'),
            'cover_image' => $meidiaImage,
            'cover_video' => $meidiaVideo,
            'no_of_bedrooms' => $request->input('no_of_bedrooms'),
            'no_of_sittingrooms' => $request->input('no_of_sittingrooms'),
            'location' => $request->input('location'),
            'price' => $request->input('price'),
            'is_sponsored' => $request->input('is_sponsored'),
            'is_top_story' => $request->input('"is_top_story'),
            'is_featured' => $request->input('is_featured'),
            'can_comment' => $request->input('can_comment'),
            'is_published' => $request->input('is_published'),
            'user_id' => auth()->user()->id,

        ]);

        return back()->with('success_message', 'Post added successfully');
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
    public function update(Request $request, $post)
    {
        $allowedOptions = Constants::ACTIVE . "," . Constants::INACTIVE;
        $allowedTypes = Constants::LAND . "," . Constants::LUXURY;
        // $categories = Constants::CATEGORY;
        $request->validate([
           
            'category_id' => "required|exist:categories,id",
            'name' => 'required|string',
            'content_desccription' => 'required:string',
            "type" => "required|string|in:$allowedTypes",
            'cover_image' => 'required|image',
            "cover_video" => "mimes:mp4, mp3, ogx,oga,ogv,ogg,webm",
            "is_sponsored" => "required|string|in:$allowedOptions",
            "is_top_story" => "required|string|in:$allowedOptions",
            "is_featured" => "required|string|in:$allowedOptions",
            "is_published" => "required|string|in:$allowedOptions",
            "can_comment" => "required|string|in:$allowedOptions",
        ]);

        $meidiaImage = time() . '_' . $request->name . '.' .
            $request->cover_image->extension();

        $request->cover_image->move(public_path('postImages'), $meidiaImage);


        $meidiaVideo = time() . '-' . $request->name . '.' .
            $request->cover_video->extension();
        $request->cover_video->move(public_path('postVideos'), $meidiaVideo);

       

        return back()->with('success_message', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find(1);
        if ($post != null){
           
            $post->delete();
            
            return back()->with("error_message" , "Deleted successfully!");
        }
           return back()->with("error_message" , "post can't be deleted!");
    }
}
