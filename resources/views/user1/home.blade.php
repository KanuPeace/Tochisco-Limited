@extends("dashboards.user.layout.app")
@section('content')

<div class="container">
    @if ($is_free)
    <div class="alert alert-danger mb-4">You are currently not subscribled to any plan, kindly
        <a href="{{ route('user.plans.index') }}" class="text-success">click here to subscribe....</a>
    </div>
    @endif

    <div class="row">
        <div class="col-md-auto col-12 text-center">
            <img src="{{ $user->avatarUrl() }}" alt="avatar" class="img-fluid profile mt-5">
            <div><a href="{{ route('user.edit_profile') }}" class="badge badge-pill badge-danger">Edit</a></div>
        </div>
        <div class="col-md-auto col-12 text-center">
            <h4 class="mt-3">Welcome {{ $user->first_name }}</h4>
        </div>
    </div>
    <div class="row ">
        {{-- <div class="col-md-5">
                @include("dashboards.user.profile_card")
            </div> --}}

        <div class="col-md-6">
            <div class="profile_item_card text-center mt-3">
                <p class="">Wallet Balance</p>
                <h2>{{ format_money($wallet->balance) }}</h2>
                <div class="row mt-3 mb-5">
                    <div class="col-6">
                        <a href="{{ route('user.wallet.deposit') }}" class="mybtn btn-success btn-lg p-3">Deposit</a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('user.wallet.withdraw') }}" class="mybtn btn-danger btn-lg p-3">Withdraw</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6 mt-5">
                    <div class="profile_item_card text-center">
                        <div class="mb-2">Referral Earnings</div>
                        <h4>{{ format_money($wallet->referral_earnings) }}</h4>
                        <div class="mb-4">
                            <form onsubmit="return confirm('Are you sure you want to transfer all funds to your main wallet?')" action="{{ route('user.wallet.transfer_to_main', ['account' => 'referral_earnings']) }}" method="post">@csrf
                                <span type="submit" class="badge badge-pill badge-success p-2" onclick="return $(this).parent().submit()">
                                    Transfer to
                                    Wallet</span>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-5">
                    <div class="profile_item_card text-center">
                        <div class="mb-2">Non-referral Earnings</div>
                        <h4>{{ format_money($wallet->non_referral_earnings) }}</h4>
                        <div class="mb-4">
                            <form onsubmit="return confirm('Are you sure you want to transfer all funds to your main wallet?')" action="{{ route('user.wallet.transfer_to_main', ['account' => 'non_referral_earnings']) }}" method="post">@csrf
                                <span type="submit" class="badge badge-pill badge-success p-2" onclick="return $(this).parent().submit()">
                                    Transfer to
                                    Wallet</span>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>


    </div>

    <div class="alert alert-success mt-5">
        Invite your friends to join and earn massively now 💰💰🤑🤑🤑🥳🥳🥳🥳!

        <p>
            Reference Code: <a href="javascript:;;" class="text-primary" onclick="return copyToClipboard('{{ $user->ref_code }}')">
                {{ $user->ref_code }}
            </a>

            <br>Or <br>

            <a href="javascript:;;" class="text-primary" onclick="return copyToClipboard('{{ $user->refUrl() }}')">
                Copy referral link
            </a>
        </p>
    </div>

    @include("dashboards.user.fragments.youtube_subscribe_message")

    <div class="alert alert-info mt-4">
        <a href="{{ route("web.approved_vendors") }}" class="">Click here to buy COUPON CODES</a>
    </div>

    <div class="alert alert-success mt-4">
        <a href="{{ route('user.plans.index') }}" class="">Click here to upgrade your plan</a>
    </div>


    <div class="form-row">

        <div class="col-md-auto col-6">
            <div class="alert alert-dark mt-2">
                <link rel="shortcut icon" type="image/x-icon" href="{{ $logo_icon_image }}">
                Sponsored <br> Posts <br>
                <a href="{{ route("blog.search" , ["sponsored" => true ] ) }}" class="btn-lg mybtn btn-success p-2 mt-3 mb-4 text-white ">View</a>

            </div>
        </div>


        <div class="col-md-auto col-6">
            <div class="alert alert-info mt-2">
                My <br> Referrals <br>
                <a href="{{ route('user.referrals') }}" class="btn-lg mybtn btn-success p-2 mt-3 mb-4 text-white ">View</a>

            </div>
        </div>


        <div class="col-md-auto col-6">
            <div class="alert alert-danger mt-2">
                My <br> Withdrawals <br>
                <a href="{{ route('user.withdrawal_requests') }}" class="btn-lg mybtn btn-success p-2 mt-3 mb-4 text-white ">View</a>

            </div>
        </div>

        <div class="col-md-auto col-6">
            <div class="alert alert-warning mt-2">
                My <br> Transactions <br>
                <a href="{{ route('user.transactions') }}" class="btn-lg mybtn btn-success p-2 mt-3 mb-4 text-white ">View</a>

            </div>
        </div>



    </div>

    {{-- <h4 class="mt-5">Available Videos</h4>
        <div class="form-row">

            <div class="col-md-auto col-12">
                <div class="alert alert-success mt-2">
                    Cryptocurrency Videos
                </div>
            </div>

            <div class="col-md-auto col-12">
                <div class="alert alert-success mt-2">
                    Cryptocurrency Videos
                </div>
            </div>
            <div class="col-md-auto col-12">
                <div class="alert alert-success mt-2">
                    Cryptocurrency Videos
                </div>
            </div>
            <div class="col-md-auto col-12">
                <div class="alert alert-success mt-2">
                    Cryptocurrency Videos
                </div>
            </div>


        </div> --}}

    @if (!$user->hasJoinedProvider())
    <div class="">
        <div class="alert alert-success mt-2">
            <b> Play 2 Earn</b>

            <p>Earn from activities like surveys and games directly into your account </p>

            <form action="{{ route("user.provider.join")}}" method="POST">@csrf
                <button class="btn btn-danger btn-sm">Join now</button>
            </form>


        </div>
    </div>
    @endif


</div>

@endsection
