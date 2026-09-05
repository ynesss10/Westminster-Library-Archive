@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    {{-- HERO SECTION --}}
    <section class="relative bg-cover bg-center text-white py-24 px-6 md:px-16 overflow-hidden"
             style="background-image: linear-gradient(rgba(27, 20, 64, 0.82), rgba(27, 20, 64, 0.68)), url('{{ asset('images/cina.jpeg') }}');">
        <div class="relative z-10 max-w-2xl">
            <p class="uppercase tracking-widest text-gold font-medium mb-4">
                Library & Museum
            </p>

            <h1 class="font-serif text-4xl md:text-5xl leading-tight mb-4">
                Welcome, {{ auth()->user()->name }}.
            </h1>

            <p class="text-white/80 mb-8 max-w-lg">
                Kelola peminjaman buku Anda dan jelajahi koleksi buku serta arsip pustaka Westminster.
            </p>

            <div class="flex gap-4 flex-wrap">
                <a href="{{ url('/books') }}"
                  class="bg-navy hover:bg-[#241a5c] transition text-white px-6 py-3 rounded-md font-medium">
                  Explore the Library
                </a>

                <a href="{{ url('/books') }}"
                   class="border border-white text-white hover:bg-white hover:text-navy transition px-6 py-3 rounded-md font-medium">
                    Explore the Library
                </a>
            </div>
        </div>
    </section>

    {{-- EXPLORE OUR REALM --}}
    <section class="bg-[#f7f4ef] py-16 px-6 md:px-16">
        <h2 class="font-serif text-3xl text-navy mb-8">
            Explore Our Realm
        </h2>

        <div class="flex gap-6 overflow-x-auto pb-4 snap-x snap-mandatory">

            {{-- CARD: Books --}}
            <div class="min-w-70 md:min-w-[calc((100%-3rem)/3)] snap-start bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition flex flex-col">
                <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?w=600"
                     alt="Books"
                     class="w-full h-48 object-cover">

                <div class="p-6 flex flex-col flex-1">
                    <h3 class="font-serif text-2xl text-navy mb-2">Library</h3>
                    <p class="text-gray-600 mb-4">
                        Explore, read, and borrow modern and historical books.
                    </p>

                    <a href="{{ url('/books') }}"
                       class="mt-auto inline-flex items-center gap-2 text-gold font-semibold hover:gap-3 transition-all">
                        EXPLORE  
                    </a>
                </div>
            </div>

            {{-- CARD: Archive --}}
            <div class="min-w-70 md:min-w-[calc((100%-3rem)/3)] snap-start bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition flex flex-col">
                <img src="https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?w=600"
                     alt="Archive"
                     class="w-full h-48 object-cover">

                <div class="p-6 flex flex-col flex-1">
                    <h3 class="font-serif text-2xl text-navy mb-2">Archive</h3>
                    <p class="text-gray-600 mb-4">
                        Discover rare ancient manuscripts and digital heritage archives.
                    </p>

                    <a href="{{ url('/archive') }}"
                       class="mt-auto inline-flex items-center gap-2 text-gold font-semibold hover:gap-3 transition-all">
                        EXPLORE  
                    </a>
                </div>
            </div>

            {{-- CARD: Visits --}}
            <div class="min-w-70 md:min-w-[calc((100%-3rem)/3)] snap-start bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition flex flex-col">
                <img src="https://images.unsplash.com/photo-1568667256549-094345857637?w=600"
                     alt="Library visit"
                     class="w-full h-48 object-cover">

                <div class="p-6 flex flex-col flex-1">
                    <h3 class="font-serif text-2xl text-navy mb-2">Visits</h3>
                    <p class="text-gray-600 mb-4">
                        Plan your physical visit and explore the Westminster collection.
                    </p>

                    <a href="{{ url('/visits') }}"
                       class="mt-auto inline-flex items-center gap-2 text-gold font-semibold hover:gap-3 transition-all">
                        EXPLORE  
                    </a>
                </div>
            </div>

        </div>
    </section>

    {{-- YOUR NEXT BOOKS TO READ --}}
    <section class="bg-[#f7f4ef] px-6 md:px-16 pb-16">
        <div class="flex items-center justify-between mb-8">
            <h2 class="font-serif text-3xl text-navy">
                Your Next Books to Read
            </h2>

            <a href="{{ url('/books') }}" class="text-gray-600 hover:text-navy transition">
                More
            </a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

            @php
                $sampleBooks = $books ?? [
                    (object) [
                        'title' => 'DUNE',
                        'author' => 'Frank Herbert',
                        'cover_url' => 'https://covers.openlibrary.org/b/isbn/9780441013593-L.jpg',
                        'available_copies' => 4,
                    ],
                    (object) [
                        'title' => 'Pride & Prejudice',
                        'author' => 'Jane Austen',
                        'cover_url' => 'https://covers.openlibrary.org/b/isbn/9780141439518-L.jpg',
                        'available_copies' => 2,
                    ],
                    (object) [
                        'title' => 'Lord Of The Rings',
                        'author' => 'J.R.R Tolkien',
                        'cover_url' => 'https://covers.openlibrary.org/b/isbn/9780544003415-L.jpg',
                        'available_copies' => 6,
                    ],
                    (object) [
                        'title' => "Harry Potter & The Sorcerer's Stone",
                        'author' => 'J.K. Rowling',
                        'cover_url' => 'https://covers.openlibrary.org/b/isbn/9780590353427-L.jpg',
                        'available_copies' => 7,
                    ],
                ];
            @endphp

            @foreach ($sampleBooks as $book)
                <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition">
                    <img src="{{ $book->cover_url }}"
                         alt="{{ $book->title }}"
                         class="w-full h-56 object-cover">

                    <div class="p-4">
                        <h3 class="font-serif text-lg text-navy mb-3">
                            {{ $book->title }}
                        </h3>

                        <p class="text-gray-600 text-sm mb-1">
                            By {{ $book->author }}
                        </p>

                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gold font-medium">Available</span>
                            <span class="text-gray-700">{{ $book->available_copies }}</span>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

@endsection