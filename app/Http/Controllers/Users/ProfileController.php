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
         $user = User::find(1);
        return view('Dashboards.users.profile.index' ,[
           'user' => $user,  
           'profile' => $profile,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::find(1);
        return view('Dashboards.users.profile.create' , [
            'user' => $user 
        ]);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
      
    {
         $user = User::find(1);
        $request->validate([
            'profile_image' => 'required',
            'location' => 'required',
            'phone' => 'required',
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'twitter' => 'nullable',
        ]);

        $profileImage = uniqid();
            $request->profile_image->extension();
        $request->profile_image->move(public_path('users/profileImages'), $profileImage);

        $request = Profile::create([
           'profile_image' => $profileImage,
           'location' => $request->input('location'),
           'phone' => $request->input('phone'),
           'instagram' => $request->input('instagram'),
           'facebook' => $request->input('facebook'),
           'twitter' => $request->input('twitter'),
           
        ]);

        return back()->with('succes_message' , 'Profile created successfully');
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
    }
}
