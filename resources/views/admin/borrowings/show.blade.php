@extends('layouts.app')

@section('title', 'Detail Peminjaman')

@section('content')

    <h1>Detail Peminjaman</h1>

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

    <h2>{{ $borrowing->book->title }}</h2>

    <p>
        User:
        {{ $borrowing->user->name }}
    </p>

    <p>
        Email:
        {{ $borrowing->user->email }}
    </p>

    <p>
        Tanggal Peminjaman:
        {{ $borrowing->borrowing_date }}
    </p>

    <p>
        Jatuh Tempo:
        {{ $borrowing->due_date ?? '-' }}
    </p>

    <p>
        Tanggal Pengembalian:
        {{ $borrowing->return_date ?? '-' }}
    </p>

    <p>
        Status:
        {{ $borrowing->status }}
    </p>

    <hr>

    @if($borrowing->status === 'pending')

        <form
            action="{{ route('admin.borrowings.approve', $borrowing) }}"
            method="POST"
        >
            @csrf

            <button type="submit">
                Approve
            </button>
        </form>

        <br>

        <form
            action="{{ route('admin.borrowings.reject', $borrowing) }}"
            method="POST"
        >
            @csrf

            <button type="submit">
                Reject
            </button>
        </form>

    @elseif(in_array($borrowing->status, ['approved', 'borrowed']))

        <form
            action="{{ route('admin.borrowings.return', $borrowing) }}"
            method="POST"
        >
            @csrf

            <button type="submit">
                Proses Pengembalian
            </button>
        </form>

    @elseif($borrowing->status === 'returned')

        <p>
            Buku sudah dikembalikan.
        </p>

    @elseif($borrowing->status === 'rejected')

        <p>
            Peminjaman ditolak.
        </p>

    @endif

    <br>

    <a href="{{ route('admin.borrowings.index') }}">
        Kembali ke Daftar Peminjaman
    </a>

@endsection