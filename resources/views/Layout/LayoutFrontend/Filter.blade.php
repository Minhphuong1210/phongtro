<div class="filter-box">
    <div class="filter-box-list">
        <div class="filter-item filter-type" data-bs-toggle="modal" data-bs-target="#property_type">
            <span class="filter-label">Loại nhà đất</span>
            <span class="filter-value value-type">Tất cả</span>
            <input type="hidden" id="hdnCategoryUrl" value="{{ request()->segment(2) ?? 'tat-ca' }}" />
        </div>
        <div class="filter-item filter-location" data-bs-toggle="modal" data-bs-target="#property_city"
            id="popup_thanh_pho">
            <span class="filter-label"> Khu vực </span>
            <span class="filter-value value-localtion"> Toàn quốc </span>
            <input type="hidden" id="hdnProvinceId" />
            <input type="hidden" id="hdnProvinceUrl" />
            <input type="hidden" id="hdnDistrictUrl" />
        </div>
        <div class="filter-item filter-price" data-bs-toggle="modal" data-bs-target="#property_price">
            <span class="filter-label"> Khoảng giá </span>
            <span class="filter-value value-price">Tất cả</span>
        </div>
        <div class="filter-item filter-area" data-bs-toggle="modal" data-bs-target="#property_area">
            <span class="filter-label">Diện tích</span>
            <span class="filter-value value-area">Tất cả</span>
        </div>
        <div class="filter-item filter-reset">
            <span class="filter-text data-reset reset_data">
                <i class="icon icon-refresh" ></i>
                Đặt lại
            </span>
        </div>
    </div>
</div>
<div class="modal filter-popup-modal fade" id="property_type" tabindex="-1" aria-labelledby="property_type_label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-fullscreen-xl-down">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="modal-title" id="property_type_label">CHỌN LOẠI BẤT ĐỘNG SẢN</h5>
            </div>
            <div class="modal-body">
                <div class="property_type_list">
                    <ul class="list-unstyled mb-0" id="list_type">
                        <?php $categories = App\Models\Category::query()->where('is_active', 1)->get(); ?>

                        <li class="">
                            <a href="{{ route('home') }}" data-category="tat-ca" class="loai-nha-dat">Tất cả</a>
                        </li>

                        @if (!empty($categories))
                            @foreach ($categories as $category)
                                <li class="{{ request()->segment(2) === $category->slug ? 'active' : '' }}">
                                    <a href="#" data-category="{{ $category->slug }}"
                                        data-slug="{{ $category->slug }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal filter-popup-modal fade" id="property_city" tabindex="-1" aria-labelledby="property_city_label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-fullscreen-xl-down">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="modal-title" id="property_city_label">KHU VỰC</h5>
            </div>
            <div class="modal-body">
                <div class="property_type_list">
                    {{-- <div class="filter-search-key">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Nhập tên tỉnh thành phố"
                            id="js_search_city"
                        />
                    </div> --}}
                    <ul class="list-unstyled mb-0" id="">
                        {{-- <li class="">Toàn quốc</li>

                        <li class="" data-value="CM">
                            C&#xE0; Mau
                        </li> --}}

                        <div class="d-flex justify-content-between">
                            <div class="col me-3">
                                <label for="city">Thành phố</label>
                                <select class="form-select" aria-label="Chọn thành phố" id="thanh_pho">
                                    <option selected>Chọn thành phố</option>

                                </select>
                            </div>
                            <div class="col">
                                <label for="district">Quận huyện</label>
                                <select class="form-select" aria-label="Chọn quận huyện" id="quan_huyen">
                                    <option selected>Chọn quận huyện</option>

                                </select>
                            </div>
                        </div>


                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="modal filter-popup-modal" id="property_ward" tabindex="-1" aria-labelledby="property_ward_label"
    aria-hidden="true" data-backdroup="false">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-fullscreen-xl-down">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="modal-title" id="property_ward_label"></h5>
            </div>
            <div class="modal-body">
                <div class="property_type_list">
                    <div class="filter-search-key">
                        <input type="text" class="form-control" placeholder="Nhập tên quận huyện thị xã"
                            id="js_search_district">
                    </div>
                    <ul class="list-unstyled mb-0" id="list_district">
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="modal filter-popup-modal fade" id="property_price" tabindex="-1" aria-labelledby="property_price_label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-fullscreen-xl-down">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="modal-title" id="property_price_label">KHOẢNG GIÁ</h5>
            </div>
            <div class="modal-body price_range">
                <div class="property_type_list">
                    <input type="hidden" class="amount_min" id="amount_min" value="0">
                    <input type="hidden" class="amount_max" id="amount_max" value="20">
                    <div class="data-rang">
                        Từ <span class="min-price">0</span> - <span class="max-price">20</span> triệu+
                    </div>
                    {{-- nút kéo tiền --}}
                    <div class="slider-range"></div>
                    <div class="info-text-min-max">
                        <span class="min">0</span>
                        <span class="max">20 triệu+</span>
                        <div class="clearfix"></div>
                    </div>
                    <div class="list-price">
                        <div class="title-check">
                            <span>Chọn nhanh</span>
                        </div>
                        <div class="property_type_list">
                            <ul class="list-unstyled mb-0 list_price">
                                <li class="selected" data-value="[0,20]">Tất cả</li>
                                <li class="" data-value="[0,1]">Dưới 1 triệu</li>
                                <li class="" data-value="[1,2]">1 - 2 triệu</li>
                                <li class="" data-value="[2,4]">2 - 4 triệu</li>
                                <li class="" data-value="[4,6]">4 - 6 triệu</li>
                                <li class="" data-value="[6,8]">6 - 8 triệu</li>
                                <li class="" data-value="[8,10]">8 - 10 triệu</li>
                                <li class="" data-value="[10,15]">10 - 15 triệu</li>
                                <li class="" data-value="[15,20]">15 - 20 triệu</li>
                                <li class="" data-value="[20,100]">Trên 20 triệu</li>
                                <li class="" data-value="[0,0]">Thoả thuận</li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer modal-actions">
                <div class="reset ">
                    <a href="javascript:;" class="reset_data">Đặt lại</a>
                </div>
                <input type="hidden" id="hdnPrice">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-primary ap-dung">Áp dụng</button>
            </div>
        </div>
    </div>
