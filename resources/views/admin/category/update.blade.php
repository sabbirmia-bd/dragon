@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-4 m-auto">
        <div class="card">
          <div class="card-header">
            Update Category
          </div>
          <div class="card-body">

            <form action="{{ url('update/category/post') }}" method="post">
              @csrf
              <div class="form-group">
                <label>Category Name</label>
                <input type="hidden" name="category_id" value="{{ $category_id }}">
                <input type="text" name="category_name" class="form-control" value="{{ $category_name }}">
              </div>
              <button type="submit" class="btn btn-success">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
