@extends('Layout.LayoutFrontend.Master')
@section('title')
    Trang chủ
@endsection
@section('content')
    <div class="container">
        <div id="breadcrumb">
            <ol class="clearfix" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="/"><span itemprop="name">Trang chủ</span></a>
                    <meta itemprop="position" content="1" />
                </li>
                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="#"><span itemprop="name">Cho thuê phòng trọ</span></a>
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
                                    $firstImage = $image[0] ?? 'default.jpg';;
                                   
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
                        <a href="{{ route('thongBao') }}"
                            class="news-item">
                            <figure class="news-thumb">
                                <img src="{{ asset('frontend\assets\images\lay-tien-coc.jpg') }}" />
                            </figure>
                            <aside class="news-aside ms-3">
                                <h3 class="news-title">
                                    Có lấy lại được tiền cọc khi đã
                                    đặt cọc thuê trọ nhưng chưa ở?
                                </h3>
                            </aside>
                        </a>
                        <a href="{{ route('choThueTroCoMatThue') }}  "
                            class="news-item">
                            <figure class="news-thumb">
                                <img src="{{ asset('frontend\assets\images\kinh-daonh-phong-tro-co-thue-khong.jpg') }}" />
                            </figure>
                            <aside class="news-aside ms-3">

                                <h3 class="news-title">
                                    {Chia sẻ} Kinh doanh cho thuê
                                    phòng trọ có phải đóng thuế gì
                                    hay không?
                                </h3>
                            </aside>
                        </a>
                        <a href="{{ route('nhungDieuCanLuuYKhiOTro') }}"
                            class="news-item">
                            <figure class="news-thumb">
                                <img src="{{ asset('frontend\assets\images\luu-y-khi-o-tro.jpg') }}" />
                            </figure>
                            <aside class="news-aside ms-3">
                                <h3 class="news-title">
                                    Những điều cần lưu ý trong việc
                                    quản lý nhà trọ
                                </h3>
                            </aside>
                        </a>
                        <a href="{{ route('quyenLoiKhiThueTro') }}"
                            class="news-item">
                            <figure class="news-thumb">
                                <img src="{{ asset('frontend\assets\images\quyen-loi-khi-thue-nha.jpg') }}" />
                            </figure>
                            <aside class="news-aside ms-3">
                                <h3 class="news-title">
                                    Cẩn thận khi đi tìm thuê phòng
                                    trọ, nhà trọ với sinh viên mới
                                </h3>
                            </aside>
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>


        {{-- </div> --}}
        <div class="clearfix"></div>
        
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
