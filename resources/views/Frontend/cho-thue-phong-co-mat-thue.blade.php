@extends('Layout.LayoutFrontend.Master')
@section('title')
    Trang chủ
@endsection
@section('content')

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            /* outline: 1px solid red; */
        }

        .container {
            padding-left: 15px;
            padding-right: 15px;
            width: 1580px;
            margin: auto;
        }

        .content-main .container .flex-content {
            display: flex;
            gap: 50px;
        }


        .content-main .container .flex-content .right {
            width: 26%;
            padding: 20px 20px;
        }

        .content-main .container .flex-content .left {
            width: calc(74% - 50px);
            padding: 20px 20px;
        }

        .content-main .container .flex-content .left .title-h2 h2 {
            margin-bottom: 10px;
        }

        .content-main .container .flex-content .left .title-h2 {
            margin-bottom: 20px;
        }


        .content-main .container .flex-content .left .p-desc p {
            margin-bottom: 20px;
        }

        .content-main .container .flex-content .left .p-desc .image {
            margin-bottom: 20px;
        }


        .content-main .container .flex-content .right .right-content .item {
            display: grid;
            grid-template-columns: 90px 1fr;
            grid-gap: 20px;
            margin-bottom: 30px;
        }


        .content-main .container .flex-content .right .right-content .item .img {
            width: 100%;
            height: 100%;
        }


        .content-main .container .flex-content .right .right-content .item .img img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
        }


        .line {
            padding-top: 16px;
            border-top: 1px solid #000;
        }

        .content-main .container .flex-content .right .right-content a {
            text-decoration: none;
        }


        .div {
            border: none;
            border-top: 1px solid #000;
            margin: 10px 0;
            width: 100%;
            opacity: 1;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .content-main .container .item-news .list-item {
            display: flex;
            gap: 30px;
        }

        .content-main .container .item-news .title-h2 {
            margin-bottom: 50px;
        }

        .content-main .container .item-news .list-item .item {
            width: 320px;
            height: auto;
            border: 1px solid black;
            border-radius: 5px;
        }


        .content-main .container .item-news .list-item .item .image img {
            width: 100%;
            height: auto;
            display: block;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .content-main .container .item-news .list-item a {
            text-decoration: none;
        }
    </style>


    <div class="content-main">
        <div class="container">
            <div class="flex-content">
                <div class="left">
                    <div class="title-h2">
                        <h2>Cho thuê phòng trọ có phải đóng thuế không?</h2>
                        <p class="p-date">01/04/2025</p>
                    </div>

                    <div class="p-desc">
                        <p>Nhiều người cho thuê phòng trọ băn khoăn liệu họ có phải đóng thuế hay không. Việc nộp thuế phụ
                            thuộc vào tổng doanh thu từ việc cho thuê và quy định của cơ quan thuế.</p>
                        <p>Theo quy định hiện hành, nếu doanh thu từ việc cho thuê phòng trọ vượt mức 100 triệu đồng/năm,
                            chủ nhà phải nộp các loại thuế như thuế thu nhập cá nhân (TNCN) và thuế giá trị gia tăng (GTGT).
                        </p>
                        <div class="image">
                            <img src="{{ asset('frontend\assets\images\kinh-daonh-phong-tro-co-thue-khong.jpg') }}" alt="Hình ảnh minh họa">
                        </div>

                        <p>Trường hợp doanh thu dưới 100 triệu đồng/năm, chủ nhà không phải đóng thuế, nhưng vẫn có thể cần
                            kê khai với cơ quan thuế địa phương.</p>
                        <p>Việc đăng ký kinh doanh phòng trọ cũng có thể ảnh hưởng đến nghĩa vụ thuế. Nếu chủ nhà có nhiều
                            phòng cho thuê với quy mô lớn, có thể sẽ phải đăng ký hộ kinh doanh cá thể.</p>
                        <p>Để đảm bảo tuân thủ đúng quy định pháp luật, chủ nhà nên tìm hiểu kỹ hoặc tham khảo ý kiến từ cơ
                            quan thuế để biết rõ các nghĩa vụ tài chính liên quan.</p>
                    </div>
                </div>

                @include('frontend.right-thong-bao')
            </div>

        </div>
    </div>


@endsection