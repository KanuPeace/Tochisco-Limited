<?php

namespace App\Rules;

use Illuminate\Http\Request;

class ProfileImageRules{
    public static function validateProfileData(Request $request)
    {
        return $request->validate([
           'avatar' => 'nullable',
        ]);
    }
}