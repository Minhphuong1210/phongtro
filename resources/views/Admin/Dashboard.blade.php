@extends('Layout.LayoutAdmin.Master')

@section('title')
    Dashboard | Phòng trọ
@endsection


@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="h-100">


                        <div class="row">
                            <div class="col-4">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                    Tổng số phòng trọ
                                                </p>
                                            </div>

                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                                    <span class="counter-value"
                                                        data-target="{{ $totalCountPhongtro }}">0</span>
                                                </h4>
                                                <a href="" class="text-decoration-underline"></a>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                            <div class="col-4">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                    Tổng số phòng trọ đã đưcọ thuê
                                                </p>
                                            </div>

                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                                    <span class="counter-value"
                                                        data-target="{{ $totalCountPhongtroNguoiSuDung }}">0</span>
                                                </h4>
                                                <a href="" class="text-decoration-underline"></a>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                            <div class="col-4">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                    Tổng số phòng trọ
                                                </p>
                                            </div>

                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                                    <span class="counter-value" data-target="559.25">0</span>
                                                </h4>
                                                <a href="" class="text-decoration-underline"></a>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->


                            <!-- end col -->
                        </div>
                        <!-- end row-->

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header border-0 align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">
                                            Biểu đồ danh sách thuê phòng theo tháng
                                        </h4>

                                        <input type="date" id="danh_sach_phong_tro_thue_theo_ngay">

                                    </div>
                                    <!-- end card header -->

                                    <div class="card-header p-0 border-0 bg-light-subtle">
                                        <div class="row g-0 text-center">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Tên</th>
                                                        <th scope="col">Ảnh</th>
                                                        <th scope="col">Content</th>
                                                        <th scope="col">Slug</th>
                                                        <th scope="col">Diện tích</th>
                                                        <th scope="col">Giá tiền </th>
                                                        <th scope="col">Hiện trang chủ</th>
                                                        <th scope="col">Hiện</th>
                                                        <th scope="col">Lượt xem</th>
                                                        <th scope="col">Xã</th>
                                                        <th scope="col">Huyện</th>
                                                        <th scope="col">Thành phố</th>
                                                        <th scope="col">Bản đồ</th>
                                                        <th scope="col">Trạng thái sử dụng phòng</th>
                                                        <th scope="col">Tiền cọc</th>
                                                        <th scope="col">Thời hạn hợp đồng</th>
                                                        <th scope="col">Danh mục</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="danhsachtro">

                                                    @foreach ($phongtro as $item)
                                                        <tr id="phongtro_thuong">
                                                            <th scope="row">{{ $item->id ?? '' }}</th>
                                                            <td>{{ $item->name ?? '' }}</td>

                                                            @php
                                                                $images = json_decode($item->image, true) ?? [];
                                                                // dd($images);
                                                            @endphp

                                                            <td>
                                                                <div class="d-flex flex-wrap">
                                                                    @foreach ($images as $key => $image)
                                                                        <div class="col-{{ $key == 0 ? '5' : '3' }} mb-2">
                                                                            <img src="{{ asset('storage/' . $image) }}"
                                                                                class="img-fluid rounded shadow-sm"
                                                                                style="width: 100%; height: auto; object-fit: cover;">
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </td>



                                                            <td>{{ Str::limit($item->content ?? '', 50) }}</td>
                                                            <td>{{ $item->slug ?? '' }}</td>
                                                            <td>{{ $item->dien_tich ?? '' }}</td>
                                                            <td>{{ number_format($item->gia_tien ?? '') }}</td>
                                                            <td>{!! $item->is_show_home == '1'
                                                                ? '<span class="badge bg-primary">Hiện</span>'
                                                                : '<span class="badge bg-danger">Ẩn</span>' !!}</td>
                                                            <td>{!! $item->is_active == '1'
                                                                ? '<span class="badge bg-primary">Hiện</span>'
                                                                : '<span class="badge bg-danger">Ẩn</span>' !!}</td>
                                                            <td>{{ $item->viewre }}</td>
                                                            <td>{{ $item->wards->name ?? '' }}</td>
                                                            <td>{{ $item->districts->name ?? '' }}</td>
                                                            <td>{{ $item->provinces->name ?? '' }}</td>
                                                            <td>{{ Str::limit($item->link_ban_do ?? '', 50) }}</td>
                                                            <td>{!! $item->nguoi_su_dung == '1'
                                                                ? '<span class="badge bg-primary">Hiện</span>'
                                                                : '<span class="badge bg-danger">Ẩn</span>' !!}</td>
                                                            <td>{{ number_format($item->tien_coc ?? '') }}</td>
                                                            <td>{{ $item->thoi_han_hop_dong ?? '' }}</td>
                                                            <td>{{ $item->category->name ?? '' }}</td>
                                                        </tr>
                                                    @endforeach


                                                </tbody>

                                                <tbody id="danhSachLoadLai">
                                                </tbody>
                                            </table>
                                        
                                        </div>
                                    </div>

                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->


                        </div>

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">
                                            Top những phòng được xem nhiều nhất
                                        </h4>

                                    </div>
                                    <!-- end card header -->

                                    <div class="card-body">
                                        <div class="table-responsive table-card">
                                            <table class="table table-hover table-centered align-middle table-nowrap mb-0">
                                                <tbody>
                                                    @foreach ($top10PhongDuocXemNhieuNhat as $top10PhongDuocXemNhieuNhatitem)
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm bg-light rounded p-1 me-2">

                                                                        <img src="{{ Storage::url($top10PhongDuocXemNhieuNhatitem->image) }}"
                                                                            alt="" class="img-fluid d-block" />
                                                                    </div>
                                                                    <div>
                                                                        <h5 class="fs-14 my-1">
                                                                            <a href="apps-ecommerce-product-details.html"
                                                                                class="text-reset">{{ Str::limit($top10PhongDuocXemNhieuNhatitem->name, 20) }}
                                                                            </a>
                                                                        </h5>

                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h5 class="fs-14 my-1 fw-normal">
                                                                    {{ $top10PhongDuocXemNhieuNhatitem->gia_tien }}
                                                                </h5>
                                                                <span class="text-muted">Giá tiền</span>
                                                            </td>

                                                            <td>
                                                                <h5 class="fs-14 my-1 fw-normal">
                                                                    {!! $item->nguoi_su_dung == '1'
                                                                        ? '<span class="badge bg-primary">đã có người dử dụng</span>'
                                                                        : '<span class="badge bg-danger">chưa có người sử dụng</span>' !!}
                                                                </h5>
                                                                <span class="text-muted">Trạng thái phòng</span>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="card card-height-100">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">
                                            Top 10 người đăng nhiều bài nhất
                                        </h4>

                                    </div>
                                    <!-- end card header -->

                                    <div class="card-body">
                                        <div class="table-responsive table-card">
                                            <table class="table table-centered table-hover align-middle table-nowrap mb-0">
                                                <tbody>

                                                    @foreach ($top10NguoiDangNhieuPhongNhat as $top10NguoiDangNhieuPhongNhatitem)
                                                        <tr>
                                                            <td>
                                                                {{-- {{dd($top10NguoiDangNhieuPhongNhatitem)}} --}}
                                                                <div class="d-flex align-items-center">
                                                                    <div class="flex-shrink-0 me-2">
                                                                        @if (!empty($top10NguoiDangNhieuPhongNhatitem->user) && !empty($top10NguoiDangNhieuPhongNhatitem->user->image))
                                                                            <img src="{{ Storage::url($top10NguoiDangNhieuPhongNhatitem->image) ?? '' }}"
                                                                                alt="Hình ảnh">
                                                                        @endif

                                                                    </div>
                                                                    <div>
                                                                        <h5 class="fs-14 my-1 fw-medium">
                                                                            <a href="apps-ecommerce-seller-details.html"
                                                                                class="text-reset">{{ $top10NguoiDangNhieuPhongNhatitem->name }}</a>
                                                                        </h5>

                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <p class="mb-0">
                                                                    {{ $top10NguoiDangNhieuPhongNhatitem->email }}
                                                                </p>
                                                                <span class="text-muted">Email</span>
                                                            </td>
                                                            <td>
                                                                <p class="mb-0">
                                                                    {{ $top10NguoiDangNhieuPhongNhatitem->phone }}
                                                                </p>
                                                                <span class="text-muted">Số điện thoại</span>
                                                            </td>

                                                        </tr>
                                                    @endforeach



                                                </tbody>
                                            </table>
                                            <!-- end table -->
                                        </div>
                                    </div>
                                    <!-- .card-body-->
                                </div>
                                <!-- .card-->
                            </div>
                            <!-- .col-->
                        </div>
                        <!-- end row-->
                        <!-- end row-->
                    </div>
                    <!-- end .h-100-->
                </div>
                <!-- end col -->


                <!-- end col -->
            </div>
        </div>
        <!-- container-fluid -->
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const danh_sach_phong_tro_thue_theo_ngay = $('#danh_sach_phong_tro_thue_theo_ngay');
        let timeout;

        danh_sach_phong_tro_thue_theo_ngay.on('change', function() {
            const selectedDate = $(this).val();

            clearTimeout(timeout);
            timeout = setTimeout(() => {
                if (selectedDate) {
                    $.ajax({
                        url: '{{ route('admin.getPhongTroTheoNgay') }}',
                        method: 'POST',
                        data: {
                            ngay_thue: selectedDate,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            let result = '';
                            console.log("Dữ liệu nhận được:", data);
                            if (!Array.isArray(data)) {
    console.error("Dữ liệu không phải là mảng:", data);
    return;
}

                            $('#danhsachtro').css('display', 'none');

                            const danhSachLoadLai = $('#danhSachLoadLai');
                            danhSachLoadLai.empty();

                            if (data.length > 0) {
                                data.forEach((item, index) => {
                                    console.log(`Sản phẩm ${index + 1}:`, item);

                                    let images = [];
                                    try {
                                        images = JSON.parse(item.image || '[]');
                                    } catch (error) {
                                        console.error("Lỗi khi parse JSON ảnh:", error);
                                    }

                                    let imageHtml = '';
                                    images.forEach((img, i) => {
                                        imageHtml += `
                    <div class="col-${i === 0 ? '5' : '3'} mb-2">
                        <img src="/storage/${img}" class="img-fluid rounded shadow-sm"
                            style="width: 100%; height: auto; object-fit: cover;">
                    </div>
                `;
                                    });

                                    result += `
                <tr>
                    <th scope="row">${item.id ?? ''}</th>
                    <td>${item.name ?? ''}</td>
                    <td><div class="d-flex flex-wrap">${imageHtml}</div></td>
                    <td>${item.content ? item.content.substring(0, 50) : ''}</td>
                    <td>${item.slug ?? ''}</td>
                    <td>${item.dien_tich ?? ''}</td>
                    <td>${item.gia_tien ? new Intl.NumberFormat().format(item.gia_tien) : ''}</td>
                    <td>${item.is_show_home === '1' ? '<span class="badge bg-primary">Hiện</span>' : '<span class="badge bg-danger">Ẩn</span>'}</td>
                    <td>${item.is_active === '1' ? '<span class="badge bg-primary">Hiện</span>' : '<span class="badge bg-danger">Ẩn</span>'}</td>
                    <td>${item.viewre ?? ''}</td>
                    <td>${item.wards?.name ?? ''}</td>
                    <td>${item.districts?.name ?? ''}</td>
                    <td>${item.provinces?.name ?? ''}</td>
                    <td>${item.link_ban_do ? item.link_ban_do.substring(0, 50) : ''}</td>
                    <td>${item.nguoi_su_dung === '1' ? '<span class="badge bg-primary">Hiện</span>' : '<span class="badge bg-danger">Ẩn</span>'}</td>
                    <td>${item.tien_coc ? new Intl.NumberFormat().format(item.tien_coc) : ''}</td>
                    <td>${item.thoi_han_hop_dong ?? ''}</td>
                    <td>${item.category?.name ?? ''}</td>
                </tr>
            `;
                                });
                            } else {
                                result =
                                    `<tr><td colspan="18" class="text-center">Không có phòng trọ nào từ ngày đã chọn.</td></tr>`;
                            }

                            danhSachLoadLai.html(result);
                        },

                        error: function(xhr, status, error) {
                            console.error('Lỗi khi gọi Ajax:', error);
                        }
                    });
                }
            }, 1000); // Thời gian delay 1 giây (1000 ms)
        });
    </script>
@endsection
