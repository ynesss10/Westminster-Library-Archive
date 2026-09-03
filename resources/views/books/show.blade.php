@extends('layouts.app')

@section('title', $book->title)

@section('content')

<div class="container">

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif

    @if($book->cover)
        <img
            src="{{ asset('storage/' . $book->cover) }}"
            alt="{{ $book->title }}"
            width="250"
        >
    @endif

    <h1>{{ $book->title }}</h1>

    <p>Penulis: {{ $book->author }}</p>

    <p>Penerbit: {{ $book->publisher }}</p>

    <p>Tahun terbit: {{ $book->publication_year }}</p>

    <p>Kategori: {{ $book->category }}</p>

    <p>ISBN: {{ $book->isbn }}</p>

    <p>{{ $book->description }}</p>

    <p>
        Stok fisik:
        {{ $book->physical_stock }}
    </p>

    @if($book->digital_file)
        <a
            href="{{ asset('storage/' . $book->digital_file) }}"
            target="_blank"
        >
            Baca Digital
        </a>
    @endif

    @if($book->physical_stock > 0)
        <form action="{{ route('borrowings.borrow', $book) }}" method="POST">
            @csrf

            <button type="submit">
                Pinjam Buku
            </button>
        </form>
    @else
        <p>Stok buku fisik sedang habis.</p>
    @endif

</div>

@endsection