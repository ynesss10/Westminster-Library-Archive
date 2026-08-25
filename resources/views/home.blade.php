@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <h1>Welcome to WestMinster</h1>
    <p>
        Discover books and manage your library borrowing.
    </p>

    @auth
        <a href="{{ url('/dashboard') }}">
            Go to Dashboard
        </a>
    @else
        <a href="{{ url('/login') }}">
            Login
        </a>

        <a href="{{ url('/register') }}">
            Register
        </a>
    @endauth

@endsection