<!-- Page Preloder -->
<!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

<!-- Offcanvas Menu Wrapper Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="canvas-close">
        <span class="icon_close"></span>
    </div>
    <div class="logo">
        <a href="/index">
            <img src="{{ $web_source }}/web_assets/img/m-logo.png" alt="">
        </a>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="om-widget">
        <ul>
            <li><i class="icon_mail_alt"></i> </li>
            <li><i class="fa fa-phone"></i> <span></span></li>
        </ul>
        <a href="{{ route('admin.post.create') }}" class="hw-btn">Submit property</a>
    </div>
    <div class="om-social">
        <a href="https://m.facebook.com/profile.php?ref=bookmarks"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-youtube-play"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
        <a href="https://t.me/tochiscogram"><i class="fa fa-telegram"></i></a>
    </div>
</div>
<!-- Offcanvas Menu Wrapper End -->

<!-- Header Section Begin -->

<div class="hs-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="logo">
                    <a href="/index"><img src="web_assets/img/m-logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="ht-widget">
                    <ul>
                        <li><i class="icon_mail_alt"></i></li>
                        <li><i class="fa fa-mobile-phone"></i> </li>
                    </ul>
                    <a href="{{ route('admin.post.create') }}" class="hw-btn">Submit property</a>
                </div>
            </div>
        </div>
        <div class="canvas-open">
            <span class="icon_menu"></span>
        </div>
    </div>
</div>
<div class="hs-nav">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <nav class="nav-menu">

                    <ul>
                        @if (auth()->check())
                            <li>
                                @if (auth()->user()->isAdmin())
                                    <a href="{{ route('admin.dashboard') }}" class="dropdown-item"
                                        type="button">Dashboard</a>
                                @else
                                    <a href="{{ route('user.user.index') }}" class="dropdown-item"
                                        type="button">Dashboard</a>
                                @endif
                            </li>
                            <li><a href="{{ route('property') }}">Properties</a>
                                <ul class="dropdown">
                                    <li><a href="">Property List</a></li>
                                    <li><a href="{{ route('prop_details') }}">Property Detail</a></li>
                                    <li><a href="{{ route('prop_comparison') }}">Property Comperison</a></li>
                                    <li><a href="{{ route('prop_submit') }}">Property Submit</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('agent') }}">Agent</a></li>
                            <li class="active"><a href="{{ route('about') }}">About</a></li>
                            {{-- <li><a href="/blog">Blog</a></li> --}}
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                            <li>
                                {{-- {{ __('Logout') }} --}}
                                <form action="{{ route('logout') }}" method="post" id="logoutForm">@csrf
                                    <a onclick="return $('#logoutForm').trigger('submit')">
                                        <i class="icon-exit"></i>
                                        <span>Logout</span>
                                    </a>
                                </form>
            

                            </li>
                        @else
                            <li><a href="{{ route('login') }}">Sign in</a></li>
                            <li><a href="{{ route('register') }}">Sign up</a></li>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('property') }}">Properties</a>
                                <ul class="dropdown">
                                    <li><a href="">Property List</a></li>
                                    <li><a href="{{ route('prop_details') }}">Property Detail</a></li>
                                    <li><a href="{{ route('prop_comparison') }}">Property Comperison</a></li>
                                    <li><a href="{{ route('prop_submit') }}">Property Submit</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('agent') }}">Agent</a></li>
                            <li class="active"><a href="{{ route('about') }}">About</a></li>
                            {{-- <li><a href="/blog">Blog</a></li> --}}
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        @endauth
                </ul>
            </nav>
        </div>
        <div class="col-lg-3">
            <div class="hn-social">
                <a href="https://m.facebook.com/profile.php?ref=bookmarks"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-youtube-play"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="https://t.me/tochiscogram"><i class="fa fa-telegram"></i></a>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Header End -->
