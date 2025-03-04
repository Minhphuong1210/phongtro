@extends('Layout.LayoutAdmin.Master')
@section('title')
    Sửa nhà trọ
@endsection
@section('content')
    <style>
        #add_image {
            cursor: pointer;
        }
    </style>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Sửa</h5>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 ">
                            <form action="{{ route('admin.phong_tro.update', $PhongTro->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Tên phòng</label>
                                            <input type="text" id="name"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ $PhongTro->name }}" placeholder="Tên phòng ">
                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="dien_tich" class="form-label">Diện tích (m²)</label>
                                            <input type="number" id="dien_tich"
                                                class="form-control @error('dien_tich') is-invalid @enderror"
                                                name="dien_tich" value="{{ $PhongTro->dien_tich }}"
                                                placeholder="Nhập diện tích">
                                            @error('dien_tich')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="gia_tien" class="form-label">Giá tiền</label>
                                            <input type="number" id="gia_tien"
                                                class="form-control @error('gia_tien') is-invalid @enderror" name="gia_tien"
                                                value="{{ $PhongTro->gia_tien }}" placeholder="Nhập giá tiền">
                                            @error('gia_tien')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                  


                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="content" class="form-label">Content</label>
                                            <textarea class="form-control" id="content" name="content"></textarea>
                                        </div>


                                    </div>

                                    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
                                    <script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                            if (typeof CKEDITOR !== 'undefined') {
                                                CKEDITOR.replace('content', {
                                                    language: 'vi',
                                                    toolbar: [{
                                                            name: 'basicstyles',
                                                            items: ['Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat']
                                                        },
                                                        {
                                                            name: 'paragraph',
                                                            items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent']
                                                        },
                                                        {
                                                            name: 'insert',
                                                            items: ['Image', 'Table', 'HorizontalRule']
                                                        },
                                                        {
                                                            name: 'styles',
                                                            items: ['Format', 'Font', 'FontSize']
                                                        },
                                                        {
                                                            name: 'colors',
                                                            items: ['TextColor', 'BGColor']
                                                        },
                                                        {
                                                            name: 'tools',
                                                            items: ['Maximize']
                                                        }
                                                    ],
                                                    height: 300,
                                                });
                                            } else {
                                                console.error("CKEDITOR is not defined");
                                            }
                                        });
                                    </script>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="thanh_pho_id" class="form-label">Thành phố</label>

                                            <select class="form-select" name="thanh_pho_id" id="thanh_pho_id">
                                                <option >Chọn thành phố</option>
                                                @foreach ($thanhPho as $thanhPhos)
                                                    <option value="{{ $thanhPhos->id}}" {{ $PhongTro->thanh_pho_id == $thanhPhos->id ? 'selected' : '' }}
                                                        data-id="{{ $thanhPhos->id }}">
                                                        {{ $thanhPhos->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('thanh_pho_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="huyen_id" class="form-label">Huyện, Quận</label>
                                            <select class="form-select" name="huyen_id" id="huyen_id">
                                                <option selected>Chọn thành phố</option>
                                            </select>
                                            @error('huyen_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="xa_id" class="form-label">Xã</label>
                                            <select class="form-select" name="xa_id" id="xa_id">
                                                <option selected>Chọn xã</option>
                                            </select>
                                            @error('xa_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>


                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="link_ban_do" class="form-label">Link bản đồ</label>
                                            <input type="text" id="link_ban_do"
                                                class="form-control @error('link_ban_do') is-invalid @enderror"
                                                name="link_ban_do" value="{{ $PhongTro->link_ban_do }}"
                                                placeholder="Nhập link Google Maps">
                                            @error('link_ban_do')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="thanh_pho_id" class="form-label">Tiền cọc</label>
                                            <input type="text" id="tien_coc"
                                                class="form-control @error('tien_coc') is-invalid @enderror"
                                                name="tien_coc" value="{{ $PhongTro->tien_coc }}"
                                                placeholder="Nhập tiền cọc">
                                            @error('tien_coc')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="link_ban_do" class="form-label">Thời gian thuê phòng</label>
                                            <input type="text" id="thoi_han_hop_dong"
                                                class="form-control @error('thoi_han_hop_dong') is-invalid @enderror"
                                                name="thoi_han_hop_dong" value="{{ $PhongTro->thoi_han_hop_dong }}"
                                                placeholder="Nhập thời gian thuê phòng">
                                            @error('thoi_han_hop_dong')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="thanh_pho_id" class="form-label">Danh mục</label>

                                            <select class="form-select" name="category_id" id="category_id">
                                                <option selected>Chọn danh mục</option>
                                                @foreach ($category as $categorys)
                                                    <option value="{{ $categorys->id }}" {{ $PhongTro->category_id == $categorys->id ? 'selected' : '' }} data-id="{{ $categorys->id }}">
                                                        {{ $categorys->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between"> <label for="images"
                                                    class="form-label">Ảnh </label>
                                                <p id="add_image">+ Thêm</p>
                                            </div>
                                            <br>
                                            <?php $imageJson = json_decode($PhongTro->image, true); ?>

                                            <div id="images_container">

                                                {{-- {{dd($imageJson)}} --}}
                                                @foreach ($imageJson as $image)
                                                    <input type="file" id="images"
                                                        class="form-control @error('images') is-invalid @enderror"
                                                        name="images[]" multiple accept="image/*"
                                                        value="{{ $image }}">
                                                    <img src="{{ asset('storage/' . $image) }}" alt=""
                                                        width="100px">
                                                        <input type="checkbox" name="delete_images[]" value="{{ $image }}"> Xóa ảnh này
                                                @endforeach
                                            </div>
                                            @error('images')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <!-- Checkbox trạng thái -->
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active"
                                    {{ $PhongTro->is_active == "1" ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">Trạng thái</label>
                                </div>

                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="is_show_home"
                                        name="is_show_home" {{ $PhongTro->is_show_home == "1" ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_show_home">Hiển thị trên trang chủ</label>
                                </div>

                                <button type="submit" class="btn btn-primary justify-content-center">Thêm</button>
                            </form>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
      $(document).ready(function () {
    var thanhPhoID = $("#thanh_pho_id").val();
    var huyenID = "{{ $PhongTro->huyen_id }}";
    var xaID = "{{ $PhongTro->xa_id }}";

;


    function loadHuyen(thanhPhoID, selectedHuyenID = null) {
        var huyenSelect = $('#huyen_id');
        huyenSelect.empty().append('<option value="">Đang tải...</option>');

        if (thanhPhoID) {
            $.ajax({
                url: '{{ route('admin.DiaChi.huyen') }}',
                type: 'POST',
                data: {
                    id: thanhPhoID, // Sửa lỗi truyền biến
                    _token: '{{ csrf_token() }}',
                },
                dataType: 'json',
                success: function (data) {

                    const HuyenQuery=data.HuyenQuery

                    huyenSelect.empty().append('<option value="">Chọn huyện</option>');
                    $.each(HuyenQuery, function (key, value) {

                    


                        huyenSelect.append('<option value="' + value.id + '"' +
                            (selectedHuyenID == value.id ? ' selected' : '') + '>' +
                            value.name + '</option>');
                    });

                    if (selectedHuyenID) {
                        loadXa(selectedHuyenID, xaID);
                    }
                }
            });
        } else {
            huyenSelect.empty().append('<option value="">Chọn huyện</option>');
            $('#xa_id').empty().append('<option value="">Chọn xã</option>');
        }
    }

    function loadXa(huyenID, selectedXaID = null) {
        var xaSelect = $('#xa_id');
        xaSelect.empty().append('<option value="">Đang tải...</option>');

        if (huyenID) {
            $.ajax({
                url: '{{ route('admin.DiaChi.showxa') }}',
                type: 'POST',
                data: {
                    id: huyenID, // Sửa lỗi truyền biến
                    _token: '{{ csrf_token() }}',
                },
                contentType: 'application/x-www-form-urlencoded',
                dataType: 'json',
                success: function (data) {
                 
                    const XaQuery=data.xaQuery
                    xaSelect.empty().append('<option value="">Chọn xã</option>');
                    $.each(XaQuery, function (key, value) {
                        xaSelect.append('<option value="' + value.id + '"' +
                            (selectedXaID == value.id ? ' selected' : '') + '>' +
                            value.name + '</option>');
                    });
                }
            });
        } else {
            xaSelect.empty().append('<option value="">Chọn xã</option>');
        }
    }

    // Khi vào trang edit, load huyện và xã đã chọn
    if (thanhPhoID) {
        loadHuyen(thanhPhoID, huyenID);
    }

    $('#thanh_pho_id').change(function () {
        loadHuyen($(this).val());
    });

    $('#huyen_id').change(function () {
        loadXa($(this).val());
    });
});

        /*
        đây là code khi án dấu cộng thì nó cộng thêm ảnh 
        */

        $(document).ready(function() {
    $("#add_image").click(function() {
        $("#images_container").append(`
            <div class="d-flex justify-content-between align-items-center mt-2 image-wrapper">
                <input type="file" class="form-control" name="images[]" accept="image/*">
                <button type="button" class="btn btn-danger trash_image">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                    </svg>          
                </button>
            </div>
        `);
    });

    $("#images_container").on("click", ".trash_image", function() {
        $(this).closest(".image-wrapper").remove();
    });
});

    </script>
@endsection
