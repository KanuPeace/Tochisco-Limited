@extends("dashboards.user.layout.app")
@section('content')

    <div class="container">
        @if ($is_free)
            <div class="alert alert-danger">You are currently on a Free plan, kindly
                <a href="{{ route('user.plans.index') }}">click here to upgrade....</a>
            </div>
        @endif

        <div class="form-row ">
            <div class="col-md-5">
                @include("dashboards.user.profile_card")
            </div>

            <div class="col-md-7">

                <div class="form-row">
                    <div class="col-md-12 p-4">
                        <div class="profile_item_card text-center mt-3">
                            <p class="">Wallet Balance</p>
                            <h2>{{ $wallet_balance }}</h2>
                            <div class="row mt-3 mb-5">
                                <div class="col-6">
                                    <a href="{{ route('user.wallet.deposit') }}"
                                        class="mybtn btn-success btn-lg p-3">Deposit</a>
                                </div>
                                <div class="col-6">
                                    <a href="{{ route('user.wallet.withdraw') }}"
                                        class="mybtn btn-danger btn-lg p-3">Withdraw</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
    </div>

@endsection
