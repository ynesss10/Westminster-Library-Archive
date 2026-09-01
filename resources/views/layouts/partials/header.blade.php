    <header class="bg-[#16213A] text-white">
        <div class="mx-auto flex max-w-5xl items-center justify-between px-6 py-5">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                <span>
                    <span class="font-display block text-lg font-semibold leading-none">Westminster</span>
                    <span class="text-[11px] uppercase tracking-[0.2em] text-white/50">Library Archive</span>
                </span>
            </a>
            <nav class="flex items-center gap-8 text-sm">
                <div class="hidden gap-8 md:flex">
                    <a href="{{ route('admin.books.index') }}" class="text-white/55 hover:text-white">Kelola Buku</a>
                    <a href="{{ route('admin.users.index') }}" class="text-white/55 hover:text-white">Kelola User</a>
                    <a href="{{ route('admin.borrowings.index') }}" class="text-white/55 hover:text-white">Kelola Peminjaman</a>
                </div>

                @auth
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="inline-flex items-center gap-2 rounded-full bg-red-600 px-4 py-2 text-xs font-semibold text-white hover:bg-red-700 transition">
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
 