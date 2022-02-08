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
        <a href="{{ route("user.withdrawal_requests") }}">
            <i class="fa fa-paper-plane"></i>
            <span class="ml-2">Withdrawal History</span>
        </a>
    </li>
    <li class="menu-item">
        <a href="{{ route("user.vendor.approved_vendors") }}">
            <i class="fa fa-user-plus"></i>
            <span class="ml-2">Approved Vendors</span>
        </a>
    </li>
    <li class="menu-item">
        <a href="{{ route("user.vendor.dashboard") }}">
            <i class="fa fa-tasks"></i>
            <span class="ml-2">Vendors Area</span>
        </a>
    </li>

</ul>
