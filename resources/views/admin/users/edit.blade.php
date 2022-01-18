@extends("dashboards.admin.layouts.app")
@section('content')

    <form action="{{ route('admin.users.update', $user->id) }}" method="post" enctype="multipart/form-data">
        @csrf @method("put")
        <div class="account-settings-container layout-top-spacing">



            <div class="account-content">
                <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll"
                    data-offset="-100">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <div id="general-info" class="section general-info">
                                <div class="info">
                                    <h6 class="">User Information</h6>
                                    <div class="row">
                                        <div class="col-lg-11 mx-auto">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-12 col-md-4">
                                                    <div class="text-center user-info">
                                                        <a href="{{ $user->avatarUrl() }}" target="_blank">
                                                            <img src="{{ $user->avatarUrl() }}" alt="avatar" class="img-fluid" >
                                                        </a>
                                                    </div>
                                                    <div class="upload mt-4 pr-md-4">
                                                        <input type="file" id="input-file-max-fs" class="dropify" name="avatar"
                                                            data-default-file="{{ $admin_assets }}/assets/img/user-profile.jpeg"
                                                            data-max-file-size="2M" />
                                                        <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>
                                                            Upload Picture</p>
                                                    </div>
                                                </div>
                                                <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                    <div class="form">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="fullName">First Name</label>
                                                                    <input type="text" class="form-control mb-4"
                                                                        id="fName" placeholder="First Name"
                                                                        name="first_name" required
                                                                        value="{{ $user->first_name }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="fullName">Last Name</label>
                                                                    <input type="text" class="form-control mb-4"
                                                                        id="lName" placeholder="Last Name"
                                                                        name="last_name" required
                                                                        value="{{ $user->last_name }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-7">
                                                                <div class="form-group">
                                                                    <label for="fullName">Email Address</label>
                                                                    <input type="text" class="form-control mb-4"
                                                                        id="lName" placeholder="Email Address" required
                                                                        name="email" value="{{ $user->email }}">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-5">
                                                                <div class="form-group">
                                                                    <label for="fullName">Phone Number</label>
                                                                    <input type="text" class="form-control mb-4"
                                                                        id="lName" placeholder="Phone Number"
                                                                        name="phone" value="{{ $user->phone }}">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="fullName">Role</label>
                                                                    <select class="form-control mb-4" disabled>
                                                                        {{-- <option value="" disabled selected> Select Role</option> --}}
                                                                        <option value="User" selected>User</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="fullName">Status</label>
                                                                    <select class="form-control mb-4" name="status" required>
                                                                        <option value="" disabled selected> Select
                                                                            Status</option>
                                                                        <option value="Active"
                                                                            {{ $user->status == 'Active' ? 'selected' : '' }}>
                                                                            Active</option>
                                                                        <option value="Inactive"
                                                                            {{ $user->status == 'Inactive' ? 'selected' : '' }}>
                                                                            Inactive</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="account-settings-footer">

                <div class="as-footer-container">

                    <button id="multiple-reset" class="btn btn-primary" type="reset">Reset All</button>
                    <div class="blockui-growl-message">
                        <i class="flaticon-double-check"></i>&nbsp; Settings Saved Successfully
                    </div>
                    <button id="multiple-messages" class="btn btn-dark" type="submit">Save Changes</button>

                </div>

            </div>
        </div>
    </form>

@endsection
