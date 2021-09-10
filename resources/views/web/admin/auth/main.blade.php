<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @include('web.admin.auth.layout.header')

    @include('web.admin.auth.layout.resources.css')

    @yield('styles')

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ config('app.url') }}" class="h1"><b>ADMIN</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">@yield('box-msg')</p>
                @yield('content')
            </div>
            <div class="card-footer text-center">
                @if (url()->current() == route('login'))
                <p>
                    <a href="{{route('password.request')}}" class="text-center">I forgot my password</a>
                </p>
                @endif
            </div>
        </div>
    </div>

    @include('web.admin.auth.layout.resources.js')

    @yield('scripts')
</body>

</html>