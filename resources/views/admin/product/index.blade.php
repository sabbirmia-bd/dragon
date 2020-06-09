@extends('layouts.dashboard_master')

@section('product')
  active
@endsection
@section('content')
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ asset('home') }}">Home</a>
      <span class="breadcrumb-item active">Add Product</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              Product List
            </div>
            <div class="card-body">

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th width="2">Sl No</th>
                    <th>Product Name</th>
                    <th>Category Name</th>
                    <th width="3">Product Price</th>
                    <th>Product Quantity</th>
                    <th>Product Photo</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($products as $product)
                    <tr>
                      <td width="2">{{ $loop->index + 1 }}</td>
                      <td>{{ $product->product_name }}</td>
                      <td>{{ $product->relationtocategorytable->category_name }}</td>
                      {{-- <td>{{ App\Category::find($product->category_id)->category_name }}</td> --}}
                      <td width="3">{{ $product->product_price }}</td>
                      <td width="2">{{ $product->product_quantity }}</td>

                      <td>
                        <img width="50" src="{{ asset('uploads\product') }}/{{ $product->product_thumbnail_photo }}" alt="">
                      </td>

                      <td>
                        @if ($product->created_at)
                          {{ $product->created_at->diffForHumans() }}
                        @else
                          <span class="bg-danger text-white p-1">No time to show</span>
                        @endif
                      </td>
                      {{-- <td>
                        @if ($product->updated_at)
                          {{ $product->updated_at->diffForHumans() }}
                        @else
                          <span class="">--</span>
                        @endif
                      </td> --}}
                      {{-- <td>
                        <img src="{{ asset('uploads/category_photos') }}/{{ $category->category_photo }}" width="100" alt="Not Found">
                      </td> --}}
                      <td>
                        <div class="btn-group text-white">
                          <a href="{{ url('update/product') }}/{{ $product->id }}" type="button" class="btn btn-secondary">Update</a>
                          <a href="{{ url('delete/product') }}/{{ $product->id }}" type="button" class="btn btn-danger">Delete</a>
                        </div>
                      </td>
                    </tr>
                    @empty
                    <tr  class="text-center text-danger">
                      <td colspan="50">
                        No data to show
                      </td>
                    </tr>
                  @endforelse

                </tbody>
              </table>
            </div>
          </div>
        </div>

  {{-- Insert Category --}}
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              Add Product
            </div>
            <div class="card-body">

              <form action="{{ url('add/product/post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label>Product Name</label>
                  <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name">
                </div>
                <div class="form-group">
                  <label>Category Name</label>
                  <select class="form-control" name="category_id">
                    <option value="">-Select One-</option>
                    @foreach ($categories as $category)
                      //category_id
                      <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Product Price</label>
                  <input type="text" name="product_price" class="form-control" placeholder="Enter Product Price">
                </div>
                <div class="form-group">
                  <label>Product Quantity</label>
                  <input type="text" name="product_quantity" class="form-control" placeholder="Enter Category Quantity">
                </div>
                <div class="form-group">
                  <label>Product Short Description</label>
                  <textarea name="product_short_description" class="form-control" rows="4"></textarea>
                </div>
                <div class="form-group">
                  <label>Product Long Description</label>
                  <textarea name="product_long_description" class="form-control" rows="4"></textarea>
                </div>
                <div class="form-group">
                  <label>Product Thumbnail Photo</label>
                  <input type="file" name="product_thumbnail_photo" class="form-control">
                </div>
                <div class="form-group">
                  <label>Product Multiple Photo</label>
                  <input type="file" name="product_multiple_photo[]" class="form-control" multiple>
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
