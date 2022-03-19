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
    public function edit(Post $post)
    {
        AuthorizationService::hasPermissionTo("can_edit_posts");
        $boolOptions = Constants::BOOL_OPTIONS;
        $types = [Constants::RENT, Constants::SELL];
        $categories =  PropertyCategory::get();
        return view('admin.posts.edit', ['categories' => $categories, 'types' => $types, 'boolOptions' =>  $boolOptions,])->with('Post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        AuthorizationService::hasPermissionTo("can_edit_posts");
        $data = $this->validateData($request, $post->id);
        $user = auth()->user();
        $data = $this->saveCoverMedia($request, $user->id, $data, $post);

        $post->update($data);
        return back()->with("success_message", "Post saved successfully!");
    }

    public function saveCoverMedia(Request $request, $user_id, array $data, Post $post)
    {
        if (!empty($cover_image = $request->file("cover_image"))) {
            $filePath = putFileInPrivateStorage($cover_image, "temp");
            $coverImageFile = $this->mediaHandler
                ->saveFromFilePath(storage_path("app/$filePath"), "postImages", $post->cover_image ?? null, $user_id);
            $data["cover_image"] = $coverImageFile->id;
        }

        if (!empty($cover_video = $request->file("cover_video"))) {
            $filePath = putFileInPrivateStorage($cover_video, "temp");
            $coverVideoFile = $this->mediaHandler
                ->saveFromFilePath(storage_path("app/$filePath"), "postVideos", $post->cover_video ?? null, $user_id);
            $data["cover_video"] = $coverVideoFile->id;
        }

        return $data;
    }

    public function validateData(Request $request, $post_id = null)
    {
        $allowedOptions = Constants::ACTIVE . "," . Constants::INACTIVE;
        $allowedTypes = Constants::LAND . "," . Constants::LUXURY;
        $cover = empty($post_id) ? "required" : "";
        return $request->validate([
            'user_id' => "required|string",
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
