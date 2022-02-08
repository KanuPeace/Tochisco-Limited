@extends("dashboards.user.layout.app")
@section('content')

    <div class="container scrollable-area">
        <div class="head">
            <h4>Withdraw </h4>
        </div>
        <div class="content-body">
            @include("dashboards.user.fragments.youtube_subscribe_message")



            <div class="alert alert-success mt-5">
                <div>Current Balance: <b>{{ $wallet_balance }}</b>
                </div>
            </div>


            <form action="{{ route('user.wallet.withdraw_request') }}" method="post">@csrf
                <input type="hidden" class="form-control" name="account_id" value="{{ $account->id ?? null }}">
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="">Bank Name</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="bank_name" required placeholder="E.g First Bank"
                                value="{{ $account->bank_name }}" {{ !empty($account->id) ? 'readonly' : '' }}>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">Account Name</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="account_name" required
                                placeholder="Enter your account name" value="{{ $account->account_name }}"
                                {{ !empty($account->id) ? 'readonly' : '' }}>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">Account Number</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="account_number" required
                                placeholder="Enter your account number" value="{{ $account->account_number }}"
                                {{ !empty($account->id) ? 'readonly' : '' }}>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">Withrawal Amount</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="amount" required placeholder="Enter amount">
                        </div>
                    </div>

                    <div class="alert alert-danger">
                        <div>A 2% withdrawal fee applies
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
