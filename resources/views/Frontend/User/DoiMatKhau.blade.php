@extends('Layout.LayoutFrontend.Master')
@section('title')
    Đổi mật khẩu
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


    <div class="pmanager-right editpost-right">
        <div class="newpost-right-wrap">
            <div id="breadcrumb">
                <ol class="clearfix">
                    <li>
                        <a href="/user/thong_tin_ca_nhan">
                            <span>Trang quản lý</span>
                        </a>
                    </li>
                    <li><span>Đổi mật khẩu</span></li>

                    @error('success')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror


                </ol>
            </div>
            <div class="editpost-main">
                <div action="" class="edit-form">
                    <div class="edit-form__title">
                        <h2>Đổi mật khẩu</h2>
                    </div>
                    <div class="edit-form__fields">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('user.edit_password', Auth::user()->id) }}" class="form-horizontal"
                            enctype="multipart/form-data" method="post">
                            @method('PUT')
                            @csrf
                            <div class="form-group w-100">
                                <label for="current_password">Nhập mật khẩu cũ</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input type="password" class="form-control" id="current_password"
                                        name="current_password" required>
                                </div>
                                @error('current_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group w-100">
                                <label for="new_password">Nhập mật khẩu mới</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-key"></i>
                                    </span>
                                    <input type="password" class="form-control" id="new_password" name="new_password"
                                        required>
                                </div>
                                @error('new_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group w-100">
                                <label for="confirm_password">Xác nhận mật khẩu mới</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <input type="password" class="form-control" id="confirm_password"
                                        name="confirm_password" required>
                                </div>
                                @error('confirm_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-danger w-100" id="btnSubmit">Cập nhật</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
