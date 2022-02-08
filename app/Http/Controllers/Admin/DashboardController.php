<?php

namespace App\Http\Controllers\Admin;
use App\Models\ContactUs as ModelsContactUs;
use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   
   public function dashboard()
   {
       return view('admin.index');
   }

   public function usersMessages(ModelsContactUs $contact)
   {
       $contact = ModelsContactUs::latest()->get();
       return view('Dashboards.messages' , [
           'contact'=> $contact,
       ]);
   }
}
