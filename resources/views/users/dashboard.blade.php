@extends('users.layouts.app')

@section('content')


<div class="mt-2">
    @include('notifications.flash_messages')
</div>

<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>



    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="mt-2">
                @include('notifications.flash_messages')
            </div>

            <div class="row layout-top-spacing">

                {{-- <header class="masthead">
                    <div class="container px-4 px-lg-5 h-100">
                        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                            <div class="col-lg-8 align-self-end">
                                <h1 class="text-white font-weight-bold">WELCOME! Download and enjoy your favourite music and videos</h1>
                                <hr class="divider" />
                            </div>
                            <div class="col-lg-8 align-self-baseline">
                                <p class="text-white-75 mb-5">Download and enjoy your favourite music and videos</p>
                                <a class="btn btn-primary btn-xl" href="{{route('media.about')}}">Find Out More</a>
                            </div>
                        </div>
                    </div>
                </header> --}}
                <!-- About-->
                {{-- <section class="page-section bg-primary" id="about">
                    <div class="container px-4 px-lg-5">
                        <div class="row gx-4 gx-lg-5 justify-content-center">
                            <div class="col-lg-8 text-center">
                                <h2 class="text-white mt-0">We've got what you need!</h2>
                                <hr class="divider divider-light" />
                                <p class="text-white-75 mb-4"> Enjoy the best and recent music and videos </p>
                                <a class="btn btn-light btn-xl" href="{{route('media.posts')}}">Get Started!</a>
                            </div>
                        </div>
                    </div>
                </section> --}}
                <!-- Services-->
                {{-- <section class="page-section" id="services">
                    <div class="container px-4 px-lg-5">
                        <h2 class="text-center mt-0">At Your Service</h2>
                        <hr class="divider" />
                        <div class="row gx-4 gx-lg-5">
                            <div class="col-lg-3 col-md-6 text-center">
                                <div class="mt-5">
                                    <div class="mb-2"><i class="bi-gem fs-1 text-primary"></i></div>
                                    <h3 class="h4 mb-2">Sturdy Themes</h3>
                                    <p class="text-muted mb-0">Our themes are updated regularly to keep them bug free!</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 text-center">
                                <div class="mt-5">
                                    <div class="mb-2"><i class="bi-laptop fs-1 text-primary"></i></div>
                                    <h3 class="h4 mb-2">Up to Date</h3>
                                    <p class="text-muted mb-0">All dependencies are kept current to keep things fresh.</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 text-center">
                                <div class="mt-5">
                                    <div class="mb-2"><i class="bi-globe fs-1 text-primary"></i></div>
                                    <h3 class="h4 mb-2">Ready to Publish</h3>
                                    <p class="text-muted mb-0">You can use this design as is, or you can make changes!</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 text-center">
                                <div class="mt-5">
                                    <div class="mb-2"><i class="bi-heart fs-1 text-primary"></i></div>
                                    <h3 class="h4 mb-2">Made with Love</h3>
                                    <p class="text-muted mb-0">Is it really open source if it's not made with love?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> --}}
                <div class="container">
                  
                    {{-- <div class="alert alert-danger mb-4">You are currently not subscribled to any plan, kindly
                        <a href="" class="text-success">click here to subscribe....</a>
                    </div> --}}
                    
                
                    <div class="row">
                        <div class="col-md-auto col-12 text-center">
                            <img src="" alt="avatar" class="img-fluid profile mt-5">
                            <div><a href="" class="badge badge-pill badge-danger">Edit</a></div>
                        </div>
                        <div class="col-md-auto col-12 text-center">
                            <h4 class="mt-3">Welcome </h4>
                        </div>
                    </div>
                    <div class="row ">
                        {{-- <div class="col-md-5">
                                @include("dashboards.user.profile_card")
                            </div> --}}
                
                        <div class="col-md-6">
                            <div class="profile_item_card text-center mt-3">
                                <p class="">Wallet Balance</p>
                                <h2></h2>
                                <div class="row mt-3 mb-5">
                                    <div class="col-6">
                                        <a href="" class="mybtn btn-success btn-lg p-3">Deposit</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="" class="mybtn btn-danger btn-lg p-3">Withdraw</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6 mt-5">
                                    <div class="profile_item_card text-center">
                                        <div class="mb-2">Referral Earnings</div>
                                        <h4></h4>
                                        <div class="mb-4">
                                            <form onsubmit="return confirm('Are you sure you want to transfer all funds to your main wallet?')" action="" method="post">@csrf
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
                                        <h4></h4>
                                        <div class="mb-4">
                                            <form onsubmit="return confirm('Are you sure you want to transfer all funds to your main wallet?')" action="" method="post">@csrf
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
                            Reference Code: <a href="javascript:;;" class="text-primary" onclick="return copyToClipboard('')">
                              
                            </a>
                
                            <br>Or <br>
                
                            <a href="javascript:;;" class="text-primary" onclick="return copyToClipboard('')">
                                Copy referral link
                            </a>
                        </p>
                    </div>
                
                    @include("users.layouts.fragments.youtube_subscribe_message")
                
                    <div class="alert alert-info mt-4">
                        <a href="" class="">Click here to buy COUPON CODES</a>
                    </div>
                
                    <div class="alert alert-success mt-4">
                        <a href="" class="">Click here to upgrade your plan</a>
                    </div>
                
                
                    <div class="form-row">
                
                        <div class="col-md-auto col-6">
                            <div class="alert alert-dark mt-2">
                                <link rel="shortcut icon" type="image/x-icon" href="">
                                Sponsored <br> Posts <br>
                                <a href="" class="btn-lg mybtn btn-success p-2 mt-3 mb-4 text-white ">View</a>
                
                            </div>
                        </div>
                
                
                        <div class="col-md-auto col-6">
                            <div class="alert alert-info mt-2">
                                My <br> Referrals <br>
                                <a href="" class="btn-lg mybtn btn-success p-2 mt-3 mb-4 text-white ">View</a>
                
                            </div>
                        </div>
                
                
                        <div class="col-md-auto col-6">
                            <div class="alert alert-danger mt-2">
                                My <br> Withdrawals <br>
                                <a href="" class="btn-lg mybtn btn-success p-2 mt-3 mb-4 text-white ">View</a>
                
                            </div>
                        </div>
                
                        <div class="col-md-auto col-6">
                            <div class="alert alert-warning mt-2">
                                My <br> Transactions <br>
                                <a href="" class="btn-lg mybtn btn-success p-2 mt-3 mb-4 text-white ">View</a>
                
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
                
                   
                    <div class="">
                        <div class="alert alert-success mt-2">
                            <b> Play 2 Earn</b>
                
                            <p>Earn from activities like surveys and games directly into your account </p>
                
                            <form action="" method="POST">@csrf
                                <button class="btn btn-danger btn-sm">Join now</button>
                            </form>
                
                
                        </div>
                    </div>
                 
                
                
                </div>
            </div>

        </div>

    </div>
    <!--  END CONTENT PART  -->

</div>
</div>

@endsection