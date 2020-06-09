@extends('layouts.dashboard_master')

@section('category')
  active
@endsection
@section('content')
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ asset('home') }}">Home</a>
      <a class="breadcrumb-item" href="{{ asset('add/category') }}">Add Category</a>
      <span class="breadcrumb-item active">{{ $category_name }}</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
        <div class="col-md-4 m-auto">
          <div class="card">
            <div class="card-header">
              Update Category
            </div>
            <div class="card-body">

              <form action="{{ url('update/category/post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label>Category Name</label>
                  <input type="hidden" name="category_id" value="{{ $category_id }}">
                  <input type="text" name="category_name" class="form-control" value="{{ $category_name }}">
                </div>
                <div class="form-group">
                  <label>Current Category Photo</label>
                  <img class="form-control" src="{{ asset('uploads\category_photos') }}/{{ $category_photo }}" alt="">
                </div>
                <div class="form-group">
                  <label>New Category Photo</label>
                  <input type="file" name="new_category_photo" class="form-control">
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
