@extends('users.layouts.app')

@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-spacing">

                <!-- Content -->
                <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">
                    <div style="font-size: bold;" class="mb-3">

                    </div>
                    <div class="profile-image">
                        <img style="width: 100%; height:40vh;" class=""
                            src="{{ asset('profileImages/' . $profile->avatar) }}" alt="">
                    </div>
                    <div class="user_info mt-5">
                        <div><b class="pr-3">Name:</b> <span><i>{{ auth()->user()->name }}</i></span></div>
                        <div><b class="pr-3">Role:</b> <span><i>{{ Auth::user()->role }}</i></span></div>
                        <div><b class="pr-3">Email:</b> <span><i>{{ auth()->user()->email }}</i></span></div>
                        <div><b class="pr-3">Phone:</b> <span><i>{{ auth()->user()->phone }}</i></span></div>




                        <div><b class="pr-3">Joined On:</b>
                            <span><i>{{ auth()->user()->created_at->toDateString() }}</i></span></div>

                    </div>
                    <a href="{{ route('user.profile.create') }}" class=" mt-3 btn btn-secondary text-white w-100">Change
                        Profile Image</a>
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
