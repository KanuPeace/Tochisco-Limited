<ul class="mainmenu">
    <li class="menu-item">
        <a href="{{ route("web.index") }}" class="icon">
            <i class="fa fa-home"></i>
            <span class="ml-2">Home</span>
        </a>
    </li>
    <li class="menu-item">
        <a href="{{ route("user.dashboard") }}" class="icon">
            <i class="fa fa-th-large"></i>
            <span class="ml-2">Dashboard</span>
        </a>
    </li>
    <li class="menu-item">
        <a href="{{ route("user.contest.index") }}" class="icon">
            <i class="fa fa-th-large"></i>
            <span class="ml-2">Contest</span>
        </a>
    </li>
    <li class="menu-item">
        <a href="{{ route("blog.search" , ["sponsored" => true ]) }}" class="icon">
            <i class="fa fa-th-large"></i>
            <span class="ml-2">Sponsored Posts</span>
        </a>
    </li>
    <li class="menu-item">
        <a href="{{ route("web.approved_vendors") }}">
            <i class="fa fa-user-plus"></i>
            <span class="ml-2">Buy Coupon Code</span>
        </a>
    </li>
    <li class="menu-item">
        <a href="{{ route("user.vendor.dashboard") }}">
            <i class="fa fa-tasks"></i>
            <span class="ml-2">Apply for Vendor</span>
        </a>
    </li>

    <li class="menu-item-has-children">
        <a href="#">
            <i class="fa fa-tasks"></i>
            <span class="ml-2">Videos</span>
        </a>
        <ul class="axil-submenu">
            <li><a href="#">Youtube</a></li>
            <li><a href="#">Agro-Tech</a></li>
            <li><a href="#">Cryptocurrency Tutorials</a></li>
            <li><a href="#">Video Editting Tutorials</a></li>
            <li><a href="#">Music/Entertainment</a></li>
            {{-- @foreach (sideBarCategories() as $category)
            <li><a href="{{ route("blog.search" , ["category" => $category->name ])}}">{{$category->name }}</a></li>

            @endforeach --}}
        </ul>
    </li>

    <li class="menu-item">
        <a href="{{ route("web.contact_us") }}">
            <i class="fa fa-users"></i>
            <span class="ml-2">Contact Us</span>
        </a>
    </li>

    <HR></HR>
    <b>OTHERS</b>
    <li class="menu-item">
        <a href="{{ route("user.referrals") }}">
            <i class="fa fa-users"></i>
            <span class="ml-2">Referrals</span>
        </a>
    </li>

    <li class="menu-item">
        <a href="{{ route("user.transactions") }}">
            <i class="fa fa-address-book"></i>
            <span class="ml-2">Transactions</span>
        </a>
    </li>
    <li class="menu-item">
        <a href="{{ route("user.subscriptions") }}">
            <i class="fa fa-credit-card"></i>
            <span class="ml-2">Subscriptions</span>
        </a>
    </li>
    <li class="menu-item">
        <a href="{{ route("user.plans.index") }}">
            <i class="fa fa-users"></i>
            <span class="ml-2">Subscription Plans</span>
        </a>
    </li>
    <li class="menu-item">
        <a href="{{ route("user.withdrawal_requests") }}">
            <i class="fa fa-paper-plane"></i>
            <span class="ml-2">Withdrawal History</span>
        </a>
    </li>

</ul>
