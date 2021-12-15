<?php

namespace App\Http\Controllers\Users\Profile;

use App\Helpers\Constants;
use App\Helpers\MediaHandler;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class IndexController extends Controller
{
    public $mediaHandler;
    public function __construct(MediaHandler $mediaHandler)
    {
        $this->mediaHandler = $mediaHandler;
    }

    public function edit_profile(User $user)

    {
        $user = auth()->user();
        return view('Dashboards.users.profile.index', ["user" => $user]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $data = $request->validate([
            "first_name" => "required|string",
            "last_name" => "required|string",
            "display_name" => "nullable|string",
            "gender" => "required|string|in:Male,Female",
            "phone" => "required|string",
            "avatar_id" => "nullable|image",
            "valid_card_id" => "nullable|file|mimes:png,jpg,pdf,doc,docx",
            "address" => "nullable|string"
        ]);

        if (!empty($avatar = $request->file("avatar_id"))) {
            $filePath = putFileInPrivateStorage($avatar, "temp");
            $avatarFile = $this->mediaHandler->saveFromFilePath(storage_path("app/$filePath"), "avatars", $user->avatar, $user->id);
            $data["avatar_id"] = $avatarFile->id;
        }

        if (!empty($id_card = $request->file("valid_card_id"))) {
            $filePath = putFileInPrivateStorage($id_card, "temp");
            $idFile = $this->mediaHandler->saveFromFilePath(storage_path("app/$filePath"), "id_cards", $user->id_card, $user->id);
            $data["valid_card_id"] = $idFile->id;
        }

        $user->update($data);
        return back()->with("success_message", "Changes saved successfully!");
    }
}
