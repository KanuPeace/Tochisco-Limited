<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Flairworlds Admin </title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ $web_source }}/web_assets/img/icon.png">
    <link href="{{ $admin_assets }}/assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="{{ $admin_assets }}/assets/js/loader.js"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ $admin_assets }}/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ $admin_assets }}/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ $admin_assets }}/plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="{{ $admin_assets }}/assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <link href="{{ $admin_assets }}/assets/css/dashboard/dash_2.css" rel="stylesheet" type="text/css" />
    <link href="{{ $admin_assets }}/assets/css/users/user-profile.css" rel="stylesheet" type="text/css" />

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link href="{{ $admin_assets }}/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ $admin_assets }}/assets/css/forms/theme-checkbox-radio.css">
    <link href="{{ $admin_assets }}/assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL CUSTOM STYLES -->
    <link href="{{ $admin_assets }}/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ $admin_assets }}/plugins/font-icons/fontawesome/css/regular.css">
    <link rel="stylesheet" href="{{ $admin_assets }}/plugins/font-icons/fontawesome/css/fontawesome.css">
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="{{ $admin_assets }}/plugins/dropify/dropify.min.css">
    <link href="{{ $admin_assets }}/assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
    <link href="{{ $admin_assets }}/assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->


    <!-- suneditor -->
    <link href="{{ $admin_assets }}/plugins/suneditor/css/suneditor.min.css" rel="stylesheet">
    <!-- codeMirror -->
    <link rel="stylesheet" href="{{ $admin_assets }}/plugins/suneditor/css/codemirror.css">
    <!-- KaTeX -->
    <link rel="stylesheet" href="{{ $admin_assets }}/plugins/suneditor/css/katex.min.css">


    @yield("style")

    <style>
        .feather-icon .icon-section {
            padding: 30px;
        }

        .feather-icon .icon-section h4 {
            color: #3b3f5c;
            font-size: 17px;
            font-weight: 600;
            margin: 0;
            margin-bottom: 16px;
        }

        .feather-icon .icon-content-container {
            padding: 0 16px;
            width: 86%;
            margin: 0 auto;
            border: 1px solid #bfc9d4;
            border-radius: 6px;
        }

        .feather-icon .icon-section p.fs-text {
            padding-bottom: 30px;
            margin-bottom: 30px;
        }

        .feather-icon .icon-container {
            cursor: pointer;
        }

        .feather-icon .icon-container svg {
            color: #3b3f5c;
            margin-right: 6px;
            vertical-align: middle;
            width: 20px;
            height: 20px;
            fill: rgba(0, 23, 55, 0.08);
        }

        .feather-icon .icon-container:hover svg {
            color: #4361ee;
            fill: rgba(27, 85, 226, 0.23921568627450981);
        }

        .feather-icon .icon-container span {
            display: none;
        }

        .feather-icon .icon-container:hover span {
            color: #4361ee;
        }

        .feather-icon .icon-link {
            color: #4361ee;
            font-weight: 600;
            font-size: 14px;
        }


        /*FAB*/
        .fontawesome .icon-section {
            padding: 30px;
        }

        .fontawesome .icon-section h4 {
            color: #3b3f5c;
            font-size: 17px;
            font-weight: 600;
            margin: 0;
            margin-bottom: 16px;
        }

        .fontawesome .icon-content-container {
            padding: 0 16px;
            width: 86%;
            margin: 0 auto;
            border: 1px solid #bfc9d4;
            border-radius: 6px;
        }

        .fontawesome .icon-section p.fs-text {
            padding-bottom: 30px;
            margin-bottom: 30px;
        }

        .fontawesome .icon-container {
            cursor: pointer;
        }

        .fontawesome .icon-container i {
            font-size: 20px;
            color: #3b3f5c;
            vertical-align: middle;
            margin-right: 10px;
        }

        .fontawesome .icon-container:hover i {
            color: #4361ee;
        }

        .fontawesome .icon-container span {
            color: #888ea8;
            display: none;
        }

        .fontawesome .icon-container:hover span {
            color: #4361ee;
        }

        .fontawesome .icon-link {
            color: #4361ee;
            font-weight: 600;
            font-size: 14px;
        }

        .fr {
            float: right;
        }

    </style>

</head>

<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->

    @include("admin.layouts.includes.navbar")
    @include("admin.layouts.includes.subheader")


    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        @include("dashboards.admin.layouts.includes.sidebar")

        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing mb-4">

                <div class="layout-top-spacing">
                    @include("notifications.flash_messages")
                    @yield("content")

                </div>
            </div>
            @include("admin.layouts.includes.footer")

        </div>
    </div>
