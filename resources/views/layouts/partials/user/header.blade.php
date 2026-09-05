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
                <a href="{{ route('profile') }}" aria-label="Open profile" title="Profile" class="flex h-10 w-10 items-center justify-center rounded-full bg-[#D6A84F] text-sm font-bold text-[#16213A] transition hover:bg-[#e2bc6d]">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </a>
            @endauth
        </nav>
    </div>

    <div class="h-0.5 bg-[#A16207]"></div>
</header>