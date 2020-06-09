@extends('layouts.dashboard_master')

@section('coupon')
  active
@endsection
@section('content')
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ asset('/') }}">Home</a>
      <span class="breadcrumb-item active">Add Coupon</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              Coupon List
            </div>
            <div class="card-body">

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Sl No</th>
                    <th>Coupon Name</th>
                    <th>Discount Amount</th>
                    <th>Validity Status</th>
                    <th>Validity Till</th>
                    <th>Created At</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($coupons as $coupon)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $coupon->coupon_name }}</td>
                      <td>{{ $coupon->discount_amount }}%</td>
                      <td>
                        @if ($coupon->validity_till >= Carbon\Carbon::now()->format('Y-m-d'))
                          <span class="badge badge-success">Valid</span>
                          @else
                            <span class="badge badge-danger">Invalid</span>
                        @endif

                      </td>
                      <td>{{ $coupon->validity_till }}</td>
                      <td>{{ $coupon->created_at }}</td>
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
              Add Product
            </div>
            <div class="card-body">

              <form action="{{ url('add/coupon/post') }}" method="post">
                @csrf
                <div class="form-group">
                  <label>Coupon Name</label>
                  <input type="text" name="coupon_name" class="form-control" placeholder="Enter Coupon Name">
                  @error ('coupon_name')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Discount Amount</label>
                  <input type="text" name="discount_amount" class="form-control" placeholder="Enter Discount Amount">
                  @error ('discount_amount')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>validity Till</label>
                  <input type="date" name="validity_till" class="form-control" placeholder="Enter Validity Till" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
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
