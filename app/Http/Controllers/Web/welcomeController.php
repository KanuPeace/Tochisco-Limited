<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class welcomeController extends Controller
{
    public function welcome(){
        return view('web.pages.welcome');
    } 
}
