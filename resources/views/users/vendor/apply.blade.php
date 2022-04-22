@extends("users.layouts.app")
@section('content')



    <div class="container scrollable-area">
        <div class="head mt-5">
            <h4>Vendor Application </h4>
        </div>
        <div class="head mt-5">
            <h4>Vendor Application</h4>
        </div>
        <div class="content-body">

            <div class="mt-5">
                <p class="mb-4">
                    Hello {{ $user->first_name }}, <br>
                    Welcome to the Vendor Application Portal. In this portal, you can generate codes as much as you want
                    after you've been verified and funded your account.
                </p>

                <form action="{{ route('user.vendor.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="offset-md-2 col-md-8">
                            <div class="form-group">
                                <label for="business_name">Business / Tv / Display  Name</label>
                                <input type="text" class="form-control" required name="business_name"
                                    placeholder="Your brand or TV`s name" />
                            </div>
                            <div class="form-group">
                                <label for="business_name">Phone Number</label>
                                <input type="text" class="form-control" required name="phone"
                                    placeholder="Your business phone or whatsapp line" />
                            </div>
                            <div class="form-group">
                                <label for="logo_id">Logo (Optional)</label>
                                <input type="file" class="form-control" name="logo" />
                            </div>

                            <div class="form-group">
                                <button value="Submit" type="submit" class="btn btn-lg btn-success">Submit</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
