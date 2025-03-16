<div class="pmanager-left">
    <div class="user-info">
        <div class="user-info-left">
            <img src="{{ Storage::url('uploads/image/anh_dai_dien.jpg') }}" style="width: 70px; height: auto;" alt="Ảnh đại diện">
        </div>
        <div class="user-info-right">
            <h2 class="username">{{Auth::user()->name}}</h2>
            <span class="phone"></span>
        </div>
    </div>
    <hr>
    {{-- <div class="payment-box">
        <div class="payment-box-top">
            <span>Số dư tài khoản</span>
            <span>0 đ</span>
        </div>
        <div class="payment-box-main">
            <span>Mã tài khoản</span>
            <strong>115539</strong>
            <div class="js-share-link-button" data-clipboard-text="115539">
                <i class="icon ic-copy"></i>
            </div>
        </div>
        <div class="payment-box-action">
            <a href="/nap-tien.html">
                <i class="icon ic-deposit"></i>
                Nạp tiền
            </a>
        </div>
    </div> --}}
    <div class="pmanager-menu">
        <a href="{{route('user.QuanLyDangTin')}}">
            <i class="icon ic-list"></i>
            Quản lý tin đăng
        </a>
        {{-- <a href="/quan-ly-tin-tu-dong.html">
            <i class="icon ic-list"></i>
            Quản lý up tin tự động
        </a> --}}
        <a href="{{route('user.dangtin')}}">
            <i class="icon ic-pen"></i>
            Đăng tin mới
        </a>
        {{-- <a href="/lich-su-nap-tien.html">
            <i class="icon ic-clock"></i>
            Lịch sử nạp tiền
        </a>
        <a href="/lich-su-giao-dich.html">
            <i class="icon ic-schedule"></i>
            Lịch sử giao dịch
        </a> --}}
        <a href="{{route('user.thongTinCaNhan')}}" class="active">
            <i class="icon ic-user"></i>
            Thông tin cá nhân
        </a>
        <a href="/doi-mat-khau.html">
            <i class="icon ic-lock"></i>
            Đổi mật khẩu
        </a>
        {{-- <a href="/hop-thu-bao.html">
            <i class="icon ic-bell"></i>
            Thông báo
        </a>
        <a href="/bang-gia-dich-vu.html">
            <i class="icon ic-bag"></i>
            Bảng giá dịch vụ
        </a>
        <a href="/lien-he.html">
            <i class="icon ic-quest"></i>
            Liên hệ &amp; trợ giúp
        </a> --}}
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