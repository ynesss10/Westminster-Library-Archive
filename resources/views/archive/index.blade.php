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

            <p>
                Stok Fisik: {{ $book->physical_stock }}
            </p>

            <a href="{{ route('books.show', $book) }}">
                Baca Digital
            </a>

            @if($book->physical_stock > 0)

                <form action="{{ route('borrowings.request', $book) }}" method="POST">
                    @csrf

                    <button type="submit">
                        Request Pinjam
                    </button>
                </form>

            @else

                <p>
                    Stok buku sedang habis.
                </p>

            @endif

        </div>

        <hr>

    @empty

        <p>
            Belum ada buku.
        </p>

    @endforelse

@endsection