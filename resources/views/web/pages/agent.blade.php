@extends('web.pages.layouts.app')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section spad set-bg" data-setbg="web_assets/img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h4>Our Agents</h4>
                        <div class="bt-option">
                            <a href="/"><i class="fa fa-home"></i> Home</a>
                            <span>Agents</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Agent Section Begin -->
    <section class="agent-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="agent-search-form">
                        <form action="#">
                            <input type="text" placeholder="Find agent">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="as-slider owl-carousel">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="as-item">
                            <div class="as-pic">
                                <img src="{{ $web_source }}/web_assets/img/agents/agent 1.jpg" alt="">
                                <div class="rating-point">
                                    4.5
                                </div>
                            </div>
                            <div class="as-text">
                                <div class="at-title">
                                    <h6>Babatola Oreoluwa Mosunmola</h6>
                                    <div class="rating-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                </div>
                                <ul>
                                    <li>Property <span>215</span></li>
                                    <li>Email <span>tochisco@gmail.com</span></li>
                                    <li>Phone <span>08128274853</span></li>
                                </ul>
                                <a href="#" class="primary-btn">View profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="as-item">
                            <div class="as-pic">
                                <img src="{{ $web_source }}/web_assets/img/agents/agent 2.jpg" alt="">
                                <div class="rating-point">
                                    4.5
                                </div>
                            </div>
                            <div class="as-text">
                                <div class="at-title">
                                    <h6>Adejumo lois adenike</h6>
                                    <div class="rating-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                </div>
                                <ul>
                                    <li>Property <span>215</span></li>
                                    <li>Email <span>tochisco@gmail.com</span></li>
                                    <li>Phone <span>08128274853</span></li>
                                </ul>
                                <a href="#" class="primary-btn">View profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="as-item">
                            <div class="as-pic">
                                <img src="{{ $web_source }}/web_assets/img/agents/agent 3.jpg" alt="">
                                <div class="rating-point">
                                    4.5
                                </div>
                            </div>
                            <div class="as-text">
                                <div class="at-title">
                                    <h6>Eze Queen Gift</h6>
                                    <div class="rating-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                </div>
                                <ul>
                                    <li>Property <span>215</span></li>
                                    <li>Email <span>tochisco@gmail.com</span></li>
                                    <li>Phone <span>08128274853</span></li>
                                </ul>
                                <a href="#" class="primary-btn">View profile</a>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
    </section>
    <!-- Agent Section End -->

    <!-- Contact Section Begin -->
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-info">
                        <div class="ci-item">
                            <div class="ci-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="ci-text">
                                <h5>Address</h5>
                                <p>Ajah,lagos.</p>
                            </div>
                        </div>
                        <div class="ci-item">
                            <div class="ci-icon">
                                <i class="fa fa-mobile"></i>
                            </div>
                            <div class="ci-text">
                                <h5>Phone</h5>
                                <ul>
                                    <li>+2349157522382</li>
                                    <li>+2349093907715</li>
                                </ul>
                            </div>
                        </div>
                        <div class="ci-item">
                            <div class="ci-icon">
                                <i class="fa fa-headphones"></i>
                            </div>
                            <div class="ci-text">
                                <h5>Support</h5>
                                <p>Support.tochisco@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cs-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d735515.5813275519!2d-80.41163541934742!3d43.93644386501528!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882a55bbf3de23d7%3A0x3ada5af229b47375!2sMono%2C%20ON%2C%20Canada!5e0!3m2!1sen!2sbd!4v1583262687289!5m2!1sen!2sbd" height="450" style="border:0;" allowfullscreen=""></iframe>
        </div>
    </section>
    <!-- Contact Section End -->

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
            </div>
        </div>
    </footer>


@endsection
    <!-- Footer Section End -->

    <!-- Js Plugins -->
   