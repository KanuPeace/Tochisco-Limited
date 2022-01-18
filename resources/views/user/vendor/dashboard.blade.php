@extends("dashboards.user.layout.app")
@section('content')


    <div class="container scrollable-area">
        <div class="head">
            <h4>Vendor Dashboard</h4>
        </div>
        <div class="content-body">

            <div class="row">

                <div class="col-md-3 text-center">
                    <div class="myAvatar" style="background-image: url({{ $vendor->logoUrl() }})">
                    </div>
                </div>

                <div class="col-md-9 text-left ">
                    <div class="mt-4 text-bold">{{ $vendor->business_name }}</div>
                    <div>Wallet Balance: {{ format_money($wallet->balance) }}</div>
                    <div>Bought Coupons: {{ $vendor->coupons_bought }}</div>
                    <div>Unsold Coupons: {{ $vendor->coupons_unsold }}</div>
                    <div>Sold Coupons: {{ $vendor->coupons_sold }}</div>
                    <div>Account Status: {{ $vendor->status }}</div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-auto col-sm-4 mb-2">
                    <a href="#" data-target="#fundAccount" data-toggle="modal" class="btn btn-dark  btn-block ">Fund Wallet</a>
                </div>
                <div class="col-auto col-sm-4 mb-2">
                    <a href="#" data-target="#generateCodes" data-toggle="modal" class="btn btn-primary  btn-block ">Generate
                        Codes</a>
                </div>
                @include("dashboards.user.vendor.modals.fund_account")
                @include("dashboards.user.vendor.modals.generate_codes")

                <div class="col-auto col-sm-4 mb-2">
                    <a href="{{ route('user.vendor.edit.vendor',$vendor->id ) }}" class="btn btn-success btn-block" data-toggle="tooltip" data-placement="top"
                        title="Edit"><i>
                            <i data-feather="edit-2" class="text-info"></i>Edit</a></li>
                </div>
            </div>


            <div class="table-responsive mt-5">
                <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                    <thead>
                        <tr>
                            <th class="">S/N</th>
                            <th class="">Code</th>
                            <th class="">Used On</th>
                            <th class="">Price</th>
                            <th class="">Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coupons as $coupon)
                            <tr>
                                <td>{{ $sn++ }}</td>
                                <td>{{ $coupon->code }}</td>
                                <td>{{ $coupon->used_on }}</td>
                                <td>{{ $coupon->price }}</td>
                                <td>{{ $coupon->created_at }}</td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $coupons->links('pagination::bootstrap-4') !!}
            </div>



        </div>
    </div>

@endsection
