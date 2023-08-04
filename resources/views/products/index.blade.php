<!-- resources/views/products/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Product List</h2>
    <div class="input-group pb-4">
        <input type="text" id="search" name="search" class="form-control " placeholder="Search products by category's name...">
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            @include('products.partials.partial')
        </table>
    </div>
</div>
@endsection
