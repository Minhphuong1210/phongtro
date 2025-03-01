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
                            <form action="{{ route('admin.category.add') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Tên danh mục</label>
                                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" 
                                                   name="name" value="{{ old('name') }}" placeholder="Nhập tên danh mục ">
                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="slug" class="form-label">Slug</label>
                                                <input type="text" id="slug" class="form-control @error('slug') is-invalid @enderror" 
                                                       name="slug" value="{{ old('slug') }}" placeholder="Slug sẽ tự động tạo">
                                                @error('slug')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        
    
                                    </div>

                                  
                                </div>

                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="is_active" checked>
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Trạng thái</label>
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
        document.getElementById("name").addEventListener("input", function () {
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

@endsection

