<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Concert Manager')</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <nav>
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ route('conciertos.index') }}">Concerts</a>
        @guest
            <a href="{{ route('register') }}">Register</a>
            <a href="{{ route('login') }}">Login</a>
        @endguest
        @auth
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @endauth
    </nav>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>

    @yield('scripts')
</body>
</html>