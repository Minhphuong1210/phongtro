@extends('Layout.LayoutFrontend.Master')
@section('title')
    Trang quản trị người dùng
@endsection

<style>
    .pmanager-left {
        width: 20% !important;
    }

    .pmanager-right {
        position: absolute !important;
        top: 5% !important;
        left: 20% !important;
        width: 80% !important;
    }
</style>
@section('content')
   @include('Layout.LayoutFrontend.User.menu-left')
    {{-- hết nav3 --}}

    <div class="pmanager-right editpost-right">
        <div class="newpost-right-wrap">
            <div id="breadcrumb">
                <ol class="clearfix">
                    <li>
                        <a href="/user/thong_tin_ca_nhan">
                            <span>Trang quản lý</span>
                        </a>
                    </li>
                    <li><span>Thông tin cá nhân</span></li>

                    @error('success')
                    <div class="text-danger">{{ $message }}</div>
                @enderror


                </ol>
            </div>
            <div class="editpost-main">
                <div action="" class="edit-form">
                    <div class="edit-form__title">
                        <h2>Thông tin cá nhân</h2>
                    </div>
                    <div class="edit-form__fields">
                        <form action="{{route('user.edit',Auth::user()->id)}}" class="form-horizontal" enctype="multipart/form-data"
                            method="post">
                    @method('PUT')
                    @csrf
                            <div class="form-group w-100">
                                <label for="">Họ tên</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <svg width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path
                                                d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z">
                                            </path>
                                        </svg>
                                    </span>
                                    <input class="form-control text-box single-line" data-val="true"
                                        data-val-required="Vui lòng nhập họ tên" id="FullName" name="name" type="text"
                                        value="{{Auth::user()->name}}">
                                    <span class="text-danger field-validation-valid" data-valmsg-for="FullName"
                                        data-valmsg-replace="true"></span>

                                </div>
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group w-100">
                                <label for="">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <svg width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path
                                                d="M464 64C490.5 64 512 85.49 512 112C512 127.1 504.9 141.3 492.8 150.4L275.2 313.6C263.8 322.1 248.2 322.1 236.8 313.6L19.2 150.4C7.113 141.3 0 127.1 0 112C0 85.49 21.49 64 48 64H464zM217.6 339.2C240.4 356.3 271.6 356.3 294.4 339.2L512 176V384C512 419.3 483.3 448 448 448H64C28.65 448 0 419.3 0 384V176L217.6 339.2z">
                                            </path>
                                        </svg>
                                    </span>
                                    <input class="form-control text-box single-line" data-val="true"
                                        data-val-email="Email không hợp lệ" id="Email" name="email"
                                        type="email" value="{{Auth::user()->email}}">
                                    <span class="input-group-text">
                                        <svg width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path
                                                d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z">
                                            </path>
                                        </svg>
                                    </span>

                                    
                                </div>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="form-group w-100">
                                <label for="">Số điện thoại</label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text">
                                        <svg width="15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path
                                                d="M511.2 387l-23.25 100.8c-3.266 14.25-15.79 24.22-30.46 24.22C205.2 512 0 306.8 0 54.5c0-14.66 9.969-27.2 24.22-30.45l100.8-23.25C139.7-2.602 154.7 5.018 160.8 18.92l46.52 108.5c5.438 12.78 1.77 27.67-8.98 36.45L144.5 207.1c33.98 69.22 90.26 125.5 159.5 159.5l44.08-53.8c8.688-10.78 23.69-14.51 36.47-8.975l108.5 46.51C506.1 357.2 514.6 372.4 511.2 387z">
                                            </path>
                                        </svg>
                                    </span>

                                    <input class="form-control text-box single-line" id="Mobile" maxlength="10"
                                        name="phone" numbersonly="true" type="text" value="{{Auth::user()->phone ?? ""}}">

                                </div>
                                @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group w-100">
                                <label for="">Địa chỉ liên hệ</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <svg width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path
                                                d="M384 0H96C60.65 0 32 28.65 32 64v384c0 35.35 28.65 64 64 64h288c35.35 0 64-28.65 64-64V64C448 28.65 419.3 0 384 0zM240 128c35.35 0 64 28.65 64 64s-28.65 64-64 64c-35.34 0-64-28.65-64-64S204.7 128 240 128zM336 384h-192C135.2 384 128 376.8 128 368C128 323.8 163.8 288 208 288h64c44.18 0 80 35.82 80 80C352 376.8 344.8 384 336 384zM496 64H480v96h16C504.8 160 512 152.8 512 144v-64C512 71.16 504.8 64 496 64zM496 192H480v96h16C504.8 288 512 280.8 512 272v-64C512 199.2 504.8 192 496 192zM496 320H480v96h16c8.836 0 16-7.164 16-16v-64C512 327.2 504.8 320 496 320z">
                                            </path>
                                        </svg>
                                    </span>
                                    <input class="form-control text-box single-line" id="Address" name="address" type="text" value="{{Auth::user()->address ?? "" }}">
                                </div>
                            </div>
                            @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                            <div class="form-group w-100">
                                <label for="">Mật khẩu</label>
                                <div class="input-group mb-2 d-none">
                                    <span class="input-group-text">#</span>
                                    <input type="text" value="TP.Hồ Chí Minh" class="form-control">
                                </div>
                                <a href="/doi-mat-khau.html">
                                    Bấm vào đây để thay đổi mật khẩu
                                </a>
                            </div>
                            <div class="form-group mb-5 w-100">
                                <label for="">Ảnh đại diện</label>
                                <div class="avatar">
                                    <img id="srcImg" src="/assets/images/default-user.svg" alt="avatar"
                                        style="width:150px;height:150px">
                                    <a href="javascript:;" id="change_avatar" class="btn btn-secondary">
                                        Chọn ảnh khác
                                    </a>
                                    <input type="file" name="Avatar" id="Avatar" onchange="showImg(event)"
                                        style="display:none">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-danger w-100" id="btnSubmit">Cập nhật</button>
                           
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection