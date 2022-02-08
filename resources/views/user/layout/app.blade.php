<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from axilthemes.com/demo/template/blogar/post-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Jun 2021 10:39:24 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Mepress || Blogar - Personal Blog Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    @include("web.layouts.includes.style")


    <style>
        .popup-desktopmenu-area {
            border-radius: 20px;
            box-shadow: #444;
            padding: 30px;
            text-align: left;
            margin-left: 20px;
            height: 100vh;
            width: 100%;
        }

        .popup-desktopmenu-area li {
            border-bottom: 1px solid #929394;
            margin: 0;
            padding: 15px 0;
        }

        .popup-desktopmenu-area ul {
            list-style-type: none;
        }

        .scrollable-area {
            height: 100vh;
            overflow-x: hidden;
            overflow-y: scroll;
        }

        .scrollable-area::-webkit-scrollbar {
            width: 0px;
            display: none;
        }

        .scrollable-area::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
        }

        .scrollable-area::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
        }

        .sticky-top {
            position: fixed;
            width: 100%;
        }

        .header-content {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .font-large-2 {
            font-size: 40px;
        }

        .myAvatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            display: inline-block;
        }

        .modal-footer {
            flex-wrap: unset;
        }


        .myAvatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            display: inline-block;
        }

        .modal-footer {
            flex-wrap: unset;
        }

        select.form-control {
            border: 0 none;
            border-radius: 4px;
            height: 50px;
            font-size: var(--font-size-b2);
            padding: 0 20px;
            background-color: var(--color-lightest);
            border: 1px solid transparent;
        }

    </style>

    <style>
        .color-card-2 {
            background: #FDFEFF;
        }



        .title-2 {
            color: #2D354A;
            font-family: roboto;
            weight: 300;
        }


        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }



        .b {
            color: #2F3B4B;
        }

        hr {
            border-color: #7C8097;
            width: 90%;
            margin-top: 24px;
            margin-bottom: 24px;
        }

        .hr-2 {
            border-color: #E4E8ED;
        }


        .content {
            display: center;
        }

        * {
            font-family: Roboto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .top {
            margin-top: 16px;
        }

        .color-a {
            background: linear-gradient(to top right, #8162CE, #F54BA5);
        }

        .color-b {
            background: linear-gradient(to bottom right, #C90A6D, #FF48A0);
        }

        .color-c {
            background: linear-gradient(to bottom right, #5E5AEC, #3F9EFC);
        }

        .color-d {
            background: linear-gradient(to bottom right, #6452E9, #639FF9);
        }


        .mybtn {
            border: none;
            height: 40px;
            color: #ffffff;
            width: 35%;
            font-size: 16px;
            border-radius: 30px;
            box-shadow: 0 13px 26px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.16);
        }

        .mybtn:hover {
            border: solid 1px #DA59B1;
            height: 40px;
            font-size: 16px;
            font-family: Roboto;
            color: #DA59B1;
            background: #ffffff;
            width: 35%;
            border-color: linear-gradient(to top right, #8162CE, #F54BA5);
            ;
            border-radius: 30px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.16);
        }

        .mybtn2 {
            border: solid 1px #DA59B1;
            height: 40px;
            font-size: 16px;
            font-family: Roboto;
            color: #DA59B1;
            background: #ffffff;
            width: 35%;
            border-color: linear-gradient(to top right, #8162CE, #F54BA5);
            ;
            border-radius: 30px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.16);
        }

        .circule {
            border-radius: 50%;
            border: none;
            height: 60px;
            width: 60px;
            color: #ffffff;
            box-shadow: 0 13px 26px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.16);

        }

        2 .up {
            margin-top: 40px;
        }

        .img {
            width: 280px;
        }


        /*cards*/
        body {
            background: #e2e1e0;
            text-align: center;
        }

        .profile_card {
            border-radius: 5px;
            display: inline-block;
            height: 600px;
            position: relative;
            width: 90%;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.16), 0 12px 13px rgba(0, 0, 0, 0.16);
            transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
        }

        .profile_item_card {
            border-radius: 5px;
            display: inline-block;
            width: 100%;
            position: relative;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.16), 0 12px 13px rgba(0, 0, 0, 0.16);
            transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
        }

        .profile {
            border-radius: 100%;
            width: 132px;
            height: 128px;
        }

        .element-animation {
            animation: animationFrames ease 2s;
            animation-iteration-count: 2;
            transform-origin: 50% 50%;
            animation-fill-mode: forwards;
            /*when the spec is finished*/
            -webkit-animation: animationFrames ease 1.5s;
            -webkit-animation-iteration-count: 1;
            -webkit-transform-origin: 50% 50%;
            -webkit-animation-fill-mode: forwards;
            /*Chrome 16+, Safari 4+*/
        }

        .btn{
            height: 40px;
    font-size: 16px;
        }

    </style>



</head>

<body>
    <div class="main-wrapper">
        <div class="mouse-cursor cursor-outer"></div>
        <div class="mouse-cursor cursor-inner"></div>

        @include("web.layouts.includes.theme_switcher")


        <!-- Start Header -->
        <header class="header axil-header header-light header-sticky sticky-top header-with-shadow">
            <div class="header-wrap">
                <div class=" row justify-content-between align-items-center">

                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-3 col-12 d-none d-md-block" style="height: 75px !important">
                        @include("web.layouts.includes.logo_section" , ["classes" => "header-content"])
                    </div>


                    <div class="col-xl-6 col-lg-8 col-md-8 col-sm-9 col-12">
                        <div class="header-search">
                            <!-- Start Hamburger Menu  -->
                            <div class="hamburger-menu d-block d-xl-none float-right">
                                <div class="hamburger-inner">
                                    <div class="icon"><i class="fal fa-bars"></i></div>
                                </div>
                            </div>
                            <!-- End Hamburger Menu  -->
                            <div class="float-right dashboard_header">
                                @include("web.layouts.includes.profile_dropdown")
                            </div>

                            <div class="float-right">
                                <span class="pt-3">{{ auth()->user()->activePlan()->plan_name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Start Header -->



        <!-- Start Mobile Menu Area  -->
        @include("dashboards.user.layout.includes.mobile_menu")
        <!-- End Mobile Menu Area  -->

        <!-- Start Post List Wrapper  -->
        <div class="axil-post-list-area axil-section-gap bg-color-white mt-5" style="margin-top: 300px">
            <div class="row">
                <!-- Desktop sidebar -->
                @include("dashboards.user.layout.includes.sidebar")
                <!-- Start main body -->
                <div class="col-xl-9 ">
                    <div class="container">
                        @include("notifications.flash_messages")
                        @yield("content")
                    </div>

                </div>
            </div>
        </div>
        <!-- End Post List Wrapper  -->
        <!-- Start Footer Area  -->
        @include("dashboards.user.layout.includes.footer")
        <!-- End Footer Area  -->

        <!-- Start Back To Top  -->
        <a id="backto-top"></a>
        <!-- End Back To Top  -->

    </div>

    <!-- JS
    ============================================ -->
    @include("web.layouts.includes.scripts")
</body>

</html>
