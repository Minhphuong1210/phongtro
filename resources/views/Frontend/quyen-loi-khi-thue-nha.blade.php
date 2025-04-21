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
                        <h2>Làm thế nào để bảo vệ quyền lợi khi thuê nhà?</h2>
                        <p class="p-date">01/04/2025</p>
                    </div>

                    <div class="p-desc">
                        <p>Khi thuê nhà, người thuê cần chú ý đến các quyền lợi của mình để tránh rủi ro và tranh chấp không mong muốn.</p>
                        <p>Trước khi ký hợp đồng, hãy đọc kỹ các điều khoản, đặc biệt là về tiền cọc, thời gian thuê, chi phí điện nước, bảo trì và điều kiện chấm dứt hợp đồng.</p>
                        <div class="image">
                            <img src="{{ asset('frontend\assets\images\quyen-loi-khi-thue-nha.jpg') }}" alt="Hình ảnh minh họa">
                        </div>

                        <p>Yêu cầu hợp đồng thuê nhà được lập bằng văn bản và có chữ ký của cả hai bên để làm cơ sở pháp lý trong trường hợp có tranh chấp.</p>
                        <p>Kiểm tra tình trạng nhà trước khi nhận, chụp ảnh hiện trạng để tránh bị trừ tiền cọc vô lý khi trả nhà.</p>
                        <p>Luôn giữ lại các hóa đơn, chứng từ liên quan đến tiền đặt cọc, thanh toán tiền thuê, điện nước để có bằng chứng khi cần thiết.</p>
                        <p>Nếu gặp vấn đề với chủ nhà, hãy cố gắng thương lượng trước, nhưng nếu không thể giải quyết, có thể nhờ sự can thiệp của chính quyền địa phương hoặc pháp luật.</p>
                    </div>
                </div>

               @include('frontend.right-thong-bao')
            </div>

           
        </div>
    </div>


@endsection