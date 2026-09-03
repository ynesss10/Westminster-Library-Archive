@extends('layouts.app')

@section('title', 'Manajemen Peminjaman')

@section('content')

<div class="min-h-screen bg-white">

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
                    Manajemen Peminjaman
                </h1>

                <p class="mt-3 max-w-xl text-sm leading-relaxed text-[#777168]">
                    Kelola seluruh aktivitas peminjaman buku,
                    tanggal jatuh tempo, dan pengembalian koleksi perpustakaan.
                </p>

            </div>


            {{-- Back Button --}}
            <a href="{{ route('admin.dashboard') }}"
               class="inline-flex w-fit items-center gap-2
                      border border-[#bdb9b0]
                      bg-white px-5 py-2.5
                      text-xs text-[#243b63]
                      transition
                      hover:border-[#243b63]
                      hover:bg-[#243b63]
                      hover:text-white">

                <span class="text-base leading-none">
                    ←
                </span>

                Kembali ke Dashboard

            </a>

        </div>

    </section>


    {{-- ================================
        STATISTICS
    ================================= --}}
    <section class="max-w-7xl mx-auto px-6 lg:px-10 pb-8">

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">

            {{-- Total --}}
            <div class="border border-[#dedbd3] bg-white p-5">

                <p class="text-[10px] font-medium uppercase tracking-[0.18em] text-[#918b82]">
                    Total Peminjaman
                </p>

                <p class="mt-2 font-serif text-3xl text-[#18243a]">
                    {{ $borrowings->count() }}
                </p>

            </div>


            {{-- Dipinjam --}}
            <div class="border border-[#dedbd3] bg-white p-5">

                <p class="text-[10px] font-medium uppercase tracking-[0.18em] text-[#918b82]">
                    Sedang Dipinjam
                </p>

                <p class="mt-2 font-serif text-3xl text-[#18243a]">
                    {{ $borrowings->where('status', 'borrowed')->count() }}
                </p>

            </div>


            {{-- Dikembalikan --}}
            <div class="border border-[#dedbd3] bg-white p-5">

                <p class="text-[10px] font-medium uppercase tracking-[0.18em] text-[#918b82]">
                    Dikembalikan
                </p>

                <p class="mt-2 font-serif text-3xl text-[#18243a]">
                    {{ $borrowings->where('status', 'returned')->count() }}
                </p>

            </div>


            {{-- Terlambat --}}
            <div class="border border-[#dedbd3] bg-white p-5">

                <p class="text-[10px] font-medium uppercase tracking-[0.18em] text-[#918b82]">
                    Terlambat
                </p>

                <p class="mt-2 font-serif text-3xl text-[#b18443]">
                    {{ $borrowings->where('status', 'overdue')->count() }}
                </p>

            </div>

        </div>

    </section>


    {{-- ================================
        BORROWING TABLE
    ================================= --}}
    <section class="max-w-7xl mx-auto px-6 lg:px-10 pb-16">

        <div class="overflow-hidden border border-[#dedbd3] bg-white">

            {{-- Table Header --}}
            <div class="flex flex-col gap-2
                        border-b border-[#dedbd3]
                        px-6 py-5
                        sm:flex-row sm:items-center sm:justify-between
                        md:px-8">

                <div>

                    <h2 class="font-serif text-xl text-[#18243a]">
                        Daftar Peminjaman
                    </h2>

                    <p class="mt-1 text-xs text-[#89847c]">
                        Riwayat peminjaman buku oleh pengguna.
                    </p>

                </div>

                <span class="text-[10px] font-medium uppercase tracking-[0.15em] text-[#b18443]">
                    {{ $borrowings->count() }} Records
                </span>

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
                                User
                            </th>

                            <th class="px-6 py-4 text-left text-[10px] font-semibold uppercase tracking-[0.13em] text-[#777168]">
                                Buku
                            </th>

                            <th class="px-6 py-4 text-left text-[10px] font-semibold uppercase tracking-[0.13em] text-[#777168]">
                                Tanggal Pinjam
                            </th>

                            <th class="px-6 py-4 text-left text-[10px] font-semibold uppercase tracking-[0.13em] text-[#777168]">
                                Jatuh Tempo
                            </th>

                            <th class="px-6 py-4 text-left text-[10px] font-semibold uppercase tracking-[0.13em] text-[#777168]">
                                Dikembalikan
                            </th>

                            <th class="px-6 py-4 text-left text-[10px] font-semibold uppercase tracking-[0.13em] text-[#777168]">
                                Status
                            </th>

                            <th class="px-6 py-4 text-center text-[10px] font-semibold uppercase tracking-[0.13em] text-[#777168]">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($borrowings as $borrowing)

                            <tr class="border-b border-[#ebe8e1] last:border-0 transition hover:bg-[#faf9f6]">

                                {{-- ID --}}
                                <td class="px-6 py-5 text-sm text-[#777168]">
                                    {{ str_pad($borrowing->id, 3, '0', STR_PAD_LEFT) }}
                                </td>


                                {{-- USER --}}
                                <td class="px-6 py-5">

                                    <div class="flex items-center gap-3">

                                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#e9e3d8] text-xs font-semibold text-[#243b63]">

                                            {{ strtoupper(substr($borrowing->user->name, 0, 1)) }}

                                        </div>

                                        <div>

                                            <p class="text-sm font-medium text-[#18243a]">
                                                {{ $borrowing->user->name }}
                                            </p>

                                            <p class="mt-0.5 text-[10px] text-[#989188]">
                                                Member
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- BOOK --}}
                                <td class="px-6 py-5">

                                    <p class="max-w-[200px] text-sm font-medium text-[#18243a]">
                                        {{ $borrowing->book->title }}
                                    </p>

                                </td>


                                {{-- BORROWING DATE --}}
                                <td class="px-6 py-5 text-sm text-[#777168] whitespace-nowrap">

                                    {{ \Carbon\Carbon::parse($borrowing->borrowing_date)->format('d M Y') }}

                                </td>


                                {{-- DUE DATE --}}
                                <td class="px-6 py-5 text-sm text-[#777168] whitespace-nowrap">

                                    @if($borrowing->due_date)

                                        {{ \Carbon\Carbon::parse($borrowing->due_date)->format('d M Y') }}

                                    @else

                                        <span class="text-[#aaa49b]">
                                            —
                                        </span>

                                    @endif

                                </td>


                                {{-- RETURN DATE --}}
                                <td class="px-6 py-5 text-sm text-[#777168] whitespace-nowrap">

                                    @if($borrowing->return_date)

                                        {{ \Carbon\Carbon::parse($borrowing->return_date)->format('d M Y') }}

                                    @else

                                        <span class="text-[#aaa49b]">
                                            —
                                        </span>

                                    @endif

                                </td>


                                {{-- STATUS --}}
                                <td class="px-6 py-5">

                                    @if($borrowing->status === 'borrowed')

                                        <span class="inline-flex items-center gap-1.5
                                                     bg-[#f2ede4]
                                                     px-3 py-1
                                                     text-[10px]
                                                     uppercase
                                                     tracking-wide
                                                     text-[#806637]">

                                            <span class="h-1.5 w-1.5 rounded-full bg-[#c59a52]"></span>

                                            Dipinjam

                                        </span>

                                    @elseif($borrowing->status === 'returned')

                                        <span class="inline-flex items-center gap-1.5
                                                     bg-[#e8eee9]
                                                     px-3 py-1
                                                     text-[10px]
                                                     uppercase
                                                     tracking-wide
                                                     text-[#496650]">

                                            <span class="h-1.5 w-1.5 rounded-full bg-[#63856b]"></span>

                                            Dikembalikan

                                        </span>

                                    @elseif($borrowing->status === 'overdue')

                                        <span class="inline-flex items-center gap-1.5
                                                     bg-[#f5e8e4]
                                                     px-3 py-1
                                                     text-[10px]
                                                     uppercase
                                                     tracking-wide
                                                     text-[#985b4b]">

                                            <span class="h-1.5 w-1.5 rounded-full bg-[#a96856]"></span>

                                            Terlambat

                                        </span>

                                    @else

                                        <span class="inline-flex items-center gap-1.5
                                                     bg-[#eeeeeb]
                                                     px-3 py-1
                                                     text-[10px]
                                                     uppercase
                                                     tracking-wide
                                                     text-[#6f6a63]">

                                            {{ $borrowing->status }}

                                        </span>

                                    @endif

                                </td>


                                {{-- ACTION --}}
                                <td class="px-6 py-5 text-center">

                                    <a href="{{ route('admin.borrowings.show', $borrowing) }}"
                                       class="inline-flex items-center gap-2
                                              text-xs font-medium
                                              text-[#243b63]
                                              transition
                                              hover:text-[#b18443]">

                                        Detail

                                        <span class="text-[#b18443]">
                                            →
                                        </span>

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="8" class="px-6 py-16 text-center">

                                    <div>

                                        <p class="font-serif text-xl text-[#18243a]">
                                            Belum ada peminjaman
                                        </p>

                                        <p class="mt-1 text-xs text-[#8b857d]">
                                            Belum ada data peminjaman buku.
                                        </p>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- =================================
                MOBILE CARDS
            ================================== --}}
            <div class="md:hidden">

                @forelse($borrowings as $borrowing)

                    <div class="border-b border-[#ebe8e1] p-5 last:border-0">

                        {{-- Top --}}
                        <div class="flex items-start justify-between gap-4">

                            <div>

                                <p class="text-[9px] uppercase tracking-[0.14em] text-[#aaa49b]">
                                    Peminjaman #{{ str_pad($borrowing->id, 3, '0', STR_PAD_LEFT) }}
                                </p>

                                <h3 class="mt-1 font-serif text-lg text-[#18243a]">
                                    {{ $borrowing->book->title }}
                                </h3>

                            </div>


                            {{-- Status --}}
                            @if($borrowing->status === 'borrowed')

                                <span class="shrink-0 bg-[#f2ede4] px-2.5 py-1 text-[9px] uppercase tracking-wide text-[#806637]">
                                    Dipinjam
                                </span>

                            @elseif($borrowing->status === 'returned')

                                <span class="shrink-0 bg-[#e8eee9] px-2.5 py-1 text-[9px] uppercase tracking-wide text-[#496650]">
                                    Dikembalikan
                                </span>

                            @elseif($borrowing->status === 'overdue')

                                <span class="shrink-0 bg-[#f5e8e4] px-2.5 py-1 text-[9px] uppercase tracking-wide text-[#985b4b]">
                                    Terlambat
                                </span>

                            @else

                                <span class="shrink-0 bg-[#eeeeeb] px-2.5 py-1 text-[9px] uppercase tracking-wide text-[#6f6a63]">
                                    {{ $borrowing->status }}
                                </span>

                            @endif

                        </div>


                        {{-- User --}}
                        <div class="mt-5 flex items-center gap-3">

                            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#e9e3d8] text-xs font-semibold text-[#243b63]">

                                {{ strtoupper(substr($borrowing->user->name, 0, 1)) }}

                            </div>

                            <div>

                                <p class="text-xs text-[#777168]">
                                    Dipinjam oleh
                                </p>

                                <p class="text-sm font-medium text-[#18243a]">
                                    {{ $borrowing->user->name }}
                                </p>

                            </div>

                        </div>


                        {{-- Dates --}}
                        <div class="mt-5 grid grid-cols-2 gap-4 border-t border-[#ebe8e1] pt-4">

                            <div>

                                <p class="text-[9px] uppercase tracking-wide text-[#aaa49b]">
                                    Tanggal Pinjam
                                </p>

                                <p class="mt-1 text-xs text-[#6f6a63]">

                                    {{ \Carbon\Carbon::parse($borrowing->borrowing_date)->format('d M Y') }}

                                </p>

                            </div>


                            <div>

                                <p class="text-[9px] uppercase tracking-wide text-[#aaa49b]">
                                    Jatuh Tempo
                                </p>

                                <p class="mt-1 text-xs text-[#6f6a63]">

                                    @if($borrowing->due_date)

                                        {{ \Carbon\Carbon::parse($borrowing->due_date)->format('d M Y') }}

                                    @else

                                        —

                                    @endif

                                </p>

                            </div>

                        </div>


                        {{-- Bottom --}}
                        <div class="mt-5 flex items-center justify-between">

                            <p class="text-xs text-[#99938a]">

                                @if($borrowing->return_date)

                                    Kembali:
                                    {{ \Carbon\Carbon::parse($borrowing->return_date)->format('d M Y') }}

                                @else

                                    Belum dikembalikan

                                @endif

                            </p>


                            <a href="{{ route('admin.borrowings.show', $borrowing) }}"
                               class="text-xs font-medium text-[#243b63] transition hover:text-[#b18443]">

                                Lihat Detail →

                            </a>

                        </div>

                    </div>

                @empty

                    <div class="px-6 py-14 text-center">

                        <p class="font-serif text-xl text-[#18243a]">
                            Belum ada peminjaman
                        </p>

                        <p class="mt-1 text-xs text-[#8b857d]">
                            Belum ada data peminjaman buku.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </section>

</div>

@endsection