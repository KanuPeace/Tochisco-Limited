@extends('web.pages.layouts.app')

@section('content')


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section spad set-bg" data-setbg="img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h4>Property comparison</h4>
                        <div class="bt-option">
                            <a href="/index"><i class="fa fa-home"></i> Home</a>
                            <span>Property</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Property Comparison Section Begin -->
    <div class="property-comparison-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div class="pc-table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="type">Type</th>
                                    <th class="compare-item middle-item">
                                        <div class="title">Villa</div>
                                        <img src="img/property/comparison/comparison-1.jpg" alt="">
                                        <div>Unimont Aurum</div>
                                        <p><span class="icon_pin_alt"></span> Badlapur East, Beyond Thane</p>
                                    </th>
                                    <th class="compare-item right-item">
                                        <div class="title">Apartment</div>
                                        <img src="img/property/comparison/comparison-2.jpg" alt="">
                                        <div>GoldCrest Residency</div>
                                        <p><span class="icon_pin_alt"></span> 12 Pt at Shedung, Panvel, Raigarh, Navi Mumbai</p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="p-type">Status</td>
                                    <td>Rent</td>
                                    <td>Rent</td>
                                </tr>
                                <tr>
                                    <td class="p-type">Size</td>
                                    <td>520 sq ft</td>
                                    <td>450 sq ft</td>
                                </tr>
                                <tr>
                                    <td class="p-type">Rooms</td>
                                    <td>8</td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td class="p-type">Bedroom</td>
                                    <td>5</td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td class="p-type">Garages</td>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td class="p-type">Air conditioning</td>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td class="p-type">Garages</td>
                                    <td class="icon-check"><span class="icon_check_alt2"></span></td>
                                    <td class="icon-check"><span class="icon_check_alt2"></span></td>
                                </tr>
                                <tr>
                                    <td class="p-type">Air conditioning</td>
                                    <td class="icon-check"><span class="icon_check_alt2"></span></td>
                                    <td class="icon-check"><span class="icon_check_alt2"></span></td>
                                </tr>
                                <tr>
                                    <td class="p-type">Garages</td>
                                    <td class="icon-check"><span class="icon_check_alt2"></span></td>
                                    <td class="icon-check"><span class="icon_check_alt2"></span></td>
                                </tr>
                                <tr>
                                    <td class="p-type">Air conditioning</td>
                                    <td class="icon-check"><span class="icon_check_alt2"></span></td>
                                    <td class="icon-check"><span class="icon_check_alt2"></span></td>
                                </tr>
                                <tr>
                                    <td class="p-type">Balcony</td>
                                    <td class="icon-check"><span class="icon_check_alt2"></span></td>
                                    <td class="icon-close"><span class="icon_close_alt2"></span></td>
                                </tr>
                                <tr>
                                    <td class="p-type">Built-in kitchen</td>
                                    <td class="icon-check"><span class="icon_check_alt2"></span></td>
                                    <td class="icon-check"><span class="icon_check_alt2"></span></td>
                                </tr>
                                <tr>
                                    <td class="p-type">Dryer</td>
                                    <td class="icon-close"><span class="icon_close_alt2"></span></td>
                                    <td class="icon-check"><span class="icon_check_alt2"></span></td>
                                </tr>
                                <tr>
                                    <td class="p-type">Fireplace</td>
                                    <td class="icon-check"><span class="icon_check_alt2"></span></td>
                                    <td class="icon-check"><span class="icon_check_alt2"></span></td>
                                </tr>
                                <tr>
                                    <td class="p-type">Fully furnished</td>
                                    <td class="icon-check"><span class="icon_check_alt2"></span></td>
                                    <td class="icon-check"><span class="icon_check_alt2"></span></td>
                                </tr>
                                <tr>
                                    <td class="p-type">Gym</td>
                                    <td class="icon-check"><span class="icon_check_alt2"></span></td>
                                    <td class="icon-check"><span class="icon_check_alt2"></span></td>
                                </tr>
                                <tr>
                                    <td class="p-type">Heating</td>
                                    <td class="icon-check"><span class="icon_check_alt2"></span></td>
                                    <td class="icon-check"><span class="icon_check_alt2"></span></td>
                                </tr>
                                <tr>
                                    <td class="p-type">Pool</td>
                                    <td class="icon-check"><span class="icon_check_alt2"></span></td>
                                    <td class="icon-close"><span class="icon_close_alt2"></span></td>
                                </tr>
                                <tr>
                                    <td class="p-type">Storage</td>
                                    <td class="icon-close"><span class="icon_close_alt2"></span></td>
                                    <td class="icon-check"><span class="icon_check_alt2"></span></td>
                                </tr>
                                <tr>
                                    <td class="p-type">Washer</td>
                                    <td class="icon-close"><span class="icon_close_alt2"></span></td>
                                    <td class="icon-check"><span class="icon_check_alt2"></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Property Comparison Section End -->

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
                                <img src="img/f-logo.png" alt="">
                            </a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua ut aliquip ex ea</p>
                        <div class="fs-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
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
                            <li><a href="#">Register</a></li>
                            <li><a href="#">Login</a></li>
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

   