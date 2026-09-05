@extends('layouts.app')

@section('title', 'Archive')

@section('content')

    <section class="bg-[#f7f4ef] px-6 md:px-16 py-12">

        {{-- PAGE TITLE --}}
        <h1 class="font-serif text-3xl text-navy mb-6">
            Expand Your Knowledge
        </h1>

        {{-- SESSION MESSAGES --}}
        @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 text-sm rounded-md px-4 py-3 mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-50 border border-red-200 text-red-700 text-sm rounded-md px-4 py-3 mb-4">
                {{ session('error') }}
            </div>
        @endif

        {{-- SEARCH BAR --}}
        <form action="{{ route('archive.index') }}" method="GET" class="flex items-center gap-3 mb-6">
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

        {{-- FILTER PILLS --}}
        <div class="flex flex-wrap items-center gap-3 mb-10">

            <div class="relative">
                <select class="appearance-none border border-gray-300 rounded-full pl-5 pr-10 py-2 text-sm text-gray-600 bg-white focus:outline-none focus:ring-2 focus:ring-navy/30">
                    <option value="">Type</option>
                </select>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </div>

            <div class="relative">
                <select class="appearance-none border border-gray-300 rounded-full pl-5 pr-10 py-2 text-sm text-gray-600 bg-white focus:outline-none focus:ring-2 focus:ring-navy/30">
                    <option value="">Author</option>
                </select>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </div>

            <div class="relative">
                <select class="appearance-none border border-gray-300 rounded-full pl-5 pr-10 py-2 text-sm text-gray-600 bg-white focus:outline-none focus:ring-2 focus:ring-navy/30">
                    <option value="">Year</option>
                </select>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </div>

            <button type="button"
                class="bg-navy text-white rounded-full px-6 py-2 text-sm font-semibold hover:bg-[#241a5c] transition">
                APPLY
            </button>
        </div>

        {{-- ARCHIVE GRID --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-10">

            @forelse ($books as $book)
                <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition flex flex-col">
                    <img src="{{ $book->cover_url ?? 'https://via.placeholder.com/300x400' }}"
                         alt="{{ $book->title }}"
                         class="w-full h-40 object-cover">

                    <div class="p-4 flex flex-col flex-1">
                        <h3 class="font-serif text-lg text-navy mb-1">
                            {{ $book->title }}
                        </h3>

                        <p class="text-gray-500 text-sm mb-1">
                            {{ $book->author }}
                        </p>

                        @if($book->category ?? false)
                            <p class="text-gray-400 text-xs mb-3">
                                {{ $book->category }}
                            </p>
                        @endif

                        <div class="mt-auto flex flex-col gap-2 pt-2">
                            <a href="{{ route('books.show', $book) }}"
                               class="text-center text-sm text-gold font-semibold hover:underline">
                                Baca Digital
                            </a>

                            <form action="{{ route('borrowings.request', $book) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="w-full bg-navy text-white text-sm font-medium py-2 rounded-md hover:bg-[#241a5c] transition">
                                    Request Pinjam
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p class="col-span-full text-gray-500">Belum ada buku.</p>
            @endforelse

        </div>

        {{-- PAGINATION: tombol "More" --}}
        @if (method_exists($books, 'hasMorePages') && $books->hasMorePages())
            <div class="flex justify-center">
                <a href="{{ $books->nextPageUrl() }}"
                   class="bg-navy text-white px-12 py-3 rounded-md font-medium hover:bg-[#241a5c] transition">
                    More
                </a>
            </div>
        @endif

    </section>

@endsection