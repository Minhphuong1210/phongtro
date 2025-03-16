<!DOCTYPE html>
<html lang="vi">
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="assets/images/favicon.ico" />
    <title>@yield('title')</title>
    <link rel="canonical" href="index.html">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('frontend/assets/libs/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/libs/fancybox/css/fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/libs/jqueryui/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/common1bce.css?v=6') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/header1bce.css?v=6') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/libs/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/libs/fancybox/css/fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/libs/jqueryui/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/common1bce.css?v=6') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/header1bce.css?v=6') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/home.cs') }}s">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/listpage.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/detail.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/manager.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/userinfo.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">


    @yield('css')


</head>

<body>

    <div id="wrapper" class="listpage">
        @include('Layout.LayoutFrontend.Header')

        {{-- {{dd()}} --}}

        @if (request()->path() === '/' || request()->is('tim_phong*'))
        @include('Layout.LayoutFrontend.Filter')
    @endif
    
        <!-- POPUP -->
        <main class="main">
            @yield('content')
        </main>


        @if (!request()->is('user*'))
        @include('Layout.LayoutFrontend.Footer')
    @endif

    

    </div>

    <script src="{{ asset('frontend/assets/libs/jqueryui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/libs/jqueryui/jquery.ui.touch-punch.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/libs/fancybox/js/fancybox.umd.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/slider.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main1bce.js?v=6') }}"></script>
    <script src="{{ asset('frontend/scripts/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/scripts/bootstrap-growl.min.js') }}"></script>
    <script src="{{ asset('frontend/scripts/jqueryval.min.js') }}"></script>
    <script src="{{ asset('frontend/content/js/common80ba.js?v=23') }}"></script>

    <script>
        function search(value) {
            if (value != "") {
                window.location = "?sort=" + value;
            } else {
                window.location = window.location;
            }
        }
    </script>
</body>


</html>
