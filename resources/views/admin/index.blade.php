@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">User Administration</div>
                        <div class="card-body text-center">
                            <a href="/admin/users/create" class="btn btn-outline-success btn-block">Create new Admin User</a>
                            @if (session('status'))
                                <div class="alert alert-{{ session('status_type') }} mt-1">
                                    {{ session('status') }}
                                </div>

                            @endif
                        </div>
                        <div class="card-body d-flex justify-content-center">
                            <table class="table table-responsive w-auto">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Roles</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <ul>
                                                @foreach($user->roles as $role)
                                                    <li>{{ $role->name }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td  class="form-inline">
                                            <a href="/admin/users/{{ $user->id }}" class="btn btn-success btn-sm mr-1">Show</a>
                                            <a href="/admin/users/{{ $user->id }}/edit" class="btn btn-warning btn-sm mr-1">Edit</a>
                                            <form action="/admin/users/{{ $user->id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach
                            </table>
                        </div>

                </div>
            </div>
        </div>
    </div>
@endsection
