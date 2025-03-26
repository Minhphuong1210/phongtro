@extends('Layout.LayoutFrontend.Master')
@section('title')
    Trang chủ
@endsection
@section('content')
    <div class="container">
        <div id="breadcrumb">
            <ol class="clearfix" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="index.html"><span itemprop="name">Trang chủ</span></a>
                    <meta itemprop="position" content="1" />
                </li>
                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="cho-thue-phong-tro.html"><span itemprop="name">Cho thuê phòng trọ</span></a>
                    <meta itemprop="position" content="2" />
                </li>
            </ol>
        </div>
        <h1 class="page-h1 font-merriweather-bold">
            Cho Thuê Phòng Trọ, Giá Rẻ, Mới Nhất Trên Toàn Quốc
        </h1>
        <div class="listpage-left mt-3 ">
            <div class="section-posts mb-5">
                <div class="section-header d-flex align-items-center justify-content-between mb-2">
                    <h2 class="mb-0">
                        Tìm thấy {{ $countTotalPhontro }} tin cho thu&#xEA; ph&#xF2;ng
                        tr&#x1ECD;
                    </h2>
                    <div class="post-sort-bar">
                        <span>Sắp xếp:</span>
                        <div class="select-wrap">
                            <select class="js-slect-filter" onchange="search(this.value)">
                                <option value="1">Mặc định</option>
                                <option value="2">
                                    Tin mới đăng
                                </option>
                            </select><i></i>
                        </div>
                    </div>
                </div>
                <div class="post-listing">
                    @foreach ($phongtros as $phongtro)
                        <div class="getphongtro">
                            <article class="post-item vip2-item boxshadow bg-white">
                                <a href="{{ route('chi_tiet', $phongtro->slug) }}">

                                    <?php
                                    
                                    $image = json_decode($phongtro->image);
                                    $firstImage = $image[0];
                                    
                                    ?>

                                    <figure class="thumb">
                                        <img src="{{ Storage::url($firstImage) }}"
                                            alt="Khu trọ mới xây - an ninh - sạch sẽ - giờ giấc tự do - riêng chủ - khóa vân tay - giá chỉ từ 2,6tr"
                                            loading="lazy" />
                                    </figure>
                                    <div class="post-aside">
                                        <h3 class="title">
                                            {{ $phongtro->name }}
                                        </h3>
                                        <div class="post-meta clearfix">
                                            <span class="price">{{ $phongtro->gia_tien }}</span>
                                            <div class="info-features">
                                                <span class="feature-item">
                                                    <i class="icon ic-expand"></i>{{ $phongtro->dien_tich }} m&#xB2;
                                                </span>
                                                <span class="vip-star vip1sao"></span>
                                            </div>
                                        </div>
                                        <div class="post-address">
                                            <i class="icon ic-address"></i>
                                            <span>
                                                {{ $phongtro->districts->name }}, {{ $phongtro->districts->name }}
                                            </span>
                                        </div>
                                        <div class="post-excerpt limit-text-2">
                                            {!! Str::limit($phongtro->content, 50) !!}
                                        </div>
                                        <div class="post-action d-flex justify-content-between align-items-center">
                                            <div class="time d-flex align-items-center">
                                                <i class="icon ic-clock"></i>
                                                <span>Hôm nay</span>
                                            </div>
                                            {{-- <div class="bookmark" >
                                                <span class="btn-save phong_yeu_thich" data-id="{{$phongtro->id}}">
                                                    <i class="icon ic-heart"></i>
                                                </span>
                                            </div> --}}
                                        </div>
                                    </div>
                                </a>
                            </article>
                        </div>
                    @endforeach

                    <span id="du_lieu">

                    </span>

                </div>
                <div class="d-flex justify-content-center">
                    {{ $phongtros->links() }}
                </div>


            </div>
        </div>
        <div class="listpage-right mt-3 ">
            <div class="aside-box boxshadow bg-white">
                <div class="aside-box-title">
                    Xem theo giá cho thuê
                </div>
                <div class="aside-box-content">
                    <ul class="list-links col-2 clearfix">
                        <li>
                            <a rel="nofollow" href="{{ route('theo_gia_va_dien_tich', ['gia' => '0-1']) }}">
                                Dưới 1 triệu
                            </a>
                        </li>
                        <li>
                            <a rel="nofollow" href="{{ route('theo_gia_va_dien_tich', ['gia' => '1-2']) }}">
                                Từ 1 - 2 triệu
                            </a>
                        </li>
                        <li>
                            <a rel="nofollow" href="{{ route('theo_gia_va_dien_tich', ['gia' => '2-4']) }}">
                                Từ 2 - 4 triệu
                            </a>
                        </li>
                        <li>
                            <a rel="nofollow" href="{{ route('theo_gia_va_dien_tich', ['gia' => '4-6']) }}">
                                Từ 4 - 6 triệu
                            </a>
                        </li>
                        <li>
                            <a rel="nofollow" href="{{ route('theo_gia_va_dien_tich', ['gia' => '6-8']) }}">
                                Từ 6 - 8 triệu
                            </a>
                        </li>
                        <li>
                            <a rel="nofollow" href="{{ route('theo_gia_va_dien_tich', ['gia' => '8-10']) }}">
                                Từ 8 - 10 triệu
                            </a>
                        </li>
                        <li>
                            <a rel="nofollow" href="{{ route('theo_gia_va_dien_tich', ['gia' => '10-15']) }}">
                                Từ 10 - 15 triệu
                            </a>
                        </li>
                        <li>
                            <a rel="nofollow" href="{{ route('theo_gia_va_dien_tich', ['gia' => '15-20']) }}">
                                Từ 15 - 20 triệu
                            </a>
                        </li>
                        <li>
                            <a rel="nofollow" href="{{ route('theo_gia_va_dien_tich', ['gia' => '20-100']) }}">
                                Trên 20 triệu
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="aside-box boxshadow bg-white">
                <div class="aside-box-title">
                    Xem theo diện tích
                </div>
                <div class="aside-box-content">
                    <ul class="list-links col-2 clearfix">
                        <li>
                            <a rel="nofollow" href="{{ route('theo_gia_va_dien_tich', ['dien_tich' => '0-20']) }}">Dưới 20
                                m<sup>2</sup></a>
                        </li>
                        <li>
                            <a rel="nofollow" href="{{ route('theo_gia_va_dien_tich', ['dien_tich' => '20-30']) }}">Từ 20 -
                                30m<sup>2</sup></a>
                        </li>
                        <li>
                            <a rel="nofollow" href="{{ route('theo_gia_va_dien_tich', ['dien_tich' => '30-40']) }}">Từ 30 -
                                40m<sup>2</sup></a>
                        </li>
                        <li>
                            <a rel="nofollow" href="{{ route('theo_gia_va_dien_tich', ['dien_tich' => '40-60']) }}">Từ 40 -
                                60m<sup>2</sup></a>
                        </li>
                        <li>
                            <a rel="nofollow" href="{{ route('theo_gia_va_dien_tich', ['dien_tich' => '60-80']) }}">Từ 60 -
                                80m<sup>2</sup></a>
                        </li>
                        <li>
                            <a rel="nofollow" href="{{ route('theo_gia_va_dien_tich', ['dien_tich' => '80-100']) }}">Từ 80
                                -
                                100m<sup>2</sup></a>
                        </li>
                        <li>
                            <a rel="nofollow"
                                href="{{ route('theo_gia_va_dien_tich', ['dien_tich' => '100-1000']) }}">Trên
                                100m<sup>2</sup></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="aside-box boxshadow bg-white aside-article-link">
                <div class="aside-box-title">
                    Có thể bạn quan tâm
                </div>
                <div class="aside-box-content">
                    <div class="news-listing">
                        <a href="kinh-nghiem/co-lay-lai-duoc-tien-coc-khi-da-dat-coc-thue-tro-nhung-chua-o-p28132.html"
                            class="news-item">
                            <figure class="news-thumb">
                                <img src="../img.thuephongtro.com/images/uploads/tien-dat-coc.jpg" />
                            </figure>
                            <aside class="news-aside ms-3">
                                <span class="news-publish">05/12/2024</span>
                                <h3 class="news-title">
                                    Có lấy lại được tiền cọc khi đã
                                    đặt cọc thuê trọ nhưng chưa ở?
                                </h3>
                            </aside>
                        </a>
                        <a href="kinh-nghiem/kinh-doanh-cho-thue-phong-tro-co-phai-dong-thue-gi-hay-khong-p28129.html"
                            class="news-item">
                            <figure class="news-thumb">
                                <img src="../img.thuephongtro.com/images/uploads/20200309134037-bskpl.jpg" />
                            </figure>
                            <aside class="news-aside ms-3">
                                <span class="news-publish">09/03/2020</span>
                                <h3 class="news-title">
                                    {Chia sẻ} Kinh doanh cho thuê
                                    phòng trọ có phải đóng thuế gì
                                    hay không?
                                </h3>
                            </aside>
                        </a>
                        <a href="kinh-nghiem/nhung-dieu-can-luu-y-trong-viec-quan-ly-nha-tro-p28127.html"
                            class="news-item">
                            <figure class="news-thumb">
                                <img src="../img.thuephongtro.com/images/uploads/20200309133059-1nvvd.jpg" />
                            </figure>
                            <aside class="news-aside ms-3">
                                <span class="news-publish">09/03/2020</span>
                                <h3 class="news-title">
                                    Những điều cần lưu ý trong việc
                                    quản lý nhà trọ
                                </h3>
                            </aside>
                        </a>
                        <a href="kinh-nghiem/can-than-khi-di-tim-thue-phong-tro-nha-tro-voi-sinh-vien-moi-p28123.html"
                            class="news-item">
                            <figure class="news-thumb">
                                <img src="../img.thuephongtro.com/images/uploads/20200309120917-p4ard.jpg" />
                            </figure>
                            <aside class="news-aside ms-3">
                                <span class="news-publish">09/03/2020</span>
                                <h3 class="news-title">
                                    Cẩn thận khi đi tìm thuê phòng
                                    trọ, nhà trọ với sinh viên mới
                                </h3>
                            </aside>
                        </a>
                        <a href="kinh-nghiem/nhung-dieu-ban-nen-biet-de-bao-dam-quyen-loi-khi-di-thue-phong-tro-p28122.html"
                            class="news-item">
                            <figure class="news-thumb">
                                <img src="../img.thuephongtro.com/images/uploads/20200309120431-utm0e.jpg" />
                            </figure>
                            <aside class="news-aside ms-3">
                                <span class="news-publish">09/03/2020</span>
                                <h3 class="news-title">
                                    Những điều bạn nên biết để bảo
                                    đảm quyền lợi khi đi thuê phòng
                                    trọ
                                </h3>
                            </aside>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        {{-- </div> --}}
        <div class="clearfix"></div>
        <section class="listpage-content boxshadow bg-white">
            <div class="section-content mt-0 pt-4">
                <p>
                    Được th&agrave;nh lập năm 2011, Thuephongtro.com
                    sau khi trải qua hơn 13 năm hoạt động đ&atilde;
                    c&oacute; thể tự tin với danh hiệu
                    &ldquo;K&ecirc;nh th&ocirc;ng tin ph&ograve;ng
                    trọ số 1 Việt Nam&rdquo;. Thuephongtro.com
                    chuy&ecirc;n đăng tải th&ocirc;ng tin về
                    ph&ograve;ng trọ ở nhiều tỉnh th&agrave;nh lớn
                    tr&ecirc;n cả nước (H&agrave; Nội, Hồ Ch&iacute;
                    Minh, Đ&agrave; Nẵng). Trang web cung cấp cho
                    chủ ph&ograve;ng trọ nền tảng kết nối với
                    kh&aacute;ch h&agrave;ng v&agrave; cung cấp cho
                    người c&oacute; nhu cầu những th&ocirc;ng tin
                    cần thiết về ph&ograve;ng trọ với bộ lọc kết quả
                    th&ocirc;ng minh, chi tiết tối đa.
                </p>
            </div>
        </section>
    </div>
    <style>
        .sub-place .active {
            color: #e4002b;
        }

        ul.tags-list,
        li.tags-list,
        ol.tags-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .tags-list>li {
            float: left;
            margin: 5px 5px 5px 0;
        }

        .tags-list>li>a {
            display: inline-flex;
            align-items: center;
            width: 100%;
            padding: 10px 20px;
            margin: 0;
            position: relative;
            background-color: #fff;
            border: 1px solid #eee;
            border-radius: 30px;
            font-size: 1rem;
            font-weight: bold;
        }

        @media (min-width: 600px) {
            .listpage-content img {
                width: 60%;
            }
        }
    </style>


<script>
    const phong_yeu_thich = document.querySelectorAll('.phong_yeu_thich');
    // console.log(phong_yeu_thich);
    phong_yeu_thich.forEach(item => {
        item.addEventListener('click',function(){
            const id = $(this).data('id');
            // console.log(id);
        })
    });


</script>

@endsection
