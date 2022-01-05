@extends('web.pages.layouts.app')

@section('content')


    <!-- Property Details Section Begin -->
    <section class="property-details-section">
        <div class="property-pic-slider owl-carousel">
            <div class="ps-item">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-12 p-0">
                                    <div class="ps-item-inner large-item set-bg" data-setbg="web_assets/img/property/slider/ps-1.jpg"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-sm-6 p-0">
                                    <div class="ps-item-inner set-bg" data-setbg="web_assets/img/property/slider/ps-2.jpg"></div>
                                </div>
                                <div class="col-sm-6 p-0">
                                    <div class="ps-item-inner set-bg" data-setbg="web_assets/img/property/slider/ps-2.jpg"></div>
                                </div>
                                <div class="col-sm-6 p-0">
                                    <div class="ps-item-inner set-bg" data-setbg="web_assets/img/property/slider/ps-4.jpg"></div>
                                </div>
                                <div class="col-sm-6 p-0">
                                    <div class="ps-item-inner set-bg" data-setbg="web_assets/img/property/slider/ps-5.jpg"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ps-item">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-12 p-0">
                                    <div class="ps-item-inner large-item set-bg" data-setbg="web_assets/img/property/slider/ps-1.jpg"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-sm-6 p-0">
                                    <div class="ps-item-inner set-bg" data-setbg="web_assets/img/property/slider/ps-2.jpg"></div>
                                </div>
                                <div class="col-sm-6 p-0">
                                    <div class="ps-item-inner set-bg" data-setbg="web_assets/img/property/slider/ps-2.jpg"></div>
                                </div>
                                <div class="col-sm-6 p-0">
                                    <div class="ps-item-inner set-bg" data-setbg="web_assets/img/property/slider/ps-4.jpg"></div>
                                </div>
                                <div class="col-sm-6 p-0">
                                    <div class="ps-item-inner set-bg" data-setbg="web_assets/img/property/slider/ps-5.jpg"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="pd-text">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="pd-title">
                                    <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                                    <div class="label">For rent</div>
                                    <div class="pt-price">$ 289.0<span>/month</span></div>
                                    <h3>Home in Merrick Way</h3>
                                    <p><span class="icon_pin_alt"></span> 3 Middle Winchendon Rd, Rindge, NH 03463</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="pd-social">
                                    <a href="#"><i class="fa fa-mail-forward"></i></a>
                                    <a href="#"><i class="fa fa-send"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-mail-forward"></i></a>
                                    <a href="#"><i class="fa fa-cloud-download"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="pd-board">
                            <div class="tab-board">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Overview</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Amenities</a>
                                    </li>
                                </ul><!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                        <div class="tab-details">
                                            <ul class="left-table">
                                                <li>
                                                    <span class="type-name">Property Type</span>
                                                    <span class="type-value">House</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Property ID</span>
                                                    <span class="type-value">#219</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Price</span>
                                                    <span class="type-value">$ 289.0/mounth</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Year Built</span>
                                                    <span class="type-value">2019</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Contract type</span>
                                                    <span class="type-value">Rent</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Agent</span>
                                                    <span class="type-value">Ashton Kutcher</span>
                                                </li>
                                            </ul>
                                            <ul class="right-table">
                                                <li>
                                                    <span class="type-name">Home Area</span>
                                                    <span class="type-value">1200 sqft</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Rooms</span>
                                                    <span class="type-value">9</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Bedrooms</span>
                                                    <span class="type-value">4</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Bathrooms</span>
                                                    <span class="type-value">3</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Garages</span>
                                                    <span class="type-value">2</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Parking lots</span>
                                                    <span class="type-value">2</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-2" role="tabpanel">
                                        <div class="tab-desc">
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dolor itaque facere consequatur, dignissimos minus adipisci ipsam repudiandae nisi illum provident, natus quidem vero? Quaerat ducimus sequi praesentium commodi, consectetur corporis eos sit perspiciatis, quae sed officia error, iure quasi.</p>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dolor itaque facere consequatur, dignissimos minus adipisci ipsam repudiandae nisi illum provident, natus quidem vero? Quaerat ducimus sequi praesentium commodi, consectetur corporis eos sit perspiciatis, quae sed officia error, iure quasi.</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-3" role="tabpanel">
                                        <div class="tab-details">
                                            <ul class="left-table">
                                                <li>
                                                    <span class="type-name">Property Type</span>
                                                    <span class="type-value">House</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Property ID</span>
                                                    <span class="type-value">#219</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Price</span>
                                                    <span class="type-value">$ 289.0/mounth</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Year Built</span>
                                                    <span class="type-value">2019</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Contract type</span>
                                                    <span class="type-value">Rent</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Agent</span>
                                                    <span class="type-value">Ashton Kutcher</span>
                                                </li>
                                            </ul>
                                            <ul class="right-table">
                                                <li>
                                                    <span class="type-name">Home Area</span>
                                                    <span class="type-value">1200 sqft</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Rooms</span>
                                                    <span class="type-value">9</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Bedrooms</span>
                                                    <span class="type-value">4</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Bathrooms</span>
                                                    <span class="type-value">3</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Garages</span>
                                                    <span class="type-value">2</span>
                                                </li>
                                                <li>
                                                    <span class="type-name">Parking lots</span>
                                                    <span class="type-value">2</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pd-widget">
                            <h4>Floor plans</h4>
                            <img src="web_assets/img/property/details/floor-plan.jpg" alt="">
                        </div>
                        <div class="pd-widget">
                            <h4>Floor plans</h4>
                            <div class="map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d735515.5813275519!2d-80.41163541934742!3d43.93644386501528!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882a55bbf3de23d7%3A0x3ada5af229b47375!2sMono%2C%20ON%2C%20Canada!5e0!3m2!1sen!2sbd!4v1583262687289!5m2!1sen!2sbd" height="350" style="border:0;" allowfullscreen=""></iframe>
                            </div>
                            <div class="map-location">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="ml-item">
                                            <div class="ml-single-item">
                                                <h6>Hospital <span>( <i class="fa fa-location-arrow"></i> 5 km )</span></h6>
                                                <p>Portland Ave Rochester, NY 14621</p>
                                            </div>
                                            <div class="ml-single-item">
                                                <h6>Schools <span>( <i class="fa fa-location-arrow"></i> 8 km )</span></h6>
                                                <p>Cragin Elementary School</p>
                                            </div>
                                            <div class="ml-single-item">
                                                <h6>Store <span>( <i class="fa fa-location-arrow"></i> 2 km )</span></h6>
                                                <p>Exceptional Shoes & Clothing</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="ml-item">
                                            <div class="ml-single-item">
                                                <h6>Laundry <span>( <i class="fa fa-location-arrow"></i> 3 km )</span></h6>
                                                <p>Besst at laundry</p>
                                            </div>
                                            <div class="ml-single-item">
                                                <h6>Health <span>( <i class="fa fa-location-arrow"></i> 5 km )</span></h6>
                                                <p>Boomerang Barber & Beauty</p>
                                            </div>
                                            <div class="ml-single-item">
                                                <h6>Health <span>( <i class="fa fa-location-arrow"></i> 5 km )</span></h6>
                                                <p>Boomerang Barber & Beauty</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pd-widget">
                            <h4>Agent</h4>
                            <div class="pd-agent">
                                <div class="agent-pic">
                                    <img src="web_assets/img/property/details/agent.jpg" alt="">
                                </div>
                                <div class="agent-text">
                                    <div class="at-title">
                                        <h6>Mr. Charles Kanu</h6>
                                        <span>Founder & CEO</span>
                                        <a href="{{ route('profile')}}" class="primary-btn">VIew profile</a>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipis cing elit, eiusmod tempor incididunt</p>
                                    <div class="at-option">
                                        <div class="at-number">123-455-688</div>
                                        <div class="at-social">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-envelope-o"></i></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="pd-widget">
                            <h4>02 reviews</h4>
                            <div class="pd-review">
                                <div class="pr-item">
                                    <div class="pr-avatar">
                                        <div class="pr-pic">
                                            <img src="web_assets/img/property/details/review/review-1.jpg" alt="">
                                        </div>
                                        <div class="pr-text">
                                            <h6>Brandon Kelley</h6>
                                            <span>15 Aug 2017</span>
                                            <div class="pr-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam.</p>
                                </div>
                                <div class="pr-item">
                                    <div class="pr-avatar">
                                        <div class="pr-pic">
                                            <img src="web_assets/img/property/details/review/review-2.jpg" alt="">
                                        </div>
                                        <div class="pr-text">
                                            <h6>Matthew Nelson</h6>
                                            <span>15 Aug 2017</span>
                                            <div class="pr-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam.</p>
                                </div>
                            </div>
                        </div>
                        <div class="pd-widget">
                            <h4>YOur Rating</h4>
                            <form action="#" class="review-form">
                                <div class="group-input">
                                    <input type="text" placeholder="Name">
                                    <input type="text" placeholder="Email">
                                    <input type="text" placeholder="Website">
                                </div>
                                <textarea placeholder="Messages"></textarea>
                                <div class="rating">
                                    <span>Your Rating:</span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <button type="submit" class="site-btn">send messages</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="property-sidebar">
                        <div class="single-sidebar">
                            <div class="section-title sidebar-title">
                                <h5>Top agent</h5>
                            </div>
                            <div class="top-agent">
                                <div class="ta-item">
                                    <div class="ta-pic set-bg" data-setbg="web_assets/img/property/details/sidebar/ta-1.jpg"></div>
                                    <div class="ta-text">
                                        <h6><a href="#">Ashton Kutcher</a></h6>
                                        <span>Team Leader</span>
                                        <div class="ta-num">123-455-688</div>
                                    </div>
                                </div>
                                <div class="ta-item">
                                    <div class="ta-pic set-bg" data-setbg="web_assets/img/property/details/sidebar/ta-2.jpg"></div>
                                    <div class="ta-text">
                                        <h6><a href="#">Ashton Kutcher</a></h6>
                                        <span>Team Leader</span>
                                        <div class="ta-num">123-455-688</div>
                                    </div>
                                </div>
                                <div class="ta-item">
                                    <div class="ta-pic set-bg" data-setbg="web_assets/img/property/details/sidebar/ta-3.jpg"></div>
                                    <div class="ta-text">
                                        <h6><a href="#">Ashton Kutcher</a></h6>
                                        <span>Team Leader</span>
                                        <div class="ta-num">123-455-688</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-sidebar slider-op">
                            <div class="section-title sidebar-title">
                                <h5>Featural categories</h5>
                            </div>
                            <div class="sf-slider owl-carousel">
                                <div class="sf-item set-bg" data-setbg="web_assets/img/categories/cat-1.jpg">
                                    <div class="sf-text">
                                        <h5>House</h5>
                                        <span>38 property</span>
                                    </div>
                                </div>
                                <div class="sf-item set-bg" data-setbg="web_assets/img/categories/cat-2.jpg">
                                    <div class="sf-text">
                                        <h5>Apartment</h5>
                                        <span>238 property</span>
                                    </div>
                                </div>
                                <div class="sf-item set-bg" data-setbg="iweb_assets/img/categories/cat-3.jpg">
                                    <div class="sf-text">
                                        <h5>Villa</h5>
                                        <span>230 property</span>
                                    </div>
                                </div>
                                <div class="sf-item set-bg" data-setbg="web_assets/img/categories/cat-4.jpg">
                                    <div class="sf-text">
                                        <h5>Restaurent</h5>
                                        <span>38 property</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-sidebar">
                            <div class="section-title sidebar-title">
                                <h5>mortgage calculator</h5>
                            </div>
                            <form action="#" class="calculator-form">
                                <div class="filter-input">
                                    <p>Sale Price</p>
                                    <input type="text" placeholder="$">
                                </div>
                                <div class="filter-input">
                                    <p>Precent Down</p>
                                    <input type="text" placeholder="$">
                                </div>
                                <div class="filter-input">
                                    <p>Term(year)</p>
                                    <input type="text" placeholder="Year">
                                </div>
                                <div class="filter-input">
                                    <p>Interest Rate in %</p>
                                    <input type="text" placeholder="%">
                                </div>
                                <button type="submit" class="site-btn">Calculate</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Property Details Section End -->

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
                                <p>160 Pennsylvania Ave NW, Washington, Castle, PA 16101-5161</p>
                            </div>
                        </div>
                        <div class="ci-item">
                            <div class="ci-icon">
                                <i class="fa fa-mobile"></i>
                            </div>
                            <div class="ci-text">
                                <h5>Phone</h5>
                                <ul>
                                    <li>125-711-811</li>
                                    <li>125-668-886</li>
                                </ul>
                            </div>
                        </div>
                        <div class="ci-item">
                            <div class="ci-icon">
                                <i class="fa fa-headphones"></i>
                            </div>
                            <div class="ci-text">
                                <h5>Support</h5>
                                <p>Support.aler@gmail.com</p>
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
    