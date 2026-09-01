@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

    <h1>Admin Dashboard</h1>

    <p>Selamat datang di dashboard admin WestMinster.</p>

    <hr>

    <h2>Statistik</h2>

    <div>
        <h3>Total Buku</h3>
        <p>{{ $totalBooks }}</p>
    </div>

    <div>
        <h3>Total User</h3>
        <p>{{ $totalUsers }}</p>
    </div>

    <div>
        <h3>Peminjaman Pending</h3>
        <p>{{ $pendingBorrowings }}</p>
    </div>

    <div>
        <h3>Buku Sedang Dipinjam</h3>
        <p>{{ $activeBorrowings }}</p>
    </div>

    <hr>

    <a href="{{ route('admin.books.index') }}">
        Kelola Buku
    </a>

    <br>

    <a href="{{ route('admin.users.index') }}">
        Kelola User
    </a>

    <br>

    <a href="{{ route('admin.borrowings.index') }}">
        Kelola Peminjaman
    </a>

@endsection