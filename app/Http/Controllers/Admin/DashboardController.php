<?php

namespace App\Http\Controllers\Admin;
use App\Models\ContactUs as ModelsContactUs;
use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Models\User;
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

   
   public function makeadmin(User $user)
   {
       $user->role = Constants::ADMIN_USER;

       $user->save();

       return back()->with('success_message', 'Admin made user admin successfully.');
   }


   public function removeadmin(User $user)
   {
       $user->role = Constants::DEFAULT_USER;

       $user->save();

       return back()->with('success_message', 'Privilege droped successfully.');

       
   }
}
