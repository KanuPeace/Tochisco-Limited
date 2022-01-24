@extends("dashboards.user.layout.app")
@section('content')



    <div class="container scrollable-area">
        <div class="head">
            <h4>Edit Vendor</h4>
        </div>
        <div class="content-body">

            <div class="mt-5">
                <form action="{{ route('user.vendor.update.vendor', $vendor->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{ $vendor->logoUrl() }}" target="_blank">
                                <img src="{{ $vendor->logoUrl() }}" alt="logo" class="img-fluid">
                            </a>
                            <div class="form-group">
                                <label for="logo_id">Logo (Optional)</label>
                                <input type="file" class="form-control" name="logo" />
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="business_name">Business / Tv / Display Name</label>
                                <input type="text" class="form-control" required name="business_name"
                                    placeholder="Your brand or TV`s name" value="{{ $vendor->business_name }}" />
                            </div>
                            <div class="form-group">
                                <label for="business_name">Phone Number</label>
                                <input type="text" class="form-control" required name="phone"
                                    placeholder="Your business phone or whatsapp line" value="{{ $vendor->phone }}" />
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
