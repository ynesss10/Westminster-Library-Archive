<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman - WestMinster Admin</title>
</head>

<body>

    <h1>Manajemen Peminjaman</h1>

    <a href="{{ route('admin.dashboard') }}">
        Kembali ke Dashboard
    </a>

    <hr>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Jatuh Tempo</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse($borrowings as $borrowing)

                <tr>

                    <td>
                        {{ $borrowing->id }}
                    </td>

                    <td>
                        {{ $borrowing->user->name }}
                    </td>

                    <td>
                        {{ $borrowing->book->title }}
                    </td>

                    <td>
                        {{ $borrowing->borrowing_date }}
                    </td>

                    <td>
                        {{ $borrowing->due_date ?? '-' }}
                    </td>

                    <td>
                        {{ $borrowing->return_date ?? '-' }}
                    </td>

                    <td>
                        {{ $borrowing->status }}
                    </td>

                    <td>
                        <a href="{{ route('admin.borrowings.show', $borrowing) }}">
                            Detail
                        </a>
                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="8">
                        Belum ada data peminjaman.
                    </td>
                </tr>

            @endforelse

        </tbody>
    </table>

</body>

</html>