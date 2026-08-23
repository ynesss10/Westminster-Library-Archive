@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <h1>Dashboard</h1>

    <h2>
        Welcome, {{ auth()->user()->name }}
    </h2>

    <p>
        Role: {{ auth()->user()->role }}
    </p>

    <section>
        <h3>My Borrowings</h3>

        <p>
            View your active and previous book borrowings.
        </p>

        <a href="{{ url('/borrowings') }}">
            View My Borrowings
        </a>
    </section>

    <section>
        <h3>Explore Books</h3>

        <a href="{{ url('/books') }}">
            Browse Books
        </a>

        <a href="{{ url('/archive') }}">
            Browse Archive
        </a>
    </section>

@endsection