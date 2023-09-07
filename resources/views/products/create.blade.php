<!-- resources/views/products/index.blade.php -->

@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h2>Chi tiết sản phẩm</h2>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                1
            </div>
            <div class="col">
                <b>Hình ảnh</b>
                <label class="custom-file" id="customFile">
                    <img id="blah" class="mt-4 mb-4" src="{{ asset('image/avatar.png') }}" />
                    <div class="row">
                        <button onclick='uploadFile()' class="btn btn-primary col-2 upload">
                            Upload
                        </button>
                        <button onclick='removeFile()' class="btn btn-danger col-2 remove ml-1 ">
                           Xóa file
                        </button>
                        <div class="custom-file col-7 mb-3">
                            <input id="file" type="file" class="custom-file-input" onchange="readURL(this);">
                        </div>
                    </div>
                </label>
                {{-- <label> Enter Your File
                    <input type="file" size="60" >
                    </label> --}}
{{--
                <input type="file" id="image" class="custom-file-input" onchange="" hidden>
                <button class="btn btn-primary" onclick="ImportCsv()" >import CSV</button> --}}
            </div>
        </div>





    </div>

@endsection
