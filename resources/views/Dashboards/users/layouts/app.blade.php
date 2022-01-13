<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designreset.com/cork/ltr/demo4/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Apr 2021 16:30:40 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Tochisco</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ $web_source }}/web_assets/img/icon.png">
    <link href="{{$admin_assets}}/assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="{{$admin_assets}}/assets/js/loader.js"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{$admin_assets}}/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{$admin_assets}}/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{$admin_assets}}/plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="{{$admin_assets}}/assets/css/dashboard/dash_2.css" rel="stylesheet" type="text/css" />
    <link href="{{$admin_assets}}/assets/css/users/user-profile.css" rel="stylesheet" type="text/css" />

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>

<body>

@yield('contents')

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{$admin_assets}}/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="{{$admin_assets}}/bootstrap/js/popper.min.js"></script>
    <script src="{{$admin_assets}}/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{$admin_assets}}/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{$admin_assets}}/assets/js/app.js"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{$admin_assets}}/assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{$admin_assets}}/plugins/apex/apexcharts.min.js"></script>
    <script src="{{$admin_assets}}/assets/js/dashboard/dash_2.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

</body>

<!-- Mirrored from designreset.com/cork/ltr/demo4/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Apr 2021 16:30:51 GMT -->

</html>