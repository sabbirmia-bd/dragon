@extends('layouts.dashboard_master')

@section('about')
  active
@endsection
@section('content')
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ asset('home') }}">Home</a>
      <span class="breadcrumb-item active">Add About</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              About List
            </div>
            <div class="card-body">
              @if (session('delete_about_status'))
                <div class="alert alert-danger">
                  {{ session('delete_about_status') }}
                </div>
              @endif
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Sl No</th>
                    <th>About</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($abouts as $about)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $about->add_about }}</td>
                      <td>{{ $about->created_at }}</td>
                      <td>
                        <div class="btn-group text-white">
                          <a href="{{ url('view/about') }}/{{ $about->id }}" type="button" class="btn btn-info">View</a>
                          <a href="{{ url('update/about') }}/{{ $about->id }}" type="button" class="btn btn-secondary">Update</a>
                          <a href="{{ url('delete/about') }}/{{ $about->id }}" type="button" class="btn btn-danger">Delete</a>
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
              Add About
            </div>
            <div class="card-body">
              @if (session('add_about_status'))
                <div class="alert alert-success">
                  {{ session('add_about_status') }}
                </div>
              @endif
              <form action="{{ url('add/about/post') }}" method="post">
                @csrf
                <div class="form-group">
                  <label>Add About</label>
                  <textarea name="add_about" class="form-control" placeholder="Enter Your About.." rows="8"></textarea>
                  @error ('add_about')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                <button type="submit" class="btn btn-success">Add About</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
