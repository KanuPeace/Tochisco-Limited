@extends('dashboards.layouts.app')

@section('contents')



<div class="main-container " id="container">
    <div class="overlay"></div>
    <div class="search-overlay"></div>
    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">
                @include('notifications.flash_messages')

                <form action="{{ route('admin.profile.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <form class="needs-validation" novalidate action="javascript:void(0);">
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <label for="validationCustom01">Upload Your Profile</label>
                                <input type="file" name="avatar" class="form-control" id="validationCustom01" placeholder="First name" value="{{ old('avatar') }}" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <div id="select_menu" class="form-group mb-4">
                                    <select name="role" class="custom-select" required>
                                        <option value="">Select Title</option>
                                        <option value="Students">Students</option>
                                        <option value="self-employed"> self-employed </option>
                                        <option value="Employed">Employed</option>
                                    </select>
                                    <div class="valid-feedback">Example valid custom select feedback</div>
                                    <div class="invalid-feedback">
                                        Please Select the field
                                    </div>
                                </div>

                            </div>

                            <div class="input-group col-md-12 mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Location</span>
                                </div>
                                <input type="text" class="form-control" name="location" aria-label="With textarea" value="{{ old('location') }}"></input>
                            </div>

                            <div class="input-group col-md-12 mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Phone</span>
                                </div>
                                <input type="text" class="form-control" name="phone" aria-label="With textarea" value="{{ old('phone') }}"></input>
                            </div>

                            <div class="input-group col-md-12 mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Short Description About You</span>
                                </div>
                                <textarea class="form-control" name="description" aria-label="With textarea" value="{{ old('description') }}"></textarea>
                            </div>

                            <button class="btn btn-primary mt-3" type="submit">Submit form</button>
                    </form>



            </div>



            <!--  END CONTENT PART  -->

        </div>
    </div>

    @endsection
</div>