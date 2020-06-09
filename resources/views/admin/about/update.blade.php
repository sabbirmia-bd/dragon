@extends('layouts.dashboard_master')

@section('about')
  active
@endsection
@section('content')
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ asset('home') }}">Home</a>
      <a class="breadcrumb-item" href="{{ asset('add/about') }}">Add About</a>
      {{-- <span class="breadcrumb-item active">{{ $category_name }}</span> --}}
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
        <div class="col-md-4 m-auto">
          <div class="card">
            <div class="card-header">
              Update About
            </div>
            <div class="card-body">

              <form action="{{ url('update/about/post') }}" method="post">
                @csrf
                <div class="form-group">
                  <label>About</label>
                  <input type="hidden" name="about_id" value="{{ $about_id }}">
                  <input type="text" name="update_about" class="form-control" value="{{ $about }}">
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
