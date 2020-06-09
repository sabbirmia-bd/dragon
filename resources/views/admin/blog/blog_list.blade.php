@extends('layouts.dashboard_master')

@section('blog_list')
  active
@endsection
@section('content')
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ asset('home') }}">Home</a>
      <span class="breadcrumb-item active">Blog Post List</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
        @if(session('blog_delete_status'))
        <div class="col-md-12">
            <div class="alert alert-danger">
              {{ session('blog_delete_status') }}
            </div>
          </div>
          @endif
          @if(session('blog_update_status'))
            <div class="col-md-12">
            <div class="alert alert-info">
              {{ session('blog_update_status') }}
            </div>
          </div>
          @endif
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              Blog Post List
            </div>
            <div class="card-body">

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Sl No</th>
                    <th>Blog Title</th>
                    <th>User Name</th>
                    <th>Category Name</th>
                    <th>Blog description</th>
                    <th>Created At</th>
                    <th>Blog Photo</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($blogs as $blog)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $blog->blog_title }}</td>
                      <td>{{ $blog->relationtocategory->category_name }}</td>
                      <td>{{ Auth::User()->name }}</td>
                      <td>{{ $blog->blog_description }}</td>
                      <td>
                        @if ($blog->created_at)
                          {{ $blog->created_at->diffForHumans() }}
                        @else
                          <span class="bg-danger text-white p-1">No time to show</span>
                        @endif
                      </td>
                      <td>
                        <img src="{{ asset('uploads/blog_photo') }}/{{ $blog->blog_photo }}" width="100" alt="Not Found">
                      </td>
                      <td>
                        <div class="btn-group text-white">
                          <a href="{{ url('update/blog') }}/{{ $blog->id }}" type="button" class="btn btn-secondary">Update</a>
                          <a href="{{ url('delete/blog') }}/{{ $blog->id }}" type="button" class="btn btn-danger">Delete</a>
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
      </div>
    </div>
  </div>
@endsection
