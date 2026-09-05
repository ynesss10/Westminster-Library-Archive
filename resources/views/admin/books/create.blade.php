@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')

    <div class="container">

        <h1>Tambah Buku</h1>

        @if($errors->any())
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div>
                <label>Judul Buku</label>

                <input type="text" name="title" value="{{ old('title') }}" required>
            </div>

            <div>
                <label>Penulis</label>

                <input type="text" name="author" value="{{ old('author') }}" required>
            </div>

            <div>
                <label>Penerbit</label>

                <input type="text" name="publisher" value="{{ old('publisher') }}">
            </div>

            <div>
                <label>Tahun Terbit</label>

                <input type="number" name="publication_year" value="{{ old('publication_year') }}">
            </div>

            <div>
                <label>ISBN</label>

                <input type="text" name="isbn" value="{{ old('isbn') }}">
            </div>

            <div>
                <label>Kategori</label>

                <input type="text" name="category" value="{{ old('category') }}" required>
            </div>

            <div>
                <label>Deskripsi</label>

                <textarea name="description">{{ old('description') }}</textarea>
            </div>

            <div>
                <label>Stok Buku Fisik</label>

                <input type="number" name="physical_stock" value="{{ old('physical_stock', 0) }}" min="0" required>
            </div>

            <div>
                <label>Cover Buku</label>

                <input type="file" name="cover" accept=".jpg,.jpeg,.png,.webp">
            </div>

            <div>
                <label>File Buku Digital</label>

                <input type="file" name="digital_file" accept=".pdf">
            </div>

            <div>
                <label for="is_archive">Lokasi Buku</label>

                <select name="is_archive" id="is_archive" required>
                    <option value="0">Books</option>
                    <option value="1">Archive</option>
                </select>
            </div>

            <button type="submit">
                Simpan Buku
            </button>

            <a href="{{ route('admin.books.index') }}">
                Batal
            </a>

        </form>

    </div>

@endsection