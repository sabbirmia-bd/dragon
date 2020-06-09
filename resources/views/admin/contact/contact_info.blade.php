@extends('layouts.dashboard_master')

@section('contact_info')
  active
@endsection
@section('content')
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ asset('home') }}">Home</a>
      <span class="breadcrumb-item active">Contact info</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              Contact info
            </div>
            <div class="card-body">

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Sl No</th>
                    <th>Address</th>
                    <th>Email Address</th>
                    <th>Phone Number</th>
                    <th>Created At</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($contactinfos as $contactinfo)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $contactinfo->address }}</td>
                      <td>{{ $contactinfo->email_address }}</td>
                      <td>{{ $contactinfo->phone_number }}</td>
                      <td>{{ $contactinfo->created_at }}</td>
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

  {{-- Insert Category --}}
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              Add contact info
            </div>
            <div class="card-body">
              @if (session('contact_info_status'))
                <div class="alert alert-success">
                  {{ session('contact_info_status') }}
                </div>
              @endif
              <form action="{{ url('contact/info/post') }}" method="post">
                @csrf
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" name="address" class="form-control" placeholder="Enter Your Address">
                  @error ('address')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Email Address</label>
                  <input type="text" name="email_address" class="form-control" placeholder="Enter Your Email Address">
                  @error ('address')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Phone Number</label>
                  <input type="text" name="phone_number" class="form-control" placeholder="Enter Your Phone Number">
                  @error ('address')
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
