@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Theme</div>
                    <div class="card-body">
                        <form action="/themes/{{ $theme->id }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" autocomplete="off" value="{{ old('name') ?? $theme->name }}" placeholder="Enter Name">
                                <small id="nameHelp" class="form-text text-muted">Enter a name for the theme.</small>
                                @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="cdn_url">CDN Url</label>
                                <input type="text" class="form-control" name="cdn_url" id="cdn_url" autocomplete="off" value="{{ old('cdn_url') ?? $theme->cdn_url }}" placeholder="Enter the CDN Url">
                                <small id="cdn_urlHelp" class="form-text text-muted">Enter the CDN url.</small>
                                @error('cdn_url') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="mt-3 d-flex justify-content-between">
                                <a href="/themes/{{ $theme->id }}" class="btn btn-primary">Cancel</a>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
