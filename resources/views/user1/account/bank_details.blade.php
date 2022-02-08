@extends("dashboards.user.layout.app")
@section('content')


    <div class="account-content">
        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                    <div id="general-info" class="section general-info">
                        <div class="info">
                            <h3 class="">Bank Account Information</h3>
                            <form action="{{ route('user.account.bank.details.update') }}" method="post">@csrf
                                <div class="row">
                                    <div class="col-3"></div>
                                    <div class="col-md-6 mt-5">
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <label for="">Bank Name</label>
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" name="account_id"value="{{ $account->id ?? null }}" >

                                                    <input type="text" class="form-control" name="bank_name" required placeholder="E.g First Bank"
                                                        value="{{ $account->bank_name ?? null }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Account Name</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="account_name" required
                                                        placeholder="Enter your account name" value="{{ $account->account_name ?? null }}"
                                                       >
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Account Number</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="account_number" required
                                                        placeholder="Enter your account number" value="{{ $account->account_number ?? null }}"
                                                       >
                                                </div>
                                            </div>

                                            @if (!empty($account))
                                            <div class="col-md-12">
                                                <label for="">Access Code</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="access_code" required
                                                        placeholder="Enter your access code"
                                                       >
                                                </div>
                                            </div>


                                            <div class="col-md-12 mb-5">
                                                <a href="{{ route("user.account.bank.details.request_change")}}" class="text-danger">To edit , click here to request for access code to be sent to your email.</a>
                                            </div>
                                            @endif

                                            <div class="col-12">
                                                <button type="submit" class="axil-button button-rounded btn-primary text-center"
                                                    style="width: 150px">
                                                    Save
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection
