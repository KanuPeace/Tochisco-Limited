@extends('admin.layouts.app')

@section('style')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-spacing">

                <!-- Content -->
                {{-- <div class="col-xl-4 col-lg-12 col-md-5 col-sm-12 layout-top-spacing"> --}}
                    @include('notifications.flash_messages')
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 bg-white p-5">
                            <form enctype="multipart/form-data" action="{{ route('admin.profile.store') }}" method="post">
                                @csrf
                                <label class="form-group" for="image">Add Profile Image</label>
                                <div class="col-8">
                                    <input class=" col-32 form-group" type="file" name="avatar" id="avatar">
                                </div>
                                <div class="col-8">
                                    <button class="btn btn-secondary text-white w-100 mt-3 mb-3">Save</button>
                                </div>
                            </form>
                            <p><a href="{{ route('admin.profile.index') }}"><-</a><b>   </b>Back to profile</p>
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
    </div>
    @endsection
