@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Manage Themes</div>
                    <div class="card-body text-center">
                        <a href="/themes/create" class="btn btn-outline-success btn-block">Add New Theme</a>
                        @if (session('status'))
                            <div class="alert alert-{{ session('status_type') }} mt-1">
                                {{ session('status') }}
                            </div>

                        @endif
                    </div>
                    <div class="card-body d-flex justify-content-center table-responsive">
                        <table class="table justify-content-center">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">ThemeID</th>
                                <th scope="col">Name</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            @foreach($themes as $theme)
                                <tr>
                                    <td>{{ $theme->id }}</td>
                                    <td>{{ $theme->name }}</td>
                                    <td  class="form-inline">
                                        <a href="/themes/{{ $theme->id }}" class="btn btn-primary btn-sm ml-auto">Details</a>
                                        <a href="/themes/{{ $theme->id }}/edit" class="btn btn-warning btn-sm ml-1">Edit</a>
                                        <form action="/themes/{{ $theme->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger btn-sm ml-1" value="Delete">
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
