@extends('layouts.dashboard_master')

@section('faq')
  active
@endsection
@section('content')
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ asset('home') }}">Home</a>
      <span class="breadcrumb-item active">Add Faq</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              Faq List
            </div>
            <div class="card-body">
              @if (session('delete_faq_status'))
                <div class="alert alert-danger">
                  {{ session('delete_faq_status') }}
                </div>
              @endif
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Sl No</th>
                    <th>Ask</th>
                    <th>Ans</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($faqs as $faq)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $faq->add_ask }}</td>
                      <td>{{ $faq->add_ans }}</td>
                      <td>{{ $faq->created_at }}</td>
                      <td>
                        <div class="btn-group text-white">
                          {{-- <a href="{{ url('view/about') }}/{{ $about->id }}" type="button" class="btn btn-info">View</a>
                          <a href="{{ url('update/about') }}/{{ $about->id }}" type="button" class="btn btn-secondary">Update</a> --}}
                          <a href="{{ url('delete/faq') }}/{{ $faq->id }}" type="button" class="btn btn-danger">Delete</a>
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
              Add Faq
            </div>
            <div class="card-body">
              @if (session('add_faq_status'))
                <div class="alert alert-success">
                  {{ session('add_faq_status') }}
                </div>
              @endif
              <form action="{{ url('add/faq/post') }}" method="post">
                @csrf
                <div class="form-group">
                  <label>Add Ask</label>
                  <textarea name="add_ask" class="form-control" placeholder="Enter Your Ask.." rows="3"></textarea>
                  @error ('add_ask')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Add Ans</label>
                  <textarea name="add_ans" class="form-control" placeholder="Enter Your Ans.." rows="3"></textarea>
                  @error ('add_ans')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                <button type="submit" class="btn btn-success">Add Faq</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
