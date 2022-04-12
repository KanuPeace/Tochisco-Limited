 <!--  BEGIN SIDEBAR  -->
 <div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="shadow-bottom"></div>

        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu">
                <a href="{{ route("admin.dashboard") }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <span>DASHBOARD</span>
                    </div>
                </a>
            </li>

            <br>
            <b>Blog</b>
            <br>
            <li class="menu">
                <a href="{{ route("admin.post.index") }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <span>Posts</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="{{ route("admin.post.create") }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <span>Create Posts</span>
                    </div>
                </a>
            </li>

            {{-- <li class="menu">
                <a href="/" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <span>Category</span>
                    </div>
                </a>


            </li> --}}

            <hr>


            <li class="menu">
                <a href="{{ route("admin.users.index") }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <span>Users</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="{{ route("admin.subscriptions.index") }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <span>Subscriptions</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="{{ route("admin.plans.index") }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <span>Plans</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="{{ route("admin.transactions.index") }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <span>Transactions</span>
                    </div>
                </a>
            </li>
            {{-- <li class="menu">
                <a href="{{ route("admin.withdrawals.index") }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <span>Withdrawal Requests</span>
                    </div>
                </a>
            </li> --}}
            <li class="menu">
                <a href="{{route('admin.coupons.index')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <span>Coupons</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="{{ route("admin.referrals.index") }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <span>Referrals</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="{{ route('admin.vendors')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <span>Vendors</span>
                    </div>
                </a>
            </li>
            <hr>
            <b>Authorization</b>
            <br>
            <li class="menu">
                <a href="{{ route("admin.authorization.roles.index") }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <span>Roles</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="{{ route("admin.authorization.permissions.index") }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <span>Permissions</span>
                    </div>
                </a>
            </li>
        </ul>

    </nav>

</div>
<!--  END SIDEBAR  -->
