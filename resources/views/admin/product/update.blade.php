@extends('layouts.dashboard_master')

@section('product')
  active
@endsection
@section('content')
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ asset('home') }}">Home</a>
      <a class="breadcrumb-item" href="{{ asset('add/product') }}">Add Product</a>
      <span class="breadcrumb-item active">{{ $product_name }}</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
        <div class="col-md-4 m-auto">
          <div class="card">
            <div class="card-header">
              Update Product
            </div>
            <div class="card-body">

              <form action="{{ url('update/product/post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label>Product Name</label>
                  <input type="hidden" name="product_id" value="{{ $product_id }}">
                  <input type="text" name="product_name" class="form-control" value="{{ $product_name }}">
                </div>
                <div class="form-group">
                  <label>Product Price</label>
                  <input type="text" name="product_price" class="form-control" value="{{ $product_price }}">
                </div>
                <div class="form-group">
                  <label>Product Quantity</label>
                  <input type="text" name="product_quantity" class="form-control" value="{{ $product_quantity }}">
                </div>
                <div class="form-group">
                  <label>Current Product Photo</label>
                  <img class="form-control" src="{{ asset('uploads\product') }}/{{ $product_thumbnail_photo }}" alt="">
                </div>
                <div class="form-group">
                  <label>New Product Photo</label>
                  <input type="file" name="new_product_photo" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
