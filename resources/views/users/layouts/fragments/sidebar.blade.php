 <!--  BEGIN SIDEBAR  -->
 <div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="shadow-bottom"></div>

        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu">
                <a href="{{ route('user.dashboard') }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <span>DASHBOARD</span>
                    </div>
                </a>
            </li>

            <br>
            <b>Blog</b>
            <br>
            <li class="menu">
                <a href="" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <span>Posts</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="{{ route('user.post.create') }}" aria-expanded="false" class="dropdown-toggle">
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
                <a href="{{ route('user.earnings') }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <span>Earnings</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <span>Apply for Vendors</span>
                    </div>
                </a>
            </li>
            {{-- <li class="menu">
                <a href="/" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <span>Home</span>
                    </div>
                </a>
            </li> --}}
            <li class="menu">

                <i class="fa fa-sign-out" style="font-size:30px;color:black"></i>

                <form action="{{ route('logout') }}" method="post">@csrf
                    <button class="dropdown-item text-danger" type="submit">Sign-Out</button>
                </form>
            </li>
           
        </ul>

    </nav>

</div>
<!--  END SIDEBAR  -->
