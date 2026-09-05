@extends('layouts.app')

@section('title', 'Plan Your Visit')

@section('content')
    <section class="relative flex min-h-[22rem] items-center overflow-hidden bg-cover bg-center px-6 py-20 text-white md:px-16"
             style="background-image: linear-gradient(rgba(22, 33, 58, 0.78), rgba(22, 33, 58, 0.62)), url('{{ asset('images/register-bg.jpg') }}');">
        <div class="relative z-10 mx-auto w-full max-w-7xl">
            <p class="mb-4 text-sm font-medium uppercase tracking-[0.25em] text-[#D6A84F]">Westminster Library</p>
            <h1 class="max-w-2xl font-serif text-4xl leading-tight md:text-6xl">Plan Your Visit</h1>
            <p class="mt-5 max-w-xl text-base leading-7 text-white/80 md:text-lg">
                Step into a quiet world of knowledge, history, and stories waiting to be discovered.
            </p>
        </div>
    </section>

    <section class="bg-[#f7f4ef] px-6 py-16 md:px-16 md:py-20">
        <div class="mx-auto grid max-w-5xl gap-12 md:grid-cols-[1.1fr_0.9fr] md:items-start">
            <div>
                <p class="mb-3 text-sm font-semibold uppercase tracking-[0.2em] text-[#A16207]">Visitor Information</p>
                <h2 class="font-serif text-3xl text-[#16213A] md:text-4xl">A place for curious minds</h2>
                <p class="mt-5 leading-8 text-gray-600">
                    Visit Westminster Library to explore our collection, spend time with rare materials, and enjoy a calm space for reading and discovery. Our doors are open to readers, researchers, and anyone who loves the world of books.
                </p>
            </div>

            <div class="border-t-2 border-[#A16207] bg-white p-7 shadow-sm">
                <h3 class="font-serif text-2xl text-[#16213A]">Before you arrive</h3>
                <dl class="mt-6 space-y-5 text-sm text-gray-600">
                    <div>
                        <dt class="font-semibold text-[#16213A]">Opening hours</dt>
                        <dd class="mt-1">Monday - Saturday, 09:00 - 17:00</dd>
                    </div>
                    <div>
                        <dt class="font-semibold text-[#16213A]">Location</dt>
                        <dd class="mt-1">Westminster Library, Main Reading Hall</dd>
                    </div>
                    <div>
                        <dt class="font-semibold text-[#16213A]">What to bring</dt>
                        <dd class="mt-1">A valid identity card and your curiosity.</dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>
@endsection