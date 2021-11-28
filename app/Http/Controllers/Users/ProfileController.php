<?php

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
    }
}
