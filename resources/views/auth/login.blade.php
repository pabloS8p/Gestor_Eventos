@extends('layouts.app')

@section('content')
    <h1>Login</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required value="{{ old('email') }}">
            @error('email')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <br>
        <div>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required>
            @error('password')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <br>
        <button type="submit">Login</button>
    </form>
@endsection