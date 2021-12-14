@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Theme</div>
                    <div class="card-body">
                        <form action="/themes" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" autocomplete="off" value="{{ old('name') }}" placeholder="Enter Name">
                                <small id="nameHelp" class="form-text text-muted">Enter a name for the new theme.</small>
                                @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="cdn_url">CDN Url</label>
                                <input type="text" class="form-control" name="cdn_url" id="cdn_url" autocomplete="off" value="{{ old('cdn_url') }}" placeholder="Enter CDN Url">
                                <small id="cdn_urlHelp" class="form-text text-muted">Enter a CDN Url for the new theme.</small>
                                @error('cdn_url') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="mt-3 d-flex justify-content-between">
                                <a href="/themes" class="btn btn-primary">Cancel</a>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
