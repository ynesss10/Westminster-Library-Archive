@extends('layouts.app')

@section('title', 'Books')

@section('content')

    <h1>Books</h1>

    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div>
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('books.index') }}" method="GET">

        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari buku...">

        <button type="submit">
            Cari
        </button>

    </form>

    @foreach ($books as $book)

        <div>
            <h2>{{ $book->title }}</h2>

            <p>
                Penulis: {{ $book->author }}
            </p>

            <p>
                Stok: {{ $book->physical_stock }}
            </p>

            <a href="{{ route('books.show', $book) }}">
                Lihat Detail
            </a>

            @if ($book->physical_stock > 0)

                <form action="{{ route('borrowings.borrow', $book) }}" method="POST">
                    @csrf

                    <button type="submit">
                        Pinjam Buku
                    </button>
                </form>

            @else

                <p>Stok buku habis.</p>

            @endif
        </div>

    @endforeach


    {{ $books->links() }}

@endsection