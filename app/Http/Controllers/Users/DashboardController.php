<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\PropertyCategory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('Dashboards.users.index');
    }

    public function category()
  {
      $categories = PropertyCategory::latest()->get();
      return view('Dashboards.users.post.create' , [
        'categories' =>  $categories,
      ]);
     
  }

     public function store( Request $request , PropertyCategory $property )
     {
         $request->validate([
            'name' => 'required',
         ]);
      
         $property = PropertyCategory::create([
              'name' => $request->input('name'),
         ]);

         return back()->with('success_message',  'Category added successfully');
 
     }

}
