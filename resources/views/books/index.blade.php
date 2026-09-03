@extends('layouts.app')

@section('title', 'Books')

@section('content')

    <section class="bg-[#f7f4ef] px-6 md:px-16 py-12">

        {{-- PAGE TITLE --}}
        <h1 class="font-serif text-3xl text-navy mb-6">
            Your Next Books to Read
        </h1>

        {{-- SEARCH BAR --}}
        <form action="{{ route('books.index') }}" method="GET" class="flex items-center gap-3 mb-6">
            <div class="relative flex-1">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search books, authors, subjects..."
                    class="w-full border border-gray-300 rounded-full pl-5 pr-12 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-navy/30"
                >
                <button type="submit" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-navy">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 10a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>

            <button type="button" class="border border-gray-300 rounded-md p-3 text-gray-500 hover:text-navy hover:border-navy transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </form>

        {{-- FILTER PILLS (belum terhubung ke query, tampilan dulu) --}}
        <div class="flex flex-wrap items-center gap-3 mb-10">

            <select class="border border-gray-300 rounded-full px-5 py-2 text-sm text-gray-600 bg-white focus:outline-none focus:ring-2 focus:ring-navy/30">
                <option value="">Type</option>
            </select>

            <select class="border border-gray-300 rounded-full px-5 py-2 text-sm text-gray-600 bg-white focus:outline-none focus:ring-2 focus:ring-navy/30">
                <option value="">Author</option>
            </select>

            <select class="border border-gray-300 rounded-full px-5 py-2 text-sm text-gray-600 bg-white focus:outline-none focus:ring-2 focus:ring-navy/30">
                <option value="">Binding</option>
            </select>

            <select class="border border-gray-300 rounded-full px-5 py-2 text-sm text-gray-600 bg-white focus:outline-none focus:ring-2 focus:ring-navy/30">
                <option value="">Availability</option>
            </select>

            <button type="button"
                class="bg-navy text-white rounded-full px-6 py-2 text-sm font-semibold hover:bg-[#241a5c] transition">
                APPLY
            </button>
        </div>

        {{-- BOOK GRID --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-10">

            @forelse ($books as $book)
                <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition">
                    <a href="{{ route('books.show', $book) }}">
                        <img src="{{ $book->cover_url ?? 'https://via.placeholder.com/300x400' }}"
                             alt="{{ $book->title }}"
                             class="w-full h-56 object-cover">
                    </a>

                    <div class="p-4">
                        <a href="{{ route('books.show', $book) }}">
                            <h3 class="font-serif text-lg text-navy mb-3 hover:underline">
                                {{ $book->title }}
                            </h3>
                        </a>

                        <p class="text-gray-600 text-sm mb-1">
                            By {{ $book->author }}
                        </p>

                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gold font-medium">Available</span>
                            <span class="text-gray-700">{{ $book->available_copies ?? '-' }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <p class="col-span-full text-gray-500">Tidak ada buku ditemukan.</p>
            @endforelse

        </div>

        {{-- PAGINATION --}}
        <div class="flex justify-center">
            {{ $books->links() }}
        </div>

    </section>

@endsection