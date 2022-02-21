<?php

namespace App\Http\Controllers\Web;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PropertyCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function welcome(){
        return view('web.pages.index');
    } 

    public function property(){
        return view('web.pages.property.property');
    } 

    public function prop_com(){
        return view('web.pages.property.pcomparison');
    } 

    public function prop_detail(){
        return view('web.pages.property.pdetail');
    } 

    public function prop_sub(){
        return view('web.pages.property.psubmit');
    } 

    public function agent(){
        return view('web.pages.agent');
    } 

    public function about(){
        return view('web.pages.about');
    }
    
    public function profile(){
        return view('web.pages..property.profile');
    } 

    public function contact(){
        return view('web.pages.property.contact');
    } 
}
