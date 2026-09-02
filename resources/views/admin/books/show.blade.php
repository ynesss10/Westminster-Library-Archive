@extends('layouts.app')

@section('title', $book->title)

@section('content')

<div class="max-w-6xl mx-auto px-6 py-12">

    {{-- Header --}}
    <div class="mb-10">

        <p class="text-[#c3a064] text-xs tracking-[0.3em] uppercase mb-3">
            Library Collection
        </p>

        <h1 class="font-serif text-4xl text-[#101d33] font-normal">
            Book Details.
        </h1>

        <p class="text-sm text-gray-500 mt-3">
            Detailed information about this book in the WestMinster collection.
        </p>

    </div>


    {{-- Main Book Detail --}}
    <section class="border border-gray-200 bg-white">

        <div class="grid grid-cols-1 md:grid-cols-[280px_1fr]">

            {{-- Cover --}}
            <div class="bg-[#f1eee8] p-8 md:p-10 flex items-center justify-center">

                @if($book->cover)

                    <img
                        src="{{ asset('storage/' . $book->cover) }}"
                        alt="{{ $book->title }}"
                        class="w-48 h-72 object-cover shadow-md"
                    >

                @else

                    <div class="w-48 h-72 bg-white border border-gray-200 flex items-center justify-center">

                        <div class="text-center">

                            <p class="font-serif text-xl text-[#101d33]">
                                WestMinster
                            </p>

                            <p class="text-[9px] text-gray-400 tracking-widest mt-2">
                                NO COVER
                            </p>

                        </div>

                    </div>

                @endif

            </div>


            {{-- Information --}}
            <div class="p-8 md:p-10">

                <div class="flex flex-wrap items-center gap-2 mb-5">

                    <span class="bg-[#f1eee8] text-[#101d33] px-3 py-1 text-[10px]">
                        {{ $book->category }}
                    </span>

                    @if($book->physical_stock > 0)

                        <span class="inline-flex items-center gap-2 text-[10px] text-green-700">

                            <span class="w-1.5 h-1.5 bg-green-600 rounded-full"></span>

                            {{ $book->physical_stock }} AVAILABLE

                        </span>

                    @else

                        <span class="inline-flex items-center gap-2 text-[10px] text-red-600">

                            <span class="w-1.5 h-1.5 bg-red-500 rounded-full"></span>

                            OUT OF STOCK

                        </span>

                    @endif

                </div>


                {{-- Title --}}
                <h2 class="font-serif text-4xl md:text-5xl text-[#101d33] font-normal leading-tight">
                    {{ $book->title }}
                </h2>

                <p class="text-sm text-gray-500 mt-3 mb-8">
                    By {{ $book->author }}
                </p>


                {{-- Book Information --}}
                <div class="border-t border-gray-200 pt-6">

                    <p class="text-[#c3a064] text-[10px] tracking-[0.3em] uppercase mb-5">
                        Publication Information
                    </p>


                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-5 gap-x-10">

                        {{-- Author --}}
                        <div>

                            <p class="text-[10px] uppercase tracking-widest text-gray-400 mb-1">
                                Author
                            </p>

                            <p class="text-sm text-[#101d33]">
                                {{ $book->author }}
                            </p>

                        </div>


                        {{-- Publisher --}}
                        <div>

                            <p class="text-[10px] uppercase tracking-widest text-gray-400 mb-1">
                                Publisher
                            </p>

                            <p class="text-sm text-[#101d33]">
                                {{ $book->publisher ?: '-' }}
                            </p>

                        </div>


                        {{-- Publication Year --}}
                        <div>

                            <p class="text-[10px] uppercase tracking-widest text-gray-400 mb-1">
                                Publication Year
                            </p>

                            <p class="text-sm text-[#101d33]">
                                {{ $book->publication_year ?: '-' }}
                            </p>

                        </div>


                        {{-- ISBN --}}
                        <div>

                            <p class="text-[10px] uppercase tracking-widest text-gray-400 mb-1">
                                ISBN
                            </p>

                            <p class="text-sm text-[#101d33]">
                                {{ $book->isbn ?: '-' }}
                            </p>

                        </div>


                        {{-- Category --}}
                        <div>

                            <p class="text-[10px] uppercase tracking-widest text-gray-400 mb-1">
                                Category
                            </p>

                            <p class="text-sm text-[#101d33]">
                                {{ $book->category }}
                            </p>

                        </div>


                        {{-- Stock --}}
                        <div>

                            <p class="text-[10px] uppercase tracking-widest text-gray-400 mb-1">
                                Physical Stock
                            </p>

                            <p class="text-sm text-[#101d33]">
                                {{ $book->physical_stock }} books
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Description --}}
        <div class="border-t border-gray-200 p-8 md:p-10">

            <p class="text-[#c3a064] text-[10px] tracking-[0.3em] uppercase mb-4">
                About This Book
            </p>

            <h3 class="font-serif text-2xl text-[#101d33] mb-4">
                Description
            </h3>

            <p class="text-sm text-gray-600 leading-7 max-w-4xl">
                {{ $book->description ?: 'No description available for this book.' }}
            </p>

        </div>


        {{-- Digital File --}}
        @if($book->digital_file)

            <div class="border-t border-gray-200 p-8 md:p-10 bg-[#faf9f6]">

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-5">

                    <div>

                        <p class="text-[#c3a064] text-[10px] tracking-[0.3em] uppercase mb-2">
                            Digital Collection
                        </p>

                        <h3 class="font-serif text-xl text-[#101d33]">
                            Digital File Available
                        </h3>

                        <p class="text-xs text-gray-500 mt-1">
                            A digital version of this book is available.
                        </p>

                    </div>


                    <a
                        href="{{ asset('storage/' . $book->digital_file) }}"
                        target="_blank"
                        class="inline-flex justify-center
                               bg-[#101d33]
                               text-white
                               px-6 py-3
                               text-[10px]
                               tracking-widest
                               hover:bg-[#1c2d48]
                               transition"
                    >
                        VIEW DIGITAL FILE →
                    </a>

                </div>

            </div>

        @endif

    </section>


    {{-- Actions --}}
    <div class="flex flex-col-reverse sm:flex-row justify-between gap-4 mt-8">

        <a
            href="{{ route('admin.books.index') }}"
            class="text-center
                   border border-gray-300
                   text-gray-600
                   px-6 py-3
                   text-[10px]
                   tracking-widest
                   hover:border-[#101d33]
                   hover:text-[#101d33]
                   transition"
        >
            ← BACK TO COLLECTION
        </a>


        <a
            href="{{ route('admin.books.edit', $book) }}"
            class="text-center
                   bg-[#101d33]
                   text-white
                   px-7 py-3
                   text-[10px]
                   tracking-widest
                   hover:bg-[#1c2d48]
                   transition"
        >
            EDIT THIS BOOK
        </a>

    </div>


    {{-- Bottom Information --}}
    <div class="mt-12 bg-[#f1eee8] px-8 py-8 md:px-10">

        <p class="text-[#c3a064] text-[10px] tracking-[0.3em] uppercase mb-3">
            WestMinster Library
        </p>

        <h2 class="font-serif text-2xl text-[#101d33] mb-2">
            Discover Knowledge. Preserve Heritage.
        </h2>

        <p class="text-xs text-gray-600 max-w-2xl leading-5">
            Explore the collection and keep the library's
            knowledge accessible for generations to come.
        </p>

    </div>

</div>

@endsection