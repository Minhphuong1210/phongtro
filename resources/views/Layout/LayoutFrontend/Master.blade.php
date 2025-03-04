<!DOCTYPE html>
<html lang="vi">
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <link rel="icon" href="assets/images/favicon.ico" />
    <title>@yield('title')</title>
    <meta name="keywords" content="cho thuê phòng trọ, tìm nhà trọ, thuephongtro">
    <meta name="description"
        content="Kênh đăng tin cho thuê Phòng trọ hàng đầu, tìm Nhà trọ giá rẻ đầy đủ tiện ích ☑️Mới xây ☑️Cho người đi làm, sinh viên ☑️Giờ giấc thoải mái ☑️Vệ sinh riêng ☑️Click Ngay!">
    <meta name="placename" content="Việt Nam">
    <meta property="og:title" content="Website số 1 về Phòng trọ tại Việt Nam | Thuephongtro.com">
    <meta property="og:url" content="index.html">
    <meta property="og:type" content="website">
    <meta property="og:description"
        content="Kênh đăng tin cho thuê Phòng trọ hàng đầu, tìm Nhà trọ giá rẻ đầy đủ tiện ích ☑️Mới xây ☑️Cho người đi làm, sinh viên ☑️Giờ giấc thoải mái ☑️Vệ sinh riêng ☑️Click Ngay!">
    <link rel="canonical" href="index.html">

    {{-- <link rel="stylesheet" href="{{asset('frontend/assets/libs/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/libs/fancybox/css/fancybox.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/libs/jqueryui/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/common1bce.css?v=6')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/header1bce.css?v=6')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/home.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('frontend/assets/libs/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/libs/fancybox/css/fancybox.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/libs/jqueryui/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/common1bce.css?v=6')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/header1bce.css?v=6')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/home.cs')}}s">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/listpage.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/detail.css')}}" />

    @yield('css')


</head>

<body>

    <div id="wrapper" class="listpage">
        @include('Layout.LayoutFrontend.Header')
        @include('Layout.LayoutFrontend.Filter')
        <!-- POPUP -->
        <main class="main">
           @yield('content')
        </main>
        @include('Layout.LayoutFrontend.Footer')
       
    </div>
    <script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/assets/libs/jqueryui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('frontend/assets/libs/jqueryui/jquery.ui.touch-punch.min.js')}}"></script>
    <script src="{{asset('frontend/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontend/assets/libs/fancybox/js/fancybox.umd.js')}}"></script>
    <script src="{{asset('frontend/assets/js/slider.js')}}"></script>
    <script src="{{asset('frontend/assets/js/main1bce.js?v=6')}}"></script>
    <script src="{{asset('frontend/scripts/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/scripts/bootstrap-growl.min.js')}}"></script>
    <script src="{{asset('frontend/scripts/jqueryval.min.js')}}"></script>
    <script src="{{asset('frontend/content/js/common80ba.js?v=23')}}"></script>

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
