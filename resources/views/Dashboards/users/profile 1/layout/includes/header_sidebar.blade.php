<header id="tg-dashboardheader" class="tg-dashboardheader tg-haslayout">
    <nav id="tg-nav" class="tg-nav">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tg-navigation" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
            @include("web.layouts.includes.menu_links")
        </div>
    </nav>
    <div class="tg-rghtbox">

        <a class="tg-btn" href="{{ route('user.ads.create') }}">
            <i class="icon-bookmark"></i>
            <span>Sell</span>
        </a>
        <div class="dropdown tg-themedropdown tg-notification">
            <button class="tg-btndropdown">
                <a href="{{ route("user.chats.index") }}">
                    <i class="icon-envelope"></i>
                </a>
            </button>
        </div>
        <div class="dropdown tg-themedropdown tg-notification">
            <button class="tg-btndropdown" id="tg-notificationdropdown" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="icon-alarm"></i>
                <span class="tg-badge">{{auth()->user()->unreadNotifications->count()}}</span>
            </button>
            <ul class="dropdown-menu tg-dropdownmenu" aria-labelledby="tg-notificationdropdown">
                @if(!empty(auth()->user()->unreadNotifications->count() > 0))
                @foreach (auth()->user()->unreadNotifications as $notification)
                <li>
                    <a href="{{ route("user.notifications.mark_as" , ["id" => $notification->id , "action" => "read"]) }}">
                        <p>{{ $notification->data["title"] ?? ""}}</p>
                    </a>
                </li>
                @endforeach
                @else
                <p class="text-center mt-2">No unread notifications</p>
                @endif

                <a href="{{ route("user.notifications.list")}}">
                    <p class="text-center mt-2">See all</p>
                </a>
            </ul>
        </div>
    </div>
    <div id="tg-sidebarwrapper" class="tg-sidebarwrapper">
        <span id="tg-btnmenutoggle" class="tg-btnmenutoggle">
            <i class="fa fa-angle-left"></i>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="67" viewBox="0 0 20 67">

                {{-- xmpmeta --}}

                <path id="bg" class="cls-1" d="M20,27.652V39.4C20,52.007,0,54.728,0,67.265,0,106.515.026-39.528,0-.216-0.008,12.32,20,15.042,20,27.652Z" />
            </svg>
        </span>
        <div id="tg-verticalscrollbar" class="tg-verticalscrollbar">
            <strong class="tg-logo"><a href="javascript:void(0);"><img src="{{ $web_assets }}/images/logod.png" alt="image description"></a></strong>
            <div class="tg-user">
                <figure>
                    <a href="{{ route('user.account.info') }}"><img src="{{ auth()->user()->avatarUrl() }}" width="34" height="34" alt="image description"></a>
                </figure>
                <div class="tg-usercontent">
                    <h3>Hi! {{ auth()->user()->username }}</h3>
                    <h4>Member</h4>
                </div>
                <a class="tg-btnedit" href="{{ route('user.account.info') }}"><i class="icon-pencil"></i></a>
            </div>
            <nav id="tg-navdashboard" class="tg-navdashboard">
                <ul>
                    <li class="tg-active">
                        <a href="{{ route('user.dashboard') }}">
                            <i class="icon-chart-bars"></i>
                            <span> Dashboard</span>
                        </a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="javascript:void(0);">
                            <i class="icon-layers"></i>
                            <span>My Adverts</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('user.ads.index') }}">All Ads</a></li>
                            <li><a href="{{ route('user.ads.index', ['status' => 'Sponsored']) }}">Sponsored Ads</a>
                            </li>
                            <li><a href="{{ route('user.ads.index', ['status' => 'Non_sponsored']) }}">Non-Sponsored
                                    Ads</a></li>
                            <li><a href="{{ route('user.ads.index', ['status' => 'Active']) }}">Active Ads</a></li>
                            <li><a href="{{ route('user.ads.index', ['status' => 'Inactive']) }}">Inactive Ads</a>
                            </li>
                            <li><a href="{{ route('user.ads.index', ['status' => 'Sold']) }}">Sold Ads</a></li>
                            <li><a href="{{ route('user.ads.index', ['status' => 'Expired']) }}">Expired Ads</a></li>
                            <li><a href="{{ route('user.ads.index', ['status' => 'Deleted']) }}">Deleted Ads</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children">
                        <a href="#">
                            <i class="icon-layers"></i>
                            <span>My Account</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('user.account.info') }}">Account Info</a></li>
                            <li><a href="{{ route('user.account.bank.details') }}">Bank Account Detail</a></li>
                            <li><a href="{{ route('user.wallet.transactions') }}">Transactions</a></li>
                            <li><a href="{{ route('user.withdrawal_requests') }}">Withdrawal History</a></li>
                            <li><a href="{{ route('user.wallet.transfer') }}">Transfer</a></li>
                            <li><a href="{{ route('user.account.security') }}">Account Setting</a></li>
                            <li><a href="{{ route('user.account.create_pin') }}">Change Wallet Pin</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('user.edit_profile') }}">
                            <i class="icon-cog"></i>
                            <span>Profile Settings</span>
                        </a>
                    </li>

                    <li class="menu-item-has-children">
                        <a href="javascript:void(0);">
                            <i class="icon-layers"></i>
                            <span>Plans</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('user.plans.membership.index') }}">Membership Plans</a></li>
                            <li><a href="{{ route('user.plans.promo.index') }}">Ad Promotion Plans</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('user.invites_section') }}">
                            <i class="icon-star"></i>
                            <span>Invites Section</span>
                        </a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">
                            <i class="icon-layers"></i>
                            <span>My Referrals</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('user.referrals') }}">Referral History</a></li>
                            <li><a href="{{ route('user.referral.bonuses') }}">Referral Commission History</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('user.privacy_setting') }}">
                            <i class="icon-star"></i>
                            <span>Privacy Settings</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="{{ route('web.faqs') }}">
                            <i class="icon-star"></i>
                            <span>FAQs</span>
                        </a>
                    </li> --}}
                    <li>
                        <form action="{{ route('logout') }}" method="post" id="logoutForm">@csrf
                            <a onclick="return $('#logoutForm').trigger('submit')">
                                <i class="icon-exit"></i>
                                <span>Logout</span>
                            </a>
                        </form>
                    </li>
                </ul>
            </nav>
            <div class="tg-socialandappicons">
                <ul class="tg-socialicons">
                    <li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                    <li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                    <li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                    <li class="tg-googleplus"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
                    <li class="tg-rss"><a href="javascript:void(0);"><i class="fa fa-rss"></i></a></li>
                </ul>
                {{-- <ul class="tg-appstoreicons">
                    <li><a href="javascript:void"><img src="{{ $web_assets }}/images/icons/app-01.png" alt="image description"></a></li>
                    <li><a href="javascript:void"><img src="{{ $web_assets }}/images/icons/app-02.png" alt="image description"></a></li>
                </ul> --}}
            </div>
        </div>
    </div>
</header>
