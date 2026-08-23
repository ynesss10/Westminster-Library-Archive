@extends('layouts.app')

@section('title', 'Kelola Buku')

@section('content')

<div class="container">

    <h1>Kelola Buku</h1>

    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.books.create') }}">
        Tambah Buku
    </a>

    <form action="{{ route('admin.books.index') }}" method="GET">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari judul, penulis, atau ISBN"
        >

        <button type="submit">
            Cari
        </button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Cover</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($books as $book)
                <tr>

                    <td>
                        @if($book->cover)
                            <img
                                src="{{ asset('storage/' . $book->cover) }}"
                                alt="{{ $book->title }}"
                                width="70"
                            >
                        @else
                            Tidak ada cover
                        @endif
                    </td>

                    <td>
                        {{ $book->title }}
                    </td>

                    <td>
                        {{ $book->author }}
                    </td>

                    <td>
                        {{ $book->category }}
                    </td>

                    <td>
                        {{ $book->physical_stock }}
                    </td>

                    <td>
                        <a href="{{ route('admin.books.show', $book) }}">
                            Detail
                        </a>

                        <a href="{{ route('admin.books.edit', $book) }}">
                            Edit
                        </a>

                        <form
                            action="{{ route('admin.books.destroy', $book) }}"
                            method="POST"
                            style="display:inline"
                        >
                            @csrf
                            @method('DELETE')

                            <button type="submit">
                                Hapus
                            </button>
                        </form>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="6">
                        Belum ada buku.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $books->links() }}

</div>

@endsection