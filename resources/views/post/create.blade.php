@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Post</div>
                    @if (session('status'))
                        <div class="alert alert-{{ session('status_type') }} m-1">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="/posts" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <input type="text" class="form-control" name="title" id="title" autocomplete="off" value="{{ old('title') }}" placeholder="[Required] Enter Title">
                                @error('title') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea rows="5" class="form-control" name="content" id="content" autocomplete="off" placeholder="[Required] Enter Content">{{ old('content') }}</textarea>
                                @error('content') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="content">Image URL</label>
                                <input type="text" class="form-control" name="image_url" id="image_url" autocomplete="off" value="{{ old('image_url') }}" placeholder="[Optional] Enter image URL">
                                @error('image_url') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="mt-3 d-flex justify-content-between">
                                <a href="/posts" class="btn btn-primary">Cancel</a>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

