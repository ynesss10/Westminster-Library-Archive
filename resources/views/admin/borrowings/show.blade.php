<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Peminjaman - WestMinster Admin</title>
</head>

<body>

    <h1>Detail Peminjaman</h1>

    <a href="{{ route('admin.borrowings.index') }}">
        Kembali ke Peminjaman
    </a>

    <hr>

    <p>
        <strong>ID Peminjaman:</strong>
        {{ $borrowing->id }}
    </p>

    <p>
        <strong>User:</strong>
        {{ $borrowing->user->name }}
    </p>

    <p>
        <strong>Email:</strong>
        {{ $borrowing->user->email }}
    </p>

    <p>
        <strong>Buku:</strong>
        {{ $borrowing->book->title }}
    </p>

    <p>
        <strong>Penulis:</strong>
        {{ $borrowing->book->author }}
    </p>

    <p>
        <strong>Tanggal Pinjam:</strong>
        {{ $borrowing->borrowing_date }}
    </p>

    <p>
        <strong>Jatuh Tempo:</strong>
        {{ $borrowing->due_date ?? '-' }}
    </p>

    <p>
        <strong>Tanggal Kembali:</strong>
        {{ $borrowing->return_date ?? '-' }}
    </p>

    <p>
        <strong>Status:</strong>
        {{ $borrowing->status }}
    </p>

</body>

</html>