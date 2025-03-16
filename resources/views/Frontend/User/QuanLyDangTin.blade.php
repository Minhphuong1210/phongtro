@extends('Layout.LayoutFrontend.Master')
@section('title')
    Quản lí đang phòng trọ
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
    .chothue {
    cursor: pointer;
}

</style>
@section('content')
    @include('Layout.LayoutFrontend.User.menu-left')
    <div class="pmanager-right">
        <div id="breadcrumb">
            <ol class="clearfix">
                <li>
                    <a href="{{ route('user.QuanLyDangTin') }}">
                        <span>Trang quản lý</span>
                    </a>
                </li>
                <li><span>Quản lý tin đăng</span></li>
            </ol>
        </div>

        <h2 class="mobile-title d-xl-none d-block">
            Quản lý tin cho thuê
        </h2>

        <div class="pmanager-filter">
            <div class="form-group">
                <input type="text" id="tim_phong_search" class="form-control" placeholder="Tìm kiếm phòng" value="">
            </div>
            <div class="form-group">
                <select id="CategoryId" class="form-select">
                    <option value="">Lọc theo loại tin</option>
                    @foreach ($category as $categoryitem)
                        <option value="{{ $categoryitem->id }}" data-id="{{ $categoryitem->id }}">{{ $categoryitem->name }}
                        </option>
                    @endforeach

                </select>
            </div>
        </div>


        <div class="pmanager-tabs">
            {{-- <a href="/user/quan-li-dang-tin" class="active">Tất cả </a> --}}

            {{-- <a href="#" class="" >Đã cho thuê </a> --}}

        </div>

        <div class="table-wrap bg-white">

            <table class="table table-bordered table-striped text-center align-middle">
                <thead class="table-primary">
                    <tr>
                        <th style="width: 30%;">Tên phòng</th>
                        <th style="width: 30%;">Danh mục</th>
                        <th style="width: 20%;">Trạng thái</th>
                        <th style="width: 20%;">Đã cho thuê</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($phongtro as $phongtroitem)
                        <tr>
                            <td>{{ $phongtroitem->name ?? 'Không có tên' }}</td>
                            <td>{{ $phongtroitem->category->name ?? 'Không có danh mục' }}</td>
                            <td>
                                <span class="badge {{ $phongtroitem->is_active == 1 ? 'bg-success' : 'bg-danger' }}">
                                    {{ $phongtroitem->is_active == 1 ? 'Đã kích hoạt' : 'Chưa kích hoạt' }}
                                </span>
                            </td>
                            <td>
                                <span
                                    class="badge {{ $phongtroitem->nguoi_su_dung == 1 ? 'bg-success' : 'bg-danger' }} chothue"
                                    data-id="{{ $phongtroitem->id }}">
                                    {{ $phongtroitem->nguoi_su_dung == 1 ? 'Đã cho thuê' : 'Chưa cho thuê' }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-muted">Không có dữ liệu</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $phongtro->links() }}

        </div>
    </div>

    <script>
        $(document).ready(function() {
            const searchTro = document.getElementById('searchTro');
            const tim_phong_search = document.getElementById('tim_phong_search');
            let searchTimeout;

            tim_phong_search.addEventListener('input', function(e) {
                clearTimeout(searchTimeout);
                allAjaxSearch(e.target.value);
            })


            function allAjaxSearch(data, dataCate) {
                searchTimeout = setTimeout(function() {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('user.searchPhong') }}",
                        data: {
                            name: data || "",
                            category_id: dataCate || "",
                            _token: $('meta[name="csrf-token"]').attr("content"),
                        },
                        success: function(data) {
                            updateTable(data)
                        },
                        error: function(data) {
                            console.log('Lỗi');
                        }

                    })
                }, 1000)
            }


            function updateTable(data) {
                let newTbody = $("<tbody>").hide();

                if (data.length > 0) {
                    data.forEach(item => {
                        let statusBadge = item.is_active == 1 ?
                            '<span class="badge bg-success">Đã kích hoạt</span>' :
                            '<span class="badge bg-danger">Chưa kích hoạt</span>';


                        let NguoiThueBadge = item.nguoi_su_dung == 1 ?
                            `<span class="badge bg-success chothue" data-id="${item.id}">Đã có người thuê</span>` :
                            `<span class="badge bg-danger chothue" data-id="${item.id}">Chưa có người thuê</span>`;

                        let row = `<tr>
                                        <td>${item.name ?? 'Không có tên'}</td>
                                        <td>${item.category ? item.category.name : 'Không có danh mục'}</td>
                                        <td>${statusBadge}</td>
                                        <td>${NguoiThueBadge}</td>

                                    </tr>`;

                        newTbody.append(row);
                    });
                } else {
                    newTbody.append(`<tr><td colspan="3" class="text-muted">Không có dữ liệu</td></tr>`);
                }
                $("table tbody").fadeOut(200, function() {
                    $(this).replaceWith(newTbody);
                    newTbody.fadeIn(200);
                });
            }

            const CategoryId = document.getElementById("CategoryId")

            CategoryId.addEventListener('change', function(e) {
                console.log(CategoryId);
                let id = $(this).val();
                let dataId = $(this).find(":selected").val();
                clearTimeout(searchTimeout);
                allAjaxSearch("", dataId)

            })

            const chothue = document.querySelectorAll('.chothue');
            // console.log(chothue);
            chothue.forEach(chothueitem => {
                chothueitem.addEventListener('click', function() {

                    let chothue_id = this.getAttribute('data-id');
                    let spanElement = $(this);
                    // console.log(spanElement);

                    $.ajax({
                        type: "POST",
                        url: "{{ route('user.chothue') }}",
                        data: {
                            chothue_id,
                            _token: $('meta[name="csrf-token"]').attr("content"),
                        },

                        success: function(data) {
                            // console.log(data);
                            spanElement.removeClass("bg-danger bg-success")
                                .addClass(data.color)
                                .text(data.text);
                        },
                        error: function(data) {
                            console.log('Lỗi');
                        }

                    })
                })

            })

        })
    </script>
@endsection
