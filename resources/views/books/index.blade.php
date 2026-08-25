@extends('layouts.app')

@section('title', 'Books')

@section('content')

    <h1>Books</h1>

<form action="{{ route('books.index') }}" method="GET">

    <input
        type="text"
        name="search"
        value="{{ request('search') }}"
        placeholder="Cari buku..."
    >

    <button type="submit">
        Cari
    </button>

</form>

@foreach($books as $book)

    <div>
        <h2>{{ $book->title }}</h2>
        <p>{{ $book->author }}</p>

        <a href="{{ route('books.show', $book) }}">
            Lihat Detail
        </a>
    </div>

@endforeach


{{ $books->links() }}

@endsection