<header class="header">
    <div class="logo"> <a href="index.html"> <img src="assets/images/logo.png" alt="logo"> </a> </div>
    <ul class="menu-nav list-unstyled d-none d-xl-flex align-items-center mb-0">
        <li> <a class="" href="cho-thue-phong-tro.html">Cho thuê phòng trọ</a> </li>
        <li> <a class="" href="cho-thue-nha-nguyen-can.html">Cho thuê nhà ở</a> </li>
        <li> <a class="" href="cho-thue-can-ho.html">Cho thuê căn hộ</a> </li>
        <li> <a class="" href="tim-nguoi-o-ghep.html">Tìm người ở ghép</a> </li>
    </ul>
    <div class="user-nav d-flex align-items-center">
        <div class="user-nav-control">
            <a href="tin-da-luu.html" class="link">
                <i class="icon icon-heart"></i>
                <span class="badge" id="fav-count"></span>
            </a>
            <a href="dang-ky.html" class="link">
                <i class="icon icon-register"></i>
                <span>Đăng ký</span>
            </a>
            <a href="dang-nhap.html" class="link">
                <i class="icon icon-login"></i>
                <span>Đăng nhập</span>
            </a>
        </div>
        <div class="user-nav-control-login d-none">
            <a href="dang-nhapa13e.html" class="link">
                <i class="icon icon-dashboard"></i>
                <span>Trang quản lý</span>
            </a>
            <a href="dang-nhape40a.html" class="link">
                <i class="icon icon-bell"></i>
            </a>
            <a href="dang-nhapa13e.html" class="link">
                <i class="icon icon-heart"></i>
                <span class="badge">3</span>
            </a> <a href="#" class="avatar">
                <img src="assets/images/default-user.svg" alt="avatar">
            </a>
        </div>
        <div class="user-nav-mobile">
            <a href="javascript:void(0)" class="link">
                <i class="icon ic-menu-bar" data-bs-toggle="offcanvas" data-bs-target="#menuMobileRight"
                    aria-controls="menuMobileRight"></i>
            </a>
        </div>
        <div class="user-nav-action">
            <a href="dang-nhap8b86.html" class="link">
                <i class="icon"></i> Đăng tin
            </a>
        </div>
    </div>
    <script>
        var favorites = JSON.parse(localStorage.getItem('favorites')) || [];
        if (favorites.length > 0)
            document.getElementById('fav-count').innerText = favorites.length;
    </script>
</header>