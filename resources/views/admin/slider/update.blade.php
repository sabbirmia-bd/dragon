@extends('layouts.dashboard_master')

@section('slider')
  active
@endsection
@section('content')
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ asset('home') }}">Home</a>
      <a class="breadcrumb-item" href="{{ asset('add/slider') }}">Add Slider</a>
      {{-- <span class="breadcrumb-item active">{{ $category_name }}</span> --}}
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
        <div class="col-md-4 m-auto">
          <div class="card">
            <div class="card-header">
              Update Slider
            </div>
            <div class="card-body">

              <form action="{{ url('update/slider/post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label>Category Name</label>
                  <input type="hidden" name="slider_id" value="{{ $slider_id }}">
                  <input type="text" name="slider_title" class="form-control" value="{{ $slider_title }}">
                </div>
                <div class="form-group">
                  <label>Current Category Photo</label>
                  <img class="form-control" src="{{ asset('uploads\slider_photo') }}/{{ $slider_photo }}" alt="">
                </div>
                <div class="form-group">
                  <label>New Category Photo</label>
                  <input type="file" name="slider_photo" class="form-control">
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
