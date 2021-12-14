@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Details</div>
                    @if (session('status'))
                        <div class="alert alert-{{ session('status_type') }} m-1">
                            {{ session('status') }}
                        </div>
                    @endif
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Name: {{ $user->name }}</li>
                            <li class="list-group-item">Email: {{ $user->email }}</li>
                            <li class="list-group-item">Current Roles:
                                <ul>
                                    @foreach($user->roles as $role)
                                        <li>{{ $role->name }}</li>
                                    @endforeach
                                </ul>
                             </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <a href="/admin/users" class="btn btn-primary">Back to Users List</a>
                                <a href="/admin/users/{{ $user->id }}/edit" class="btn btn-warning">Edit User</a>
                                <form action="/admin/users/{{ $user->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </li>
                        </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
