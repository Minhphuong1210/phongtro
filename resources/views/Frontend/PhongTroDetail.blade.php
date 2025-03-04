@extends('Layout.LayoutFrontend.Master')
@section('title')
    Chi tiết
@endsection

@section('content')
    <style>
        .detailp i.icon.ic-heart.active {
            background-image: url(assets/images/ic-heart-active.svg);
        }

        .detailp-images {
            justify-content: center;
        }

        #overview #da_het_han {
            position: absolute;
            left: 30%;
            width: 200px;
            height: 200px;
            background: url(images/tin_het_han.png) center no-repeat;
            background-size: contain;
        }

        #overview #da_cho_thue {
            position: absolute;
            left: 30%;
            width: 200px;
            height: 200px;
            background: url(images/da_cho_thue.png) center no-repeat;
            background-size: contain;
        }

        .ic-video-2 {
            background-image: url(assets/images/ic-video-2.svg);
        }

        .ic-image-2 {
            background-image: url(assets/images/ic-image-2.png);
        }

        .detailp-main .block-content {
            padding: 15px 0 25px;
            margin: 15px 0 20px;
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
        }

        .the-post .post-images {
            padding: 10px 0 0 10px;
            margin-top: -10px;
            margin-left: -10px;
            margin-bottom: 30px;
            border-radius: 12px;
            overflow: hidden;
            position: relative;
            height: 340px;
            background-color: #fff;
        }

        .the-post .post-images .image-item {
            width: 25%;
            height: 170px;
            float: left;
            border: 4px solid #fff;
            background-color: #242d3a;
            position: relative;
            overflow: hidden;
            border-radius: 15px;
            cursor: pointer;
            display: block;
            object-fit: cover;
            transition: 0.2s all ease-in-out;
            opacity: 0;
        }

        .the-post .post-images .image-item:first-of-type {
            border-left: 0;
        }

        .the-post .post-images:hover {
            opacity: 0.9 !important;
        }

        .the-post .post-images .image-item.lazy_done {
            opacity: 1;
        }

        .the-post .post-images .image-item.image-item-1 {
            width: 50%;
            height: 100%;
        }

        .the-post .post-images.image-layout-1 .image-item {
            width: 100%;
            object-fit: contain;
        }

        .the-post .post-images.image-layout-2 .image-item {
            width: 50%;
            height: 100%;
        }

        .the-post .post-images.image-layout-3 .image-item {
            width: 50%;
            height: 50%;
        }

        .the-post .post-images.image-layout-3 .image-item.image-item-1 {
            width: 50%;
            height: 100%;
        }

        .the-post .post-images.image-layout-4 .image-item {
            width: 25%;
            height: 100%;
        }

        .the-post .post-images.image-layout-4 .image-item.image-item-1 {
            width: 50%;
            height: 100%;
        }

        .the-post .post-images.image-layout-4 .image-item.image-item-2 {
            width: 50%;
            height: 50%;
        }

        .the-post .post-images.image-layout-4 .image-item.image-item-3,
        .the-post .post-images.image-layout-4 .image-item.image-item-4 {
            width: 25%;
            height: 50%;
        }

        .the-post .post-images .image-item.image-item-video::after {
            display: none;
        }

        .the-post .post-images .has-video {
            width: 100%;
            height: 100%;
            display: block;
            z-index: 1;
            position: absolute;
            top: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            pointer-events: none;
        }

        .the-post .post-images .has-video .icon {
            width: 60px;
            height: 60px;
            background: #e4002b url(images/uicon-play-white.svg) center no-repeat;
            background-size: 30px;
            border-radius: 50%;
        }

        .the-post .post-images .image-item:hover img {
            /* transform: scale(1.05); */
        }

        .the-post .post-images .image-more {
            position: absolute;
            bottom: 20px;
            right: 20px;
            padding: 5px 10px;
            background-color: #fff;
            color: #000;
            border-radius: 5px;
            font-weight: normal;
            font-size: 1.1rem;
            pointer-events: none;
        }

        .the-post .post-images .label-thunder {
            position: absolute;
            z-index: 998;
            width: 105px;
            height: 105px;
            top: 4px;
            left: 1px;
            background: url(images/label-thuenhanh.png) center no-repeat;
            background-size: contain;
        }

        .the-post .post-images .label-thunder.thue {
            background: url(images/label-thuenhanh.png) center no-repeat;
            background-size: contain;
        }

        .the-post .post-images .image-item.no-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
            opacity: 1;
        }

        .popup-images-fullscreen {
            position: fixed;
            z-index: 2000000001;
            background-color: #fff;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            -webkit-transition: opacity 0.3s;
            -moz-transition: opacity 0.3s;
            -o-transition: opacity 0.3s;
            -ms-transition: opacity 0.3s;
            transition: opacity 0.3s;
            -webkit-transform: translateY(100%);
            -moz-transform: translateY(100%);
            -ms-transform: translateY(100%);
            transform: translateY(100%);
            opacity: 0;
            visibility: hidden;
        }

        body.popup-images-fullscreen-overflow-hidden {
            overflow: hidden !important;
        }

        body.popup-images-fullscreen-overflow-hidden .popup-images-fullscreen {
            -webkit-transform: translateY(0);
            -moz-transform: translateY(0);
            -ms-transform: translateY(0);
            transform: translateY(0);
            opacity: 1;
            visibility: visible;
        }

        .popup-images-fullscreen .popup-header {
            display: flex;
            align-items: center;
            position: sticky;
            top: 0;
            width: 100%;
            height: 60px;
            /* box-shadow: rgb(88 102 126 / 8%) 0px 0px 30px, rgb(88 102 126 / 12%) 0px 1px 2px; */
            border-bottom: 1px solid #eee;
        }

        .popup-images-fullscreen .popup-content {
            padding-top: 0;
            padding-bottom: 120px;
            width: 100%;
            height: 100%;
            overflow: auto;
            text-align: center;
        }

        .popup-images-fullscreen .video-item {
            width: 740px;
            height: 400px;
            margin: 20px auto;
            border-radius: 10px;
        }

        .popup-images-fullscreen .images-listing {
            max-width: 750px;
            margin: 20px auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .popup-images-fullscreen .images-listing .image-item {
            padding: 5px;
            width: 100%;
            /* height: 300px; */
        }

        /* .popup-images-fullscreen .images-listing .image-item:last-of-type {
            width: 100%;
            height: 500px;
        } */
        .popup-images-fullscreen .images-listing .image-item img {
            width: 100%;
            height: 100%;
            border-radius: 5px;
            object-fit: cover;
        }

        .popup-images-fullscreen .images-listing.count-2 .image-item,
        .popup-images-fullscreen .images-listing.count-3 .image-item {
            width: 100% !important;
            height: 500px !important;
        }

        .popup-images-fullscreen .btn-close-popup {
            width: 40px;
            height: 40px;
            margin-left: 15px;
            background: url(404.html) center no-repeat;
            background-size: 30px;
            text-indent: -999999px;
            cursor: pointer;
        }

        .popup-images-fullscreen .btn-close-popup:hover {
            background-color: #f1f1f1;
            border-radius: 12px;
        }

        .popup-images-fullscreen .price {
            font-weight: bold;
            font-size: 1.2rem;
        }

        .popup-images-fullscreen .price i {
            font-style: normal;
        }

        .popup-images-fullscreen .acreage {
            font-weight: bold;
            font-size: 1.2rem;
            margin-left: 7px;
        }

        .popup-images-fullscreen .acreage::before {
            content: "·";
            font-size: 16px;
            line-height: 24px;
            color: #777;
            margin: 0px 5px;
        }

        .popup-images-fullscreen .post-author img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 10px;
            object-fit: cover;
        }

        .popup-images-fullscreen .post-author span {
            font-weight: bold;
            color: #343a40;
        }

        #bar-sticky {
            /* border-top: 1px solid #eee;
            border-bottom: 1px solid #e5e5e5; */
            height: 50px;
            background-color: #fff;
            margin-bottom: 10px;
            z-index: 998;
        }

        #bar-sticky.js-bar-sticky {
            box-shadow: 0 2px 8px rgb(0 0 0 / 10%);
        }

        #bar-sticky .menu-sticky>li {
            height: 50px;
            margin-right: 0px;
            padding: 0 15px;
            font-weight: bold;
            font-size: 0.8rem;
            text-transform: uppercase;
            cursor: pointer;
            color: #3d3b40;
        }

        #bar-sticky .menu-sticky>li:hover {
            box-shadow: inset 0 -2px 0px 0px rgb(247 55 88);
        }

        #bar-sticky .menu-sticky>li .icon {
            width: 20px;
            height: 20px;
        }

        .detailp .ic-image {
            background-image: url(assets/images/ic-image-white.svg);
        }
    </style>

    <div class="container">
        {{-- <div class="detailp-toolbar-mobile">
        <a
            href="javascript:void(0);"
            class="js_jump_image"
            style=""
        >
            <i class="icon ic-image1"></i>
            6 ảnh
        </a>
        <a
            href="javascript:void(0);"
            class="js_jump_video"
            style="color: #ccc"
        >
            <i class="icon ic-video-2"></i> Video
        </a>
        <a href="#map">
            <i class="icon ic-map"></i>
            Bản đồ
        </a>
        <a href="javascript:;" onclick="saveFav(170151)">
            <i id="savefav-170151" class="icon ic-heart"></i>
            <span id="save-fav">Lưu tin này</span>
        </a>
    </div> --}}

        <div class="detailp-left">
            <div id="overview" class="detailp-main boxshadow bg-white">
                <header class="post-header">
                    <h1 class="page-h1 font-merriweather-bold mb-3" style="color: #ea2e9d">
                        {{ $chitietPhongtro->name }}
                    </h1>
                    <div class="post-features d-none d-xl-flex flex-wrap justify-content-between">
                        <p class="item post-address d-flex align-items-center my-3 w-100">
                            <i class="icon ic-address"></i>
                            <span>
                                Địa chỉ:
                                <span style="color: #777">{{ $chitietPhongtro->wards->name }},
                                    {{ $chitietPhongtro->districts->name }}, {{ $chitietPhongtro->provinces->name }}
                                </span>
                            </span>
                            <a href="#map" class="ms-3 d-flex align-items-center text-dark">
                                <i class="icon google-maps"></i> Xem
                                bản đồ
                            </a>
                        </p>
                        <div class="item-wrap">
                            <span class="item post-price d-inline-flex align-items-center me-4">
                                <i class="icon ic-tag"></i> {{ number_format($chitietPhongtro->gia_tien) }}
                                Tri&#x1EC7;u/th&#xE1;ng
                            </span>
                            <span class="item post-acreage d-inline-flex align-items-center me-4">
                                <i class="icon ic-expand"></i> {{ $chitietPhongtro->dien_tich }}
                                m&#xB2;
                            </span>
                            <span class="item post-hashtag d-inline-flex align-items-center">
                                <i class="icon ic-hashtag"></i>
                                170151
                            </span>
                        </div>
                        <span class="item post-published d-inline-flex align-items-center">
                            <i class="icon ic-clock"></i>
                            <span style="color: #777">{{ $chitietPhongtro->created_at }}</span>
                        </span>
                    </div>

                </header>
                <div class="section-content">
                    <div class="the-post">
                        <div class="post-images image-layout-4 clearfix">



                            <?php
                            $images = json_decode($chitietPhongtro->image, true);
                            $i = 1;
                            ?>

                            @foreach ($images as $item)
                                <a data-fancybox="gallery" href="{{ Storage::url($item) }}">
                                    <img loading="lazy" class="image-item image-item-{{ $i++ }} lazy_done"
                                        alt="Khu trọ mới xây - an ninh - sạch sẽ - giờ giấc tự do - riêng chủ - khóa vân tay - giá chỉ từ 2,6tr"
                                        src="{{ Storage::url($item) }}" />
                                </a>
                            @endforeach


                        </div>
                    </div>
                    <h2 class="section-title">Thông tin mô tả</h2>
                    <p>
                        <b>Khu vực:</b>
                        <a href="cho-thue-phong-tro-vung-tau.html" style="color: #055699"
                            title="Cho thu&#xEA; ph&#xF2;ng tr&#x1ECD; V&#x169;ng T&#xE0;u">Cho thu&#xEA; ph&#xF2;ng
                            tr&#x1ECD;
                            V&#x169;ng T&#xE0;u</a>
                    </p>
                    <div>
                        {!! $chitietPhongtro->content ?? 'đang cập nhật nội dung....' !!}
                    </div>
                </div>
                <div id="map" class="section-map">
                    <h2 class="section-title">
                        Vị trí trên bản đồ
                    </h2>
                    <p class="d-flex align-items-center mt-0 mb-3">
                        <i class="icon ic-address"></i>{{ $chitietPhongtro->wards->name }},
                        {{ $chitietPhongtro->districts->name }}, {{ $chitietPhongtro->provinces->name }}
                    </p>
                    <div class="post-map-ifram-wrap d-xl-block d-none">
                        {{-- <iframe width="100%" height="100%" frameborder="0" style="border: 0"
                            src="https://www.google.com/maps/embed/v1/place?q=Ph%e1%bb%91%20B%c3%a0%20Huy%e1%bb%87n%20Thanh%20Quan,%20Ph%c6%b0%e1%bb%9dng%204,%20V%c5%a9ng%20T%c3%a0u,%20B%c3%a0%20R%e1%bb%8ba%20V%c5%a9ng%20T%c3%a0u&amp;key=AIzaSyAYhAQ8OZ64kCDMxSiuZtUTlwRDCh4gWHs&amp;zoom=14"
                            allowfullscreen=""></iframe> --}}


                            {!!$chitietPhongtro->link_ban_do!!}

                    </div>
                </div>
                <div class="section-detail">
                    <h2 class="section-title w-100">
                        Đặc điểm tin đăng
                    </h2>
                    <div class="section-detail-row">
                        <strong>Ngày cập nhật</strong>
                        <span>03/03/2025</span>
                    </div>
                    <div class="section-detail-row">
                        <strong>Ngày hết hạn</strong>
                        <span>05/03/2025</span>
                    </div>
                    <div class="section-detail-row">
                        <strong>Loại tin</strong>
                        <span style="color: #ea2e9d">VIP 3</span>
                    </div>
                    <div class="section-detail-row">
                        <strong>Mã tin</strong>
                        <span>170151</span>
                    </div>
                </div>
                <div class="section-report">
                    <div class="text">
                        Bạn đang xem nội dung tin đăng
                        <em>
                            "Khu tr&#x1ECD; m&#x1EDB;i x&#xE2;y - an
                            ninh - s&#x1EA1;ch s&#x1EBD; -
                            gi&#x1EDD; gi&#x1EA5;c t&#x1EF1; do -
                            ri&#xEA;ng ch&#x1EE7; - kh&#xF3;a
                            v&#xE2;n tay - gi&#xE1; ch&#x1EC9;
                            t&#x1EEB; 2,6tr".
                        </em>
                        Mọi thông tin liên quan đến tin đăng này chỉ
                        mang tín chất tham khảo. Nếu bạn có phản hồi
                        với tin đăng này (báo xấu, tin đã cho thuê,
                        không liên lạc được,...), vui lòng thông báo
                        để chúng tôi xử lý.
                    </div>
                    <div class="action">
                        <a href="lien-he4360.html?post_id=170151" target="_blank">
                            <i class="icon ic-report-flag"></i> Gửi
                            phản hồi
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="detailp-right">
            <div class="detailp-user boxshadow bg-white">
                <div class="detailp-user-top">
                    <div class="avatar">
                        <img src="images/avatar/5d0ce3d35906430cb5b1201f59aa3f14.png" alt="avatar" />
                    </div>
                    <div class="detail">
                        <strong>Myn Huy House</strong>
                        <span>Ngày tham gia: 27/02/2025</span>
                    </div>
                </div>
                <div class="detailp-user-bottom">
                    <a href="https://zalo.me/0707670145" target="_blank">
                        <i class="icon ic-chat"></i> Nhắn Zalo
                    </a>
                    <a class="js-show-phone" data-phone="0707670145">
                        <i class="icon ic-phone"></i>
                        <strong>0707670145</strong>
                    </a>
                </div>
            </div>
            <div class="section-report"></div>
            <section class="detailp-location boxshadow bg-white">
                <div class="section-header">
                    <h2 class="section-title font-merriweather-bold">
                        Cho thuê phòng trọ Bà Rịa Vũng Tàu
                    </h2>
                </div>
                <ul class="list-links clearfix list-unstyled mb-0">
                    <li>
                        <a title="Cho thuê phòng trọ Châu Đức" href="cho-thue-phong-tro-chau-duc.html" style="">Cho
                            thuê phòng trọ Châu Đức</a>
                    </li>
                    <li>
                        <a title="Cho thuê phòng trọ Côn Đảo" href="cho-thue-phong-tro-con-dao.html" style="">Cho
                            thuê phòng trọ Côn Đảo</a>
                    </li>
                    <li>
                        <a title="Cho thuê phòng trọ Đất Đỏ" href="cho-thue-phong-tro-dat-do.html" style="">Cho
                            thuê phòng trọ Đất Đỏ</a>
                    </li>
                    <li>
                        <a title="Cho thuê phòng trọ Long Điền" href="cho-thue-phong-tro-long-dien.html" style="">Cho
                            thuê phòng trọ Long Điền</a>
                    </li>
                    <li>
                        <a title="Cho thuê phòng trọ Phú Mỹ" href="cho-thue-phong-tro-phu-my-vt.html" style="">Cho
                            thuê phòng trọ Phú Mỹ</a>
                    </li>
                    <li>
                        <a title="Cho thuê phòng trọ Xuyên Mộc" href="cho-thue-phong-tro-xuyen-moc.html" style="">Cho
                            thuê phòng trọ Xuyên Mộc</a>
                    </li>
                    <li>
                        <a title="Cho thuê phòng trọ Vũng Tàu" href="cho-thue-phong-tro-vung-tau.html"
                            style="color: #e4002b">Cho thuê phòng trọ Vũng Tàu</a>
                    </li>
                    <li>
                        <a title="Cho thuê phòng trọ Bà Rịa" href="cho-thue-phong-tro-ba-ria.html" style="">Cho
                            thuê phòng trọ Bà Rịa</a>
                    </li>
                </ul>
            </section>
        </div>
        <div class="clearfix"></div>
        <div class="detailp-other-mobile">
            <section class="homepage-feature">
                <h2 class="section-title font-merriweather-bold">
                    Tin đăng cùng khu vực
                </h2>
                <div class="property-layout">
                    <article class="property-item vip5-item">
                        <a href="cho-thue-phong-tro-uu-tien-doi-tuong-la-sinh-vien-va-nhan-vien-van-phong-170144.html"
                            class="d-block boxshadow bg-white">
                            <figure class="thumb mb-0">
                                <img src="../img.thuephongtro.com/images/thumb/2025/02/21/20250221141552-rairz.jpg"
                                    alt="Cho thuê phòng trọ. Ưu tiên đối tượng là sinh viên và nhân viên văn phòng"
                                    loading="lazy" />
                            </figure>
                            <aside class="post-aside" style="">
                                <h4 class="title limit-text-2">
                                    Cho thuê phòng trọ. Ưu tiên đối
                                    tượng là sinh viên và nhân viên
                                    văn phòng
                                </h4>
                                <span class="price">1.8 Triệu/tháng</span>
                                <div class="info-features">
                                    <span class="feature-item">
                                        <i class="icon ic-expand"></i>23.5 m&#xB2;
                                    </span>
                                </div>
                                <div class="post-address limit-text-2"
                                    style="
                                    border-bottom: 0;
                                    margin-top: 5px;
                                    margin-bottom: 0;
                                    padding: 0;
                                ">
                                    <span>
                                        Vũng Tàu, Bà Rịa Vũng Tàu
                                    </span>
                                </div>
                            </aside>
                        </a>
                    </article>
                    <article class="property-item vip5-item">
                        <a href="cho-thue-phong-tro-24m2-moi-xay-2020-duong-pham-hong-thai-gan-nga-tu-gieng-nuoc-coopmart-vung-tau-156837.html"
                            class="d-block boxshadow bg-white">
                            <figure class="thumb mb-0">
                                <img src="../img.thuephongtro.com/images/thumb/2020/04/07/20200407074614-wlkih.jpg"
                                    alt="Cho thuê phòng trọ 24m2 mới xây 2020 đường Phạm Hồng Thái, gần ngã tư Giếng Nước Coopmart vũng tàu"
                                    loading="lazy" />
                            </figure>
                            <aside class="post-aside" style="">
                                <h4 class="title limit-text-2">
                                    Cho thuê phòng trọ 24m2 mới xây
                                    2020 đường Phạm Hồng Thái, gần
                                    ngã tư Giếng Nước Coopmart vũng
                                    tàu
                                </h4>
                                <span class="price">2.05 Triệu/tháng</span>
                                <div class="info-features">
                                    <span class="feature-item">
                                        <i class="icon ic-expand"></i>24 m&#xB2;
                                    </span>
                                </div>
                                <div class="post-address limit-text-2"
                                    style="
                                    border-bottom: 0;
                                    margin-top: 5px;
                                    margin-bottom: 0;
                                    padding: 0;
                                ">
                                    <span>
                                        Vũng Tàu, Bà Rịa Vũng Tàu
                                    </span>
                                </div>
                            </aside>
                        </a>
                    </article>
                    <article class="property-item vip5-item">
                        <a href="cho-thue-phong-tro-moi-co-gac-camera-chong-trom-gan-cho-truong-hoc-gia-3tr-168611.html"
                            class="d-block boxshadow bg-white">
                            <figure class="thumb mb-0">
                                <img src="../img.thuephongtro.com/images/thumb/2022/02/13/20220213173953-0x4ud.jpg"
                                    alt="Cho thuê phòng trọ mới có gác , camera chống trộm, gần chợ ,trường học giá 3tr"
                                    loading="lazy" />
                            </figure>
                            <aside class="post-aside" style="">
                                <h4 class="title limit-text-2">
                                    Cho thuê phòng trọ mới có gác ,
                                    camera chống trộm, gần chợ
                                    ,trường học giá 3tr
                                </h4>
                                <span class="price">3 Triệu/tháng</span>
                                <div class="info-features">
                                    <span class="feature-item">
                                        <i class="icon ic-expand"></i>35 m&#xB2;
                                    </span>
                                </div>
                                <div class="post-address limit-text-2"
                                    style="
                                    border-bottom: 0;
                                    margin-top: 5px;
                                    margin-bottom: 0;
                                    padding: 0;
                                ">
                                    <span>
                                        Vũng Tàu, Bà Rịa Vũng Tàu
                                    </span>
                                </div>
                            </aside>
                        </a>
                    </article>
                    <article class="property-item vip5-item">
                        <a href="cho-thue-phong-tro-thanh-pho-vung-tau-168072.html" class="d-block boxshadow bg-white">
                            <figure class="thumb mb-0">
                                <img src="../img.thuephongtro.com/images/thumb/2021/10/27/20211027113938-inlg3.jpg"
                                    alt="Cho thuê phòng trọ thành phố Vũng Tàu" loading="lazy" />
                            </figure>
                            <aside class="post-aside" style="">
                                <h4 class="title limit-text-2">
                                    Cho thuê phòng trọ thành phố
                                    Vũng Tàu
                                </h4>
                                <span class="price">1 Triệu/tháng</span>
                                <div class="info-features">
                                    <span class="feature-item">
                                        <i class="icon ic-expand"></i>18 m&#xB2;
                                    </span>
                                </div>
                                <div class="post-address limit-text-2"
                                    style="
                                    border-bottom: 0;
                                    margin-top: 5px;
                                    margin-bottom: 0;
                                    padding: 0;
                                ">
                                    <span>
                                        Vũng Tàu, Bà Rịa Vũng Tàu
                                    </span>
                                </div>
                            </aside>
                        </a>
                    </article>
                    <article class="property-item vip5-item">
                        <a href="cho-thue-nha-nguyen-can-nha-tro-khach-san-nha-nghi-167868.html"
                            class="d-block boxshadow bg-white">
                            <figure class="thumb mb-0">
                                <img src="images/default.jpg" alt="Cho Thuê Nhà Nguyên Căn, Nhà Trọ, Khách Sạn, Nhà Nghỉ"
                                    loading="lazy" />
                            </figure>
                            <aside class="post-aside" style="">
                                <h4 class="title limit-text-2">
                                    Cho Thuê Nhà Nguyên Căn, Nhà
                                    Trọ, Khách Sạn, Nhà Nghỉ
                                </h4>
                                <span class="price">7 Triệu/tháng</span>
                                <div class="info-features">
                                    <span class="feature-item">
                                        <i class="icon ic-expand"></i>300 m&#xB2;
                                    </span>
                                </div>
                                <div class="post-address limit-text-2"
                                    style="
                                    border-bottom: 0;
                                    margin-top: 5px;
                                    margin-bottom: 0;
                                    padding: 0;
                                ">
                                    <span>
                                        Vũng Tàu, Bà Rịa Vũng Tàu
                                    </span>
                                </div>
                            </aside>
                        </a>
                    </article>
                    <article class="property-item vip5-item">
                        <a href="cho-thue-phong-tro-hem-944-duong-30-4-167688.html" class="d-block boxshadow bg-white">
                            <figure class="thumb mb-0">
                                <img src="../img.thuephongtro.com/images/thumb/2021/06/17/20210617134137-ihhse.jpg"
                                    alt="CHO THUÊ PHÒNG TRỌ HẺM 944 ĐƯỜNG 30/4" loading="lazy" />
                            </figure>
                            <aside class="post-aside" style="">
                                <h4 class="title limit-text-2">
                                    CHO THUÊ PHÒNG TRỌ HẺM 944 ĐƯỜNG
                                    30/4
                                </h4>
                                <span class="price">1 Triệu/tháng</span>
                                <div class="info-features">
                                    <span class="feature-item">
                                        <i class="icon ic-expand"></i>20 m&#xB2;
                                    </span>
                                </div>
                                <div class="post-address limit-text-2"
                                    style="
                                    border-bottom: 0;
                                    margin-top: 5px;
                                    margin-bottom: 0;
                                    padding: 0;
                                ">
                                    <span>
                                        Vũng Tàu, Bà Rịa Vũng Tàu
                                    </span>
                                </div>
                            </aside>
                        </a>
                    </article>
                    <article class="property-item vip5-item">
                        <a href="cho-thue-phong-tro-gan-vong-xoay-dong-xuyen-159599.html"
                            class="d-block boxshadow bg-white">
                            <figure class="thumb mb-0">
                                <img src="images/default.jpg" alt="Cho thuê phòng trọ gần vòng xoay Đông Xuyên"
                                    loading="lazy" />
                            </figure>
                            <aside class="post-aside" style="">
                                <h4 class="title limit-text-2">
                                    Cho thuê phòng trọ gần vòng xoay
                                    Đông Xuyên
                                </h4>
                                <span class="price">1 Triệu/tháng</span>
                                <div class="info-features">
                                    <span class="feature-item">
                                        <i class="icon ic-expand"></i>20 m&#xB2;
                                    </span>
                                </div>
                                <div class="post-address limit-text-2"
                                    style="
                                    border-bottom: 0;
                                    margin-top: 5px;
                                    margin-bottom: 0;
                                    padding: 0;
                                ">
                                    <span>
                                        Vũng Tàu, Bà Rịa Vũng Tàu
                                    </span>
                                </div>
                            </aside>
                        </a>
                    </article>
                    <article class="property-item vip5-item">
                        <a href="cho-thue-phong-tro-o-lau-1-duong-tran-dong-157603.html"
                            class="d-block boxshadow bg-white">
                            <figure class="thumb mb-0">
                                <img src="../img.thuephongtro.com/images/thumb/2020/05/30/20200530182107-0mz2t.jpg"
                                    alt="Cho thuê phòng trọ ở lầu 1 đường Trần Đồng" loading="lazy" />
                            </figure>
                            <aside class="post-aside" style="">
                                <h4 class="title limit-text-2">
                                    Cho thuê phòng trọ ở lầu 1 đường
                                    Trần Đồng
                                </h4>
                                <span class="price">5 Triệu/tháng</span>
                                <div class="info-features">
                                    <span class="feature-item">
                                        <i class="icon ic-expand"></i>50 m&#xB2;
                                    </span>
                                </div>
                                <div class="post-address limit-text-2"
                                    style="
                                    border-bottom: 0;
                                    margin-top: 5px;
                                    margin-bottom: 0;
                                    padding: 0;
                                ">
                                    <span>
                                        Vũng Tàu, Bà Rịa Vũng Tàu
                                    </span>
                                </div>
                            </aside>
                        </a>
                    </article>
                </div>
            </section>
        </div>
        <div class="bottom-toolbar d-block d-xl-none">
            <div class="inner">
                <a class="action-item sms" href="sms:/0707670145">
                    <i class="icon ic-chat"></i> Nhắn tin
                </a>
                <a class="action-item zalo" href="https://zalo.me/0707670145">
                    Zalo
                </a>
                <a class="action-item call" href="tel:0707670145">
                    <i class="icon ic-phone"></i>
                    <span>0707670145</span>
                </a>
            </div>
        </div>
    </div>

    <div class="container">
        <section class="homepage-feature">
            <h2 class="section-title font-merriweather-bold">
                Tin đăng cùng khu vực
            </h2>
            <div class="property-layout" style="margin-left: -10px; margin-bottom: 20px">
                <article class="property-item vip5-item" style="margin-left: 10px">
                    <a href="cho-thue-phong-tro-uu-tien-doi-tuong-la-sinh-vien-va-nhan-vien-van-phong-170144.html"
                        class="d-block boxshadow bg-white">
                        <figure class="thumb mb-0">
                            <img src="../img.thuephongtro.com/images/thumb/2025/02/21/20250221141552-rairz.jpg"
                                alt="Cho thuê phòng trọ. Ưu tiên đối tượng là sinh viên và nhân viên văn phòng"
                                loading="lazy" />
                            <span class="number-image">
                                <i class="icon ic-image"></i>
                                0
                            </span>
                        </figure>
                        <aside class="post-aside">
                            <h4 class="title limit-text-2">
                                Cho thuê phòng trọ. Ưu tiên đối
                                tượng là sinh viên và nhân viên văn
                                phòng
                            </h4>
                            <div class="info-features">
                                <span class="price"
                                    style="
                                    float: left;
                                    padding-right: 20px;
                                ">1.8
                                    Triệu/tháng</span>
                                <span class="feature-item" style="float: left">
                                    <i class="icon ic-expand"></i>23.5 m&#xB2;
                                </span>
                            </div>
                            <div class="clearfix"></div>
                            <div class="post-address limit-text-2"
                                style="
                                border-bottom: 0;
                                margin-top: 5px;
                            ">
                                <i class="icon ic-address"></i>
                                <span>
                                    Vũng Tàu, Bà Rịa Vũng Tàu
                                </span>
                            </div>
                        </aside>
                    </a>
                </article>
                <article class="property-item vip5-item" style="margin-left: 10px">
                    <a href="cho-thue-phong-tro-24m2-moi-xay-2020-duong-pham-hong-thai-gan-nga-tu-gieng-nuoc-coopmart-vung-tau-156837.html"
                        class="d-block boxshadow bg-white">
                        <figure class="thumb mb-0">
                            <img src="../img.thuephongtro.com/images/thumb/2020/04/07/20200407074614-wlkih.jpg"
                                alt="Cho thuê phòng trọ 24m2 mới xây 2020 đường Phạm Hồng Thái, gần ngã tư Giếng Nước Coopmart vũng tàu"
                                loading="lazy" />
                            <span class="number-image">
                                <i class="icon ic-image"></i>
                                6
                            </span>
                        </figure>
                        <aside class="post-aside">
                            <h4 class="title limit-text-2">
                                Cho thuê phòng trọ 24m2 mới xây 2020
                                đường Phạm Hồng Thái, gần ngã tư
                                Giếng Nước Coopmart vũng tàu
                            </h4>
                            <div class="info-features">
                                <span class="price"
                                    style="
                                    float: left;
                                    padding-right: 20px;
                                ">2.05
                                    Triệu/tháng</span>
                                <span class="feature-item" style="float: left">
                                    <i class="icon ic-expand"></i>24
                                    m&#xB2;
                                </span>
                            </div>
                            <div class="clearfix"></div>
                            <div class="post-address limit-text-2"
                                style="
                                border-bottom: 0;
                                margin-top: 5px;
                            ">
                                <i class="icon ic-address"></i>
                                <span>
                                    Vũng Tàu, Bà Rịa Vũng Tàu
                                </span>
                            </div>
                        </aside>
                    </a>
                </article>
                <article class="property-item vip5-item" style="margin-left: 10px">
                    <a href="cho-thue-phong-tro-moi-co-gac-camera-chong-trom-gan-cho-truong-hoc-gia-3tr-168611.html"
                        class="d-block boxshadow bg-white">
                        <figure class="thumb mb-0">
                            <img src="../img.thuephongtro.com/images/thumb/2022/02/13/20220213173953-0x4ud.jpg"
                                alt="Cho thuê phòng trọ mới có gác , camera chống trộm, gần chợ ,trường học giá 3tr"
                                loading="lazy" />
                            <span class="number-image">
                                <i class="icon ic-image"></i>
                                4
                            </span>
                        </figure>
                        <aside class="post-aside">
                            <h4 class="title limit-text-2">
                                Cho thuê phòng trọ mới có gác ,
                                camera chống trộm, gần chợ ,trường
                                học giá 3tr
                            </h4>
                            <div class="info-features">
                                <span class="price"
                                    style="
                                    float: left;
                                    padding-right: 20px;
                                ">3
                                    Triệu/tháng</span>
                                <span class="feature-item" style="float: left">
                                    <i class="icon ic-expand"></i>35
                                    m&#xB2;
                                </span>
                            </div>
                            <div class="clearfix"></div>
                            <div class="post-address limit-text-2"
                                style="
                                border-bottom: 0;
                                margin-top: 5px;
                            ">
                                <i class="icon ic-address"></i>
                                <span>
                                    Vũng Tàu, Bà Rịa Vũng Tàu
                                </span>
                            </div>
                        </aside>
                    </a>
                </article>
                <article class="property-item vip5-item" style="margin-left: 10px">
                    <a href="cho-thue-phong-tro-thanh-pho-vung-tau-168072.html" class="d-block boxshadow bg-white">
                        <figure class="thumb mb-0">
                            <img src="../img.thuephongtro.com/images/thumb/2021/10/27/20211027113938-inlg3.jpg"
                                alt="Cho thuê phòng trọ thành phố Vũng Tàu" loading="lazy" />
                            <span class="number-image">
                                <i class="icon ic-image"></i>
                                5
                            </span>
                        </figure>
                        <aside class="post-aside">
                            <h4 class="title limit-text-2">
                                Cho thuê phòng trọ thành phố Vũng
                                Tàu
                            </h4>
                            <div class="info-features">
                                <span class="price"
                                    style="
                                    float: left;
                                    padding-right: 20px;
                                ">1
                                    Triệu/tháng</span>
                                <span class="feature-item" style="float: left">
                                    <i class="icon ic-expand"></i>18
                                    m&#xB2;
                                </span>
                            </div>
                            <div class="clearfix"></div>
                            <div class="post-address limit-text-2"
                                style="
                                border-bottom: 0;
                                margin-top: 5px;
                            ">
                                <i class="icon ic-address"></i>
                                <span>
                                    Vũng Tàu, Bà Rịa Vũng Tàu
                                </span>
                            </div>
                        </aside>
                    </a>
                </article>
            </div>
            <div class="property-layout" style="margin-left: -10px">
                <article class="property-item vip5-item" style="margin-left: 10px">
                    <a href="cho-thue-nha-nguyen-can-nha-tro-khach-san-nha-nghi-167868.html"
                        class="d-block boxshadow bg-white">
                        <figure class="thumb mb-0">
                            <img src="images/default.jpg" alt="Cho Thuê Nhà Nguyên Căn, Nhà Trọ, Khách Sạn, Nhà Nghỉ"
                                loading="lazy" />
                            <span class="number-image">
                                <i class="icon ic-image"></i>
                                0
                            </span>
                        </figure>
                        <aside class="post-aside">
                            <h4 class="title limit-text-2">
                                Cho Thuê Nhà Nguyên Căn, Nhà Trọ,
                                Khách Sạn, Nhà Nghỉ
                            </h4>
                            <div class="info-features">
                                <span class="price"
                                    style="
                                    float: left;
                                    padding-right: 20px;
                                ">7
                                    Triệu/tháng</span>
                                <span class="feature-item" style="float: left">
                                    <i class="icon ic-expand"></i>300 m&#xB2;
                                </span>
                            </div>
                            <div class="clearfix"></div>
                            <div class="post-address limit-text-2"
                                style="
                                border-bottom: 0;
                                margin-top: 5px;
                            ">
                                <i class="icon ic-address"></i>
                                <span>
                                    Vũng Tàu, Bà Rịa Vũng Tàu
                                </span>
                            </div>
                        </aside>
                    </a>
                </article>
                <article class="property-item vip5-item" style="margin-left: 10px">
                    <a href="cho-thue-phong-tro-hem-944-duong-30-4-167688.html" class="d-block boxshadow bg-white">
                        <figure class="thumb mb-0">
                            <img src="../img.thuephongtro.com/images/thumb/2021/06/17/20210617134137-ihhse.jpg"
                                alt="CHO THUÊ PHÒNG TRỌ HẺM 944 ĐƯỜNG 30/4" loading="lazy" />
                            <span class="number-image">
                                <i class="icon ic-image"></i>
                                6
                            </span>
                        </figure>
                        <aside class="post-aside">
                            <h4 class="title limit-text-2">
                                CHO THUÊ PHÒNG TRỌ HẺM 944 ĐƯỜNG
                                30/4
                            </h4>
                            <div class="info-features">
                                <span class="price"
                                    style="
                                    float: left;
                                    padding-right: 20px;
                                ">1
                                    Triệu/tháng</span>
                                <span class="feature-item" style="float: left">
                                    <i class="icon ic-expand"></i>20
                                    m&#xB2;
                                </span>
                            </div>
                            <div class="clearfix"></div>
                            <div class="post-address limit-text-2"
                                style="
                                border-bottom: 0;
                                margin-top: 5px;
                            ">
                                <i class="icon ic-address"></i>
                                <span>
                                    Vũng Tàu, Bà Rịa Vũng Tàu
                                </span>
                            </div>
                        </aside>
                    </a>
                </article>
                <article class="property-item vip5-item" style="margin-left: 10px">
                    <a href="cho-thue-phong-tro-gan-vong-xoay-dong-xuyen-159599.html" class="d-block boxshadow bg-white">
                        <figure class="thumb mb-0">
                            <img src="images/default.jpg" alt="Cho thuê phòng trọ gần vòng xoay Đông Xuyên"
                                loading="lazy" />
                            <span class="number-image">
                                <i class="icon ic-image"></i>
                                0
                            </span>
                        </figure>
                        <aside class="post-aside">
                            <h4 class="title limit-text-2">
                                Cho thuê phòng trọ gần vòng xoay
                                Đông Xuyên
                            </h4>
                            <div class="info-features">
                                <span class="price"
                                    style="
                                    float: left;
                                    padding-right: 20px;
                                ">1
                                    Triệu/tháng</span>
                                <span class="feature-item" style="float: left">
                                    <i class="icon ic-expand"></i>20
                                    m&#xB2;
                                </span>
                            </div>
                            <div class="clearfix"></div>
                            <div class="post-address limit-text-2"
                                style="
                                border-bottom: 0;
                                margin-top: 5px;
                            ">
                                <i class="icon ic-address"></i>
                                <span>
                                    Vũng Tàu, Bà Rịa Vũng Tàu
                                </span>
                            </div>
                        </aside>
                    </a>
                </article>
                <article class="property-item vip5-item" style="margin-left: 10px">
                    <a href="cho-thue-phong-tro-o-lau-1-duong-tran-dong-157603.html" class="d-block boxshadow bg-white">
                        <figure class="thumb mb-0">
                            <img src="../img.thuephongtro.com/images/thumb/2020/05/30/20200530182107-0mz2t.jpg"
                                alt="Cho thuê phòng trọ ở lầu 1 đường Trần Đồng" loading="lazy" />
                            <span class="number-image">
                                <i class="icon ic-image"></i>
                                5
                            </span>
                        </figure>
                        <aside class="post-aside">
                            <h4 class="title limit-text-2">
                                Cho thuê phòng trọ ở lầu 1 đường
                                Trần Đồng
                            </h4>
                            <div class="info-features">
                                <span class="price"
                                    style="
                                    float: left;
                                    padding-right: 20px;
                                ">5
                                    Triệu/tháng</span>
                                <span class="feature-item" style="float: left">
                                    <i class="icon ic-expand"></i>50
                                    m&#xB2;
                                </span>
                            </div>
                            <div class="clearfix"></div>
                            <div class="post-address limit-text-2"
                                style="
                                border-bottom: 0;
                                margin-top: 5px;
                            ">
                                <i class="icon ic-address"></i>
                                <span>
                                    Vũng Tàu, Bà Rịa Vũng Tàu
                                </span>
                            </div>
                        </aside>
                    </a>
                </article>
            </div>
        </section>
    </div>
@endsection
