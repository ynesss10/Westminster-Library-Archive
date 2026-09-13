@extends('layouts.app')

@section('title', 'Books')

@section('content')

    <section class="min-h-full bg-[#f7f4ef] px-6 py-12 md:min-h-[calc(100vh-9rem)] md:px-16">

        {{-- PAGE TITLE --}}
        <h1 class="font-serif text-3xl text-navy mb-6">
            Your Next Books to Read
        </h1>

        <form action="{{ route('books.index') }}" method="GET" class="mb-10">
            <div class="relative mb-4">
                <input
                    type="search"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search by book title..."
                    aria-label="Search by book title"
                    class="w-full bg-white border border-gray-300 rounded-full pl-5 pr-14 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-navy/30"
                >
                <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 rounded-full bg-navy p-2 text-white hover:bg-[#241a5c] transition" aria-label="Search books">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 10a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>

            <div class="flex flex-wrap items-center gap-3">
                <div class="relative w-full sm:w-auto">
                    <select name="category" class="w-full sm:min-w-40 appearance-none border border-gray-300 rounded-full pl-5 pr-11 py-2 text-sm text-gray-600 bg-white focus:outline-none focus:ring-2 focus:ring-navy/30">
                        <option value="">All categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category }}" @selected(request('category') === $category)>{{ $category }}</option>
                        @endforeach
                    </select>
                    <svg xmlns="http://www.w3.org/2000/svg" class="pointer-events-none absolute right-4 top-1/2 h-4 w-4 -translate-y-1/2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6" />
                    </svg>
                </div>

                <div class="relative w-full sm:w-auto">
                    <select name="author" class="w-full sm:min-w-40 appearance-none border border-gray-300 rounded-full pl-5 pr-11 py-2 text-sm text-gray-600 bg-white focus:outline-none focus:ring-2 focus:ring-navy/30">
                        <option value="">All authors</option>
                        @foreach($authors as $author)
                            <option value="{{ $author }}" @selected(request('author') === $author)>{{ $author }}</option>
                        @endforeach
                    </select>
                    <svg xmlns="http://www.w3.org/2000/svg" class="pointer-events-none absolute right-4 top-1/2 h-4 w-4 -translate-y-1/2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6" />
                    </svg>
                </div>

                <div class="relative w-full sm:w-auto">
                    <select name="year" class="w-full sm:min-w-32 appearance-none border border-gray-300 rounded-full pl-5 pr-11 py-2 text-sm text-gray-600 bg-white focus:outline-none focus:ring-2 focus:ring-navy/30">
                        <option value="">Any year</option>
                        @foreach($years as $year)
                            <option value="{{ $year }}" @selected((string) request('year') === (string) $year)>{{ $year }}</option>
                        @endforeach
                    </select>
                    <svg xmlns="http://www.w3.org/2000/svg" class="pointer-events-none absolute right-4 top-1/2 h-4 w-4 -translate-y-1/2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6" />
                    </svg>
                </div>

                <div class="relative w-full sm:w-auto">
                    <select name="availability" class="w-full sm:min-w-44 appearance-none border border-gray-300 rounded-full pl-5 pr-11 py-2 text-sm text-gray-600 bg-white focus:outline-none focus:ring-2 focus:ring-navy/30">
                        <option value="">Any availability</option>
                        <option value="available" @selected(request('availability') === 'available')>Available now</option>
                        <option value="unavailable" @selected(request('availability') === 'unavailable')>Currently unavailable</option>
                    </select>
                    <svg xmlns="http://www.w3.org/2000/svg" class="pointer-events-none absolute right-4 top-1/2 h-4 w-4 -translate-y-1/2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6" />
                    </svg>
                </div>

                <button type="submit" class="bg-navy text-white rounded-full px-6 py-2 text-sm font-semibold hover:bg-[#241a5c] transition">
                    APPLY FILTERS
                </button>

                @if(request()->hasAny(['search', 'category', 'author', 'year', 'availability']))
                    <a href="{{ route('books.index') }}" class="text-sm text-gray-500 hover:text-navy hover:underline">
                        Clear
                    </a>
                @endif
            </div>
        </form>

        {{-- BOOK GRID --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-10">

            @forelse ($books as $book)
                <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition">
                    <a href="{{ route('books.show', $book) }}">
                        <img src="{{ $book->cover ? asset('storage/' . $book->cover) : 'https://via.placeholder.com/300x400' }}"
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