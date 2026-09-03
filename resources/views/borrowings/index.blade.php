@extends('layouts.app')

@section('title', 'My Borrowings')

@section('content')

    <h1>My Borrowings</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif

    @forelse ($borrowings as $borrowing)

        <div>

            <h2>{{ $borrowing->book->title }}</h2>

            <p>
                Status:
                {{ $borrowing->status }}
            </p>

            <p>
                Tanggal Pinjam:
                {{ $borrowing->borrowing_date }}
            </p>

            @if ($borrowing->due_date)
                <p>
                    Batas Pengembalian:
                    {{ $borrowing->due_date }}
                </p>
            @endif

            @if (in_array($borrowing->status, ['approved', 'borrowed']))

                <form action="{{ route('borrowings.return', $borrowing) }}" method="POST">
                    @csrf

                    <button type="submit">
                        Kembalikan Buku
                    </button>
                </form>

            @endif

        </div>

        <hr>

    @empty

        <p>Belum ada buku yang dipinjam.</p>

    @endforelse

@endsection