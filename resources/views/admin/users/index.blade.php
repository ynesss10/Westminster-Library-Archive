@extends('layouts.app')

@section('title', 'Manajemen User')

@section('content')

   <div class="min-h-screen bg-white">

    <section class="max-w-7xl mx-auto px-6 lg:px-10 pt-12 pb-8">

        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6"></div>
      
       <div>

                <p class="mb-3 text-[10px] font-semibold uppercase tracking-[0.25em] text-[#b18443]">
                   Library Administration
                </p>

                <h1 class="font-serif text-4xl md:text-5xl leading-tight text-[#18243a]">
                    Manajemen User
                </h1>

                <p class="mt-3 max-w-xl text-sm leading-relaxed text-[#777168]">
               Mengelola akun pengguna yang terdaftar dalam sistem, termasuk administrator dan anggota.
                </p>

            </div>

    </section>


    {{-- ================================
        STATISTICS
    ================================= --}}
    <section class="max-w-7xl mx-auto px-6 lg:px-10 pb-8">

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">

            {{-- Total User --}}
            <div class="border border-[#dedbd3] bg-white p-5">

                <div class="flex items-start justify-between">

                    <div>
                        <p class="text-[10px] font-medium uppercase tracking-[0.18em] text-[#918b82]">
                            Total User
                        </p>

                        <p class="mt-2 font-serif text-3xl text-[#18243a]">
                            {{ $users->count() }}
                        </p>
                    </div>

                    <div class="flex h-10 w-10 items-center justify-center bg-[#f2ede4] text-[#b18443]">

                        <svg class="h-5 w-5"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="1.5"
                                  d="M17 20h5v-2a4 4 0 00-4-4h-1
                                     M9 20H4v-2a4 4 0 014-4h1
                                     m4-4a4 4 0 100-8 4 4 0 000 8z"/>

                        </svg>

                    </div>

                </div>

            </div>


            {{-- Administrator --}}
            <div class="border border-[#dedbd3] bg-white p-5">

                <p class="text-[10px] font-medium uppercase tracking-[0.18em] text-[#918b82]">
                    Administrator
                </p>

                <p class="mt-2 font-serif text-3xl text-[#18243a]">
                    {{ $users->where('role', 'admin')->count() }}
                </p>

            </div>


            {{-- Member --}}
            <div class="border border-[#dedbd3] bg-white p-5">

                <p class="text-[10px] font-medium uppercase tracking-[0.18em] text-[#918b82]">
                    Member
                </p>

                <p class="mt-2 font-serif text-3xl text-[#18243a]">
                    {{ $users->where('role', 'user')->count() }}
                </p>

            </div>

        </div>

    </section>


    {{-- ================================
        USER TABLE
    ================================= --}}
    <section class="max-w-7xl mx-auto px-6 lg:px-10 pb-14">

        <div class="overflow-hidden border border-[#dedbd3] bg-white">

            {{-- Table Heading --}}
            <div class="flex flex-col gap-2 border-b border-[#dedbd3] px-6 py-5 sm:flex-row sm:items-center sm:justify-between md:px-8">

                <div>

                    <h2 class="font-serif text-xl text-[#18243a]">
                        Daftar Pengguna
                    </h2>

                    <p class="mt-1 text-xs text-[#89847c]">
                        Informasi pengguna yang terdaftar dalam sistem.
                    </p>

                </div>

            </div>


            {{-- =================================
                DESKTOP TABLE
            ================================== --}}
            <div class="hidden overflow-x-auto md:block">

                <table class="w-full">

                    <thead>

                        <tr class="border-b border-[#dedbd3] bg-[#f5f3ee]">

                            <th class="px-6 py-4 text-left text-[10px] font-semibold uppercase tracking-[0.13em] text-[#777168]">
                                ID
                            </th>

                            <th class="px-6 py-4 text-left text-[10px] font-semibold uppercase tracking-[0.13em] text-[#777168]">
                                Nama
                            </th>

                            <th class="px-6 py-4 text-left text-[10px] font-semibold uppercase tracking-[0.13em] text-[#777168]">
                                Email
                            </th>

                            <th class="px-6 py-4 text-left text-[10px] font-semibold uppercase tracking-[0.13em] text-[#777168]">
                                Role
                            </th>

                            <th class="px-6 py-4 text-left text-[10px] font-semibold uppercase tracking-[0.13em] text-[#777168]">
                                Terdaftar
                            </th>

                            <th class="px-6 py-4 text-center text-[10px] font-semibold uppercase tracking-[0.13em] text-[#777168]">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($users->sortBy('id') as $user)

                            <tr class="border-b border-[#ebe8e1] last:border-0 transition hover:bg-[#faf9f6]">

                                {{-- ID --}}
                                <td class="px-6 py-5 text-sm text-[#777168]">
                                    {{ $user->id }}
                                </td>


                                {{-- NAME --}}
                                <td class="px-6 py-5">

                                    <div class="flex items-center gap-3">

                                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#e9e3d8] text-xs font-semibold text-[#243b63]">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>

                                        <div>

                                            <p class="text-sm font-medium text-[#18243a]">
                                                {{ $user->name }}
                                            </p>

                                            <p class="mt-0.5 text-[10px] text-[#989188]">
                                                Library Member
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- EMAIL --}}
                                <td class="px-6 py-5 text-sm text-[#6f6a63]">
                                    {{ $user->email }}
                                </td>


                                {{-- ROLE --}}
                                <td class="px-6 py-5">

                                    @if($user->role === 'admin')

                                        <span class="inline-flex items-center gap-1.5 bg-[#18243a] px-3 py-1 text-[10px] uppercase tracking-wide text-white">

                                            <span class="h-1.5 w-1.5 rounded-full bg-[#c59a52]"></span>

                                            Administrator

                                        </span>

                                    @else

                                        <span class="inline-flex items-center gap-1.5 bg-[#f2ede4] px-3 py-1 text-[10px] uppercase tracking-wide text-[#806637]">

                                            <span class="h-1.5 w-1.5 rounded-full bg-[#c59a52]"></span>

                                            Member

                                        </span>

                                    @endif

                                </td>


                                {{-- CREATED --}}
                                <td class="px-6 py-5 text-sm text-[#777168]">

                                    {{ $user->created_at->format('d M Y') }}

                                </td>


                                {{-- ACTION --}}
                                <td class="px-6 py-5 text-center">

                                    <a href="{{ route('admin.users.show', $user) }}"
                                       class="inline-flex items-center gap-2 text-xs font-medium text-[#243b63] transition hover:text-[#b18443]">

                                        Detail

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="px-6 py-16 text-center">

                                    <p class="font-serif text-xl text-[#18243a]">
                                        Belum ada user
                                    </p>

                                    <p class="mt-1 text-xs text-[#8b857d]">
                                        Belum ada pengguna yang terdaftar.
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- =================================
                MOBILE CARD
            ================================== --}}
            <div class="md:hidden">

                @forelse($users->sortBy('id') as $user)

                    <div class="border-b border-[#ebe8e1] p-5 last:border-0">

                        <div class="flex items-start justify-between gap-4">

                            <div class="flex items-center gap-3">

                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#e9e3d8] text-sm font-semibold text-[#243b63]">

                                    {{ strtoupper(substr($user->name, 0, 1)) }}

                                </div>

                                <div>

                                    <p class="text-sm font-medium text-[#18243a]">
                                        {{ $user->name }}
                                    </p>

                                    <p class="mt-0.5 text-xs text-[#888178]">
                                        {{ $user->email }}
                                    </p>

                                </div>

                            </div>


                            @if($user->role === 'admin')

                                <span class="bg-[#18243a] px-2.5 py-1 text-[9px] uppercase tracking-wide text-white">
                                    Admin
                                </span>

                            @else

                                <span class="bg-[#f2ede4] px-2.5 py-1 text-[9px] uppercase tracking-wide text-[#806637]">
                                    Member
                                </span>

                            @endif

                        </div>


                        <div class="mt-5 flex items-center justify-between">

                            <div>

                                <p class="text-[9px] uppercase tracking-wide text-[#aaa49b]">
                                    Terdaftar
                                </p>

                                <p class="mt-1 text-xs text-[#6f6a63]">
                                    {{ $user->created_at->format('d M Y') }}
                                </p>

                            </div>


                            <a href="{{ route('admin.users.show', $user) }}"
                               class="text-xs font-medium text-[#243b63] transition hover:text-[#b18443]">

                                Lihat Detail →

                            </a>

                        </div>

                    </div>

                @empty

                    <div class="px-6 py-14 text-center">

                        <p class="font-serif text-xl text-[#18243a]">
                            Belum ada user
                        </p>

                        <p class="mt-1 text-xs text-[#8b857d]">
                            Belum ada pengguna yang terdaftar.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </section>

</div>

@endsection
