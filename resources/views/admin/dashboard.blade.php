<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard | WestMinster</title>
</head>

<body>
    <h1>WestMinster</h1>
    <h2>Admin Dashboard</h2>

    <p>
        Welcome, {{ auth()->user()->name }}
    </p>

    <p>
        Role: {{ auth()->user()->role }}
    </p>

    <form method="POST" action="/logout">
        @csrf

        <button type="submit">
            Logout
        </button>
    </form>

</body>

</html>