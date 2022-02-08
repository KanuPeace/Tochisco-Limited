@extends("dashboards.user.layout.app")
@section('content')

<div class="container scrollable-area">
    <div class="head">
        <h4>Contest Application</h4>
    </div>
    <div class="content-body">

        <div class="mt-5">
            <p class="mb-4">
                Hello {{ $user->first_name }}, <br>
            </p>

            <div class="row">
                <div class="col-md-6 p-4">
                    To join other contestants, click the button below to apply.

                    <div class="">
                        <b>Entry Fee:</b> {{ format_money($contest->application_fee) }}
                    </div>
                    <p class="alert alert-warning mt-2 mb-4">
                        Kindly get a coupon code from any of the
                        <a class="text-danger" target="_blank" href="{{ route("web.approved_vendors")}}">verified coupon vendors</a> and
                        <a class="text-success" target="_blank" href="{{ route("user.wallet.deposit")}}">top up your wallet balance</a>
                        if you don`t have enough money in your wallet.
                    </p>

                    <div class="text-center mt-3">
                        <form action="{{ route("user.contest.apply")}}" method="post">@csrf
                            <input type="hidden" value="{{$contest->id }}" name="contest_id">
                            <button class="btn btn-success">Apply</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 p-4">
                    You can also vote for your favorite contestant here

                    <div class="text-center mt-2">
                        <form action="{{ route("user.contest.contestants")}}" method="get">
                            <input type="text" placeholder="Enter contestant code" name="reference" class="form-control mt-3 mb-3" required>
                            <button class="btn btn-success">Find Contestant</button>
                        </form>
                    </div>
                    <div class="mt-4 mb-4">Or</div>
                    <div class="alert alert-info mt-3">Click here to view all contestants</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
