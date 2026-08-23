<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'WestMinster')
    </title>
</head>

<body>

    <header>
        <nav>
            <a href="{{ url('/') }}">
                WestMinster
            </a>

            @auth
                <a href="{{ url('/dashboard') }}">
                    Dashboard
                </a>

                <a href="{{ url('/books') }}">
                    Books
                </a>

                <a href="{{ url('/archive') }}">
                    Archive
                </a>

                <a href="{{ url('/borrowings') }}">
                    My Borrowings
                </a>

                <form method="POST" action="{{ url('/logout') }}" style="display: inline;">
                    @csrf

                    <button type="submit">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ url('/login') }}">
                    Login
                </a>

                <a href="{{ url('/register') }}">
                    Register
                </a>
            @endauth
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

</body>

</html>