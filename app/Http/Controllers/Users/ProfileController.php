<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Profile::find(1);
        return view('Dashboards.users.profile.index' , compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
    public function edit(User $user)
    {
        $user = auth()->user();
        return view('Dashboards.users.edit_profile', ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = auth()->user();
        $data = $request->validate([
            "name" => "required|string",
            "email" => "required|email|unique:users,email,$user->id",
            "linkedin_username" => "nullable|string",
            "facebook_username" => "nullable|string",
            "twitter_username" => "nullable|string",
            "github_username" => "nullable|string",
            "avatar" => "nullable|image"

        ]);

       

        $request = Profile::create([
            'name' =>  $request->input('name'),
            'email' =>  $request->input('email'),
            'linkedin_username' =>  $request->input('linkedin_username'),
            'facebook-username' =>  $request->input('facebook-username'),
            'twitter-username' =>  $request->input('twitter-username'),
            'github-username' =>  $request->input('github-username'),
            'user_id' => auth()->user()->id,
        ]);

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
