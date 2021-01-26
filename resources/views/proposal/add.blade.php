@extends('layouts/master')
@section('content')

<form action="/proposal/store" method="POST">
	@csrf
    <div class="form-group">
    <label for="title">Your name</label>

    <input id="name" name="name" type="text" value="{{ old('name') }}" class="@error('name') is-invalid @enderror form-control">

    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>

    <div class="form-group">
    <label for="title">Post Title</label>

    <input id="title" name="title" type="text" value="{{ old('title') }}" class="@error('title') is-invalid @enderror form-control">

    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>

    <div class="form-group">
    <label for="title">Description</label>

    <textarea id="description" name="description" class="@error('description') is-invalid @enderror form-control">{{ old('description') }}</textarea>

    @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>

    <div class="form-group">
        <label for="code">Enter code: {{ $captchaCode }}</label>

        <input name="captcha_code" type="text" class="@error('captcha_code') is-invalid @enderror form-control">

        @error('captcha_code')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <input type="submit" class="btn btn-primary">
</form>
@endsection
