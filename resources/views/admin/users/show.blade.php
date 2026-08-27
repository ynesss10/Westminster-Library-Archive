<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Detail - WestMinster Admin</title>
</head>

<body>

    <h1>Detail User</h1>

    <a href="{{ route('admin.users.index') }}">
        Kembali ke Daftar User
    </a>

    <hr>

    <p>
        <strong>ID:</strong>
        {{ $user->id }}
    </p>

    <p>
        <strong>Nama:</strong>
        {{ $user->name }}
    </p>

    <p>
        <strong>Email:</strong>
        {{ $user->email }}
    </p>

    <p>
        <strong>Role:</strong>
        {{ $user->role }}
    </p>

    <p>
        <strong>Terdaftar:</strong>
        {{ $user->created_at->format('d-m-Y H:i') }}
    </p>

</body>

</html>