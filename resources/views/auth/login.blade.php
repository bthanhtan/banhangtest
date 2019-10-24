@extends('layouts.app')
<link rel="stylesheet" href="{{ url('admin/css/login_css.css') }}">

@section('content')





<div id="fullscreen_bg" class="fullscreen_bg"/>

<div class="container">

    <form method="POST" action="{{ route('login') }}" class="form-signin">
        @csrf
        <h1 class="form-signin-heading text-muted">Sign In</h1>
        <input  placeholder="User name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <button class="btn btn-lg btn-primary btn-block" type="submit">
            Sign In
        </button>
    </form>

</div>
@endsection
