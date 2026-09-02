@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

<div class="min-h-screen bg-white">

    {{-- =====================================================
        HERO / WELCOME
    ====================================================== --}}
    <section class="mx-auto max-w-7xl px-6 pt-8 lg:px-10">

        <div class="border border-[#e1ddd5] bg-[#f8f6f1]">

            <div class="px-8 py-14 md:px-12 lg:px-16 lg:py-16">

                <div class="max-w-2xl">

                    <p class="mb-4 text-[10px] font-semibold uppercase tracking-[0.3em] text-[#b18443]">
                        WestMinster Library & Archive
                    </p>

                    <h1 class="font-serif text-4xl font-normal leading-tight text-[#101d33] md:text-5xl lg:text-6xl">
                        Admin Dashboard
                    </h1>

                    <p class="mt-5 max-w-xl text-sm leading-6 text-[#6f6a63]">
                        Welcome to the Westminster admin dashboard. Manage the library's book collection, users, and borrowing activities all in one place.
                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- =====================================================
        MAIN CONTENT
    ====================================================== --}}
    <main class="mx-auto max-w-7xl px-6 py-12 lg:px-10">


        {{-- =================================================
            STATISTICS
        ================================================== --}}
        <section class="mb-14">

            <div class="mb-6 flex items-end justify-between">

                <div>

                 

                    <h2 class="font-serif text-2xl text-[#101d33] md:text-3xl">
                        Library Overview
                    </h2>

                </div>

                <span class="hidden text-[10px] uppercase tracking-[0.15em] text-gray-400 sm:block">
                    Dashboard
                </span>

            </div>


            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">


                {{-- Total Books --}}
                <div class="border border-[#dedbd3] bg-white p-6 transition hover:border-[#b18443]">

                    <div class="mb-6 flex items-center justify-between">

                        <span class="text-[10px] font-medium uppercase tracking-[0.12em] text-gray-500">
                            Total Books
                        </span>

                    

                    </div>

                    <p class="font-serif text-4xl font-normal text-[#101d33]">
                        {{ $totalBooks }}
                    </p>

                    <p class="mt-2 text-[11px] text-gray-400">
                        Books in collection
                    </p>

                </div>


                {{-- Total Users --}}
                <div class="border border-[#dedbd3] bg-white p-6 transition hover:border-[#b18443]">

                    <div class="mb-6 flex items-center justify-between">

                        <span class="text-[10px] font-medium uppercase tracking-[0.12em] text-gray-500">
                            Total Users
                        </span>


                    </div>

                    <p class="font-serif text-4xl font-normal text-[#101d33]">
                        {{ $totalUsers }}
                    </p>

                    <p class="mt-2 text-[11px] text-gray-400">
                        Registered users
                    </p>

                </div>


                {{-- Pending Borrowings --}}
                <div class="border border-[#dedbd3] bg-white p-6 transition hover:border-[#b18443]">

                    <div class="mb-6 flex items-center justify-between">

                        <span class="text-[10px] font-medium uppercase tracking-[0.12em] text-gray-500">
                            Pending Borrowings
                        </span>

                   

                    </div>

                    <p class="font-serif text-4xl font-normal text-[#101d33]">
                        {{ $pendingBorrowings }}
                    </p>

                    <p class="mt-2 text-[11px] text-gray-400">
                        Waiting for approval
                    </p>

                </div>


                {{-- Active Borrowings --}}
                <div class="border border-[#dedbd3] bg-white p-6 transition hover:border-[#b18443]">

                    <div class="mb-6 flex items-center justify-between">

                        <span class="text-[10px] font-medium uppercase tracking-[0.12em] text-gray-500">
                            Books Borrowed
                        </span>


                    </div>

                    <p class="font-serif text-4xl font-normal text-[#101d33]">
                        {{ $activeBorrowings }}
                    </p>

                    <p class="mt-2 text-[11px] text-gray-400">
                        Currently borrowed
                    </p>

                </div>

            </div>

        </section>


        {{-- =================================================
            MANAGEMENT
        ================================================== --}}
        <section class="mb-14">

            <div class="mb-6 flex items-end justify-between">

                <div>

              

                    <h2 class="font-serif text-2xl text-[#101d33] md:text-3xl">
                        Manage Your Library
                    </h2>

                </div>

                <span class="hidden text-[10px] uppercase tracking-[0.15em] text-gray-400 sm:block">
                    Quick Access
                </span>

            </div>


            <div class="grid grid-cols-1 gap-5 md:grid-cols-3">


                {{-- =================================================
                    BOOKS
                ================================================== --}}
                <a href="{{ route('admin.books.index') }}"
                   class="group overflow-hidden border border-[#dedbd3] bg-white transition duration-300 hover:-translate-y-1 hover:shadow-lg">

                    <div class="relative flex h-44 items-center justify-center overflow-hidden bg-[#26344b]">

                        <div class="absolute h-36 w-36 rotate-45 border border-white/10 transition duration-500 group-hover:rotate-[55deg]"></div>

                        <div class="absolute h-24 w-24 rotate-45 border border-white/10"></div>

                        <span class="relative font-serif text-2xl tracking-[0.25em] text-white">
                            BOOKS
                        </span>

                    </div>


                    <div class="p-6">

                        <div class="mb-3 flex items-center justify-between">

                            <h3 class="font-serif text-xl text-[#101d33]">
                                Manage Books
                            </h3>


                        </div>

                        <p class="text-xs leading-5 text-gray-500">
                            Add, edit, delete, and manage books
                            in the library collection.
                        </p>

                        <p class="mt-5 text-[9px] font-medium uppercase tracking-[0.2em] text-[#101d33]">
                            Explore Collection
                        </p>

                    </div>

                </a>


                {{-- =================================================
                    USERS
                ================================================== --}}
                <a href="{{ route('admin.users.index') }}"
                   class="group overflow-hidden border border-[#dedbd3] bg-white transition duration-300 hover:-translate-y-1 hover:shadow-lg">

                    <div class="relative flex h-44 items-center justify-center overflow-hidden bg-[#51493e]">

                        <div class="absolute h-36 w-36 rotate-45 border border-white/10 transition duration-500 group-hover:rotate-[55deg]"></div>

                        <div class="absolute h-24 w-24 rotate-45 border border-white/10"></div>

                        <span class="relative font-serif text-2xl tracking-[0.25em] text-white">
                            USERS
                        </span>

                    </div>


                    <div class="p-6">

                        <div class="mb-3 flex items-center justify-between">

                            <h3 class="font-serif text-xl text-[#101d33]">
                                Manage Users
                            </h3>


                        </div>

                        <p class="text-xs leading-5 text-gray-500">
                            View and manage registered library
                            users and their accounts.
                        </p>

                        <p class="mt-5 text-[9px] font-medium uppercase tracking-[0.2em] text-[#101d33]">
                            Explore Users
                        </p>

                    </div>

                </a>


                {{-- =================================================
                    BORROWINGS
                ================================================== --}}
                <a href="{{ route('admin.borrowings.index') }}"
                   class="group overflow-hidden border border-[#dedbd3] bg-white transition duration-300 hover:-translate-y-1 hover:shadow-lg">

                    <div class="relative flex h-44 items-center justify-center overflow-hidden bg-[#70604b]">

                        <div class="absolute h-36 w-36 rotate-45 border border-white/10 transition duration-500 group-hover:rotate-[55deg]"></div>

                        <div class="absolute h-24 w-24 rotate-45 border border-white/10"></div>

                        <span class="relative text-center font-serif text-2xl tracking-[0.18em] text-white">
                            BORROWING
                        </span>

                    </div>


                    <div class="p-6">

                        <div class="mb-3 flex items-center justify-between">

                            <h3 class="font-serif text-xl text-[#101d33]">
                                Manage Borrowings
                            </h3>

                         

                        </div>

                        <p class="text-xs leading-5 text-gray-500">
                            Review borrowing requests and manage
                            active library loans.
                        </p>

                        <p class="mt-5 text-[9px] font-medium uppercase tracking-[0.2em] text-[#101d33]">
                            Explore Borrowings
                        </p>

                    </div>

                </a>

            </div>

        </section>


        {{-- =================================================
            BOTTOM INFORMATION
        ================================================== --}}
        <section class="border border-[#e1ddd5] bg-[#f8f6f1] px-6 py-12 md:px-12 md:py-14">

            <div class="mx-auto max-w-2xl text-center">

                <p class="mb-3 text-[10px] uppercase tracking-[0.3em] text-[#b18443]">
                    WestMinster Library
                </p>

                <h2 class="font-serif text-3xl leading-tight text-[#101d33] md:text-4xl">
                    Preserve Knowledge.<br>
                    Manage the Collection.
                </h2>

                <p class="mx-auto mt-5 max-w-lg text-xs leading-6 text-gray-600">
                    Keep the Westminster Library collection organized
                    and make sure every borrowing activity is properly managed.
                </p>

            </div>

        </section>

    </main>

</div>

@endsection