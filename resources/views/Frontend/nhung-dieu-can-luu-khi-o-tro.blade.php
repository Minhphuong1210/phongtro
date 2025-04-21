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
                        <h2>Những điều cần lưu ý khi ở trọ</h2>
                        <p class="p-date">01/04/2025</p>
                    </div>

                    <div class="p-desc">
                        <p>Khi thuê phòng trọ, có nhiều yếu tố quan trọng mà người thuê cần lưu ý để tránh các rủi ro không mong muốn.</p>
                        <p>Trước khi ký hợp đồng thuê trọ, hãy kiểm tra kỹ các điều khoản liên quan đến tiền cọc, thời gian thuê, chi phí điện nước và các quy định của chủ nhà.</p>
                        <div class="image">
                            <img src="{{ asset('frontend\assets\images\luu-y-khi-o-tro.jpg') }}" alt="Hình ảnh minh họa">
                        </div>

                        <p>Ngoài ra, cần khảo sát khu vực xung quanh về mức độ an ninh, giao thông và các tiện ích như chợ, siêu thị, bệnh viện.</p>
                        <p>Kiểm tra kỹ tình trạng phòng, hệ thống điện nước, khóa cửa trước khi nhận phòng để tránh tranh chấp về sau.</p>
                        <p>Nếu có bất kỳ điều khoản nào chưa rõ ràng trong hợp đồng, nên trao đổi trực tiếp với chủ nhà để đảm bảo quyền lợi của mình.</p>
                    </div>
                </div>

                @include('frontend.right-thong-bao')
            </div>

           
        </div>
    </div>



@endsection