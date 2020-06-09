@extends('layouts.dashboard_master')

@section('content')
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ asset('home') }}">Home</a>
      <span class="breadcrumb-item active">Edit Profile</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
        <div class="col-md-4 m-auto">
          <div class="card">
            <div class="card-header">
              Change Profile Name
            </div>
            <div class="card-body">
              @if (session('name_change_status'))
                <div class="alert alert-success">
                  {{ session('name_change_status') }}
                </div>
              @endif
              <form action="{{ url('profile/post') }}" method="post">
                @csrf
                <div class="form-group">
                  <label>Profile Name</label>
                  <input type="text" name="profile_name" class="form-control" value="{{ Auth::user()->name }}">
                  @error ('profile_name')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                <button type="submit" class="btn btn-success">Change Name</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      {{-- Change Password --}}
      <div class="row row-sm mt-5">
        <div class="col-md-4 m-auto">
          <div class="card">
            <div class="card-header">
              Change Profile Password
            </div>
            <div class="card-body">
              @if (session('password_status'))
                <div class="alert alert-success">
                  {{ session('password_status') }}
                </div>
              @endif
              @if (session('password_not_status'))
                <div class="alert alert-danger">
                  {{ session('password_not_status') }}
                </div>
              @endif
              <form action="{{ url('password/post') }}" method="post">
                @csrf
                <div class="form-group">
                  <label>Old Password</label>
                  <input type="text" name="old_password" class="form-control" placeholder="Enter Old Password">
                  @error ('old_password')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>New Password</label>
                  <input type="text" name="password" class="form-control" placeholder="Enter New Password">
                  @error ('password')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                  @if (session('old_and_new_password_match'))
                    <span class="text-danger">
                      {{ session('old_and_new_password_match') }}
                    </span>
                  @endif
                </div>
                <div class="form-group">
                  <label>Confirm Password</label>
                  <input type="text" name="confirmation_password" class="form-control" placeholder="Enter Confirm Password">
                  @error ('confirmation_password')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                <button type="submit" class="btn btn-success">Change Password</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
