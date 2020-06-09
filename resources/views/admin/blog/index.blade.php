@extends('layouts.dashboard_master')

@section('blog')
  active
@endsection
@section('content')
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ asset('home') }}">Home</a>
      <span class="breadcrumb-item active">Add Blog</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
  {{-- Insert Category --}}
        <div class="col-md-8 m-auto">
          <div class="card">
            <div class="card-header">
              Add Blog Post
            </div>
            <div class="card-body">
              @if (session('add_blog_status'))
                <div class="alert alert-success">
                  {{ session('add_blog_status') }}
                </div>
              @endif
              <form action="{{ url('add/blog/post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label>Slider title</label>
                  <textarea type="text" name="blog_title" class="form-control" placeholder="Enter Your Blog title" rows="4"></textarea>
                  @error ('blog_title')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Category Name</label>
                  <select class="form-control" name="category_id">
                    <option value="">-Select One-</option>
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                  </select>

                  @error ('blog_title')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Blog description</label>
                  <textarea type="text" name="blog_description" class="form-control" placeholder="Enter Your Blog description" rows="4"></textarea>
                  @error ('blog_description')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Blog Photo</label>
                  <input type="file" name="blog_photo" class="form-control">
                  @error ('blog_photo')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
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
