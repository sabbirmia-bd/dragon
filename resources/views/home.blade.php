@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Welcome, {{ Auth::user()->name }}</h1>
                    <h2>Email, {{ Auth::user()->email }}</h2>
                    <h3>Created At, {{ Auth::user()->created_at }}</h3>
                </div>
            </div>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h1>Total User: {{ $user_count }}</h1>
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Sirial No</th>
                    <th>Id No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                    <tr>
                      <td>{{ $users->firstItem() + $loop->index }}</td>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>
                        <li>{{ $user->created_at->format('d/m/Y h:i:s A') }}</li>
                        <li>{{ $user->created_at->diffForHumans() }}</li>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $users->links() }}
            </div>
          </div>
        </div>
      </div>
</div>
@endsection
