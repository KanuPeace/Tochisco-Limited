<?php

<<<<<<< HEAD
namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        $posts = Post::latest()->get();
        return view('Dashboards.users.profile.index' , compact('posts'));

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
=======
// namespace App\Http\ProfileControllers;
namespace App\Http\Controllers\Users;

use App\Helpers\MediaHandler;
use App\Http\Controllers\Controller;
use App\Models\User;


use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public $mediaHandler;
    public function __construct(MediaHandler $mediaHandler)
    {
        $this->mediaHandler = $mediaHandler;
    }

    public function index()
    {
        $user = auth()->user();
        return view('Dashboards.users.profile_card', ["user" => $user]);
    }
        
    public function edit_profile(User $user )

     
    {
        // dd($user);
        $user = auth()->user();
        return view('Dashboards.users.edit_profile', ["user" => $user]);
    }

    public function update(Request $request)
    {

        $user = auth()->user();
        $data = $request->validate([
            "first_name" => "required|string",
            "last_name" => "required|string",
            // "email" => "required|email|unique:users,email,$user->id",
            // "phone" => "required|string",
            "avatar" => "nullable|image"

        ]);

        if(!empty($avatar = $request->file("avatar"))){
            $filePath = putFileInPrivateStorage($avatar , "temp");
            $avatarFile = $this->mediaHandler->saveFromFilePath(storage_path("app/$filePath") , "avatars" , null , $user->id);
            $data["avatar_id"] = $avatarFile->id;
        }

        $user->update($data);
        return back()->with("success_message" , "Changes saved successfully!");
>>>>>>> d6e6f2804c52795fdb72daf1dfcc3d16b8ebaa3f
    }
}
