@extends('Layout.LayoutFrontend.Master')
@section('title')
    Đăng nhập
@endsection
@section('content')
    <style>
        .btn-social {
            color: #fff
        }

        .btn-social+.btn-social {
            margin-top: 10px
        }

        .btn-social:hover {
            color: #fff
        }

        .btn-social .fa {
            line-height: 20px
        }

        .btn-bg-facebook {
            background-color: #506dab;
        }

        .btn-bg-facebook:hover {
            background-color: #405788
        }

        .btn-bg-google-plus {
            background-color: #dd4b39
        }

        .btn-bg-google-plus:hover {
            background-color: #c23321
        }

        .btn-bg-google {
            background-color: #dd4b39
        }

        .btn-bg-google:hover {
            background-color: #c23321
        }

        .bg-none {
            background: 0 0
        }
    </style>


    <div class="container">
        <div class="page_header">
            <h1 class="page_title">Đăng nhập</h1>
            <hr />
        </div>
        <div class="page_content register_page">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <section id="loginForm">
                        <form action="{{ route('postLogin') }}" method="post">
                            @csrf
                            <div class="form-group pb-3">
                                <label class="control-label" for="Email">T&#xEA;n &#x111;&#x103;ng nh&#x1EAD;p/
                                    Email</label> <span class="red_require">*</span>
                                <input class="form-control" data-val="true"
                                    data-val-required="Vui l&#xF2;ng nh&#x1EAD;p t&#xEA;n &#x111;&#x103;ng nh&#x1EAD;p"
                                    id="Email" name="email" type="text" value="" />
                                <span class="text-danger field-validation-valid" data-valmsg-for="Email"
                                    data-valmsg-replace="true"></span>
                            </div>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group pb-3">
                                <label class="control-label" for="Password">M&#x1EAD;t kh&#x1EA9;u</label> <span
                                    class="red_require">*</span>
                                <input class="form-control" data-val="true"
                                    data-val-required="Vui l&#xF2;ng nh&#x1EAD;p m&#x1EAD;t kh&#x1EA9;u" id="Password"
                                    name="password" type="password" />
                                <span class="text-danger field-validation-valid" data-valmsg-for="Password"
                                    data-valmsg-replace="true"></span>
                            </div>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group pb-3 clearfix">
                                <div class="pull-left">
                                    <div class="checkbox-inline">
                                        <input checked="True" data-val="true"
                                            data-val-required="The Nh&#x1EDB; t&#xE0;i kho&#x1EA3;n field is required."
                                            id="RememberMe" name="RememberMe" type="checkbox" value="true" />
                                        <label class="control-label" for="RememberMe">Nh&#x1EDB; t&#xE0;i
                                            kho&#x1EA3;n</label>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <a href="">Qu&#xEA;n m&#x1EAD;t
                                        kh&#x1EA9;u?</a>
                                </div>
                            </div>
                            <div class="form-group pb-3">
                                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-sign-in"></i> Đăng
                                    nhập</button>
                            </div>

                        </form>
                    </section>
                </div>
                <div class="col-xs-12 col-sm-1 col-md-1 hidden-xs">
                </div>
                <div class="col-xs-12 col-sm-5 col-md-5">
                    <div class="right">
                        <p class="mgb-20">Đăng nhập bằng Facebook hoặc Google</p>
                        <a href="{{ route('auth.google') }}" class="btn btn-danger">Đăng nhập với Google</a>

                        <div class="mgt-25">
                            <p>Bạn chưa có tài khoản? <a href="{{ route('register') }}">&#x110;&#x103;ng
                                    k&#xFD;</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
