<div class="pmanager-left">
    <div class="user-info">
        <div class="user-info-left">
            @if(Auth::user()->image)
                <img src="{{ Storage::url(Auth::user()->image) }}" style="width: 70px; height: auto;" alt="Ảnh đại diện">
            @else
                <img src="{{ Storage::url('uploads/image/anh_dai_dien.jpg') }}" style="width: 70px; height: auto;" alt="Ảnh đại diện mặc định">
            @endif
        </div>        
        <div class="user-info-right">
            <h2 class="username">{{Auth::user()->name}}</h2>
            <span class="phone"></span>
        </div>
    </div>
    <hr>

    <div class="pmanager-menu">
        <a href="{{route('user.QuanLyDangTin')}}">
            <i class="icon ic-list"></i>
            Quản lý tin đăng
        </a>
     
        <a href="{{route('user.dangtin')}}">
            <i class="icon ic-pen"></i>
            Đăng tin mới
        </a>
       
        <a href="{{route('user.thongTinCaNhan')}}" class="active">
            <i class="icon ic-user"></i>
            Thông tin cá nhân
        </a>
        <a href="{{route('user.doiMatKhau')}}">
            <i class="icon ic-lock"></i>
            Đổi mật khẩu
        </a>
   
        <hr>
        <a href="#">
            <i class="icon ic-logout"></i>
           <form action="{{route('logout')}}" method="post">
            @csrf
           <button class="btn btn-light" type="submit"> Đăng xuất</button>
           </form>
        </a>
    </div>
</div>