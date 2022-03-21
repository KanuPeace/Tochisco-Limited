<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="TOCHISCO LIMITED">
    <meta name="keywords" content="Aler, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tochisco</title>

    <!-- Google Font -->
    @include("web.pages.layouts.includes.header")
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Wrapper Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <span class="icon_close"></span>
        </div>
        <div class="logo">
            <a href="/index">
                <img src="web_assets/img/m-logo.png" alt="">
            </a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="om-widget">
            <ul>
                <li><i class="icon_mail_alt"></i>support.tochisco@gmail.com</li>
                <li><i class="fa fa-mobile-phone"></i> 09157522382 <span>09093907715</span></li>
            </ul>
            <a href="#" class="hw-btn">Submit property</a>
        </div>
        <div class="om-social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-youtube-play"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
    </div>
    <!-- Offcanvas Menu Wrapper End -->

    <!-- Header Section Begin -->
    <!-- <header class="header-section">
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
                                <li><i class="icon_mail_alt"></i> kanupeace85@gmail.com</li>
                                <li><i class="fa fa-mobile-phone"></i>  09157522382  <span>09093907715</span></li>
                            </ul>
                            <a href="/psubmit" class="hw-btn">Submit property</a>
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
                                <li><a href="{{route("home")}}">Home</a></li>
                                <li><a href="">Properties</a>
                                    <ul class="dropdown">
                                        <li><a href="/property">Property Grid</a></li>
                                        <li><a href="/profile">Property List</a></li>
                                        <li><a href="/pdetail">Property Detail</a></li>
                                        <li><a href="/pcomparison">Property Comperison</a></li>
                                        <li><a href="/psubmit">Property Submit</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{route("agent")}}">Agent</a></li>
                                <li class="active"><a href="{{route("about")}}">About</a></li>
                                <li><a href="/blog">Blog</a></li>
                                <li><a href="/contact">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-3">
                        <div class="hn-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </header>
    <!-- Header End -->

        
    @include("web.pages.layouts.includes.script")
    

  

    @yield('content')

</body>

</html>