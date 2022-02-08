<?php

namespace App\Http\Controllers\Admin;

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
    public function index(Profile $profiles)
    {
        $profiles = Profile::find(1);
        return view('Dashboards.admin.profile.index' , [
            'profiles' => $profiles
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profiles = Profile::find(1);
        return view('Dashboards.admin.profile.create' , [
            'profiles' => $profiles
        ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , User $user)
    {
        $request->validate([
            'role' => 'required',
            'description' =>'required|string',
            'avatar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        ]);


        $newImageName = uniqid() . '_' . $request->title . '.' .
         $request->file('avatar')->getClientOriginalName();
         $request->file('avatar')->move(public_path('admin/profileImages'), $newImageName);

        /* Store $imageName name in DATABASE from HERE */

        $request = Profile::create([
            'image' => $newImageName,
            'user_id' => $user->id
        ]);
        
        return back()->with('success_message', ' Profile added successfully!');
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
        $user = auth()->user();
        return view('Dashboards.admin.profile.edit' , [
            'user' => $user
         ] );
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
        $request->validate([
            'location' => 'required',
            'role' => 'required',
            'phone' => 'required',
            'description' =>'required|string',
            'avatar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        ]);

        
        $newImageName = uniqid() . '_' . $request->title . '.' .
         $request->file('avatar')->getClientOriginalName();
         $request->file('avatar')->move(public_path('admin/profileImages'), $newImageName);

        /* Store $imageName name in DATABASE from HERE */
       
        $request = Profile::create();
        
        return back()->with('success_message', ' Post added successfully!');
           

    
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
