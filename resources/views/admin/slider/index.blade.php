@extends('layouts.dashboard_master')

@section('slider')
  active
@endsection
@section('content')
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ asset('home') }}">Home</a>
      <span class="breadcrumb-item active">Add Slider</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              Slider List
            </div>
            <div class="card-body">
              @if (session('slider_delete_status'))
                <div class="alert alert-danger">
                  {{ session('slider_delete_status') }}
                </div>
              @endif
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Sl No</th>
                    <th>Slider Title</th>
                    <th>Slider description</th>
                    <th>Slider Photo</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($sliders as $slider)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $slider->slider_title }}</td>
                      <td>{{ $slider->slider_description }}</td>
                      <td>
                        <img width="100" src="{{ asset('uploads\slider_photo') }}/{{ $slider->slider_photo }}" alt="">
                      </td>
                      <td>{{ $slider->created_at }}</td>
                      <td>
                        <div class="btn-group text-white">
                          <a href="{{ url('update/slider') }}/{{ $slider->id }}" type="button" class="btn btn-secondary">Update</a>
                          <a href="{{ url('delete/slider') }}/{{ $slider->id }}" type="button" class="btn btn-danger">Delete</a>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

  {{-- Insert Category --}}
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              Add Slider
            </div>
            <div class="card-body">
              @if (session('slider_status'))
                <div class="alert alert-success">
                  {{ session('slider_status') }}
                </div>
              @endif
              <form action="{{ url('add/slider/post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label>Slider title</label>
                  <textarea type="text" name="slider_title" class="form-control" placeholder="Enter Your Slider title" rows="4"></textarea>
                  @error ('slider_title')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Slider description</label>
                  <textarea type="text" name="slider_description" class="form-control" placeholder="Enter Your Slider description" rows="4"></textarea>
                  @error ('slider_description')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Slider Photo</label>
                  <input type="file" name="slider_photo" class="form-control">
                  @error ('slider_photo')
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
