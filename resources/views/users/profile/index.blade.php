@extends('users.layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 bg-white p-5">
                <div style="font-size: bold;" class="mb-3">
                   
                </div>
                <div class="profile-image">
                    <img style="width: 100%; height:40vh;" class="" src="{{asset('profileImages/' .  $profile->avatar)}}" alt="">
                </div>
              <div class="user_info mt-5">
              <div><b class="pr-3">Name:</b>   <span><i>{{auth()->user()->name}}</i></span></div>  
                
              <div><b class="pr-3">Joined On:</b>   <span><i>{{auth()->user()->created_at->toDateString()}}</i></span></div> 
              
              </div>
              <a href="{{route('user.profile.create')}}" class=" mt-3 btn btn-secondary text-white w-100">Change Profile Image</a>
            </div>

        </div>
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    </div>
    <!-- ./wrapper -->


    @endsection