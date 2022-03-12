<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tochisco</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="shortcut icon" type="image/x-icon" href="{{ $web_source }}/web_assets/img/icon.png">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .selected {
            color: #ff8f07 !important;
            border-width: 2px;
            border-color: #ff8f07 !important;
        }

        .select_role {
            cursor: pointer;
        }

        .w3l-login .form-inner-cont {
            margin: 20px auto;
            padding: 1.5rem;
            border-radius: var(--card-curve);
            box-shadow: var(--card-box-shadow);
            background: #fff;
        }

        .fs-30 {
            font-size: 30px;
        }

        .w3l-login .w3l-form-36-mian {
            min-height: auto;
        }

        .mx-100 {
            max-width: 100% !important;
        }

        .media_playlist {
            max-height: 90vh;
            overflow: scroll;
            overflow-x: hidden;

        }

        /* width */
        ::-webkit-scrollbar {
            width: 3px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        .w3l-offered-courses .price-review p {
            font-size: 16px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .w3l-offered-courses a.course-desc {
            font-size: 16px;
            line-height: 20.2px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        body {
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 14px;
        }

        #floating_nav {
            position: fixed;
            /* left: 0; */
        }

        .comments-head {
            background-color: white;
            height: 40px;
        }

        #comments-list {
            width: 100%;
            min-height: 40%;
            max-height: 70vh;
            overflow-x: hidden;
            /* Hide horizontal scrollbar */
            overflow-y: scroll;
            /* Add vertical scrollbar */
        }

        .mediaItem_bg_image {
            width: 100%;
            height: 70vh;
            background-repeat: none;
            background-size: cover;
        }

        /* .w3l-main-banner .banner-view {
    background-image: url('{{ $web_source }}/images/homepage/image1.jpeg')
} */

     


        .w3l-stats {
            background-image: url('{{ $web_source }}web_assets/img/homepage/login-bg.JPG')
        }

        .w3l-services1 .aboutbottom {
            background-image: url('{{ $web_source }}/img/homepage/image6.jpeg')
        }

        .w3l-intro .new-block {
            background-image: url('{{ $web_source }}/img/homepage/image7.jpeg')
        }

        .w3l-subscribe .subscription-left {
            background-image: url('{{ $web_source }}/img/homepage/image13.jpeg')
        }

        .auth_bg {
            background-image: url('{{ $web_source }}web_assets/img/homepage/login-bg.JPG');
            background-repeat: no-repeat;
            background-size: cover;
        }

    </style>
    @yield('style')
</head>

<body>
    <div id="app">
        <div class="fixed-background auth_bg"></div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img style="width:40px;" src="web_assets/img/icon.png" alt=""><b>Tochisco</b>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-success" href="{{ route('register') }}">Become An Agent</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

            <section class="w3l-stats">
                @yield('content')
            </section>

        </main>
    </div>
</body>

</html>
