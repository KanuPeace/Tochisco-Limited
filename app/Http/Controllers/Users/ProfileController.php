<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Helpers\MediaHandler;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $mediaHandler;
    public function __construct(MediaHandler $mediaHandler)
    {
        $this->mediaHandler = $mediaHandler;
    }


    public function index()
    {
        $profiles = Profile::find(1);
        return view('users.profile.index' , [
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
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' =>'required|string',
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
    public function edit(User $user)
    {
       $user = auth()->user();
        return view('users.profile.edit' , [
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
    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' =>'required|string',
            'avatar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        ]);

        
        $newImageName = uniqid() . '_' . $request->title . '.' .
         $request->file('avatar')->getClientOriginalName();
         $request->file('avatar')->move(public_path('admin/profileImages'), $newImageName);

        /* Store $imageName name in DATABASE from HERE */
       
        $request = Profile::create();
        
        return back()->with('success_message', ' Post added successfully!');
       

        // $request = Profile::create([
        //     'name' =>  $request->input('name'),
        //     'email' =>  $request->input('email'),
        //     'linkedin_username' =>  $request->input('linkedin_username'),
        //     'facebook-username' =>  $request->input('facebook-username'),
        //     'twitter-username' =>  $request->input('twitter-username'),
        //     'github-username' =>  $request->input('github-username'),
        //     'user_id' => auth()->user()->id,
        // ]);
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
