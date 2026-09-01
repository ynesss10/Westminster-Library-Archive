@extends('layouts.app')

@section('title', 'Add Book')

@section('content')

    <h1>Add Book</h1>

    <form
        action="{{ route('books.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf

        <div>
            <label>Title</label>

            <input
                type="text"
                name="title"
                value="{{ old('title') }}"
            >
        </div>

        <div>
            <label>Author</label>

            <input
                type="text"
                name="author"
                value="{{ old('author') }}"
            >
        </div>

        <div>
            <label>Publisher</label>

            <input
                type="text"
                name="publisher"
                value="{{ old('publisher') }}"
            >
        </div>

        <div>
            <label>Publication Year</label>

            <input
                type="number"
                name="publication_year"
                value="{{ old('publication_year') }}"
            >
        </div>

        <div>
            <label>ISBN</label>

            <input
                type="text"
                name="isbn"
                value="{{ old('isbn') }}"
            >
        </div>

        <div>
            <label>Category</label>

            <input
                type="text"
                name="category"
                value="{{ old('category') }}"
            >
        </div>

        <div>
            <label>Description</label>

            <textarea name="description">{{ old('description') }}</textarea>
        </div>

        <div>
            <label>Cover</label>

            <input
                type="file"
                name="cover"
                accept="image/*"
            >
        </div>

        <div>
            <label>Digital File</label>

            <input
                type="file"
                name="digital_file"
                accept=".pdf"
            >
        </div>

        <div>
            <label>Physical Stock</label>

            <input
                type="number"
                name="physical_stock"
                min="0"
                value="{{ old('physical_stock', 0) }}"
            >
        </div>

        <button type="submit">
            Save Book
        </button>

    </form>

@endsection