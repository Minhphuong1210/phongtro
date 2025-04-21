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
                        <h2>Có lấy lại được tiền cọc khi chưa ở?</h2>
                        <p class="p-date">01/04/2025</p>
                    </div>

                    <div class="p-desc">
                        <p>Nhiều người thuê nhà thắc mắc liệu có thể lấy lại tiền cọc nếu chưa vào ở hay không. Điều này phụ
                            thuộc vào các điều khoản đã thỏa thuận trong hợp đồng thuê nhà.</p>
                        <p>Theo quy định pháp luật, tiền cọc thường nhằm đảm bảo thực hiện hợp đồng. Nếu hợp đồng có quy
                            định rõ ràng về việc hoàn trả tiền cọc trong trường hợp hủy hợp đồng trước thời hạn, người thuê
                            có thể được hoàn tiền theo điều khoản đã cam kết.</p>
                        <div class="image">
                            <img src="{{ asset('frontend\assets\images\lay-tien-coc.jpg') }}" alt="Hình ảnh minh họa">
                        </div>

                        <p>Trong trường hợp hợp đồng không đề cập cụ thể, việc hoàn cọc sẽ phụ thuộc vào thiện chí của chủ
                            nhà. Một số chủ nhà có thể đồng ý trả lại toàn bộ hoặc một phần tiền cọc nếu người thuê thông
                            báo sớm và chưa gây ra thiệt hại nào.</p>
                        <p>Để tránh tranh chấp, người thuê nhà nên đọc kỹ hợp đồng trước khi đặt cọc, thỏa thuận rõ ràng về
                            điều kiện hoàn trả, và yêu cầu ghi nhận bằng văn bản.</p>
                    </div>
                </div>

                @include('frontend.right-thong-bao')
            </div>

          
        </div>
    </div>

@endsection