</div>
<div class="modal filter-popup-modal fade" id="property_area" tabindex="-1" aria-labelledby="property_area_label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-fullscreen-xl-down">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="modal-title" id="property_area_label">DIỆN TÍCH</h5>
            </div>
            <div class="modal-body area_range">
                <div class="property_type_list">
                    <input type="hidden" class="area_min" id="area_min" value="0">
                    <input type="hidden" class="area_max" id="area_max" value="100">
                    <div class="data-rang">
                        Từ <span class="min-area">0</span> - <span class="max-area">100</span>m<sup>2</sup>
                    </div>
                    <div class="slider-range-area"></div>
                    <div class="info-text-min-max">
                        <span class="min">0</span>
                        <span class="max">100 m<sup>2</sup></span>
                        <div class="clear"></div>
                    </div>
                    <div class="list-price">
                        <div class="title-check">
                            <span>Chọn nhanh</span>
                        </div>
                        <div class="property_type_list">
                            <ul class="list-unstyled mb-0 list_area">
                                <li class="selected" data-value="[0,100]">Tất cả</li>
                                <li class="" data-value="[0,20]">Dưới 20m<sup>2</sup></li>
                                <li class="" data-value="[20,30]">20m<sup>2</sup> - 30m<sup>2</sup></li>
                                <li class="" data-value="[30,40]">30m<sup>2</sup> - 40m<sup>2</sup></li>
                                <li class="" data-value="[40,60]">40m<sup>2</sup> - 60m<sup>2</sup></li>
                                <li class="" data-value="[60,80]">60m<sup>2</sup> - 80m<sup>2</sup></li>
                                <li class="" data-value="[80,100]">80m<sup>2</sup> - 100m<sup>2</sup>
                                </li>
                                <li class="" data-value="[100,1000]">Trên 100m<sup>2</sup></li>
                                <li class="" data-value="[0,0]">Không xác định</li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer modal-actions">
                <div class="reset">
                    <a href="javascript:;" class="reset_data">Đặt lại</a>
                </div>
                <input type="hidden" id="hdnArea">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-primary ap-dung">Áp dụng</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Lấy dữ liệu từ sessionStorage hoặc tạo mới
        let storedFilter = sessionStorage.getItem("fillter");
        const fillter = storedFilter ? JSON.parse(storedFilter) : {
            loai_nha_dat: {},
            dia_chi: {},
            khoang_gia: {},
            dien_tich: {},
        };

        // hàm để cập nhật dữ liệu lên trên #list_type
        function updateFilterUI() {
            const filterData = JSON.parse(sessionStorage.getItem("fillter")) || fillter;
            // console.log(filterData.dia_chi.thanhPho.thanh_pho_ten);
            // Cập nhật Quốc gia / Thành phố
            let locationText = "Toàn quốc";
            if (filterData.dia_chi?.thanhPho?.thanh_pho_ten) {
                locationText = filterData.dia_chi.thanhPho.thanh_pho_ten;
                if (filterData.dia_chi?.quan_huyen?.quan_huyen_ten) {
                    locationText += `, ${filterData.dia_chi.quan_huyen.quan_huyen_ten}`;
                }
            }
            // Cập nhật nội dung khu vực
            $(".filter-value.value-localtion").text(locationText);
            // Cập nhật khoảng giá
            $(".value-price").text(
                filterData.khoang_gia.min && filterData.khoang_gia.max ?
                `${filterData.khoang_gia.min} - ${filterData.khoang_gia.max} triệu` :
                "Tất cả"
            );

            // Cập nhật diện tích
            $(".value-area").text(filterData.dien_tich.min && filterData.dien_tich.max ?
                `${filterData.dien_tich.min}m\u00B2 - ${filterData.dien_tich.max}m\u00B2` :
                "Tất cả");
        }

        // Gọi hàm này khi trang tải lại để hiển thị dữ liệu đã lưu
        $(document).ready(function() {
            updateFilterUI();
        });
        // Hàm lưu bộ lọc vào sessionStorage
        function saveFilter() {
            sessionStorage.setItem("fillter", JSON.stringify(fillter));
        }

        // Xử lý chọn loại nhà đất
        const filterValue = document.querySelector(".filter-value.value-type");
        const selectedCategory = document.getElementById("hdnCategoryUrl").value;
        const activeCategory = document.querySelector(`a[data-category="${selectedCategory}"]`);

        if (activeCategory) filterValue.textContent = activeCategory.textContent;

        document.querySelectorAll("#list_type a").forEach(link => {
            link.addEventListener("click", function() {
                filterValue.textContent = this.textContent;
                document.getElementById("hdnCategoryUrl").value = this.getAttribute(
                    "data-category");
                fillter.loai_nha_dat = this.getAttribute("data-slug");
                saveFilter();
                updateFilterUI();
                setTimeout(fetchResults, 1000);
            });
        });

        // Xử lý chọn Thành phố
        document.getElementById('popup_thanh_pho').addEventListener("click", function() {
            $.get("{{ route('DiaChi.getThanhPho') }}", function(data) {
                const thanhPhoSelect = $("#thanh_pho").empty().append(
                    '<option selected>Chọn thành phố</option>');
                data.thanhPho.forEach(city => {
                    thanhPhoSelect.append(
                        `<option value="${city.id}" data-id="${city.id}">${city.name}</option>`
                    );
                });
            }).fail(error => console.error("Lỗi:", error));
        });

        // Xử lý khi thay đổi Thành phố
        $("#thanh_pho").change(function() {
            const thanh_pho_id = $(this).find(":selected").data("id");
            const thanh_pho_ten = $(this).find(":selected").text();
            fillter.dia_chi.thanhPho = {
                thanh_pho_id,
                thanh_pho_ten
            };
            saveFilter();
            updateFilterUI();
            $.post("{{ route('DiaChi.huyen') }}", {
                id: thanh_pho_id,
                _token: $('meta[name="csrf-token"]').attr("content"),
            }, function(data) {
                const quan_huyenSelect = $("#quan_huyen").empty().append(
                    '<option selected>Chọn quận huyện</option>');
                data.HuyenQuery.forEach(huyen => {
                    quan_huyenSelect.append(
                        `<option value="${huyen.id}" data-id="${huyen.id}">${huyen.name}</option>`
                    );
                });
            }).fail(error => console.error("Lỗi:", error));
        });

        // Xử lý khi thay đổi Quận huyện
        $("#quan_huyen").change(function() {
            const quan_huyen_id = $(this).find(":selected").data("id");
            const quan_huyen_ten = $(this).find(":selected").text();
            fillter.dia_chi.quan_huyen = {
                quan_huyen_id,
                quan_huyen_ten
            };
            saveFilter();
            updateFilterUI();
            setTimeout(fetchResults, 1000);
        });

        // Xử lý chọn Khoảng giá
        document.querySelectorAll(".list_price li").forEach(item => {
            item.addEventListener("click", function() {
                let priceRange = JSON.parse(this.getAttribute("data-value"));
                fillter.khoang_gia = {
                    min: priceRange[0],
                    max: priceRange[1]
                };
                document.querySelector(".min-price").textContent = priceRange[0];
                document.querySelector(".max-price").textContent = priceRange[1] + " triệu+";
                saveFilter();
                updateFilterUI();
            });
        });

        //  hàm để xủ lí ajax 
        function fetchResults() {
            $.ajax({
                url: "{{ route('search') }}",
                type: "POST",
                data: {
                    fillter: JSON.parse(sessionStorage.getItem("fillter")),
                    _token: $('meta[name="csrf-token"]').attr("content"),
                },
                dataType: "json",
                success: function(response) {
                    Swal.fire({
                        icon: "success",
                        title: "Đã áp dụng!",
                        text: "Lọc dữ liệu thành công.",
                        timer: 2000,
                        showConfirmButton: false
                    });

                    $('#property_type').modal('hide');
                    $('#property_city').modal('hide');
                    $('#property_price').modal('hide');
                    $('#property_area').modal('hide');

                    $("#du_lieu").empty();
                    $(".getphongtro").hide();
                    response.phongtro.forEach(phongtro => {
                        let image = JSON.parse(phongtro.image);
                        let firstImage = image.length > 0 ? image[0] : "default.jpg";
                        let imgSrc = firstImage.startsWith('http') ? firstImage :
                            `/storage/${firstImage}`;

                        let html = `
                        <article class="post-item vip2-item boxshadow bg-white">
                            <a href="/chi_tiet/${phongtro.slug}">
                                <figure class="thumb">
                                    <img src="${imgSrc}" alt="${phongtro.name}" loading="lazy" />
                                </figure>
                                <div class="post-aside">
                                    <h3 class="title">${phongtro.name}</h3>
                                    <div class="post-meta clearfix">
                                        <span class="price">${phongtro.gia_tien}</span>
                                        <div class="info-features">
                                            <span class="feature-item">
                                                <i class="icon ic-expand"></i>${phongtro.dien_tich} m²
                                            </span>
                                            <span class="vip-star vip1sao"></span>
                                        </div>
                                    </div>
                                    <div class="post-address">
                                        <i class="icon-location"></i> ${phongtro.dia_chi}
                                    </div>
                                </div>
                            </a>
                        </article>`;
                        $("#du_lieu").append(html);
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Lỗi AJAX:", error);
                }
            });
        }


        window.onload = function() {
            const ui_state_default = document.querySelectorAll(".price_range .ui-state-default");


            ui_state_default.forEach(item => {

                item.addEventListener("mouseout", function() {

                    let priceRange = JSON.parse(this.getAttribute(
                        "data-value"));
                    const amount_min = document.getElementById('amount_min')
                        .value;
                    const amount_max = document.getElementById('amount_max')
                        .value;
                    fillter.khoang_gia = {
                        min: amount_min,
                        max: amount_max,
                    };
                    saveFilter();
                    updateFilterUI();
                });
            });

            // lấy area 


            const ui_state_default_area = document.querySelectorAll(".area_range .ui-state-default");


            ui_state_default_area.forEach(item => {

                item.addEventListener("mouseout", function() {

                    let priceRange = JSON.parse(this.getAttribute(
                        "data-value"));
                    const area_min = document.getElementById('area_min')
                        .value;
                    const area_max = document.getElementById('area_max')
                        .value;
                    fillter.dien_tich = {
                        min: area_min,
                        max: area_max,
                    };
                    saveFilter();
                    updateFilterUI();
                });
            });

        };


        document.querySelectorAll(".list_area li").forEach(item => {
            item.addEventListener("click", function() {
                let areaRange = JSON.parse(this.getAttribute("data-value"));
                fillter.dien_tich = {
                    min: areaRange[0],
                    max: areaRange[1]
                };
                document.querySelector(".min-area").textContent = areaRange[0];
                document.querySelector(".max-area").textContent = areaRange[1] + " triệu+";
                saveFilter();
                updateFilterUI();
            });
        });




        // document.querySelectorAll(".ap-dung").forEach(item => {
        //     console.log(item);
        //     item.addEventListener('click', function() {
        //         $.ajax({
        //             url: "{{ route('search') }}",
        //             type: "POST",
        //             data: {
        //                 fillter: JSON.parse(sessionStorage.getItem("fillter")),
        //                 _token: $('meta[name="csrf-token"]').attr("content"),
        //             },
        //             dataType: "json",
        //             success: function(response) {
        //                     $('#property_type').modal('hide');
        //                     $('#property_city').modal('hide');
        //                     $('#property_price').modal('hide');
        //                     $('#property_area').modal('hide');
        //                     Swal.fire({
        //                         icon: "success",
        //                         title: "Đã áp dụng!",
        //                         text: "Lọc dữ liệu thành công.",
        //                         timer: 2000,
        //                         showConfirmButton: false
        //                     });

        //                     $("#du_lieu").empty();
        //                     $(".getphongtro").css("display", "none");
        //                     response.phongtro.forEach(phongtro => {

        //                         let image = JSON.parse(phongtro.image);
        //                         let firstImage = image.length > 0 ? image[
        //                                 0] :
        //                             "default.jpg";

        //                         let html = `
        // <article class="post-item vip2-item boxshadow bg-white">
        //     <a href="/chi-tiet/${phongtro.slug}">

        //         <figure class="thumb">
        //             <img src="${firstImage.startsWith('http') ? firstImage : `/storage/${firstImage}`}"
        //                 alt="${phongtro.name}" loading="lazy" />
        //         </figure>

        //         <div class="post-aside">
        //             <h3 class="title">${phongtro.name}</h3>
        //             <div class="post-meta clearfix">
        //                 <span class="price">${phongtro.gia_tien}</span>
        //                 <div class="info-features">
        //                     <span class="feature-item">
        //                         <i class="icon ic-expand"></i>${phongtro.dien_tich} m²
        //                     </span>
        //                     <span class="vip-star vip1sao"></span>
        //                 </div>
        //             </div>
        //             <div class="post-address">
        //                 <i class="icon ic-address"></i>
        //                 <span>${phongtro.districts?.name || "Không xác định"}, ${phongtro.districts?.name || "Không xác định"}</span>
        //             </div>
        //             <div class="post-excerpt limit-text-2">
                       
        //             </div>
        //             <div class="post-action d-flex justify-content-between align-items-center">
        //                 <div class="time d-flex align-items-center">
        //                     <i class="icon ic-clock"></i>
        //                     <span>Hôm nay</span>
        //                 </div>
        //                 <div class="bookmark">
        //                     <span class="btn-save" onclick="setFav(${phongtro.id})">
        //                         <i class="icon ic-heart"></i>
        //                     </span>
        //                 </div>
        //             </div>
        //         </div>
        //     </a>
        // </article>`;

        //                         $("#du_lieu").append(html);
        //                     });
        //                 }

        //                 ,
        //             error: function(xhr, status, error) {
        //                 console.error("Lỗi:", error);
        //             }
        //         });

        //     })
        // })

        $(".ap-dung").click(fetchResults);

        document.querySelectorAll('.reset_data').forEach(item=>{
            item.addEventListener("click", function(){
                sessionStorage.removeItem("fillter");
                fetchResults();
            })
        })


    });


    // document.addEventListener("DOMContentLoaded", function () {
    //     let storedFilter = sessionStorage.getItem("fillter");
    //     const fillter = storedFilter ? JSON.parse(storedFilter) : {
    //         loai_nha_dat: {},
    //         dia_chi: {},
    //         khoang_gia: {},
    //         dien_tich: {},
    //     };

    //     // Hàm cập nhật UI
    //     function updateFilterUI() {
    //         const filterData = JSON.parse(sessionStorage.getItem("fillter")) || fillter;
    //         $(".filter-value.value-localtion").text(filterData.dia_chi?.thanhPho?.thanh_pho_ten ? 
    //             `${filterData.dia_chi.thanhPho.thanh_pho_ten}, ${filterData.dia_chi.quan_huyen?.quan_huyen_ten || ''}`.trim() : 
    //             "Toàn quốc"
    //         );
    //         $(".value-price").text(filterData.khoang_gia.min && filterData.khoang_gia.max ? 
    //             `${filterData.khoang_gia.min} - ${filterData.khoang_gia.max} triệu` : 
    //             "Tất cả"
    //         );
    //         $(".value-area").text(filterData.dien_tich.min && filterData.dien_tich.max ? 
    //             `${filterData.dien_tich.min}m² - ${filterData.dien_tich.max}m²` : 
    //             "Tất cả"
    //         );
    //     }

    //     function saveFilter() {
    //         sessionStorage.setItem("fillter", JSON.stringify(fillter));
    //     }

    // function fetchResults() {
    //     $.ajax({
    //         url: "{{ route('search') }}",
    //         type: "POST",
    //         data: {
    //             fillter: JSON.parse(sessionStorage.getItem("fillter")),
    //             _token: $('meta[name="csrf-token"]').attr("content"),
    //         },
    //         dataType: "json",
    //         success: function (response) {
    //             Swal.fire({
    //                 icon: "success",
    //                 title: "Đã áp dụng!",
    //                 text: "Lọc dữ liệu thành công.",
    //                 timer: 2000,
    //                 showConfirmButton: false
    //             });

    //             $('#property_type').modal('hide');
    //                     $('#property_city').modal('hide');
    //                     $('#property_price').modal('hide');
    //                     $('#property_area').modal('hide');

    //             $("#du_lieu").empty();
    //             $(".getphongtro").hide();
    //             response.phongtro.forEach(phongtro => {
    //                 let image = JSON.parse(phongtro.image);
    //                 let firstImage = image.length > 0 ? image[0] : "default.jpg";
    //                 let imgSrc = firstImage.startsWith('http') ? firstImage : `/storage/${firstImage}`;

    //                 let html = `
    //                     <article class="post-item vip2-item boxshadow bg-white">
    //                         <a href="/chi-tiet/${phongtro.slug}">
    //                             <figure class="thumb">
    //                                 <img src="${imgSrc}" alt="${phongtro.name}" loading="lazy" />
    //                             </figure>
    //                             <div class="post-aside">
    //                                 <h3 class="title">${phongtro.name}</h3>
    //                                 <div class="post-meta clearfix">
    //                                     <span class="price">${phongtro.gia_tien}</span>
    //                                     <div class="info-features">
    //                                         <span class="feature-item">
    //                                             <i class="icon ic-expand"></i>${phongtro.dien_tich} m²
    //                                         </span>
    //                                         <span class="vip-star vip1sao"></span>
    //                                     </div>
    //                                 </div>
    //                                 <div class="post-address">
    //                                     <i class="icon-location"></i> ${phongtro.dia_chi}
    //                                 </div>
    //                             </div>
    //                         </a>
    //                     </article>`;
    //                 $("#du_lieu").append(html);
    //             });
    //         },
    //         error: function (xhr, status, error) {
    //             console.error("Lỗi AJAX:", error);
    //         }
    //     });
    // }

    //     $(document).ready(function () {
    //         updateFilterUI();
    //     });

    //     // Xử lý chọn loại nhà đất
    //     $(".filter-value.value-type").text($(`a[data-category="${$("#hdnCategoryUrl").val()}"]`).text());
    //     $("#list_type").on("click", "a", function () {
    //         $(".filter-value.value-type").text($(this).text());
    //         $("#hdnCategoryUrl").val($(this).data("category"));
    //         fillter.loai_nha_dat = $(this).data("slug");
    //         saveFilter();
    //         updateFilterUI();
    //         setTimeout(fetchResults, 1000);
    //     });

    //     // Xử lý chọn Thành phố
    //     $("#popup_thanh_pho").click(function () {
    //         $.get("{{ route('DiaChi.getThanhPho') }}", function (data) {
    //             $("#thanh_pho").html('<option selected>Chọn thành phố</option>' + 
    //                 data.thanhPho.map(city => `<option value="${city.id}" data-id="${city.id}">${city.name}</option>`).join('')
    //             );
    //         }).fail(console.error);
    //     });

    //     // Khi chọn thành phố
    //     $("#thanh_pho").change(function () {
    //         const selected = $(this).find(":selected");
    //         fillter.dia_chi.thanhPho = { thanh_pho_id: selected.data("id"), thanh_pho_ten: selected.text() };
    //         saveFilter();
    //         updateFilterUI();

    //         $.post("{{ route('DiaChi.huyen') }}", {
    //             id: selected.data("id"),
    //             _token: $('meta[name="csrf-token"]').attr("content"),
    //         }, function (data) {
    //             $("#quan_huyen").html('<option selected>Chọn quận huyện</option>' + 
    //                 data.HuyenQuery.map(huyen => `<option value="${huyen.id}" data-id="${huyen.id}">${huyen.name}</option>`).join('')
    //             );
    //         }).fail(console.error);
    //     });

    //     // Khi chọn quận huyện
    //     $("#quan_huyen").change(function () {
    //         const selected = $(this).find(":selected");
    //         fillter.dia_chi.quan_huyen = { quan_huyen_id: selected.data("id"), quan_huyen_ten: selected.text() };
    //         saveFilter();
    //         updateFilterUI();
    //         setTimeout(fetchResults, 1000);
    //     });

    //     // Xử lý chọn khoảng giá
    //     $(".list_price").on("click", "li", function () {
    //         let priceRange = JSON.parse($(this).attr("data-value"));
    //         fillter.khoang_gia = { min: priceRange[0], max: priceRange[1] };
    //         $(".min-price").text(priceRange[0]);
    //         $(".max-price").text(priceRange[1] + " triệu+");
    //         saveFilter();
    //         updateFilterUI();
    //     });

    //     // Xử lý chọn diện tích
    //     $(".list_area").on("click", "li", function () {
    //         let areaRange = JSON.parse($(this).attr("data-value"));
    //         fillter.dien_tich = { min: areaRange[0], max: areaRange[1] };
    //         $(".min-area").text(areaRange[0]);
    //         $(".max-area").text(areaRange[1] + " m²+");
    //         saveFilter();
    //         updateFilterUI();
    //     });

    //     // Khi bấm "Áp dụng"
    //     $(".ap-dung").click(fetchResults);
    // });
</script>
