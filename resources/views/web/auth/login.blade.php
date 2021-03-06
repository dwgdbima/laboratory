@extends('web.auth.main')

@section('box-msg', 'Sign in to start your session')

@section('content')
<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="input-group mb-3">
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email"
            required autocomplete="email" autofocus>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
        @error('email')
        <span class="error invalid-feedback">
            {{ $message }}
        </span>
        @enderror
    </div>
    <div class="input-group mb-3">
        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password"
            name="password" required autocomplete="current-password">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
        @error('password')
        <span class="error invalid-feedback">
            {{ $message }}
        </span>
        @enderror
    </div>
    <div class="row">
        <div class="col-8">
            <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                    Remember Me
                </label>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </div>
        <!-- /.col -->
    </div>
</form>
@endsection

@section('scripts')

@endsection