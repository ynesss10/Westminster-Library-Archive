@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <section class="relative flex min-h-[22rem] items-center overflow-hidden bg-cover bg-center px-6 py-20 text-white md:px-16"
             style="background-image: linear-gradient(rgba(22, 33, 58, 0.78), rgba(22, 33, 58, 0.62)), url('{{ asset('images/register-bg.jpg') }}');">
        <div class="relative z-10 mx-auto w-full max-w-7xl">
            <p class="mb-4 text-sm font-medium uppercase tracking-[0.25em] text-[#D6A84F]">The Westminster Story</p>
            <h1 class="font-serif text-4xl leading-tight md:text-6xl">About Us</h1>
            <p class="mt-5 max-w-xl text-base leading-7 text-white/80 md:text-lg">
                Preserving knowledge, welcoming discovery, and making every story easier to find.
            </p>
        </div>
    </section>

    <section class="bg-[#f7f4ef] px-6 py-16 md:px-16 md:py-20">
        <div class="mx-auto grid max-w-5xl gap-12 md:grid-cols-2">
            <div>
                <p class="mb-3 text-sm font-semibold uppercase tracking-[0.2em] text-[#A16207]">Our Vision</p>
                <h2 class="font-serif text-3xl text-[#16213A]">A living home for knowledge</h2>
                <p class="mt-5 leading-8 text-gray-600">
                    We envision a library where timeless works and new ideas meet, inspiring every visitor to learn, imagine, and see the world differently.
                </p>
            </div>
            <div>
                <p class="mb-3 text-sm font-semibold uppercase tracking-[0.2em] text-[#A16207]">Our Mission</p>
                <h2 class="font-serif text-3xl text-[#16213A]">Connect people with stories</h2>
                <p class="mt-5 leading-8 text-gray-600">
                    We care for books, archives, and cultural memories while creating an open and welcoming place for reading, research, and discovery.
                </p>
            </div>
        </div>
    </section>

    <section class="bg-white px-6 py-16 md:px-16 md:py-20">
        <div class="mx-auto max-w-6xl">
            <div class="mb-10 max-w-2xl">
                <p class="mb-3 text-sm font-semibold uppercase tracking-[0.2em] text-[#A16207]">Explore Our Collection</p>
                <h2 class="font-serif text-3xl text-[#16213A] md:text-4xl">What will you find here</h2>
            </div>

            <div class="grid gap-6 md:grid-cols-3">
                <div class="overflow-hidden bg-[#f7f4ef] shadow-sm">
                    <img src="{{ asset('images/Books.jpeg') }}" alt="Books on a library shelf" class="h-64 w-full object-cover">
                    <div class="p-6">
                        <h3 class="font-serif text-2xl text-[#16213A]">Books</h3>
                        <p class="mt-3 text-sm leading-7 text-gray-600">
                            Explore stories, ideas, and knowledge from a wide collection of books for every curious reader.
                        </p>
                    </div>
                </div>
                <div class="overflow-hidden bg-[#f7f4ef] shadow-sm">
                    <img src="{{ asset('images/Ancient-Archives.jpeg') }}" alt="Ancient archive materials" class="h-64 w-full object-cover">
                    <div class="p-6">
                        <h3 class="font-serif text-2xl text-[#16213A]">Ancient Archives</h3>
                        <p class="mt-3 text-sm leading-7 text-gray-600">
                            Discover preserved manuscripts and historical records that keep the memories of the past alive.
                        </p>
                    </div>
                </div>
                <div class="overflow-hidden bg-[#f7f4ef] shadow-sm">
                    <img src="{{ asset('images/Museum-Gallery.jpeg') }}" alt="Museum gallery interior" class="h-64 w-full object-cover">
                    <div class="p-6">
                        <h3 class="font-serif text-2xl text-[#16213A]">Museum Gallery</h3>
                        <p class="mt-3 text-sm leading-7 text-gray-600">
                            Admire cultural objects and exhibitions that bring history, art, and heritage closer to you.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#f7f4ef] px-6 py-16 text-center text-[#16213A] md:py-20">
        <h2 class="font-serif text-3xl md:text-4xl">READY TO EXPLORE WITH US?</h2>
        <a href="{{ route('visit') }}" class="mt-7 inline-flex items-center rounded-md bg-[#D6A84F] px-7 py-3 font-semibold text-white transition hover:bg-[#26375e]">
            Visit Us
        </a>
    </section>
@endsection