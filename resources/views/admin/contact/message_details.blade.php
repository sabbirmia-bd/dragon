@extends('layouts.dashboard_master')


@section('message/list')
    active
@endsection
@section('content')
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ asset('home') }}">Home</a>
    <span class="breadcrumb-item active">Message List</span>
  </nav>

  <div class="sl-pagebody">

    <div class="row row-sm">

      <div class="col-md-4">
        <div class="card">
          <div class="card-header">

            {{ $message_name }}
          </div>
          <div class="card-body">
            {{ $message_subject }}
          </div>
        </div>
      </div>

      <div class="col-md-8">
        <div class="card">
          <div class="card-header text-center bg-info text-white">
            Contact message details
          </div>
          <div class="card-body">
            {{ $message_details }}
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection
