@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-md-9">
                        Social Media Feed
                    </div>
                    <div class="col-md-3">
                        @if (Auth::user())
                            <a class="btn btn-primary float-right" href="/posts/create"> Create Post </a>
                        @endif
                    </div>
                    </div>
                </div>
                @if (session('status'))
                    <div class="alert alert-{{ session('status_type') }} m-1">
                        {{ session('status') }}
                    </div>
                @endif
                @foreach($posts as $post)
                <div class="card p-1 m-1">
                    <div class="card-header bg-dark d-flex align-items-center">
                        <h5 class="card-title text-light mb-auto">{{ $post->title }}</h5>
                    </div>
                    @if ($post->image_url)
                        <img class="" src="{{ $post->image_url }}" alt="Card image cap">
                    @endif
                    <div class="card-body">
                        <p class="card-text">{{ $post->content }}</p>
                    </div>
                    <div class="card-footer p-3">
                        <div class="row align-items-center">
                            <div class="col-md-9">
                                <small>Posted {{ $post->created_at->diffForHumans() }} by {{ $post->users->name }}</small>
                            </div>
                            <div class="col-md-3 form-inline justify-content-end">
                                @if (Auth::user() && Auth::id() === $post->users->id)
                                    <a class="btn btn-warning mr-1" href="/posts/{{$post->id}}/edit"> Edit </a>
                                @endif
                                @if (Auth::user() && Auth::id() === $post->users->id || Auth::user() && Auth::user()->isModerator())
                                    <form action="/posts/{{$post->id}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger float-right" value="Delete">
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
