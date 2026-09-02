@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

    <div class="max-w-7xl mx-auto px-6 py-12">

    <p>Selamat datang di dashboard admin Westminster.</p>

                <h1 class="font-serif text-4xl md:text-5xl font-normal mb-4">
                    Admin Dashboard
                </h1>

                <p class="text-gray-300 text-sm max-w-xl leading-6">
                    Manage the Westminster Library collection, users,
                    and borrowing activities from one place.
                </p>
            </div>

            {{-- Decorative circle --}}
            <div class="absolute -right-20 -top-24 w-72 h-72 border border-white/10 rounded-full"></div>
            <div class="absolute -right-10 -top-14 w-52 h-52 border border-white/10 rounded-full"></div>
        </section>


        {{-- Statistics --}}
        <section class="mb-12">

            <div class="flex items-end justify-between mb-5">
                <h2 class="font-serif text-2xl text-[#101d33]">
                    Library Overview
                </h2>

                <span class="text-xs text-gray-500">
                    Dashboard
                </span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                <div class="border border-gray-200 bg-white p-6 rounded-lg">
                    <div class="flex items-center justify-between mb-5">
                        <span class="text-xs text-gray-500">
                            Total Books
                        </span>

                    </div>

                    <p class="font-serif text-3xl text-[#101d33]">
                        {{ $totalBooks }}
                    </p>

                    <p class="text-[11px] text-gray-400 mt-2">
                        Books in collection
                    </p>
                </div>


                <div class="border border-gray-200 bg-white p-6 rounded-lg">
                    <div class="flex items-center justify-between mb-5">
                        <span class="text-xs text-gray-500">
                            Total Users
                        </span>


                    </div>

                    <p class="font-serif text-3xl text-[#101d33]">
                        {{ $totalUsers }}
                    </p>

                    <p class="text-[11px] text-gray-400 mt-2">
                        Registered users
                    </p>
                </div>


                <div class="border border-gray-200 bg-white p-6 rounded-lg">
                    <div class="flex items-center justify-between mb-5">
                        <span class="text-xs text-gray-500">
                            Pending Borrowings
                        </span>


                    </div>

                    <p class="font-serif text-3xl text-[#101d33]">
                        {{ $pendingBorrowings }}
                    </p>

                    <p class="text-[11px] text-gray-400 mt-2">
                        Waiting for approval
                    </p>
                </div>


                <div class="border border-gray-200 bg-white p-6 rounded-lg">
                    <div class="flex items-center justify-between mb-5">
                        <span class="text-xs text-gray-500">
                            Books Borrowed
                        </span>


                    </div>

                    <p class="font-serif text-3xl text-[#101d33]">
                        {{ $activeBorrowings }}
                    </p>

                    <p class="text-[11px] text-gray-400 mt-2">
                        Currently borrowed
                    </p>
                </div>

            </div>
        </section>


        {{-- Management --}}
        <section class="mb-12">

            <div class="flex items-end justify-between mb-5">
                <h2 class="font-serif text-2xl text-[#101d33]">
                    Manage Your Library
                </h2>

                <span class="text-xs text-gray-500">
                    Quick Access
                </span>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                <a href="{{ route('admin.books.index') }}"
                    class="group border border-gray-200 bg-white hover:shadow-md transition rounded-lg">

                    <div class="h-40 bg-[#26344b] flex items-center justify-center relative overflow-hidden">

                        <div class="absolute w-36 h-36 border border-white/10 rotate-45"></div>

                        <span class="relative font-serif text-2xl text-white tracking-widest">
                            BOOKS
                        </span>

                    </div>

                    <div class="p-5">

                        <h3 class="font-serif text-xl text-[#101d33] mb-2">
                            Manage Books
                        </h3>

                        <p class="text-xs text-gray-500 leading-5 mb-5">
                            Add, edit, delete, and manage books
                            in the library collection.
                        </p>

                        <span class="text-[10px] tracking-widest text-[#101d33]">
                            EXPLORE
                            <span class="ml-1 text-[#c3a064]">
                                →
                            </span>
                        </span>

                    </div>
                </a>


                <a href="{{ route('admin.users.index') }}"
                    class="group border border-gray-200 bg-white hover:shadow-md transition rounded-lg">

                    <div class="h-40 bg-[#51493e] flex items-center justify-center relative overflow-hidden">

                        <div class="absolute w-36 h-36 border border-white/10 rotate-45"></div>

                        <span class="relative font-serif text-2xl text-white tracking-widest">
                            USERS
                        </span>

                    </div>

                    <div class="p-5">

                        <h3 class="font-serif text-xl text-[#101d33] mb-2">
                            Manage Users
                        </h3>

                        <p class="text-xs text-gray-500 leading-5 mb-5">
                            View and manage registered library
                            users and their accounts.
                        </p>

                        <span class="text-[10px] tracking-widest text-[#101d33]">
                            EXPLORE
                            <span class="ml-1 text-[#c3a064]">
                                →
                            </span>
                        </span>

                    </div>
                </a>


                <a href="{{ route('admin.borrowings.index') }}"
                    class="group border border-gray-200 bg-white hover:shadow-md transition rounded-lg">

                    <div class="h-40 bg-[#70604b] flex items-center justify-center relative overflow-hidden">

                        <div class="absolute w-36 h-36 border border-white/10 rotate-45"></div>

                        <span class="relative font-serif text-2xl text-white tracking-widest">
                            BORROWING
                        </span>

                    </div>

                    <div class="p-5">

                        <h3 class="font-serif text-xl text-[#101d33] mb-2">
                            Manage Borrowings
                        </h3>

                        <p class="text-xs text-gray-500 leading-5 mb-5">
                            Review borrowing requests and manage
                            active library loans.
                        </p>

                        <span class="text-[10px] tracking-widest text-[#101d33]">
                            EXPLORE
                            <span class="ml-1 text-[#c3a064]">
                                →
                            </span>
                        </span>

                    </div>
                </a>

            </div>
        </section>


        {{-- Bottom Section --}}
        <section class="bg-[#f1eee8] px-8 py-10 md:px-12 md:py-12 rounded-lg">

            <div class="text-center mx-auto max-w-2xl">
                <p class="text-[#c3a064] text-[10px] tracking-[0.3em] uppercase mb-3">
                    WestMinster Library
                </p>

                <h2 class="font-serif text-3xl text-[#101d33] leading-tight mb-4">
                    Preserve Knowledge.<br>
                    Manage the Collection.
                </h2>

                <p class="text-xs text-gray-600 leading-5">
                    Keep the WestMinster Library collection organized
                    and make sure every borrowing activity is properly managed.
                </p>
            </div>

        </section>

    </div>

@endsection