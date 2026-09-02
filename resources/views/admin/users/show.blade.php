@extends('layouts.app')

@section('title', 'Detail User')

@section('content')

<div class="min-h-screen bg-[#f8f7f3]">

    {{-- ================================
        PAGE HEADER
    ================================= --}}
    <section class="max-w-7xl mx-auto px-6 lg:px-10 pt-12 pb-8">

        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">

            <div>

                <p class="mb-3 text-[10px] font-semibold uppercase tracking-[0.25em] text-[#b18443]">
                    Administration
                </p>

                <h1 class="font-serif text-4xl md:text-5xl leading-tight text-[#18243a]">
                    Detail User
                </h1>

                <p class="mt-3 max-w-xl text-sm leading-relaxed text-[#777168]">
                    Informasi lengkap mengenai pengguna yang terdaftar
                    pada Westminster Library & Archive.
                </p>

            </div>


            {{-- Back Button --}}
            <a href="{{ route('admin.users.index') }}"
               class="inline-flex w-fit items-center gap-2
                      border border-[#bdb9b0]
                      bg-white px-5 py-2.5
                      text-xs text-[#243b63]
                      transition
                      hover:border-[#243b63]
                      hover:bg-[#243b63]
                      hover:text-white">


                Kembali ke Daftar User

            </a>

        </div>

    </section>


    {{-- ================================
        USER DETAIL
    ================================= --}}
    <section class="max-w-7xl mx-auto px-6 lg:px-10 pb-16">

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

            {{-- ==========================
                PROFILE CARD
            =========================== --}}
            <div class="border border-[#dedbd3] bg-white">

                <div class="flex flex-col items-center px-6 py-10 text-center">

                    {{-- Avatar --}}
                    <div class="flex h-24 w-24 items-center justify-center
                                rounded-full
                                bg-[#e9e3d8]
                                font-serif text-3xl
                                text-[#243b63]">

                        {{ strtoupper(substr($user->name, 0, 1)) }}

                    </div>


                    {{-- Name --}}
                    <h2 class="mt-5 font-serif text-2xl text-[#18243a]">
                        {{ $user->name }}
                    </h2>


                    {{-- Email --}}
                    <p class="mt-1 break-all text-sm text-[#888178]">
                        {{ $user->email }}
                    </p>


                    {{-- Role --}}
                    <div class="mt-5">

                        @if($user->role === 'admin')

                            <span class="inline-flex items-center gap-1.5
                                         bg-[#18243a]
                                         px-4 py-1.5
                                         text-[10px]
                                         uppercase
                                         tracking-[0.12em]
                                         text-white">

                                <span class="h-1.5 w-1.5 rounded-full bg-[#c59a52]"></span>

                                Administrator

                            </span>

                        @else

                            <span class="inline-flex items-center gap-1.5
                                         bg-[#f2ede4]
                                         px-4 py-1.5
                                         text-[10px]
                                         uppercase
                                         tracking-[0.12em]
                                         text-[#806637]">

                                <span class="h-1.5 w-1.5 rounded-full bg-[#c59a52]"></span>

                                Member

                            </span>

                        @endif

                    </div>

                </div>


                {{-- Profile Footer --}}
                <div class="border-t border-[#ebe8e1] bg-[#faf9f6] px-6 py-4">

                    <p class="text-center text-[9px] uppercase tracking-[0.15em] text-[#aaa49b]">
                        User ID #{{ str_pad($user->id, 3, '0', STR_PAD_LEFT) }}
                    </p>

                </div>

            </div>


            {{-- ==========================
                INFORMATION
            =========================== --}}
            <div class="lg:col-span-2">

                <div class="border border-[#dedbd3] bg-white">

                    {{-- Header --}}
                    <div class="border-b border-[#dedbd3] px-6 py-5 md:px-8">

                        <p class="font-serif text-xl text-[#18243a]">
                            Informasi Pengguna
                        </p>

                        <p class="mt-1 text-xs text-[#89847c]">
                            Data akun pengguna yang tersimpan dalam sistem.
                        </p>

                    </div>


                    {{-- Information List --}}
                    <div class="divide-y divide-[#ebe8e1]">

                        {{-- ID --}}
                        <div class="grid grid-cols-1 gap-2 px-6 py-5 sm:grid-cols-3 md:px-8">

                            <div>
                                <p class="text-[10px] font-semibold uppercase tracking-[0.14em] text-[#918b82]">
                                    User ID
                                </p>
                            </div>

                            <div class="sm:col-span-2">

                                <p class="text-sm text-[#18243a]">
                                    #{{ str_pad($user->id, 3, '0', STR_PAD_LEFT) }}
                                </p>

                            </div>

                        </div>


                        {{-- Name --}}
                        <div class="grid grid-cols-1 gap-2 px-6 py-5 sm:grid-cols-3 md:px-8">

                            <div>
                                <p class="text-[10px] font-semibold uppercase tracking-[0.14em] text-[#918b82]">
                                    Nama Lengkap
                                </p>
                            </div>

                            <div class="sm:col-span-2">

                                <p class="text-sm text-[#18243a]">
                                    {{ $user->name }}
                                </p>

                            </div>

                        </div>


                        {{-- Email --}}
                        <div class="grid grid-cols-1 gap-2 px-6 py-5 sm:grid-cols-3 md:px-8">

                            <div>
                                <p class="text-[10px] font-semibold uppercase tracking-[0.14em] text-[#918b82]">
                                    Email
                                </p>
                            </div>

                            <div class="sm:col-span-2">

                                <p class="break-all text-sm text-[#18243a]">
                                    {{ $user->email }}
                                </p>

                            </div>

                        </div>


                        {{-- Role --}}
                        <div class="grid grid-cols-1 gap-2 px-6 py-5 sm:grid-cols-3 md:px-8">

                            <div>
                                <p class="text-[10px] font-semibold uppercase tracking-[0.14em] text-[#918b82]">
                                    Role
                                </p>
                            </div>

                            <div class="sm:col-span-2">

                                @if($user->role === 'admin')

                                    <span class="inline-flex items-center gap-2
                                                 bg-[#18243a]
                                                 px-3 py-1
                                                 text-[10px]
                                                 uppercase
                                                 tracking-wide
                                                 text-white">

                                        <span class="h-1.5 w-1.5 rounded-full bg-[#c59a52]"></span>

                                        Administrator

                                    </span>

                                @else

                                    <span class="inline-flex items-center gap-2
                                                 bg-[#f2ede4]
                                                 px-3 py-1
                                                 text-[10px]
                                                 uppercase
                                                 tracking-wide
                                                 text-[#806637]">

                                        <span class="h-1.5 w-1.5 rounded-full bg-[#c59a52]"></span>

                                        Member

                                    </span>

                                @endif

                            </div>

                        </div>


                        {{-- Registered --}}
                        <div class="grid grid-cols-1 gap-2 px-6 py-5 sm:grid-cols-3 md:px-8">

                            <div>
                                <p class="text-[10px] font-semibold uppercase tracking-[0.14em] text-[#918b82]">
                                    Terdaftar
                                </p>
                            </div>

                            <div class="sm:col-span-2">

                                <p class="text-sm text-[#18243a]">
                                    {{ $user->created_at->format('d M Y') }}
                                </p>

                                <p class="mt-1 text-xs text-[#99938a]">
                                    {{ $user->created_at->format('H:i') }} WIB
                                </p>

                            </div>

                        </div>


                        {{-- Updated --}}
                        <div class="grid grid-cols-1 gap-2 px-6 py-5 sm:grid-cols-3 md:px-8">

                            <div>
                                <p class="text-[10px] font-semibold uppercase tracking-[0.14em] text-[#918b82]">
                                    Terakhir Diperbarui
                                </p>
                            </div>

                            <div class="sm:col-span-2">

                                <p class="text-sm text-[#18243a]">
                                    {{ $user->updated_at->format('d M Y') }}
                                </p>

                                <p class="mt-1 text-xs text-[#99938a]">
                                    {{ $user->updated_at->format('H:i') }} WIB
                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ==========================
                    ACTION
                =========================== --}}
                <div class="mt-5 flex flex-col gap-3 sm:flex-row sm:justify-end">

                    <a href="{{ route('admin.users.index') }}"
                       class="inline-flex items-center justify-center
                              border border-[#bdb9b0]
                              bg-white
                              px-5 py-2.5
                              text-xs
                              text-[#243b63]
                              transition
                              hover:border-[#243b63]
                              hover:bg-[#243b63]
                              hover:text-white">

                        Kembali

                    </a>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection
