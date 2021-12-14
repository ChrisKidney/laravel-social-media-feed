@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Admin User</div>
                    <div class="card-body">
                        <form action="/admin/users/" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" autocomplete="off" value="{{ old('name') }}" placeholder="Enter Name">
                                <small id="nameHelp" class="form-text text-muted">Enter a name for the new user.</small>
                                @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" id="email" autocomplete="off" value="{{ old('email') }}" placeholder="Enter Email">
                                <small id="emailHelp" class="form-text text-muted">Enter an email for the new user.</small>
                                @error('email') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" autocomplete="off" placeholder="Enter Password">
                                <small id="passwordHelp" class="form-text text-muted">Enter a password for the user.</small>
                                @error('password') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Password</label>
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" autocomplete="off" placeholder="Re-enter Password">
                                <small id="password_confirmationHelp" class="form-text text-muted">Re-enter the password to confirm.</small>
                            </div>

                            <label>Roles</label>
                            <small id="nameHelp" class="form-text text-muted">Give the user one or more roles.</small>
                            <ul class="list-group">
                                @foreach($roles as $role)
                                    <li class="list-group-item pl-4">
                                        <input class="form-check-input me-1" type="checkbox" value="{{ $role->id }}" id="role{{ $role->id }}" name="roles[]" aria-label="..." {{ in_array($role->id, old('roles', [])) ? 'checked' : '' }}>
                                        {{ $role->name }}
                                    </li>
                                @endforeach
                                @error('role*') <p class="text-danger">At least one role must be selected.</p> @enderror
                            </ul>
                            <div class="mt-3 d-flex justify-content-between">
                                <a href="/admin/users/" class="btn btn-primary">Cancel</a>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
