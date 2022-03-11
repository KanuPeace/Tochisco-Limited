<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from templates.hibootstrap.com/jaunt/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Dec 2020 20:07:00 GMT -->
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Author: HiBootstrap, Category:
            Tourism, Multipurpose, HTML, SASS, Bootstrap" />

        <title>Jaunt - Travel & Tour Booking HTML Template</title>

        <link rel="stylesheet" href="{{ $web_source }}/css/bootstrap.min.css" />

        <link rel="stylesheet" href="{{ $web_source }}/css/fontawesome.css" />

        <link rel="stylesheet" href="{{ $web_source }}/css/boxicons.min.css">

        <link rel="stylesheet" href="{{ $web_source }}/css/animate.min.css" />

        <link rel="stylesheet" href="{{ $web_source }}/css/bootstrap-datepicker.min.css">
        <link rel="stylesheet" href="{{ $web_source }}/css/nice-select.css">

        <link rel="stylesheet" href="{{ $web_source }}/css/magnific-popup.min.css" />

        <link rel="stylesheet" href="{{ $web_source }}/css/owl.carousel.min.css" />

        <link rel="stylesheet" href="{{ $web_source }}/css/meanmenu.min.css" />

        <link rel="stylesheet" href="{{ $web_source }}/css/style.css" />

        <link rel="stylesheet" href="{{ $web_source }}/css/responsive.css" />

        <link rel="icon" href="{{ $web_source }}/img/favicon.png" type="image/png" />
    </head>
    <body>

        {{-- <div id="loading">
            <div class="loader"></div>
        </div> --}}

        @include('web.pages.layouts.includes.header')

        <div class="container">
            @yield('content')
        </div>

        
        <footer class="footer-area">
            <div class="container">
                <div class="footer-top pt-100 pb-70">
                    <div class="row">
                        <div class="col-lg-3 col-md-5 col-sm-6 col-12">
                            <div class="footer-widget">
                                <div class="navbar-brand">
                                    <a href="index.html">
                                        <img src="{{ $web_source }}/img/logo2.png"
                                            alt="Logo" />
                                    </a>
                                </div>
                                <p>You can dream, create, design, and build the
                                    most wonderful place.</p>
                                <div class="contact-info">
                                    <div class="content">
                                        <a href="tel:+0123456987"><i class='bx
                                                bx-phone'></i>+0123 456 987</a>
                                    </div>
                                    <div class="content">
                                        <a
                                            href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#86eee3eaeae9c6ece7f3e8f2a8e5e9eb"><i
                                                class='bx bx-envelope'></i><span
                                                class="__cf_email__"
                                                data-cfemail="39515c5555567953584c574d175a5654">[email&#160;protected]</span></a>
                                    </div>
                                    <div class="content">
                                        <a href="#"><i class='bx bx-map'></i>Mon-Fri:
                                            8 AM – 7 PM</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-5 col-sm-6 col-12">
                            <div class="footer-widget">
                                <h5>Latest News</h5>
                                <ul class="footer-news">
                                    <li class="content">
                                        <a href="blog-details.html">Surrounded
                                            by the peaceful waters of Lake
                                            Victoria.</a>
                                        <span>October 05, 2020</span>
                                        <hr>
                                    </li>
                                    <li class="content">
                                        <a href="blog-details.html">Morning came
                                            very early today. The alarm went off
                                            at 4 am</a>
                                        <span>October 05, 2020</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-5 col-sm-6 col-12">
                            <div class="footer-widget">
                                <h5>Quick Links</h5>
                                <ul class="footer-links">
                                    <li>
                                        <a href="about-us.html">About Us</a>
                                    </li>
                                    <li>
                                        <a href="destinations.html">Destinations</a>
                                    </li>
                                    <li>
                                        <a href="blog-style-1.html">Latest Blog</a>
                                    </li>
                                    <li>
                                        <a href="team.html">Our Team</a>
                                    </li>
                                    <li>
                                        <a href="contact.html">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-5 col-sm-6 col-12">
                            <div class="footer-widget">
                                <h5>Instagram Post</h5>
                                <ul class="instagram-post">
                                    <li>
                                        <img src="{{ $web_source }}/img/instagram1.jpg"
                                            alt="Demo Image">
                                        <i class='bx bxl-instagram'></i>
                                    </li>
                                    <li>
                                        <img src="{{ $web_source }}/img/instagram2.jpg"
                                            alt="Demo Image">
                                        <i class='bx bxl-instagram'></i>
                                    </li>
                                    <li>
                                        <img src="{{ $web_source }}/img/instagram3.jpg"
                                            alt="Demo Image">
                                        <i class='bx bxl-instagram'></i>
                                    </li>
                                    <li>
                                        <img src="{{ $web_source }}/img/instagram4.jpg"
                                            alt="Demo Image">
                                        <i class='bx bxl-instagram'></i>
                                    </li>
                                    <li>
                                        <img src="{{ $web_source }}/img/instagram5.jpg"
                                            alt="Demo Image">
                                        <i class='bx bxl-instagram'></i>
                                    </li>
                                    <li>
                                        <img src="{{ $web_source }}/img/instagram6.jpg"
                                            alt="Demo Image">
                                        <i class='bx bxl-instagram'></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="copy-right-area">
                    <div class="container">
                        <div class="copy-right-content">
                            <p>
                                Copyright @2020 Jaunt. Designed By
                                <a href="https://hibootstrap.com/"
                                    target="_blank">
                                    HiBootstrap.com
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


        <script data-cfasync="false"
            src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script
            src="{{ $web_source }}/js/jquery.min.js"></script>

        <script src="{{ $web_source }}/js/popper.min.js"></script>

        <script src="{{ $web_source }}/js/bootstrap.min.js"></script>

        <script src="{{ $web_source }}/js/bootstrap-datepicker.min.js"></script>

        <script src="{{ $web_source }}/js/jquery.nice-select.min.js"></script>

        <script src="{{ $web_source }}/js/jquery.magnific-popup.min.js"></script>

        <script src="{{ $web_source }}/js/jquery.filterizr.min.js"></script>

        <script src="{{ $web_source }}/js/owl.carousel.min.js"></script>

        <script src="{{ $web_source }}/js/meanmenu.min.js"></script>

        <script src="{{ $web_source }}/js/form-validator.min.js"></script>

        <script src="{{ $web_source }}/js/contact-form-script.js"></script>

        <script src="{{ $web_source }}/js/jquery.ajaxchimp.min.js"></script>

        <script src="{{ $web_source }}/js/script.js"></script>
    </body>

    <!-- Mirrored from templates.hibootstrap.com/jaunt/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Dec 2020 20:09:38 GMT -->
</html>