@extends('layout.master')
@section('title','Quản lý sản phẩm')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home.dashboard') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Danh sách sản phẩm</li>
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
{{--                    {{ $users->links() }}--}}

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Mô tả</th>
                                    <th>Giá</th>
                                    <th>Thể loại</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $key => $product)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td><img width="100" src="{{ asset('storage/' . $product->img) }}" alt=""></td>

                                        <td>{{ $product->desc }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td><a href="{{ route('categories.getProductByCategoryId', $product->category->id) }}">{{ $product->category->name }}</a></td>
                                        <td>
                                            <a class="btn btn-danger" href="" onclick="return confirm('Bạn chắc chắn muốn xoá')">Xoá</a>
                                            <a href="" class="btn btn-primary">Chỉnh sửa</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                                <tfoot>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Mô tả</th>
                                    <th>Giá</th>
                                    <th>Thể loại</th>
                                    <th></th>
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
