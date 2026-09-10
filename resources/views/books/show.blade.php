@extends('layouts.app')

@section('title', $book->title)

@section('content')

<div class="max-w-6xl mx-auto px-6 py-12">

    {{-- Back --}}
    <div class="mb-8">
        <a href="{{ url()->previous() }}"
           class="text-[10px] tracking-widest text-gray-500 hover:text-[#101d33] transition">
            ← BACK TO BOOKS
        </a>
    </div>


    {{-- Alerts --}}
    @if (session('success'))
        <div class="mb-6 border border-green-200 bg-green-50 px-6 py-4">
            <p class="text-xs text-green-700">
                {{ session('success') }}
            </p>
        </div>
    @endif

    @if (session('error'))
        <div class="mb-6 border border-red-200 bg-red-50 px-6 py-4">
            <p class="text-xs text-red-700">
                {{ session('error') }}
            </p>
        </div>
    @endif


    {{-- Main Book Section --}}
    <section class="bg-white border border-gray-200">

        <div class="grid grid-cols-1 lg:grid-cols-5">

            {{-- Cover --}}
            <div class="lg:col-span-2 bg-[#f1eee8] p-8 md:p-12 flex items-center justify-center min-h-[450px]">

                @if($book->cover)

                    <img
                        src="{{ asset('storage/' . $book->cover) }}"
                        alt="{{ $book->title }}"
                        class="max-h-[420px] w-auto object-contain shadow-xl"
                    >

                @else

                    <div class="w-56 h-80 bg-[#101d33] flex items-center justify-center">
                        <span class="font-serif text-2xl text-white text-center px-6">
                            {{ $book->title }}
                        </span>
                    </div>

                @endif

            </div>


            {{-- Information --}}
            <div class="lg:col-span-3 p-8 md:p-12">

                <p class="text-[#c3a064] text-[10px] tracking-[0.3em] uppercase mb-4">
                    WestMinster Library
                </p>

                <h1 class="font-serif text-4xl md:text-5xl text-[#101d33] leading-tight mb-5">
                    {{ $book->title }}
                </h1>

                <p class="text-sm text-gray-500 mb-8">
                    by <span class="text-[#101d33]">{{ $book->author }}</span>
                </p>


                {{-- Book Metadata --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 border-t border-gray-200">

                    <div class="py-5 border-b sm:border-r border-gray-200">
                        <p class="text-[10px] tracking-widest uppercase text-gray-400 mb-2">
                            Publisher
                        </p>
                        <p class="text-sm text-[#101d33]">
                            {{ $book->publisher ?? '-' }}
                        </p>
                    </div>

                    <div class="py-5 border-b border-gray-200 sm:pl-6">
                        <p class="text-[10px] tracking-widest uppercase text-gray-400 mb-2">
                            Publication Year
                        </p>
                        <p class="text-sm text-[#101d33]">
                            {{ $book->publication_year ?? '-' }}
                        </p>
                    </div>

                    <div class="py-5 sm:border-r border-gray-200">
                        <p class="text-[10px] tracking-widest uppercase text-gray-400 mb-2">
                            Category
                        </p>
                        <p class="text-sm text-[#101d33]">
                            {{ $book->category }}
                        </p>
                    </div>

                    <div class="py-5 sm:pl-6">
                        <p class="text-[10px] tracking-widest uppercase text-gray-400 mb-2">
                            ISBN
                        </p>
                        <p class="text-sm text-[#101d33]">
                            {{ $book->isbn ?? '-' }}
                        </p>
                    </div>

                </div>


                {{-- Description --}}
                <div class="border-t border-gray-200 pt-7 mt-2">

                    <p class="text-[10px] tracking-[0.2em] uppercase text-gray-400 mb-3">
                        About This Book
                    </p>

                    <p class="text-sm text-gray-600 leading-7">
                        {{ $book->description ?? 'No description available for this book.' }}
                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- Borrow / Availability --}}
    <section class="mt-6 bg-[#101d33] text-white px-8 py-8 md:px-10">

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">

            <div>

                <p class="text-[#c3a064] text-[10px] tracking-[0.3em] uppercase mb-2">
                    Availability
                </p>

                @if($book->physical_stock > 0)

                    <h2 class="font-serif text-2xl mb-2">
                        Available to Borrow
                    </h2>

                    <p class="text-xs text-gray-300">
                        {{ $book->physical_stock }} physical
                        {{ $book->physical_stock == 1 ? 'copy' : 'copies' }}
                        currently available.
                    </p>

                @else

                    <h2 class="font-serif text-2xl mb-2">
                        Currently Unavailable
                    </h2>

                    <p class="text-xs text-gray-300">
                        Stok buku fisik sedang habis.
                    </p>

                @endif

            </div>


            <div class="flex flex-col sm:flex-row gap-3">

                {{-- Digital --}}
                @if($book->digital_file)

                    <a
                        href="{{ asset('storage/' . $book->digital_file) }}"
                        target="_blank"
                        class="border border-white/30 text-white text-[10px] tracking-widest px-6 py-3 text-center hover:bg-white hover:text-[#101d33] transition"
                    >
                        READ DIGITAL
                    </a>

                @endif


                {{-- Borrow --}}
                @if($book->physical_stock > 0)

                    <form action="{{ route('borrowings.borrow', $book) }}"
                          method="POST">

                        @csrf

                        <button
                            type="submit"
                            class="w-full bg-[#c3a064] text-[#101d33] text-[10px] tracking-widest px-7 py-3 hover:bg-[#d2b77f] transition"
                        >
                            BORROW BOOK
                        </button>

                    </form>

                @endif

            </div>

        </div>

    </section>


    {{-- Footer Info --}}
    <section class="mt-12 bg-[#f1eee8] px-8 py-10 md:px-12">

        <p class="text-[#c3a064] text-[10px] tracking-[0.3em] uppercase mb-3">
            WestMinster Library
        </p>

        <h2 class="font-serif text-3xl text-[#101d33] leading-tight mb-4">
            Read More.<br>
            Discover More.
        </h2>

        <p class="text-xs text-gray-600 max-w-lg leading-5">
            Explore the WestMinster collection and discover
            books that match your interests.
        </p>

    </section>

</div>

@endsection