@extends('Dashboards.users.layouts.app')
@section('contents')

<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>
    @include('Dashboards.users.layouts.navbar')
    @include('Dashboards.users.layouts.sidebar')

    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">


            <div class="row layout-top-spacing">

                <!-- <div id="tableCheckbox" class="">

                    @include('notifications.flash_messages')
                    <a href="{{route('users.category.index')}}" class="btn btn-primary d-flex justify-content-end">New Category</a>

                </div> -->

                @include('notifications.flash_messages')
                <div id="tableCheckbox" class="">


                    <div class="statbox widget box box-shadow mt-5">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12  d-flex justify-content-between">
                                    <h4>Create New Profile</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form enctype="multipart/form-data" class="form-row" action="{{route('users.profile.store')}}" method="POST"> @csrf

                                <div class="form-group col-md-4">
                                    <label for="">Name<span class="required">*</span></label>
                                    <input class="form-control" disabled type="" name="">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">Cover Image <span class="required">*</span></label>
                                    <input class="form-control" type="file" name="profile_image">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">Email <span class="required">*</span></label>
                                    <input class="form-control" disabled type="email" name="email">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">Phone<span class="required">*</span></label>
                                    <input class="form-control" type="number" name="phone">
                                </div>

                                <div class="form-group col-md-8">
                                    <label for="">Location<span class="required">*</span></label>
                                    <input class="form-control" type="text" name="location">
                                </div>


                                <div class="col-md-12">
                                    <h4>Social Media Links</h4>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">Facebook<span class="required"></span></label>
                                    <input class="form-control" type="text" name="facebook">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">Instagram<span class="required"></span></label>
                                    <input class="form-control" type="text" name="instagram">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">Twitter<span class="required"></span></label>
                                    <input class="form-control" type="text" name="twitter">
                                </div>


                                <div class="form-group col-12">
                                    <button class="btn btn-primary btn-lg">Submit</button>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>

            </div>


        </div>

    </div>
</div>


</div>
@endsection