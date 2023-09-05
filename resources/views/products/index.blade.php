<!-- resources/views/products/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h2>Users</h2>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-3">
                <label class="font-weight-bold" for="">Tên</label>
                <input class="form-control" placeholder="Họ Và Tên">
            </div>
            <div class="col-md-3">
                <label class="font-weight-bold" for="">Email</label>
                <input class="form-control" placeholder="Email">
            </div>
            <div class="col-md-3">
                <label class="font-weight-bold" for="">Nhóm</label>
                <select class="custom-select">
                    <option value="1">Admin</option>
                    <option value="2">Editor</option>
                    <option value="3">Reviewer</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="font-weight-bold" for="">Trạng thái</label>
                <select class="custom-select">
                    <option value="1">Đang hoạt động</option>
                    <option value="0">Tạm dừng</option>
                </select>
            </div>
            <div class="col-md-12 mt-3">
                <div class="row">
                    <div class="col-md-6">
                        <a href="" class="btn btn-success"><i class="fas fa-plus"></i> Tạo Mới</a>
                    </div>
                    <div class="col-md-6  text-right">
                        <button href="" class="btn btn-primary"> Tìm Kiếm</button>
                        <button href="" class="btn btn-danger"> Xóa Tìm Kiếm</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3">
            {!! $products->links('pagination') !!}
        </div>
        <div class="table-responsive mt-3">
            <table class="table table-bordered">
                @include('products.partials.partial')
            </table>
        </div>
        <div class="mt-3">
            {!! $products->links('pagination') !!}
        </div>
    </div>
@endsection
