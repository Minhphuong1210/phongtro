@extends('Layout.LayoutFrontend.Master')
@section('title')
    Trang đăng phòng trọ
@endsection

<style>
    .pmanager-left {
        width: 20% !important;
    }

    .pmanager-right {
        position: absolute !important;
        top: 5% !important;
        left: 20% !important;
        width: 80% !important;
    }
</style>
@section('content')
    @include('Layout.LayoutFrontend.User.menu-left')
    <div class="pmanager-right newpost-right">
        <div class="newpost-right-wrap">
            <div id="breadcrumb">
                <ol class="clearfix">
                    <li>
                        <a href="/trang-quan-ly.html">
                            <span>Trang quản lý</span>
                        </a>
                    </li>
                    <li><span>Đăng tin</span></li>
                </ol>
            </div>
            <div class="newpost-main">
                <form action="{{ route('user.Postdangtin') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="newpost-box overflow-hidden">
                        <h2 class="box-title">
                            Khu vực
                        </h2>
                        <div class="form-layout area-section">

                            <div class="form-group">
                                <label>Quận/huyện <span>*</span></label>
                                <select id="huyen_id" name="huyen_id" class="form-select">
                                    <option value="" data-select2-id="select2-data-4-6cnh">Vui lòng chọn quận huyện
                                    </option>

                                    @foreach ($quanhuyen as $quanhuyenitem)
                                        <option value="{{ $quanhuyenitem->id }}" data-select2-id="select2-data-4-6cnh" data-id="{{ $quanhuyenitem->id }}">
                                            {{ $quanhuyenitem->name }}</option>
                                    @endforeach
                                </select>
                                {{-- đây là chú thích ở dưới --}}
                                <span class="select2 select2-container select2-container--default" dir="ltr"
                                    data-select2-id="select2-data-3-mi24" style="width: 433px;"><span
                                        class="selection"><span class="select2-selection select2-selection--single"
                                            role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0"
                                            aria-disabled="false" aria-labelledby="select2-ddlDistrict-container"
                                            aria-controls="select2-ddlDistrict-container"><span
                                                class="select2-selection__rendered" id="select2-ddlDistrict-container"
                                                role="textbox" aria-readonly="true" title="Chọn quận/huyện"><span
                                                    class="select2-selection__placeholder">Chọn
                                                    quận/huyện</span></span><span class="select2-selection__arrow"
                                                role="presentation"><b role="presentation"></b></span></span></span><span
                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                <span class="text-danger field-validation-valid" data-valmsg-for="DistrictId"
                                    data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-group">
                                <label>Phường/xã</label>
                                <select id="xa_id" name="xa_id" aria-placeholder="Chọn phường/xã"
                                    class="form-select select_ward js-config-select2 select2-hidden-accessible"
                                    >
                                   
                                </select>
                                <span class="select2 select2-container select2-container--default" dir="ltr"
                                    data-select2-id="select2-data-5-1xi0" style="width: 433px;"><span
                                        class="selection"><span class="select2-selection select2-selection--single"
                                            role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0"
                                            aria-disabled="false" aria-labelledby="select2-ddlWard-container"
                                            aria-controls="select2-ddlWard-container"><span
                                                class="select2-selection__rendered" id="select2-ddlWard-container"
                                                role="textbox" aria-readonly="true" title="Chọn phường/xã"><span
                                                    class="select2-selection__placeholder">Chọn
                                                    phường/xã</span></span><span class="select2-selection__arrow"
                                                role="presentation"><b role="presentation"></b></span></span></span><span
                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
                            {{-- <div class="form-group">
                                <label>Đường/phố</label>
                                <select id="ddlStreet" name="StreetId" aria-placeholder="Chọn đường/phố"
                                    class="form-select select_street js-config-select2 select2-hidden-accessible"
                                    data-select2-id="select2-data-ddlStreet" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="select2-data-8-jsac"></option>
                                </select><span class="select2 select2-container select2-container--default" dir="ltr"
                                    data-select2-id="select2-data-7-kawh" style="width: 433px;"><span
                                        class="selection"><span class="select2-selection select2-selection--single"
                                            role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0"
                                            aria-disabled="false" aria-labelledby="select2-ddlStreet-container"
                                            aria-controls="select2-ddlStreet-container"><span
                                                class="select2-selection__rendered" id="select2-ddlStreet-container"
                                                role="textbox" aria-readonly="true" title="Chọn đường/phố"><span
                                                    class="select2-selection__placeholder">Chọn
                                                    đường/phố</span></span><span class="select2-selection__arrow"
                                                role="presentation"><b role="presentation"></b></span></span></span><span
                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div> --}}
                            <div class="form-group w-100">
                                <label>Địa chỉ chính xác</label>
                                <input class="form-control text-box single-line" data-val="true"
                                    data-val-maxlength="The field Address must be a string or array type with a maximum length of '200'."
                                    data-val-maxlength-max="200" data-val-required="Vui lòng nhập địa chỉ"
                                    id="txtAddress" maxlength="200" name="dai_chi_cu_the" placeholder="Địa chỉ chính xác"
                                    type="text" value="">
                            
                            </div>
                        </div>
                    </div>
                    <div class="newpost-box overflow-hidden">
                        <div class="form-layout detail-section">
                            <div class="form-group detail-section-category w-100">
                                <label>Chuyên mục cho thuê <span>*</span></label>
                                <select class="form-select" id="ddlPostCate" name="CategoryId" data-val="true"
                                    data-val-required="Vui lòng chọn chuyên mục">
                                    <option value="" disabled="" selected="">Chọn chuyên mục</option>
                                 
                                  @foreach ($category as $categoryitem)
                                  <option value="{{$categoryitem->id}}">{{$categoryitem->name}}</option>
                                  @endforeach
                                </select>
                                <span class="text-danger field-validation-valid" data-valmsg-for="CategoryId"
                                    data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-group detail-section-price">
                                <label>Giá <span>*</span> <span id="lblPrice" style="font-size:13px;"></span></label>
                                <input class="form-control text-box single-line" data-val="true"
                                    data-val-number="Giá nhập không đúng" data-val-required="Vui lòng nhập giá"
                                    decimal="true" id="Price" maxlength="6" name="gia_tien" numbersonly="true"
                                    placeholder="VD: 2 triệu 500 nghìn thì nhập 2.5" type="text" value="">
                               
                            </div>
                            <div class="form-group detail-section-area">
                                <label>Diện tích</label>
                                <input class="form-control text-box single-line" data-val="true"
                                    data-val-number="Diện tích nhập không đúng"
                                    data-val-required="Vui lòng nhập diện tích" decimal="true" id="Area"
                                    maxlength="6" name="dien_tich" numbersonly="true" placeholder="Nhập diện tích"
                                    type="text" value="">
                                <span class="unit">m<sup>2</sup></span>
                            </div>


                            <div class="form-group detail-section-price">
                                <label>Tiền cọc <span>*</span> <span id="lblPrice" style="font-size:13px;"></span></label>
                                <input class="form-control text-box single-line" name="tien_coc">
                               
                            </div>
                            <div class="form-group detail-section-area">
                                <label>Thời gian hợp đồng</label>
                                <input class="form-control text-box single-line" name="thoi_han_hop_dong" >
                               
                            </div>

                        </div>
                    </div>
                    <div class="newpost-box overflow-hidden">
                        <h2 class="box-title">Thông tin mô tả</h2>
                        <div class="form-layout detail-section">
                            <div class="form-group w-100 has-count js-count-title">
                                <label>
                                    <div>Tiêu đề <span>*</span></div>
                                    <div class="count-characters fw-normal">
                                        <span class="text-dark">0</span>/150 ký tự
                                    </div>
                                </label>
                                <input class="form-control text-box single-line" data-val="true"
                                    data-val-maxlength="Tiêu đề tin tối đa là 150 ký tự" data-val-maxlength-max="150"
                                    data-val-minlength="Tiêu đề tin tối thiểu là 30 ký tự" data-val-minlength-min="30"
                                    data-val-required="Vui lòng nhập tiêu đề tin" id="Title" maxlength="150"
                                    name="Title" type="text" value="" name="name"> <span
                                    class="text-danger field-validation-valid" data-valmsg-for="Title"
                                    data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-group w-100 has-count js-count-desc">
                                <label>
                                    <div>Mô tả <span>*</span></div>
                                    <div class="count-characters fw-normal">
                                        <span class="text-dark">0</span>/5000 ký tự
                                    </div>
                                </label>
                                <textarea class="form-control desc-field" data-val="true" data-val-required="Vui lòng nhập nội dung" id="Detail"
                                    maxlength="5000" name="content"></textarea>
                                <span class="text-danger field-validation-valid" data-valmsg-for="Detail"
                                    data-valmsg-replace="true"></span>
                            </div>

                            <div class="form-group w-100 has-count js-count-title">
                                <label>
                                    <div>Link bản đồ <span>*</span></div>
                                    <div class=" fw-normal">
                                        
                                    </div>
                                </label>
                                <input class="form-control text-box single-line"  name="link_ban_do"> <span
                                    class="text-danger field-validation-valid" data-valmsg-for="Title"
                                    data-valmsg-replace="true"></span>
                                    <p class="help-block">
                                       vui lòng gắn link thoe định dạng này<br>
                                       <input type="text" class="form-control text-box single-line" readonly value="<iframe src=></iframe>">
                                    </p>
                            </div>
                        </div>
                    </div>
                    <div class="newpost-box overflow-hidden">
                        <h2 class="box-title">Hình ảnh</h2>
                        <div class="form-layout">
                            <div class="form-group w-100">
                                <label>Hình ảnh</label>
                                <div class="col-sm-12">
                                    <div id="fileupload">
                                        <input type="hidden" name="images[]" id="BDSGuestUploadNonFlash">
                                        <div id="uploadimage" class="clearfix ui-sortable default-theme"><input
                                                id="secleimg" multiple="" class="fileupload" type="file"
                                                name="images[]">
                                            <div class="upload-item working-upload-item"></div>
                                        </div>
                                    </div>
                                    <p class="help-block">
                                        Tối đa 25 ảnh với tin đăng. Dung lượng không quá 6MB<br>
                                        Thay đổi vị trí của ảnh bằng cách kéo ảnh vào vị trí mà bạn muốn.
                                    </p>
                                </div>
                            </div>
                            <div class="form-group w-100">
                           
                        </div>
                    </div>
                    <div class="newpost-box overflow-hidden">
                        <h2 class="box-title">Liên hệ</h2>
                        <div class="form-layout contact-section">
                            <div class="form-group">
                                <label>Tên <span>*</span></label>
                                <input class="form-control text-box single-line" data-val="true"
                                    data-val-required="Vui lòng nhập tên liên hệ" id="ContactName" name="ContactName"
                                    readonly="" type="text" value="{{Auth::user()->name}}">
                                <span class="text-danger field-validation-valid" data-valmsg-for="ContactName"
                                    data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại <span>*</span></label>
                                <input class="form-control text-box single-line" data-val="true"
                                    data-val-required="Vui lòng nhập số điện thoại" id="ContactMobile"
                                    inputmode="decimal" maxlength="10" name="ContactMobile" numbersonly="true"
                                     type="text" value="{{Auth::user()->phone}}">
                                <span class="text-danger field-validation-valid" data-valmsg-for="ContactMobile"
                                    data-valmsg-replace="true"></span>

                            </div>
                        </div>
                    </div>
                    {{-- <div class="newpost-box overflow-hidden">
                        <h2 class="box-title">Chọn gói đăng tin</h2>
                        <div class="form-layout package-section">
                            <div class="form-group w-100">
                                <label class="d-flex justify-content-between">
                                    <div>Loại tin <span>*</span></div>
                                    <div class="compare-package fw-normal">
                                        <i class="icon"></i>
                                        <a href="/bang-gia-dich-vu.html" target="_blank">
                                            So sánh các gói tin
                                        </a>
                                    </div>
                                </label>
                                <select class="form-select" id="ddlVipType" name="VipType" data-val="true"
                                    data-val-required="Vui lòng chọn loại tin">
                                    <option value="0">Tin Vip 1 (30.000/ngày)</option>
                                    <option value="1">Tin Vip 2 (20.000/ngày)</option>
                                    <option value="2">Tin Vip 3 (15.000/ngày)</option>
                                    <option value="5">Tin thường (2.000/ngày)</option>
                                </select>
                                <span class="text-danger field-validation-valid" data-valmsg-for="VipType"
                                    data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-group w-100" style="display:none">
                                <label>Gói thời gian <span>*</span></label>
                                <select class="form-select" id="ddlPackage" name="Package" data-val="true"
                                    data-val-required="Vui lòng chọn gói tin">
                                    <option value="1">Đăng theo ngày</option>
                                    <option value="2">Đăng theo tuần</option>
                                    <option value="3">Đăng theo tháng</option>
                                </select>
                                <span class="text-danger field-validation-valid" data-valmsg-for="Package"
                                    data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-group w-100">
                                <label>Số ngày <span>*</span></label>
                                <select class="form-select" id="ddlTotalDay" name="TotalDay" data-val="true"
                                    data-val-required="Vui lòng chọn số ngày">
                                    <option value="3">3 ngày</option>
                                    <option value="4">4 ngày</option>
                                    <option value="5">5 ngày</option>
                                    <option value="6">6 ngày</option>
                                    <option value="7">7 ngày</option>
                                    <option value="8">8 ngày</option>
                                    <option value="9">9 ngày</option>
                                    <option value="10">10 ngày</option>
                                    <option value="11">11 ngày</option>
                                    <option value="12">12 ngày</option>
                                    <option value="13">13 ngày</option>
                                    <option value="14">14 ngày</option>
                                    <option value="15">15 ngày</option>
                                    <option value="16">16 ngày</option>
                                    <option value="17">17 ngày</option>
                                    <option value="18">18 ngày</option>
                                    <option value="19">19 ngày</option>
                                    <option value="20">20 ngày</option>
                                    <option value="21">21 ngày</option>
                                    <option value="22">22 ngày</option>
                                    <option value="23">23 ngày</option>
                                    <option value="24">24 ngày</option>
                                    <option value="25">25 ngày</option>
                                    <option value="26">26 ngày</option>
                                    <option value="27">27 ngày</option>
                                    <option value="28">28 ngày</option>
                                    <option value="29">29 ngày</option>
                                    <option value="30">30 ngày</option>
                                </select>
                                <span class="text-danger field-validation-valid" data-valmsg-for="TotalDay"
                                    data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-group w-100">
                                <label>Gắn nhãn</label>
                                <label class="d-flex align-items-center fw-normal">
                                    <input type="checkbox" name="AddLabel" id="AddLabel" class="me-1"> Thuê nhanh
                                    (5.000đ/lần)
                                </label>
                            </div>
                            <div class="form-group auto-up w-100">
                                <h3 class="auto-up-title">Đẩy tin tự động</h3>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="AutoPostID" name="AutoPost">
                                </div>
                                <div class="row-item" id="divAutoPost" style="display:none">
                                    <span>Thời gian:</span>
                                    <select style="width:60px" id="ddlTimeUp" name="TimeUp" data-val="true"
                                        data-val-required="Vui lòng chọn thời gian">
                                        <option value="1">1 h</option>
                                        <option value="2">2 h</option>
                                        <option value="3">3 h</option>
                                        <option value="4">4 h</option>
                                        <option value="5">5 h</option>
                                        <option value="6">6 h</option>
                                        <option value="7" selected="">7 h</option>
                                        <option value="8">8 h</option>
                                        <option value="9">9 h</option>
                                        <option value="10">10 h</option>
                                        <option value="11">11 h</option>
                                        <option value="12">12 h</option>
                                        <option value="13">13 h</option>
                                        <option value="14">14 h</option>
                                        <option value="15">15 h</option>
                                        <option value="16">16 h</option>
                                        <option value="17">17 h</option>
                                        <option value="18">18 h</option>
                                        <option value="19">19 h</option>
                                        <option value="20">20 h</option>
                                        <option value="21">21 h</option>
                                        <option value="22">22 h</option>
                                        <option value="23">23 h</option>
                                    </select>&nbsp;mỗi ngày
                                </div>
                                <div class="auto-up-desc">
                                    Giúp tin của bạn được đẩy lên vị trí mới nhất trong gói tin đã đăng ký, tin đăng
                                    sẽ được nhiều người nhìn thấy và BĐS sẽ được giao dịch nhanh hơn. <a
                                        href="/bang-gia-dich-vu.html" target="_blank">Bảng giá đẩy tin</a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="newpost-box overflow-hidden">
                        <div class="payment-info">
                            <h3 class="payment-info-title">
                                Thông tin thanh toán
                            </h3>
                            <div class="payment-info-row">
                                <span>Loại tin:</span>
                                <span id="vip_cofig_info_explain">Đứng đầu danh sách các tin đăng. Tiêu đề <span
                                        style="color:#E13427;font-weight:bold">TIÊU ĐỀ MÀU ĐỎ, IN HOA</span></span>
                            </div>
                            <div class="payment-info-row" style="display:none">
                                <span>Gói thời gian:</span>
                                <span>Đăng theo <span class="lblPackage">ngày</span></span>
                            </div>
                            <div class="payment-info-row">
                                <span>Đơn giá:</span>
                                <span id="lblUnitPrice">30.000</span>
                            </div>
                            <div class="payment-info-row">
                                <span>Số <span class="lblPackage">ngày</span>:</span>
                                <span id="lblTotalDay">3</span>
                            </div>
                            <div class="payment-info-row" id="ThueNhanh" style="display: none">
                                <span>Thuê nhanh:</span>
                                <span id="lblThueNhanh">5.000</span>
                            </div>
                            <div class="payment-info-row">
                                <span>Ngày hết hạn:</span>
                                <span id="lblEndDate">19/3/2025 0:35</span>
                            </div>
                            <div class="payment-info-row">
                                <span>Thành tiền:</span>
                                <span class="total" id="lblCost">90.000</span>
                            </div>
                        </div>
                    </div> --}}
                    <div class="newpost-box newpost-submit">
                        <button type="submit" class="btn btn-success" id="btnPostCreate">Đăng tin</button>
                        <div id="message"></div>
                    </div>
                    <input name="__RequestVerificationToken" type="hidden"
                        value="CfDJ8PGJMKt0IShAuxdoB4DjH0a5VXYonYGKIa2OT4gaPITzRYCWpmfleSweTJY3rsxbDYXIajySHybJSI9p0uF8iyfedfk6i1DFUuZFwke9C2ksVo7rf_Z7kvTgrvMxQHI-KG4n_wBFSqp92C6TWs9o7BgTjoPaIWGqPGG7zTOSh6RncCZ9_95JhvSyVyr8M9klMQ">
                </form>
                <div id="message"></div>
            </div>
        </div>
    </div>

    <script>
        const huyen_id = document.getElementById('huyen_id');
        huyen_id.addEventListener('change', function() {
            const huyenId= $(this).find(':selected').data('id');
            // console.log(huyenId);
            $.ajax({
                url: '{{ route('DiaChi.showxa') }}',
                type: 'POST',
                data: {
                    id: huyenId,
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {

                    $('#xa_id').empty().append('<option selected>Chọn Xã</option>');
                    response.xaQuery.forEach(function(xa) {
                        // console.log(huyen);
                        $('#xa_id').append(
                            `<option value="${xa.id}" data-id="${xa.id}">${xa.name}</option>`
                        );
                    });
                },
                error: function(xhr, status, error) {
                    console.log("Lỗi AJAX:", error);
                }
            });
        })


      
    </script>
@endsection
