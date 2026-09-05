<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'WestMinster')
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white font-sans text-gray-800 antialiased">

    @if (auth()->check() && auth()->user()->role === 'admin')
        @include('layouts.partials.admin.header')
    @else
        @include('layouts.partials.user.header')
    @endif

    <main>
        @yield('content')
    </main>

    @if (auth()->check() && auth()->user()->role === 'admin')
        @include('layouts.partials.admin.footer')
    @else
        @include('layouts.partials.user.footer')
    @endif

</body>
</html>