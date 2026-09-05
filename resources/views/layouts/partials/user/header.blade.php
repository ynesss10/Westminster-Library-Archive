<header class="bg-[#16213A] text-white">
    <div class="mx-auto flex h-24 max-w-7xl items-center justify-between px-6 py-0">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
            <img src="{{ asset('images/Logo-white.png') }}" alt="Westminster" class="h-20 w-72 object-cover object-center">
        </a>

        <nav class="flex items-center gap-8 text-sm">
            <div class="hidden gap-8 md:flex">
                <a href="{{ route('dashboard') }}" class="text-white/70 transition hover:text-white">Home</a>
                <a href="{{ route('books.index') }}" class="text-white/70 transition hover:text-white">Books</a>
                <a href="{{ route('archive.index') }}" class="text-white/70 transition hover:text-white">Archive</a>
                <a href="{{ route('visit') }}" class="text-white/70 transition hover:text-white">Visit</a>
                <a href="{{ route('about') }}" class="text-white/70 transition hover:text-white">About</a>
                <a href="{{ route('borrowings.index') }}" class="text-white/70 transition hover:text-white">My Borrowings</a>
            </div>

            @auth
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="inline-flex cursor-pointer items-center gap-2 rounded-full bg-red-600 px-4 py-2 text-xs font-semibold text-white transition hover:bg-red-700">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </button>
                </form>
            @endauth
        </nav>
    </div>

    <div class="h-0.5 bg-[#A16207]"></div>
</header>