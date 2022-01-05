@extends('web.pages.layouts.app')

@section('content')


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section spad set-bg" data-setbg="web_assets/img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h4>Property Grid</h4>
                        <div class="bt-option">
                            <a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a>
                            <span>Property</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Property Section Begin -->
    <section class="property-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h4>PROPERTY Grid</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="property-item">
                        <div class="pi-pic set-bg" data-setbg="web_assets/img/New/t.0.jpg">
                            <div class="label">For rent</div>
                        </div>
                        <div class="pi-text">
                            <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                            <div class="pt-price">$ 289.0<span>/month</span></div>
                            <h5><a href="#">Home in Merrick Way</a></h5>
                            <p><span class="icon_pin_alt"></span> 3 Middle Winchendon Rd, Rindge, NH 03461</p>
                            <ul>
                                <li><i class="fa fa-object-group"></i> 2, 283</li>
                                <li><i class="fa fa-bathtub"></i> 03</li>
                                <li><i class="fa fa-bed"></i> 05</li>
                                <li><i class="fa fa-automobile"></i> 01</li>
                            </ul>
                            <div class="pi-agent">
                                <div class="pa-item">
                                    <div class="pa-info">
                                        <img src="web_assets/img/property/posted-by/pb-1.jpg" alt="">
                                        <h6>Ashton Kutcher</h6>
                                    </div>
                                    <div class="pa-text">
                                        123-455-688
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="property-item">
                        <div class="pi-pic set-bg" data-setbg="web_assets/img/New/t.1.jpg">
                            <div class="label c-red">For rent</div>
                        </div>
                        <div class="pi-text">
                            <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                            <div class="pt-price">$ 289.0</div>
                            <h5><a href="#">Unimont Aurum</a></h5>
                            <p><span class="icon_pin_alt"></span> Gut No.102, Opp. HP Petrol Pump, Karjat</p>
                            <ul>
                                <li><i class="fa fa-object-group"></i> 2, 283</li>
                                <li><i class="fa fa-bathtub"></i> 03</li>
                                <li><i class="fa fa-bed"></i> 05</li>
                                <li><i class="fa fa-automobile"></i> 01</li>
                            </ul>
                            <div class="pi-agent">
                                <div class="pa-item">
                                    <div class="pa-info">
                                        <img src="web_assets/img/property/posted-by/pb-1.jpg" alt="">
                                        <h6>Ashton Kutcher</h6>
                                    </div>
                                    <div class="pa-text">
                                        123-455-688
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="property-item">
                        <div class="pi-pic set-bg" data-setbg="web_assets/img/New/t.2.jpg">
                            <div class="label c-red">For rent</div>
                        </div>
                        <div class="pi-text">
                            <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                            <div class="pt-price">$ 289.0</div>
                            <h5><a href="#">Vrindavan Flora</a></h5>
                            <p><span class="icon_pin_alt"></span> No. 15, 16, 17-1A And 17-2, Rasayani, Rasayani</p>
                            <ul>
                                <li><i class="fa fa-object-group"></i> 2, 283</li>
                                <li><i class="fa fa-bathtub"></i> 03</li>
                                <li><i class="fa fa-bed"></i> 05</li>
                                <li><i class="fa fa-automobile"></i> 01</li>
                            </ul>
                            <div class="pi-agent">
                                <div class="pa-item">
                                    <div class="pa-info">
                                        <img src="web_assets/img/property/posted-by/pb-1.jpg" alt="">
                                        <h6>Ashton Kutcher</h6>
                                    </div>
                                    <div class="pa-text">
                                        123-455-688
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="property-item">
                        <div class="pi-pic set-bg" data-setbg="web_assets/img/New/t.3.jpg">
                            <div class="label c-red">For rent</div>
                        </div>
                        <div class="pi-text">
                            <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                            <div class="pt-price">$ 289.0</div>
                            <h5><a href="#">Shramik Vaibhav</a></h5>
                            <p><span class="icon_pin_alt"></span> 12 Pt at Shedung, Panvel, Raigarh, Navi Mumbai</p>
                            <ul>
                                <li><i class="fa fa-object-group"></i> 2, 283</li>
                                <li><i class="fa fa-bathtub"></i> 03</li>
                                <li><i class="fa fa-bed"></i> 05</li>
                                <li><i class="fa fa-automobile"></i> 01</li>
                            </ul>
                            <div class="pi-agent">
                                <div class="pa-item">
                                    <div class="pa-info">
                                        <img src="web_assets/img/property/posted-by/pb-1.jpg" alt="">
                                        <h6>Ashton Kutcher</h6>
                                    </div>
                                    <div class="pa-text">
                                        123-455-688
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="property-item">
                        <div class="pi-pic set-bg" data-setbg="web_assets/img/New/t.4.jpg">
                            <div class="label c-magenta">For rent</div>
                        </div>
                        <div class="pi-text">
                            <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                            <div class="pt-price">$ 289.0</div>
                            <h5><a href="#">Poddar Wondercity</a></h5>
                            <p><span class="icon_pin_alt"></span> Badlapur East, Beyond Thane</p>
                            <ul>
                                <li><i class="fa fa-object-group"></i> 2, 283</li>
                                <li><i class="fa fa-bathtub"></i> 03</li>
                                <li><i class="fa fa-bed"></i> 05</li>
                                <li><i class="fa fa-automobile"></i> 01</li>
                            </ul>
                            <div class="pi-agent">
                                <div class="pa-item">
                                    <div class="pa-info">
                                        <img src="web_assets/img/property/posted-by/pb-1.jpg" alt="">
                                        <h6>Ashton Kutcher</h6>
                                    </div>
                                    <div class="pa-text">
                                        123-455-688
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="property-item">
                        <div class="pi-pic set-bg" data-setbg="web_assets/web_assets/img/New/t.5.jpg">
                            <div class="label">For rent</div>
                        </div>
                        <div class="pi-text">
                            <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                            <div class="pt-price">$ 289.0<span>/month</span></div>
                            <h5><a href="#">GoldCrest Residency</a></h5>
                            <p><span class="icon_pin_alt"></span> No.7, Sector- 11, Ghansoli, Mumbai, Navi Mumbai</p>
                            <ul>
                                <li><i class="fa fa-object-group"></i> 2, 283</li>
                                <li><i class="fa fa-bathtub"></i> 03</li>
                                <li><i class="fa fa-bed"></i> 05</li>
                                <li><i class="fa fa-automobile"></i> 01</li>
                            </ul>
                            <div class="pi-agent">
                                <div class="pa-item">
                                    <div class="pa-info">
                                        <img src="web_assets/img/property/posted-by/pb-1.jpg" alt="">
                                        <h6>Ashton Kutcher</h6>
                                    </div>
                                    <div class="pa-text">
                                        123-455-688
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="property-item">
                        <div class="pi-pic set-bg" data-setbg="web_assets/img/New/t.6.jpg">
                            <div class="label c-red">For rent</div>
                        </div>
                        <div class="pi-text">
                            <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                            <div class="pt-price">$ 289.0</div>
                            <h5><a href="#">Shramik Vaibhav</a></h5>
                            <p><span class="icon_pin_alt"></span> 12 Pt at Shedung, Panvel, Raigarh, Navi Mumbai</p>
                            <ul>
                                <li><i class="fa fa-object-group"></i> 2, 283</li>
                                <li><i class="fa fa-bathtub"></i> 03</li>
                                <li><i class="fa fa-bed"></i> 05</li>
                                <li><i class="fa fa-automobile"></i> 01</li>
                            </ul>
                            <div class="pi-agent">
                                <div class="pa-item">
                                    <div class="pa-info">
                                        <img src="web_assets/img/property/posted-by/pb-1.jpg" alt="">
                                        <h6>Ashton Kutcher</h6>
                                    </div>
                                    <div class="pa-text">
                                        123-455-688
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="property-item">
                        <div class="pi-pic set-bg" background-image="web_assets/img/New/t.7.jpg">
                            <div class="label c-magenta">For rent</div>
                        </div>
                        <div class="pi-text">
                            <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                            <div class="pt-price">$ 289.0</div>
                            <h5><a href="#">Poddar Wondercity</a></h5>
                            <p><span class="icon_pin_alt"></span> Badlapur East, Beyond Thane</p>
                            <ul>
                                <li><i class="fa fa-object-group"></i> 2, 283</li>
                                <li><i class="fa fa-bathtub"></i> 03</li>
                                <li><i class="fa fa-bed"></i> 05</li>
                                <li><i class="fa fa-automobile"></i> 01</li>
                            </ul>
                            <div class="pi-agent">
                                <div class="pa-item">
                                    <div class="pa-info">
                                        <img src="web_assets/img/property/posted-by/pb-1.jpg" alt="">
                                        <h6>Ashton Kutcher</h6>
                                    </div>
                                    <div class="pa-text">
                                        123-455-688
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="property-item">
                        <div class="pi-pic set-bg" data-setbg="web_assets/img/New/t.8.jpg">
                            <div class="label">For rent</div>
                        </div>
                        <div class="pi-text">
                            <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                            <div class="pt-price">$ 289.0<span>/month</span></div>
                            <h5><a href="#">GoldCrest Residency</a></h5>
                            <p><span class="icon_pin_alt"></span> No.7, Sector- 11, Ghansoli, Mumbai, Navi Mumbai</p>
                            <ul>
                                <li><i class="fa fa-object-group"></i> 2, 283</li>
                                <li><i class="fa fa-bathtub"></i> 03</li>
                                <li><i class="fa fa-bed"></i> 05</li>
                                <li><i class="fa fa-automobile"></i> 01</li>
                            </ul>
                            <div class="pi-agent">
                                <div class="pa-item">
                                    <div class="pa-info">
                                        <img src="web_assets/img/property/posted-by/pb-1.jpg" alt="">
                                        <h6>Ashton Kutcher</h6>
                                    </div>
                                    <div class="pa-text">
                                        123-455-688
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="loadmore-btn">
                        <a href="#">Load more</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Property Section End -->

        <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="fs-about">
                        <div class="fs-logo">
                            <a href="#">
                                <img src="web_assets/img/m-logo.png" alt="">
                            </a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua ut aliquip ex ea</p>
                        <div class="fs-social">
                            <a href="https://m.facebook.com/profile.php?ref=bookmarks"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="https://t.me/tochiscogram"><i class="fa fa-telegram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="fs-widget">
                        <h5>Help</h5>
                        <ul>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Contact Support</a></li>
                            <li><a href="#">Knowledgebase</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">FAQs</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="fs-widget">
                        <h5>Links</h5>
                        <ul>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Create Property</a></li>
                            <li><a href="#">My Properties</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            <li><a href="{{ route('login') }}">Login</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="fs-widget">
                        <h5>Newsletter</h5>
                        <p>Deserunt mollit anim id est laborum.</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Email">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="copyright-text">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>, distributed by <a href="https://bootthemes.com/" target="_blank">BootThemes</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </footer>
    @endsection
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    