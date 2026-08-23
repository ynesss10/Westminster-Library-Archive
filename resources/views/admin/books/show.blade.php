@extends('layouts.app')

@section('title', $book->title)

@section('content')

    <div class="container">

        <h1>{{ $book->title }}</h1>

        @if($book->cover)
            <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->title }}" width="200">
        @endif

        <p>Penulis: {{ $book->author }}</p>

        <p>Penerbit: {{ $book->publisher }}</p>

        <p>Tahun: {{ $book->publication_year }}</p>

        <p>ISBN: {{ $book->isbn }}</p>

        <p>Kategori: {{ $book->category }}</p>

        <p>Stok: {{ $book->physical_stock }}</p>

        <p>{{ $book->description }}</p>

        @if($book->digital_file)
            <a href="{{ asset('storage/' . $book->digital_file) }}" target="_blank">
                Lihat File Digital
            </a>
        @endif

        <br>

        <a href="{{ route('admin.books.edit', $book) }}">
            Edit
        </a>

        <a href="{{ route('admin.books.index') }}">
            Kembali
        </a>

    </div>

@endsection