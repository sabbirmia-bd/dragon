@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      @if(session('update_status'))
      <div class="col-md-12">
          <div class="alert alert-success">
            {{ session('update_status') }}
          </div>
        </div>
        @endif
        @if(session('delete_status'))
          <div class="col-md-12">
          <div class="alert alert-danger">
            {{ session('delete_status') }}
          </div>
        </div>
        @endif
        @if(session('restore_status'))
          <div class="col-md-12">
          <div class="alert alert-success">
            {{ session('restore_status') }}
          </div>
        </div>
        @endif
        @if(session('force_delete_status'))
          <div class="col-md-12">
          <div class="alert alert-danger">
            {{ session('force_delete_status') }}
          </div>
        </div>
        @endif
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            Category List(Active)
          </div>
          <div class="card-body">

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Sl No</th>
                  <th>Category Name</th>
                  <th>Added By</th>
                  <th>Created At</th>
                  <th>Last Updated At</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse($categories as $category)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $category->category_name }}</td>
                    <td>{{ App\User::find($category->user_id)->name }}</td>
                    <td>
                      @if ($category->created_at)
                        {{ $category->created_at->diffForHumans() }}
                      @else
                        <span class="bg-danger text-white p-1">No time to show</span>
                      @endif
                    </td>
                    <td>
                      @if ($category->updated_at)
                        {{ $category->updated_at->diffForHumans() }}
                      @else
                        <span class="">--</span>
                      @endif
                    </td>
                    <td>
                      <div class="btn-group text-white">
                        <a href="{{ url('update/category') }}/{{ $category->id }}" type="button" class="btn btn-secondary">Update</a>
                        <a href="{{ url('delete/category') }}/{{ $category->id }}" type="button" class="btn btn-danger">Delete</a>

                      </div>
                    </td>
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
        <div class="card mt-4">
          <div class="card-header bg-danger">
            Category List(Deleted)
          </div>
          <div class="card-body">

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Sl No</th>
                  <th>Category Name</th>
                  <th>Added By</th>
                  <th>Created At</th>
                  <th>Last Updated At</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse($deleted_categories as $deleted_category)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $deleted_category->category_name }}</td>
                    <td>{{ App\User::find($deleted_category->user_id)->name }}</td>
                    <td>
                      @if ($deleted_category->created_at)
                        {{ $deleted_category->created_at->diffForHumans() }}
                      @else
                        <span class="bg-danger text-white p-1">No time to show</span>
                      @endif
                    </td>
                    <td>
                      @if ($deleted_category->updated_at)
                        {{ $deleted_category->updated_at->diffForHumans() }}
                      @else
                        <span class="">--</span>
                      @endif
                    </td>
                    <td>
                      <div class="btn-group text-white">
                        <a href="{{ url('restore/category') }}/{{ $deleted_category->id }}" type="button" class="btn btn-success">Restore</a>
                        <a href="{{ url('harddelete/category') }}/{{ $deleted_category->id }}" type="button" class="btn btn-danger">Hard</a>

                      </div>
                    </td>
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
            Add Category
          </div>
          <div class="card-body">
            @if(session('success_message'))
              <div class="alert alert-success">
                {{ session('success_message') }}
              </div>
            @endif
            <form action="{{ url('add/category/post') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label>Category Name</label>
                <input type="text" name="category_name" class="form-control" placeholder="Enter Category Name">
                @error ('category_name')
                  <spna class="text-danger">
                    {{ $message }}
                  </spna>
                @enderror
              </div>
              <div class="form-group">
                <label>Category Photo</label>
                <input type="file" name="category_photo" class="form-control">
                @error ('category_photo')
                  <spna class="text-danger">
                    {{ $message }}
                  </spna>
                @enderror
              </div>
              <button type="submit" class="btn btn-success">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
