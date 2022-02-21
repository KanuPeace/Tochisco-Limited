<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Constants;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
                
        if(auth()->user()->role == Constants::ADMIN_USER){
            return redirect()->route("admin.dashboard");
        }
        else{
            return redirect()->route("user.dashboard");
        }
    }
}
