@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Theme Details</div>
                    @if (session('status'))
                        <div class="alert alert-{{ session('status_type') }} m-1">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Name: {{ $theme->name }}</li>
                        <li class="list-group-item">CDN Url: {{ $theme->cdn_url }}</li>
                        <li class="list-group-item d-flex justify-content-between">
                            <a href="/themes" class="btn btn-primary">Back to Themes</a>
                            <a href="/themes/{{ $theme->id }}/edit" class="btn btn-warning">Edit Theme</a>
                            <form action="/themes/{{ $theme->id }}" method="post">
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
