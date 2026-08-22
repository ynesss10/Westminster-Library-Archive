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
            You currently have no active borrowings.
        </p>

        <a href="{{ url('/books') }}">
            Browse Books
        </a>
    </section>

@endsection