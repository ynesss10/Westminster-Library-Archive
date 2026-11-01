
@extends('layouts.app')

@section('hide-header', true)

@section('title', 'Welcome')

@section('content')

    <section class="flex min-h-[80vh] items-center bg-[#f7f4ef] px-6 py-16">
        <div class="mx-auto w-full max-w-5xl">

            <div class="grid items-center gap-12 md:grid-cols-2 md:gap-16">

                {{-- Left Content --}}
                <div>
                    <p class="mb-5 text-xs font-semibold uppercase tracking-[0.25em] text-[#A16207]">
                        Westminster Library & Archive
                    </p>

                    <h1 class="font-serif text-4xl leading-tight text-[#16213A] md:text-5xl">
                        A World of Knowledge Awaits You.
                    </h1>

                    <p class="mt-5 max-w-md text-base leading-7 text-[#536079]">
                        Discover a collection of books, explore the archive,
                        and manage your borrowing activity in one place.
                    </p>

                    @auth
                        <a href="{{ url('/dashboard') }}"
                           class="mt-8 inline-flex items-center gap-2 rounded-md bg-[#16213A] px-6 py-3 text-sm font-semibold text-white transition hover:bg-[#26375e]">
                            Go to Dashboard
                            <span aria-hidden="true">&rarr;</span>
                        </a>
                    @else
                        <div class="mt-8 flex flex-wrap items-center gap-3">
                            <a href="{{ url('/login') }}"
                               class="inline-flex items-center justify-center rounded-md bg-[#16213A] px-7 py-3 text-sm font-semibold text-white transition hover:bg-[#26375e]">
                                Login
                            </a>

                            <a href="{{ url('/register') }}"
                               class="inline-flex items-center justify-center rounded-md border border-[#16213A] px-7 py-3 text-sm font-semibold text-[#16213A] transition hover:bg-[#16213A] hover:text-white">
                                Create an Account
                            </a>
                        </div>
                    @endauth

                    <p class="mt-6 text-xs text-[#7B8190]">
                        Read. Discover. Preserve.
                    </p>
                </div>

                {{-- Right Illustration --}}
                <div class="relative">
                    <div class="absolute -right-3 -top-3 h-full w-full border border-[#D6A84F]"></div>

                    <div class="relative flex min-h-[320px] flex-col items-center justify-center bg-[#16213A] px-8 py-12 text-center md:min-h-[390px]">

                        <svg class="mb-6 h-20 w-20 text-[#D6A84F]"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 64 64"
                             aria-hidden="true">
                            <path d="M32 18C24 10 12 10 5 13v35c10-4 20-2 27 5V18Z"
                                  stroke-width="1.8"
                                  stroke-linejoin="round"/>
                            <path d="M32 18c8-8 20-8 27-5v35c-10-4-20-2-27 5V18Z"
                                  stroke-width="1.8"
                                  stroke-linejoin="round"/>
                            <path d="M11 20v22m7-20v19m35-21v22m-7-20v19M27 23v21m10-21v21"
                                  stroke-width="1.2"
                                  stroke-linecap="round"/>
                        </svg>

                        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-[#D6A84F]">
                            Est. in Knowledge
                        </p>

                        <h2 class="mt-4 font-serif text-3xl text-white">
                            Westminster
                        </h2>

                        <p class="mt-3 max-w-xs text-sm leading-6 text-slate-300">
                            Your destination for learning, literature, and discovery.
                        </p>

                        <div class="mt-7 h-px w-16 bg-[#D6A84F]"></div>
                    </div>
                </div>

            </div>

            {{-- Bottom Information --}}
            <div class="mt-16 grid gap-6 border-t border-[#DED8CE] pt-7 sm:grid-cols-3">

                <div>
                    <h3 class="font-serif text-lg text-[#16213A]">
                        Discover Books
                    </h3>
                    <p class="mt-2 text-sm leading-6 text-[#536079]">
                        Find books across a variety of subjects and interests.
                    </p>
                </div>

                <div>
                    <h3 class="font-serif text-lg text-[#16213A]">
                        Explore the Archive
                    </h3>
                    <p class="mt-2 text-sm leading-6 text-[#536079]">
                        Explore collections preserved for learning and reference.
                    </p>
                </div>

                <div>
                    <h3 class="font-serif text-lg text-[#16213A]">
                        Manage Borrowings
                    </h3>
                    <p class="mt-2 text-sm leading-6 text-[#536079]">
                        Keep track of your library borrowing activity with ease.
                    </p>
                </div>

            </div>

        </div>
    </section>
@endsection
