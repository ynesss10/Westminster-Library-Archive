<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users - WestMinster Admin</title>
</head>

<body>

    <h1>Manajemen User</h1>

    <a href="{{ route('admin.dashboard') }}">
        Kembali ke Dashboard
    </a>

    <hr>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Terdaftar</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($users as $user)

                <tr>
                    <td>{{ $user->id }}</td>

                    <td>{{ $user->name }}</td>

                    <td>{{ $user->email }}</td>

                    <td>{{ $user->role }}</td>

                    <td>
                        {{ $user->created_at->format('d-m-Y') }}
                    </td>

                    <td>
                        <a href="{{ route('admin.users.show', $user) }}">
                            Detail
                        </a>
                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="6">
                        Belum ada user.
                    </td>
                </tr>

            @endforelse
        </tbody>
    </table>

</body>

</html>