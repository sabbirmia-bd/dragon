@extends('layouts.dashboard_master')


@section('about')
    active
@endsection
@section('content')
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ asset('home') }}">Home</a>
    <a class="breadcrumb-item" href="{{ asset('add/about') }}">Add About</a>
    <span class="breadcrumb-item active">about Details</span>
  </nav>

  <div class="sl-pagebody">

    <div class="row row-sm">

      {{-- <div class="col-md-4">
        <div class="card">
          <div class="card-header">

            {{ $message_name }}
          </div>
          <div class="card-body">
            {{ $message_subject }}
          </div>
        </div>
      </div> --}}

      <div class="col-md-12">
        <div class="card">
          <div class="card-header text-center bg-info text-white">
            About details
          </div>
          <div class="card-body">
            {{ $about_details }}
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection
