@extends('layout.master')
@section('title','Quản lý người dùng')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý người dùng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home.dashboard') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Danh sách người dùng</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    {{ $users->links() }}

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>

                    <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-6"></div>
                                <div class="col-12 col-md-6 mb-3">
                                    <input type="text" id="search-user" class="form-control" placeholder="Search: name user">
                                    <div class="col-12 list-group list-user-search" style="position: absolute"></div>
                                </div>
                            </div>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Họ tên</th>
                                    <th>Email(s)</th>
                                    <th>Quyền</th>

                                    <th>Hình ảnh</th>
                                    @can('curd-user')
                                    <th></th>
                                    @endcan
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $key => $user)
                                <tr class="user-item">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach($user->roles as $role)
                                            <p>{{ $role->name }}</p>
                                        @endforeach
                                    </td>
                                    <td><img width="100" src="{{ asset('storage/' . $user->image) }}" alt=""></td>
                                    @can('curd-user')
                                    <td>
                                        <a class="btn btn-danger" href="{{ route('users.delete', $user->id) }}" onclick="return confirm('Bạn chắc chắn muốn xoá')">Xoá</a>
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Chỉnh sửa</a>
                                    </td>
                                    @endcan
                                </tr>
                                @endforeach
                                </tbody>

                                <tfoot>
                                <tr>
                                    <th>STT</th>
                                    <th>Họ tên</th>
                                    <th>Email(s)</th>
                                    <th>Quyền</th>
                                    <th>Hình ảnh</th>
                                    @can('curd-user')
                                    <th></th>
                                    @endcan
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
