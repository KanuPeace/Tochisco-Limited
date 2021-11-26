@extends("Dashboards.users.layouts.app")
@section('content')

    <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
        @csrf @method("put")

        <div class="info">
            <h6 class="">User Information</h6>

            <div class="row mt-3">
                <div class="col-md-3">
                    <div class="text-center user-info">
                        <a href="{{ $user->avatarUrl() }}" target="_blank">
                            <img src="{{ $user->avatarUrl() }}" alt="avatar" class="img-fluid">
                        </a>
                    </div>
                    <div class="upload mt-4 pr-md-4">
                        <input type="file" id="input-file-max-fs" class="dropify" name="avatar"
                            data-default-file="{{ $admin_assets }}/assets/img/user-profile.jpeg"
                            data-max-file-size="2M" />

                    </div>
                </div>
                <div class="col-md-9 mt-4">
                        <div class="form-row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="fullName">First Name</label>
                                    <input type="text" class="form-control mb-4" id="fName" placeholder="First Name"
                                        name="first_name" required value="{{ $user->first_name }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="fullName">Last Name</label>
                                    <input type="text" class="form-control mb-4" id="lName" placeholder="Last Name"
                                        name="last_name" required value="{{ $user->last_name }}">
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label for="fullName">Email Address</label>
                                    <input type="text" class="form-control mb-4" id="lName" placeholder="Email Address"
                                        readonly value="{{ $user->email }}">
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="fullName">Phone Number</label>
                                    <input type="text" class="form-control mb-4" id="lName" placeholder="Phone Number"
                                       readonly value="{{ $user->phone }}">
                                </div>
                            </div>

                            <div class="col-md-4 fom-group">
                                <button type="submit" class="btn btn-success">Save changes</button>
                            </div>

                        </div>
                </div>
            </div>

        </div>


    </form>

@endsection
