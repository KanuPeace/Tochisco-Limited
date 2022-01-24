@extends("dashboards.user.layout.app")
@section('content')

    <div class="container scrollable-area">
        <div class="head">
            <h4>Deposit </h4>
        </div>
        <div class="content-body">
            <p>
                Kindly get a coupon code from any of the <a class="text-danger" target="_blank" href="{{ route("web.approved_vendors")}}">verified coupon vendors</a>. Cheers.
            </p>
            <form action="{{ route("user.wallet.coupon_deposit") }}" method="post">@csrf
                <div class="form-row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <label for="">Coupon Code</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="coupon_code" required
                                placeholder="Enter Coupon Code">
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="axil-button button-rounded btn-primary text-center"
                            style="width: 150px">
                            Proceed
                        </button>
                    </div>
                </div>

            </form>

        </div>
    </div>


@endsection
