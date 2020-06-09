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
    @if (session('contact_delete'))
      <div class="alert alert-danger">
        {{ session('contact_delete') }}
      </div>
    @endif
    <div class="row row-sm">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($contacts as $contact)
            <tr>
              <td width='5'>{{ $contact->name }}</td>
              <td width='8'>{{ $contact->email }}</td>
              <td width='220'>{{ $contact->subject }}</td>
              <td>{{ $contact->message }}</td>
              <td width='190'>{{ Carbon\Carbon::now()->format('d-m-Y h:i:s A') }}</td>
              <td width='155'>
                <div class="btn-group text-white">
                  <a href="{{ url('contact/view') }}/{{ $contact->id }}" type="button" class="btn btn-info" href="#">View</a>
                  <a href="{{ url('contact/delete') }}/{{ $contact->id }}" type="button" class="btn btn-danger">Delete</a>
                </div>

              </td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
