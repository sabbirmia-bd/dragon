@extends('layouts.dashboard_master')

@section('blog')
  active
@endsection
@section('content')
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ asset('home') }}">Home</a>
      <a class="breadcrumb-item" href="{{ asset('blog/list') }}">Blog List</a>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
        <div class="col-md-4 m-auto">
          <div class="card">
            <div class="card-header">
              Update Blog
            </div>
            <div class="card-body">

              <form action="{{ url('update/blog/post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label>Blog Title</label>
                  <input type="hidden" name="blog_id" value="{{ $blog_id }}">
                  <input type="text" name="blog_title" class="form-control" value="{{ $blog_title }}">
                </div>
                <div class="form-group">
                  <label>Blog Description</label>
                  <input type="text" name="blog_description" class="form-control" value="{{ $blog_description }}">
                </div>
                <div class="form-group">
                  <label>Current Blog Photo</label>
                  <img class="form-control" src="{{ asset('uploads\blog_photo') }}/{{ $blog_photo }}" alt="">
                </div>
                <div class="form-group">
                  <label>New Product Photo</label>
                  <input type="file" name="new_blog_photo" class="form-control">
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
