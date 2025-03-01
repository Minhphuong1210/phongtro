@extends('Layout.LayoutAdmin.Master')
@section('title')
    thêm danh mục nhà trọ
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Thêm danh mục mới</h5>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 ">
                            <form action="{{ route('admin.phong_tro.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Tên phòng</label>
                                            <input type="text" id="name"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" placeholder="Tên phòng ">
                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="slug" class="form-label">Slug</label>
                                            <input type="text" id="slug"
                                                class="form-control @error('slug') is-invalid @enderror" name="slug"
                                                value="{{ old('slug') }}" placeholder="Slug sẽ tự động tạo">
                                            @error('slug')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="dien_tich" class="form-label">Diện tích (m²)</label>
                                            <input type="number" id="dien_tich"
                                                class="form-control @error('dien_tich') is-invalid @enderror"
                                                name="dien_tich" value="{{ old('dien_tich') }}"
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
                                                value="{{ old('gia_tien') }}" placeholder="Nhập giá tiền">
                                            @error('gia_tien')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="images" class="form-label">Ảnh</label>
                                            <input type="file" id="images"
                                                class="form-control @error('images') is-invalid @enderror" name="images[]"
                                                multiple accept="image/*">
                                            @error('images')
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

                                    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

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
                                                <option selected>Chọn thành phố</option>
                                                @foreach ($thanhPho as $thanhPhos)
                                                    <option value="{{ $thanhPhos->id }}" data-id="{{ $thanhPhos->id }}">
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
                                            <input type="url" id="link_ban_do"
                                                class="form-control @error('link_ban_do') is-invalid @enderror"
                                                name="link_ban_do" value="{{ old('link_ban_do') }}"
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
                                                name="tien_coc" value="{{ old('tien_coc') }}"
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
                                                name="thoi_han_hop_dong" value="{{ old('thoi_han_hop_dong') }}"
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
                                                    <option value="{{ $categorys->id }}" data-id="{{ $categorys->id }}">
                                                        {{ $categorys->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <!-- Checkbox trạng thái -->
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active"
                                        checked>
                                    <label class="form-check-label" for="is_active">Trạng thái</label>
                                </div>

                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="is_show_home"
                                        name="is_show_home">
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
        document.getElementById("name").addEventListener("input", function() {
            let nameValue = this.value.trim().toLowerCase();

            // Thay đổi thành slug
            let slug = nameValue
                .normalize("NFD").replace(/[\u0300-\u036f]/g, "") // Loại bỏ dấu tiếng Việt
                .replace(/đ/g, "d").replace(/Đ/g, "D") // Chuyển đổi đ -> d
                .replace(/\s+/g, "-") // Thay khoảng trắng thành dấu "-"
                .replace(/[^a-z0-9-]/g, "") // Xóa ký tự đặc biệt
                .replace(/-+/g, "-") // Xóa dấu "-" trùng nhau
                .replace(/^-+|-+$/g, ""); // Xóa dấu "-" ở đầu và cuối

            // Gán slug vào input slug
            document.getElementById("slug").value = slug;
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#thanh_pho_id').on('change', function() {
                const thanh_pho_id = $(this).find(':selected').data('id');
                // console.log("Thành phố ID:", thanh_pho_id);

                $.ajax({
                    url: '{{ route('admin.DiaChi.huyen') }}',
                    type: 'POST',
                    data: {
                        id: thanh_pho_id,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        // console.log(response.HuyenQuery);
                        $('#huyen_id').empty().append('<option selected>Chọn huyện</option>');
                        response.HuyenQuery.forEach(function(huyen) {
                            // console.log(huyen);
                            $('#huyen_id').append(
                                `<option value="${huyen.id}" data-id="${huyen.id}">${huyen.name}</option>`
                            );
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log("Lỗi AJAX:", error);
                    }
                });
            });
        });


        $(document).ready(function() {
            $('#huyen_id').on('change', function() {
                const huyen_id = $(this).find(':selected').data('id');


                $.ajax({
                    url: '{{ route('admin.DiaChi.showxa') }}',
                    type: 'POST',
                    data: {
                        id: huyen_id,
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
            });
        });
    </script>
@endsection
