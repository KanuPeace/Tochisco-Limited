<?php

namespace App\Http\Controllers\Users;

use App\Helpers\Constants;
use App\Helpers\MediaFilesHelper;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use App\Models\PropertyCategory;
use App\Rules\PostRules;
use Illuminate\Http\Request;
use Illuminate\Support\Str;



class PostController extends Controller
{
    public function __construct(PostRules $post_rules)
    {
       $this->post_rules = $post_rules;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        // $posts = $user->posts()->with(['user'])->paginate(5);
          return view('users.post.posts_list' , [
           'user' => $user,
        //    'posts' => $posts,
          ]);
    }

    
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
                'users.posts.create',
                [
                    'categories' => $categories,
                    'types' => $types,
                    'boolOptions' =>  $boolOptions,
                ]
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->post_rules->getPostRules($request);
        $meidiaImage = MediaFilesHelper::saveFromRequest($request->cover_image, 'postImages');
        $meidiaVideo = MediaFilesHelper::saveFromRequest($request->cover_video, 'postVideos');

        $data['cover_image'] = $meidiaImage;
        $data['cover_video']  = $meidiaVideo;
        $data["slug"] = Str::slug($request->name, '-');
        $data['user_id'] = auth()->user()->id;
        Post::create($data);

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
    public function update(Request $request, $id)
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
        //
    }
}
