<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Helpers\Constants as HelpersConstants;
use App\Models\User;
use App\Rules\ProfileImageRules;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct(ProfileImageRules $avatar_rules)
    {
        $this->avatar_rules = $avatar_rules;
    }  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Profile $id)
    {
        $profile = optional(Profile::first()) ?? HelpersConstants::USER_DEFAULT_PROFILE;
        $date = Carbon::now()->format('d-m-y');
        return view('admin.profile.index', compact('profile', 'date'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profile.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , User $user)
    {
        $data = $this->avatar_rules->validateProfileData($request);
        // if(!empty($profileImage = ProfileImageHelper::saveProfileImage($request->avatar , 'profileImages')));
         $profileImage = uniqid() . '_' . $request->name . '.' .
        //  dd($request->all());
            $request->avatar->extension();
        $request->avatar->move(public_path('profileImages'),  $profileImage);
        $data['avatar'] =  $profileImage;
        Profile::create($data);
        return back()->with('success_message', 'Profile saved');
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
    public function edit($id, User $user)
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
