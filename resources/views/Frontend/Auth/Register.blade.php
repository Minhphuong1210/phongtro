@extends('Layout.LayoutFrontend.Master')
@section('title')
    Đăng kí
@endsection
@section('content')
    <style>
        .red_require {
            color: red
        }

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
            <h1 class="page_title">Đăng ký tài khoản</h1>
            <hr />
        </div>
        <div class="page_content register_page">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <section id="registerForm" class="changepassword-form__fields">
                        <form action="{{ route('postRegister') }}" id="frmSubmit" method="post" role="form">
                            @csrf
                            <div class="form-group pb-3">
                                <label class="control-label" for="Email">Email</label> <span class="red_require">*</span>
                                <input class="form-control" data-val="true"
                                    data-val-email="&#x110;&#x1ECB;a ch&#x1EC9; email kh&#xF4;ng h&#x1EE3;p l&#x1EC7;"
                                    data-val-required="Vui l&#xF2;ng nh&#x1EAD;p email" id="Email" name="email"
                                    type="text" value="" />
                                <span class="text-danger field-validation-valid" data-valmsg-for="Email"
                                    data-valmsg-replace="true"></span>
                            </div>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group pb-3">
                                <label class="control-label" for="Password">T&#x1EA1;o m&#x1EAD;t kh&#x1EA9;u</label> <span
                                    class="red_require">*</span>
                                <input class="form-control" data-val="true"
                                    data-val-maxlength="M&#x1EAD;t kh&#x1EA9;u nhi&#x1EC1;u nh&#x1EA5;t 30 k&#xFD; t&#x1EF1;"
                                    data-val-maxlength-max="30"
                                    data-val-minlength="M&#x1EAD;t kh&#x1EA9;u &#xED;t nh&#x1EA5;t 6 k&#xFD; t&#x1EF1;"
                                    data-val-minlength-min="6"
                                    data-val-required="Vui l&#xF2;ng nh&#x1EAD;p m&#x1EAD;t kh&#x1EA9;u" id="Password"
                                    maxlength="30" name="password" type="password" />
                                <span class="text-danger field-validation-valid" data-valmsg-for="Password"
                                    data-valmsg-replace="true"></span>
                            </div>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group pb-3">
                                <label class="control-label" for="FullName">H&#x1ECD; v&#xE0; t&#xEA;n</label> <span
                                    class="red_require">*</span>
                                <input class="form-control" data-val="true"
                                    data-val-required="Vui l&#xF2;ng nh&#x1EAD;p h&#x1ECD; t&#xEA;n" id="FullName"
                                    maxlength="50" name="name" type="text" value="" />
                                <span class="text-danger field-validation-valid" data-valmsg-for="FullName"
                                    data-valmsg-replace="true"></span>
                            </div>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group pb-3">
                                <label class="control-label" for="Mobile">S&#x1ED1; &#x111;i&#x1EC7;n tho&#x1EA1;i</label>
                                <span class="red_require">*</span>
                                <input class="form-control" data-val="true"
                                    data-val-regex="S&#x1ED1; &#x111;i&#x1EC7;n tho&#x1EA1;i kh&#xF4;ng h&#x1EE3;p l&#x1EC7;"
                                    data-val-regex-pattern="(09|03|07|08|05)[0-9]{8}"
                                    data-val-required="Vui l&#xF2;ng nh&#x1EAD;p s&#x1ED1; &#x111;i&#x1EC7;n tho&#x1EA1;i"
                                    id="Mobile" maxlength="10" name="phone" type="text" value="" />
                                <span class="text-danger field-validation-valid" data-valmsg-for="Mobile"
                                    data-valmsg-replace="true"></span>
                            </div>
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group pb-3">
                                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-user-plus"></i> Tạo
                                    tài khoản</button>
                            </div>

                        </form>
                    </section>
                </div>
                <div class="col-xs-12 col-sm-1 col-md-1 hidden-xs">
                </div>
                <div class="col-xs-12 col-sm-5 col-md-5">
                    <div class="right">
                        <p class="mgb-20">Đăng nhập bằng Facebook hoặc Google</p>
                        <section id="socialLoginForm">
                            <div id="socialLoginList">
                                <p>
                                <a href="{{ route('auth.google') }}" class="btn btn-danger">Đăng nhập với Google</a>
                                </p>
                            </div>
                        </section>
                        <div class="mgt-25">
                            <p>Bạn đã có tài khoản? <a href="{{ route('login') }}">&#x110;&#x103;ng
                                    nh&#x1EAD;p</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
