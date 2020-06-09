@extends('layouts.dashboard_master')

@section('testmonial')
  active
@endsection
@section('content')
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ asset('home') }}">Home</a>
      <span class="breadcrumb-item active">Add Testmonial</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              Testmonial List
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
                    <th>Client Name</th>
                    <th>Client Title</th>
                    <th>Client Comment</th>
                    <th>Client Photo</th>
                    <th>Created At</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($testmonials as $testmonial)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $testmonial->client_name }}</td>
                      <td>{{ $testmonial->client_title }}</td>
                      <td>{{ $testmonial->client_comment }}</td>
                      <td>
                        <img width="100" src="{{ asset('uploads\testmonial_photo') }}/{{ $testmonial->client_photo }}" alt="">
                      </td>
                      <td>{{ $testmonial->client_comment }}</td>
                      <td>
                        {{-- <div class="btn-group text-white">
                          <a href="{{ url('update/slider') }}/{{ $slider->id }}" type="button" class="btn btn-secondary">Update</a>
                          <a href="{{ url('delete/slider') }}/{{ $slider->id }}" type="button" class="btn btn-danger">Delete</a>
                        </div> --}}
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
              Add Testmonial
            </div>
            <div class="card-body">
              @if (session('slider_status'))
                <div class="alert alert-success">
                  {{ session('slider_status') }}
                </div>
              @endif
              <form action="{{ url('add/testmonial/post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label>Client Name</label>
                  <input type="text" name="client_name" class="form-control" placeholder="Enter Your Client Name">
                  @error ('client_name')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Client Title</label>
                  <input type="text" name="client_title" class="form-control" placeholder="Enter Your Client Title">
                  @error ('client_title')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Slider Comment</label>
                  <textarea type="text" name="client_comment" class="form-control" placeholder="Enter Your Client Comment" rows="4"></textarea>
                  @error ('client_comment')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Client Photo</label>
                  <input type="file" name="client_photo" class="form-control">
                  @error ('client_photo')
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
