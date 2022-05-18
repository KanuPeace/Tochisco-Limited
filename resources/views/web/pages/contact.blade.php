@extends('web.pages.layouts.app',  ["meta_title" => "Contact"])

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section spad set-bg" data-setbg="{{ $web_source }}/web_assets/img/breadcrumb-contact-bg.jpg"
        style="background-image: url(&quot;img/breadcrumb-contact-bg.jpg&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h4>Contact Us</h4>
                        <div class="bt-option">
                            <a href="/"><i class="fa fa-home"></i> Home</a>
                            <span>Contact</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Form Section Begin -->
    <section class="contact-form-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cf-content">
                        <div class="cc-title">
                            <h4>Contact form</h4>
                            <p>Duis voluptatum. Id vis consequat consetetur dissentiet, ceteros commune perp <br>etua
                                mei et. Simul viderer facilisis egimus tractatos splendi.</p>
                            <span>
                                @include('notifications.flash_messages')

                            </span>
                        </div>
                        <form action="contact" class="cc-form" action="{{route('contact.store')}}" method="POST">
                          @csrf
                            <div class="group-input">
                                <input name="name" type="text" id="name" placeholder="Your name" required="">
                                <input name="email" type="text" id="email" placeholder="Your email" required="">
                                <input name="subject" type="text" id="subject" placeholder="Subject">
                            </div>
                            <textarea name="message" id="message" placeholder=" Your Message" required=""></textarea>
                            <button type="submit" id="form-submit" class="site-btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Form Section End -->

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
                                <p>Ajah,Lagos.</p>
                            </div>
                        </div>
                        <div class="ci-item">
                            <div class="ci-icon">
                                <i class="fa fa-mobile"></i>
                            </div>
                            <div class="ci-text">
                                <h5>Phone</h5>
                                <ul>
                                    <li>+2349093907715</li>
                                    <li>+2349157522382</li>
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
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d735515.5813275519!2d-80.41163541934742!3d43.93644386501528!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882a55bbf3de23d7%3A0x3ada5af229b47375!2sMono%2C%20ON%2C%20Canada!5e0!3m2!1sen!2sbd!4v1583262687289!5m2!1sen!2sbd"
                height="450" style="border:0;" allowfullscreen=""></iframe>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Footer Section Begin -->
    @include("web.pages.layouts.includes.footer")
    <!-- Footer Section End -->
@endsection

