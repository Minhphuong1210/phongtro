<!DOCTYPE html>
<html
    lang="en"
    data-layout="vertical"
    data-topbar="light"
    data-sidebar="dark"
    data-sidebar-size="lg"
    data-sidebar-image="none"
    data-preloader="disable"
>
    <head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta
            content="Premium Multipurpose Admin & Dashboard Template"
            name="description"
        />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('asset/velzon/assets/images/favicon.ico')}}" />

        <!-- jsvectormap css -->
        <link
            href="{{asset('asset/velzon/assets/libs/jsvectormap/css/jsvectormap.min.css')}}"
            rel="stylesheet"
            type="text/css"
        />

        <!--Swiper slider css-->
        <link
            href="{{asset('asset/velzon/assets/libs/swiper/swiper-bundle.min.css')}}"
            rel="stylesheet"
            type="text/css"
        />

        <!-- Layout config Js -->
        <script src="{{asset('asset/velzon/assets/js/layout.js')}}"></script>
        <!-- Bootstrap Css -->
        <link
            href="{{asset('asset/velzon/assets/css/bootstrap.min.css')}}"
            rel="stylesheet"
            type="text/css"
        />
        <!-- Icons Css -->
        <link
            href="{{asset('asset/velzon/assets/css/icons.min.css')}}"
            rel="stylesheet"
            type="text/css"
        />
        <!-- App Css-->
        <link href="{{asset('asset/velzon/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- custom Css-->
        <link
            href="{{asset('asset/velzon/assets/css/custom.min.css')}}"
            rel="stylesheet"
            type="text/css"
        />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{asset('asset/velzon/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')}}"></script>
        <style>
            .card {
            margin-top: 60px ; /* Tạo khoảng cách giữa card và header */
        }
        
        </style>

    </head>

    <body>
        <!-- Begin page -->
        <div id="layout-wrapper">
          @include('Layout.LayoutAdmin.Header')

            <!-- removeNotificationModal -->
            <div
                id="removeNotificationModal"
                class="modal fade zoomIn"
                tabindex="-1"
                aria-hidden="true"
            >
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                                id="NotificationModalbtn-close"
                            ></button>
                        </div>
                        <div class="modal-body">
                            <div class="mt-2 text-center">
                                <lord-icon
                                    src="https://cdn.lordicon.com/gsqxdxog.json"
                                    trigger="loop"
                                    colors="primary:#f7b84b,secondary:#f06548"
                                    style="width: 100px; height: 100px"
                                ></lord-icon>
                                <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                    <h4>Are you sure ?</h4>
                                    <p class="text-muted mx-4 mb-0">
                                        Are you sure you want to remove this
                                        Notification ?
                                    </p>
                                </div>
                            </div>
                            <div
                                class="d-flex gap-2 justify-content-center mt-4 mb-2"
                            >
                                <button
                                    type="button"
                                    class="btn w-sm btn-light"
                                    data-bs-dismiss="modal"
                                >
                                    Close
                                </button>
                                <button
                                    type="button"
                                    class="btn w-sm btn-danger"
                                    id="delete-notification"
                                >
                                    Yes, Delete It!
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <!-- ========== App Menu ========== -->
            <div class="app-menu navbar-menu">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <!-- Dark Logo-->
                    <a href="index.html" class="logo logo-dark">
                        <span class="logo-sm">
                            <img
                                src="{{asset('asset/velzon/assets/images/logo-sm.png')}}"
                                alt=""
                                height="22"
                            />
                        </span>
                        <span class="logo-lg">
                            <img
                                src="{{asset('asset/velzon/assets/images/logo-dark.png')}}"
                                alt=""
                                height="17"
                            />
                        </span>
                    </a>
                    <!-- Light Logo-->
                    <a href="index.html" class="logo logo-light">
                        <span class="logo-sm">
                            <img
                                src="{{asset('asset/velzon/assets/images/logo-sm.png')}}"
                                alt=""
                                height="22"
                            />
                        </span>
                        <span class="logo-lg">
                            <img
                                src="{{asset('asset/velzon/assets/images/logo-light.png')}}"
                                alt=""
                                height="17"
                            />
                        </span>
                    </a>
                    <button
                        type="button"
                        class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                        id="vertical-hover"
                    >
                        <i class="ri-record-circle-line"></i>
                    </button>
                </div>

              @include('Layout.LayoutAdmin.NavBar')

                <div class="sidebar-background"></div>
            </div>
            <!-- Left Sidebar End -->
            <!-- Vertical Overlay-->
            <div class="vertical-overlay"></div>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
           

            <div class="main-content">
                @yield('content')
                <!-- End Page-content -->
            
               @include('Layout.LayoutAdmin.Footer')
            </div>

            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->

        <!--start back-to-top-->
        <button
            onclick="topFunction()"
            class="btn btn-danger btn-icon"
            id="back-to-top"
        >
            <i class="ri-arrow-up-line"></i>
        </button>
        <!--end back-to-top-->

        <!--preloader-->
        @include('Layout.LayoutAdmin.Preloader')
        <!-- Theme Settings -->
        @include('Layout.LayoutAdmin.ThemeSetting')

        <!-- JAVASCRIPT -->
        @include('Layout.LayoutAdmin.Js')
    </body>
</html>
