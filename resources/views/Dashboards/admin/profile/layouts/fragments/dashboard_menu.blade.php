<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>



    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="mt-2">
                @include('notifications.flash_messages')
            </div>

            <div class="row layout-top-spacing">

                <header class="masthead">
                    <div class="container px-4 px-lg-5 h-100">
                        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                            <div class="col-lg-8 align-self-end">
                                <h1 class="text-white font-weight-bold">WELCOME! Download and enjoy your favourite music and videos</h1>
                                <hr class="divider" />
                            </div>
                            <div class="col-lg-8 align-self-baseline">
                                <p class="text-white-75 mb-5">Download and enjoy your favourite music and videos</p>
                                <a class="btn btn-primary btn-xl" href="{{route('media.about')}}">Find Out More</a>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- About-->
                <section class="page-section bg-primary" id="about">
                    <div class="container px-4 px-lg-5">
                        <div class="row gx-4 gx-lg-5 justify-content-center">
                            <div class="col-lg-8 text-center">
                                <h2 class="text-white mt-0">We've got what you need!</h2>
                                <hr class="divider divider-light" />
                                <p class="text-white-75 mb-4"> Enjoy the best and recent music and videos</p>
                                <a class="btn btn-light btn-xl" href="{{route('media.posts')}}">Get Started!</a>
                            </div>
                        </div>
                    </div>
                </section>
                {{-- {{-- <!-- Services-->
                <section class="page-section" id="services">
                    <div class="container px-4 px-lg-5">
                        <h2 class="text-center mt-0">At Your Service</h2>
                        <hr class="divider" />
                        <div class="row gx-4 gx-lg-5">
                            <div class="col-lg-3 col-md-6 text-center">
                                <div class="mt-5">
                                    <div class="mb-2"><i class="bi-gem fs-1 text-primary"></i></div>
                                    <h3 class="h4 mb-2">Sturdy Themes</h3>
                                    <p class="text-muted mb-0">Our themes are updated regularly to keep them bug free!</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 text-center">
                                <div class="mt-5">
                                    <div class="mb-2"><i class="bi-laptop fs-1 text-primary"></i></div>
                                    <h3 class="h4 mb-2">Up to Date</h3>
                                    <p class="text-muted mb-0">All dependencies are kept current to keep things fresh.</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 text-center">
                                <div class="mt-5">
                                    <div class="mb-2"><i class="bi-globe fs-1 text-primary"></i></div>
                                    <h3 class="h4 mb-2">Ready to Publish</h3>
                                    <p class="text-muted mb-0">You can use this design as is, or you can make changes!</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 text-center">
                                <div class="mt-5">
                                    <div class="mb-2"><i class="bi-heart fs-1 text-primary"></i></div>
                                    <h3 class="h4 mb-2">Made with Love</h3>
                                    <p class="text-muted mb-0">Is it really open source if it's not made with love?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Portfolio-->
                <div id="portfolio">
                    <div class="container-fluid p-0">
                        <div class="row g-0">
                            <div class="col-lg-4 col-sm-6">
                                <a class="portfolio-box" href="assets/img/portfolio/fullsize/1.jpg" title="Project Name">
                                    <img class="img-fluid" src="assets/img/portfolio/thumbnails/1.jpg" alt="..." />
                                    <div class="portfolio-box-caption">
                                        <div class="project-category text-white-50">Category</div>
                                        <div class="project-name">Project Name</div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <a class="portfolio-box" href="assets/img/portfolio/fullsize/2.jpg" title="Project Name">
                                    <img class="img-fluid" src="assets/img/portfolio/thumbnails/2.jpg" alt="..." />
                                    <div class="portfolio-box-caption">
                                        <div class="project-category text-white-50">Category</div>
                                        <div class="project-name">Project Name</div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <a class="portfolio-box" href="assets/img/portfolio/fullsize/3.jpg" title="Project Name">
                                    <img class="img-fluid" src="assets/img/portfolio/thumbnails/3.jpg" alt="..." />
                                    <div class="portfolio-box-caption">
                                        <div class="project-category text-white-50">Category</div>
                                        <div class="project-name">Project Name</div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <a class="portfolio-box" href="assets/img/portfolio/fullsize/4.jpg" title="Project Name">
                                    <img class="img-fluid" src="assets/img/portfolio/thumbnails/4.jpg" alt="..." />
                                    <div class="portfolio-box-caption">
                                        <div class="project-category text-white-50">Category</div>
                                        <div class="project-name">Project Name</div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <a class="portfolio-box" href="assets/img/portfolio/fullsize/5.jpg" title="Project Name">
                                    <img class="img-fluid" src="assets/img/portfolio/thumbnails/5.jpg" alt="..." />
                                    <div class="portfolio-box-caption">
                                        <div class="project-category text-white-50">Category</div>
                                        <div class="project-name">Project Name</div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <a class="portfolio-box" href="assets/img/portfolio/fullsize/6.jpg" title="Project Name">
                                    <img class="img-fluid" src="assets/img/portfolio/thumbnails/6.jpg" alt="..." />
                                    <div class="portfolio-box-caption p-3">
                                        <div class="project-category text-white-50">Category</div>
                                        <div class="project-name">Project Name</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Call to action-->
                <section class="page-section bg-dark text-white">
                    <div class="container px-4 px-lg-5 text-center">
                        <h2 class="mb-4">Download music and videos</h2>
                        <a class="btn btn-light btn-xl" href="/">Download Now!</a>
                    </div>
                </section>

            </div>

        </div> --}}

        {{-- <div class="footer-wrapper"> --}}
            {{-- <div class="footer-section f-section-1"> --}}
                {{-- <p class="">Copyright © 2021 <a target="_blank" href="https://designreset.com/">DesignReset</a>, All rights reserved.</p> --}}
            {{-- </div> --}}
            {{-- <div class="footer-section f-section-2"> --}}
                {{-- <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"> --}}
                        {{-- <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path> --}}
                    {{-- </svg></p> --}}
            {{-- </div>
        </div> --}}
    </div>
    <!--  END CONTENT PART  --> --}}

</div>
</div>