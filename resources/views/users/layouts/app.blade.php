<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designreset.com/cork/ltr/demo4/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Apr 2021 16:22:18 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title> Tochisco ||{{ Auth::user()->name }} </title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ $web_source }}/web_assets/img/icon.png">
    <link href="assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/loader.js"></script>


    <!-- clone bootstrap -->

    <link rel="icon" type="image/x-icon" href="{{ $admin_assets }}/assets/img/m-icon.jpg" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
        rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ $admin_assets }}/css/styles.css" rel="stylesheet" />

    <!-- end copy bootstrap -->
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ $admin_assets }}/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ $admin_assets }}/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ $admin_assets }}/plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="{{ $admin_assets }}/assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ $admin_assets }}/assets/css/users/user-profile.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->

    <!-- earnings css -->

    <link href="{{ $admin_assets }}/plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="{{ $admin_assets }}/assets/css/dashboard/dash_2.css" rel="stylesheet" type="text/css" />

    <!-- error css -->

    <link href="{{ $admin_assets }}/assets/css/pages/error/style-503.css" rel="stylesheet" type="text/css" />

    <style>
        .img {
            width: 280px;
        }

        .profile {
            border-radius: 100%;
            width: 100px;
            height: 100px;
        }


        /*cards*/
        body {
            background: #e2e1e0;
            text-align: center;
        }

    </style>

</head>

<body>
    @include('users.layouts.fragments.topnav')
    @include('users.layouts.fragments.sidebar')

    @yield('content')


    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ $admin_assets }}/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="{{ $admin_assets }}/bootstrap/js/popper.min.js"></script>
    <script src="{{ $admin_assets }}/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ $admin_assets }}/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ $admin_assets }}/assets/js/app.js"></script>
    <script src="web_assets/js/main.js"></script>

    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="assets/js/custom.js"></script>
    <script>
        $(document).ready(function() {
        $(".bg_image").each(function(index, element) {
                element = $(element);
                element.attr("src", element.attr("data-image"))
                element.csss / background - imags / , `url(${element.attr("data-image")}`); element.csss /
            widts / , element.attr("data-width"));
        element.csss / heighs / , element.attr("data-height"));
        })
        })
    </script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="plugins/apex/apexcharts.min.js"></script>
    <script src="assets/js/dashboard/dash_1.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo4/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Apr 2021 16:28:10 GMT -->

</html>
