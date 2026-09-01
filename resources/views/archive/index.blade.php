@extends('layouts.app')

@section('title', 'Archive')

@section('content')

    <h1>Archive</h1>

    <p>
        Browse books and request physical books from the archive.
    </p>

    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div>
            {{ session('error') }}
        </div>
    @endif

    <hr>

    @forelse($books as $book)

        <div>

            <h2>{{ $book->title }}</h2>

            <p>
                Author: {{ $book->author }}
            </p>

            <p>
                Category: {{ $book->category }}
            </p>

            <a href="{{ route('books.show', $book) }}">
                Baca Digital
            </a>

            <form action="{{ route('borrowings.request', $book) }}" method="POST">
                @csrf

                <button type="submit">
                    Request Pinjam
                </button>
            </form>

        </div>

        <hr>

    @empty

        <p>
            Belum ada buku.
        </p>

    @endforelse

@endsection