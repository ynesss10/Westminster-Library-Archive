@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')

    <div class="container">

        <h1>Edit Buku</h1>

        @if($errors->any())
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ route('admin.books.update', $book) }}"
            method="POST"
            enctype="multipart/form-data"
            onsubmit="return confirm('Apakah Anda yakin ingin menyimpan perubahan buku ini?');"
        >
            @csrf
            @method('PUT')

            <input type="text" name="title" value="{{ old('title', $book->title) }}" required>

            <input type="text" name="author" value="{{ old('author', $book->author) }}" required>

            <input type="text" name="publisher" value="{{ old('publisher', $book->publisher) }}">

            <input type="number" name="publication_year" value="{{ old('publication_year', $book->publication_year) }}">

            <input type="text" name="isbn" value="{{ old('isbn', $book->isbn) }}">

            <input type="text" name="category" value="{{ old('category', $book->category) }}" required>

            <textarea name="description">{{ old('description', $book->description) }}</textarea>

            <input type="number" name="physical_stock" value="{{ old('physical_stock', $book->physical_stock) }}" min="0"
                required>

            <button type="submit">
                Konfirmasi Perubahan
            </button>

            <a href="{{ route('admin.books.index') }}">
                Batal
            </a>

        </form>

    </div>

@endsection