@extends('Layout.LayoutAdmin.Master')
@section('title')
    Sửa danh mục
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 ">
                            <form action="{{ route('admin.users.update',$User->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Name</label>
                                            <input type="text" id="simpleinput"
                                                class="form-control  @error('name') is-invalid @enderror"
                                                name="name" value="{{ $User->name }}"
                                                placeholder="name ">
                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">email </label>
                                            <input type="text" id="simpleinput"
                                                class="form-control  @error('email ') is-invalid @enderror"
                                                name="email " value="{{ $User->email  }}"
                                                placeholder="email  ">
                                            @error('email ')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">phone</label>
                                            <input type="text" id="simpleinput"
                                                class="form-control  @error('phone') is-invalid @enderror"
                                                name="phone" value="{{ $User->phone }}"
                                                placeholder="phone ">
                                            @error('phone')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">address</label>
                                            <input type="text" id="simpleinput"
                                                class="form-control  @error('address') is-invalid @enderror"
                                                name="address" value="{{ $User->address }}"
                                                placeholder="address ">
                                            @error('address')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="role" class="form-label">Quyền</label>
                                        <select name="role" class="form-control" required>
                                            <option value="admin" {{ $User->hasRole('admin') ? 'selected' : '' }}>Admin</option>
                                                <option value="user" {{ $User->hasRole('user') ? 'selected' : '' }}>User</option>
                                        </select>
                                    </div>


                                </div>
                                <button type="submit" class="btn btn-primary justify-content-center">Gửi</button>
                            </form>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection