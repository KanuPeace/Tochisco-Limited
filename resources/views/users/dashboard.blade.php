@extends('users.layouts.app')

@section('content')


<div class="mt-2">
    @include('notifications.flash_messages')
</div>

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

                {{-- <header class="masthead">
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
                </header> --}}
                <!-- About-->
                {{-- <section class="page-section bg-primary" id="about">
                    <div class="container px-4 px-lg-5">
                        <div class="row gx-4 gx-lg-5 justify-content-center">
                            <div class="col-lg-8 text-center">
                                <h2 class="text-white mt-0">We've got what you need!</h2>
                                <hr class="divider divider-light" />
                                <p class="text-white-75 mb-4"> Enjoy the best and recent music and videos </p>
                                <a class="btn btn-light btn-xl" href="{{route('media.posts')}}">Get Started!</a>
                            </div>
                        </div>
                    </div>
                </section> --}}
                <!-- Services-->
                {{-- <section class="page-section" id="services">
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
                </section> --}}
               
            </div>

        </div>

    </div>
    <!--  END CONTENT PART  -->

</div>
</div>

@endsection