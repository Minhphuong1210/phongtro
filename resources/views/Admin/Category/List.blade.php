@extends('Layout.LayoutAdmin.Master')
@section('title')
    danh mục nhà trọ
@endsection
@section('content')
    <div class="row mt-4">
        <div class="col-xl-12">
            <div class="card">
                
                {{-- {{ dd(session('success')) }} --}}
                @if (session('success'))
                    <div class="alert alert-primary col-3 mt-2 ms-2" id="success-alert">
                        {{ session('success') }}
                    </div>
                @endif


                @if (session('error'))
                <div class="alert alert-danger col-3 mt-2 ms-2" id="success-alert">
                    {{ session('error') }}
                </div>
            @endif

                <div class="card-body">
                    <div class="table-responsive">

                        <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                            style="width:100%">

                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-2">Tất cả danh mục</h5>
                                <a href="{{route('admin.category.create')}}" class="btn btn-success ml-auto">Thêm mới danh mục</a>
                            </div>

                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id ?? '' }}</th>
                                        <td>{{ $item->name ?? '' }}</td>
                                        <td>{{ $item->slug ??'' }}</td>
                                        <td>{!! $item->is_active=='1'?'<span class="badge bg-primary">Hiện</span>':'<span class="badge bg-danger">Ẩn</span>' !!}</td>
                                        <td>
                                            <a href="{{ route('admin.category.edit', $item->id) }}"
                                                class="btn btn-primary btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                                                  </svg>
                                            </a>
                                            <form action="{{ route('admin.category.destroy', $item->id) }}" method="post"
                                                class="d-inline" onsubmit="return confirm('Bạn có muốn xóa không?')">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                                      </svg> <!-- Icon Xóa -->
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

