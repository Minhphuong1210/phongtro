<header class="header">
    <div class="logo"> <a href="index.html"> <img src="assets/images/logo.png" alt="logo"> </a> </div>
    <ul class="menu-nav list-unstyled d-none d-xl-flex align-items-center mb-0">
        <?php $categories = App\Models\Category::query()->where('is_active', 1)->get(); ?>

        @foreach ($categories as $categorie)
            <li> <a class="check_active" href="{{ route('tim_phong', $categorie->slug) }}"
                    data-type="{{ $categorie->slug }}">{{ $categorie->name }}</a>
            </li>
        @endforeach

    </ul>
    <div class="user-nav d-flex align-items-center">
        <div class="user-nav-control">
            {{-- <a href="tin-da-luu.html" class="link">
                <i class="icon icon-heart"></i>
                <span class="badge" id="fav-count"></span>
            </a> --}}



            @if (Auth::check())


                @if (Auth::user()->image)
                    {{-- <img src="{{ Storage::url(Auth::user()->image) }}" style="width: 70px; height: auto;" alt="Ảnh đại diện"> --}}

                    <a href="{{ route('user.thongTinCaNhan') }}" class="image">
                        <img src="{{ Storage::url(Auth::user()->image) }}" style="width: 49px; height: auto;"
                            alt="Ảnh đại diện">
                    </a>
                @else
                    <a href="{{ route('user.thongTinCaNhan') }}" class="image">
                        <img src="{{ Storage::url('uploads/image/anh_dai_dien.jpg') }}"
                            style="width: 49px; height: auto;" alt="Ảnh đại diện">
                    </a>
                @endif
            @else
                <a href="{{ route('register') }}" class="link">
                    <i class="icon icon-register"></i>
                    <span>Đăng ký</span>
                </a>
                <a href="{{ route('login') }}" class="link">
                    <i class="icon icon-login"></i>
                    <span>Đăng nhập</span>
                </a>
            @endif


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
            <a href="{{ route('user.dangtin') }}" class="link">
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const check_active = document.querySelectorAll('.check_active');

        function updateActiveState() {
            // Lấy slug từ URL (đoạn cuối sau "/")
            const urlParts = window.location.pathname.split('/');
            const currentSlug = urlParts[urlParts.length - 1];

            check_active.forEach((e) => {
                if (e.dataset.type === currentSlug) {
                    e.classList.add('active');
                } else {
                    e.classList.remove('active');
                }
            });
        }

        // Kiểm tra trạng thái active khi trang tải lần đầu
        updateActiveState();
    });
</script>
