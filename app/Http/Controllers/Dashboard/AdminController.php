<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ContactUs as ModelsContactUs;
use App\Models\Profile;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin()
    {
        $profiles = Profile::get();
        return view('dashboards.admin' , [
            'profiles' => $profiles
        ]);
        
    }


    public function create()
    {
        return view('dashboards.');
    }

   
    public function usersMessages(ModelsContactUs $contact)
    {
        $contact = ModelsContactUs::latest()->get();
        return view('dashboards.messages' , [
            'contact'=> $contact,
        ]);
    }
}
