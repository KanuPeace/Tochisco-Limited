@extends('users.layouts.app')

@section('content')



<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>


    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">

                <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4 mr-auto mt-5 text-md-left text-center">
                                <a href="index.html" class="ml-md-5">
                                    <img src="{{$admin_assets}}/assets/img/m-icon.jpg" alt="logo">

                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid error-content">
                        <div class="">
                            <h1 class="error-number">503</h1>
                            <p class="mini-text">Ooops!</p>
                            <p class="error-text">
                                <b class="text-danger"> We are sorry, You have reach Your daily limit.
                                    Come back tomorrow for more</b>
                            </p>
                            <a href="{{route('admin.dashboard')}}" class="btn btn-secondary mt-5">Go Back</a>
                        </div>
                    </div>
                </div>


            </div>

        </div>

        <div class="footer-wrapper">
            <div class="footer-section f-section-1">
                <p class="">Copyright © 2021 , All rights reserved.</p>
            </div>

        </div>
    </div>
    <!--  END CONTENT PART  -->
</div>

@endsection