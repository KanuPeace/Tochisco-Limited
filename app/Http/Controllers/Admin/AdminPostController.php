<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Helpers\Constants;
use App\Helpers\MediaFilesHelper;
use App\Helpers\MediaHandler;
use App\Services\Auth\AuthorizationService;
use App\Helpers\PostHandler;
use App\QueryBuilder\PostQueryBuilder;
use Illuminate\Http\Request;
use App\Models\PropertyCategory;
use App\Models\Post;
use App\Rules\PostRules;
use Illuminate\Support\Str;


class AdminPostController extends Controller
{

    public $mediaHandler;
    public function __construct(MediaHandler $mediaHandler, PostRules $post_rules)
    {
        $this->mediaHandler = $mediaHandler;
        $this->post_rules = $post_rules;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::whereHas("user");
        $posts = PostQueryBUilder::filterIndex($request)->orderby("id", "desc")->paginate(20);

        return view('admin.posts.index', [
            'posts' => $posts
            // "sn" => $sn, "boolOptions" => $boolOptions,

        ]);
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
                ]
            );
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
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
       $allowedOptions = Constants::ACTIVE . "," . Constants::INACTIVE;
        $allowedTypes = Constants::LAND . "," . Constants::LUXURY;
        $post = Post::where('id',$id);
        // dd($id);
        $data = $request->validate([
            'category_id' => "required|string",
            'name' => 'required|string',
            'content_desccription' => 'required:string',
            "type" => "nullable|string|in:$allowedTypes",
            'cover_image' => 'nullable|image',
            "cover_video" => 'nullable',
            "meta_title" => "required|string",
            "meta_keywords" => "required|string",
            "meta_description" => "required|string",
            "is_sponsored" => "required|string|in:$allowedOptions",
            "is_top_story" => "required|string|in:$allowedOptions", 
            "is_featured" => "required|string|in:$allowedOptions",
            "is_published" => "required|string|in:$allowedOptions",
            "can_comment" => "required|string|in:$allowedOptions",
        ]);
        // dd($data);
       $cover_path = MediaFilesHelper::saveFromRequest($request->cover_image , "postImages");
         $video_path = MediaFilesHelper::saveFromRequest($request->cover_video , "postVideos");

        $data['cover_image'] = $cover_path;
        $data['cover_video'] = $video_path;
        $data["slug"] = Str::slug($request->title, '-');
        $data['user_id'] = auth()->id();
        // dd($post);
        // dd($data);
        $post->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post)
    {
        Post::where('id', $post)->delete();
        return back()->with("success_message", "Deleted successfully!");
    }
}
