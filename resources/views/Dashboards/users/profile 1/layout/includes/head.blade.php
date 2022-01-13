<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ isset($meta_title) ? "$meta_title - " : ""}}Flairbo Marketplace</title>
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="sanctum_auth_token" content="{{ $sanctum_auth_token }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="{{ $web_source }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ $web_source }}/css/normalize.css">
    <link rel="stylesheet" href="{{ $web_source }}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ $web_source }}/css/icomoon.css">
    <link rel="stylesheet" href="{{ $web_source }}/css/transitions.css">
    <link rel="stylesheet" href="{{ $web_source }}/css/flags.css">
    <link rel="stylesheet" href="{{ $web_source }}/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ $web_source }}/css/prettyPhoto.css">
    <link rel="stylesheet" href="{{ $web_source }}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{ $web_source }}/css/scrollbar.css">
    <link rel="stylesheet" href="{{ $web_source }}/css/chartist.css">
    <link rel="stylesheet" href="{{ $web_source }}/css/main.css">
    <link rel="stylesheet" href="{{ $web_source }}/css/dashboard.css">
    <link rel="stylesheet" href="{{ $web_source }}/css/color.css">
    <link rel="stylesheet" href="{{ $web_source }}/css/responsive.css">
    <link rel="stylesheet" href="{{ $web_source }}/css/dbresponsive.css">
    <link rel="stylesheet" href="{{ $web_source }}/plugins/dropzone/dropzone.min.css">
    <script src="{{ $web_source }}/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

    <!-- suneditor -->
    <link href="{{ $web_source }}/js/suneditor/css/suneditor.min.css" rel="stylesheet">
    <!-- codeMirror -->
    <link rel="stylesheet" href="{{ $web_source }}/js/suneditor/css/codemirror.css">
    <!-- KaTeX -->
    <link rel="stylesheet" href="{{ $web_source }}/js/suneditor/css/katex.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">


    <style>
        .mb-2 {
            margin-bottom: 20px;
        }

        .mb-5 {
            margin-bottom: 80px;
        }

        .text-dark {
            color: black;
        }


        .mt-2 {
            margin-top: 20px;
        }

        .mb-1 {
            margin-bottom: 10px;
        }

        .mt-1 {
            margin-top: 10px;
        }

        .d-none {
            display: none !important;
        }

        .pagination>.active>span {
            background-color: green !important;
            border-color: green !important;
        }

        .img-fluid {
            max-height: 100%;
            width: -webkit-fill-available;
        }

        body h1,
        body h2,
        body h3,
        body h4,
        body h5,
        body h6 {
            text-transform: none;
        }


        .glyphicon-refresh-animate {
            -animation: spin .7s infinite linear;
            -webkit-animation: spin2 .7s infinite linear;
            margin-right: 10px;
        }

        @-webkit-keyframes spin2 {
            from {
                -webkit-transform: rotate(0deg);
            }

            to {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            from {
                transform: scale(1) rotate(0deg);
            }

            to {
                transform: scale(1) rotate(360deg);
            }
        }

        .d-flex {
            display: flex;
            align-items: center;
        }

        .img-fit {
            object-fit: cover;
            border-radius: 100%;
            object-position: center;
            width: 50px !important;
            height: 50px !important;
        }

        .ml-2 {
            margin: 20px
        }

        .ml-2 {
            margin-left: 20px
        }

        .mr-2 {
            margin-right: 20px
        }

        .customModalDialog {
            position: fixed;
            font-family: Arial, Helvetica, sans-serif;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            /* background: rgb(97, 96, 96); */
            z-index: 21474836470;
            opacity: 0;
            -webkit-transition: opacity 400ms ease-in;
            -moz-transition: opacity 400ms ease-in;
            transition: opacity 400ms ease-in;
            pointer-events: none;
        }

        .customModalDialog:target {
            opacity: 1;
            pointer-events: auto;
        }

        .customModalDialog>div {
            width: 50vw;
            position: relative;
            /* margin: 10% auto; */
            /* padding: 5px 20px 13px 20px; */
            border-radius: 10px;
            background: #fff;
            /* background: -moz-linear-gradient(#fff, #999);
        background: -webkit-linear-gradient(#fff, #999);
        background: -o-linear-gradient(#fff, #999); */
        }

        .close {
            background: #606061;
            color: #FFFFFF;
            line-height: 25px;
            position: absolute;
            right: -12px;
            text-align: center;
            top: -10px;
            width: 24px;
            text-decoration: none;
            font-weight: bold;
            -webkit-border-radius: 12px;
            -moz-border-radius: 12px;
            border-radius: 12px;
            -moz-box-shadow: 1px 1px 3px #000;
            -webkit-box-shadow: 1px 1px 3px #000;
            box-shadow: 1px 1px 3px #000;
        }

        .close:hover {
            background: #00d9ff;
        }

        .chat_user_img {
            width: 100%;
            height: inherit;
            object-fit: cover;
        }

        body {
            background: #edf1f5;
        }

        .progress {
            /* margin: 50px auto; */
            padding: 2px;
            width: 100%;
            /* max-width: 500px; */
            background: rgb(247, 244, 244);
            /* border: 1px solid #000; */
            border-radius: 5px;
            height: 10px;
        }

        .progress .progress__bar {
            height: 100%;
            width: 5%;
            border-radius: 5px;
            background: repeating-linear-gradient(135deg,
                    #036ffc,
                    #036ffc 20px,
                    #1163cf 20px,
                    #1163cf 40px);
        }

        .task_ad_img {
            width: 60px;
            border-radius: 50%;
            height: 60px;
            object-fit: cover;
        }

        .message_container {
            padding: 10px;
            background: #f9f9f9;
            border-radius: 10px;
        }

        .task_like {
            width: 30px;
            color: #fff;
            display: block;
            cursor: pointer;
            padding: 2px 0 1px;
            text-align: center;
            border-radius: 3px;
            background: #F91942;
            position: absolute;
            right: 0;
        }

        .task_footer {
            display: flex;
            justify-content: space-between;
        }

    </style>
    @yield("style")
</head>
