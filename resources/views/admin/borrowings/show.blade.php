@extends('layouts.app')

@section('title', 'Detail Peminjaman')

@section('content')

<div class="max-w-6xl mx-auto px-6 py-12">

    {{-- Header --}}
    <div class="mb-10">

        <p class="text-[#c3a064] text-xs tracking-[0.3em] uppercase mb-3">
            Library Administration
        </p>

        <h1 class="font-serif text-4xl text-[#101d33] font-normal">
            Borrowing Details
        </h1>

        <p class="text-sm text-gray-500 mt-3">
            Review and manage this library borrowing transaction.
        </p>

    </div>


    {{-- Success Message --}}
    @if(session('success'))

        <div class="mb-6 border border-green-200 bg-green-50 px-5 py-4">

            <p class="text-xs text-green-700">
                {{ session('success') }}
            </p>

        </div>

    @endif


    {{-- Error Message --}}
    @if(session('error'))

        <div class="mb-6 border border-red-200 bg-red-50 px-5 py-4">

            <p class="text-xs text-red-700">
                {{ session('error') }}
            </p>

        </div>

    @endif


    {{-- Main Information --}}
    <section class="border border-gray-200 bg-white mb-8">

        {{-- Top --}}
        <div class="bg-[#f1eee8] px-6 py-5 border-b border-gray-200">

            <p class="text-[#c3a064] text-[10px] tracking-[0.3em] uppercase mb-1">
                Borrowing Transaction
            </p>

            <h2 class="font-serif text-2xl text-[#101d33]">
                Transaction Information
            </h2>

        </div>


        <div class="p-6 md:p-8">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">


                {{-- Book --}}
                <div>

                    <p class="text-[10px] uppercase tracking-widest text-gray-400 mb-2">
                        Book
                    </p>

                    <div class="flex gap-4 items-center">

                        @if($borrowing->book->cover)

                            <img
                                src="{{ asset('storage/' . $borrowing->book->cover) }}"
                                alt="{{ $borrowing->book->title }}"
                                class="w-20 h-28 object-cover border border-gray-200"
                            >

                        @else

                            <div class="w-20 h-28 bg-[#f1eee8] border border-gray-200 flex items-center justify-center">

                                <span class="text-[8px] text-gray-400 text-center">
                                    NO<br>
                                    COVER
                                </span>

                            </div>

                        @endif


                        <div>

                            <h3 class="font-serif text-xl text-[#101d33]">
                                {{ $borrowing->book->title }}
                            </h3>

                            <p class="text-xs text-gray-500 mt-1">
                                {{ $borrowing->book->author }}
                            </p>

                            <span class="inline-block mt-3 bg-[#f1eee8] text-[#101d33] px-3 py-1 text-[10px]">
                                {{ $borrowing->book->category }}
                            </span>

                        </div>

                    </div>

                </div>


                {{-- User --}}
                <div>

                    <p class="text-[10px] uppercase tracking-widest text-gray-400 mb-3">
                        Borrower
                    </p>

                    <div class="border-l-2 border-[#c3a064] pl-4">

                        <h3 class="font-serif text-xl text-[#101d33]">
                            {{ $borrowing->user->name }}
                        </h3>

                        <p class="text-xs text-gray-500 mt-2">
                            {{ $borrowing->user->email }}
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- Dates & Status --}}
    <section class="border border-gray-200 bg-white mb-8">

        <div class="bg-[#f1eee8] px-6 py-5 border-b border-gray-200">

            <p class="text-[#c3a064] text-[10px] tracking-[0.3em] uppercase mb-1">
                Borrowing Schedule
            </p>

            <h2 class="font-serif text-2xl text-[#101d33]">
                Dates & Status
            </h2>

        </div>


        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 divide-y sm:divide-y-0 sm:divide-x divide-gray-200">

            {{-- Borrowing Date --}}
            <div class="p-6">

                <p class="text-[10px] uppercase tracking-widest text-gray-400 mb-2">
                    Borrowing Date
                </p>

                <p class="font-serif text-xl text-[#101d33]">
                    {{ $borrowing->borrowing_date }}
                </p>

            </div>


            {{-- Due Date --}}
            <div class="p-6">

                <p class="text-[10px] uppercase tracking-widest text-gray-400 mb-2">
                    Due Date
                </p>

                <p class="font-serif text-xl text-[#101d33]">
                    {{ $borrowing->due_date ?? '-' }}
                </p>

            </div>


            {{-- Return Date --}}
            <div class="p-6">

                <p class="text-[10px] uppercase tracking-widest text-gray-400 mb-2">
                    Return Date
                </p>

                <p class="font-serif text-xl text-[#101d33]">
                    {{ $borrowing->return_date ?? '-' }}
                </p>

            </div>


            {{-- Status --}}
            <div class="p-6">

                <p class="text-[10px] uppercase tracking-widest text-gray-400 mb-2">
                    Current Status
                </p>


                @if($borrowing->status === 'pending')

                    <span class="inline-flex items-center gap-2
                                 bg-yellow-50
                                 text-yellow-700
                                 px-3 py-2
                                 text-[10px]
                                 tracking-wider">

                        <span class="w-1.5 h-1.5 bg-yellow-500 rounded-full"></span>

                        PENDING

                    </span>

                @elseif(in_array($borrowing->status, ['approved', 'borrowed']))

                    <span class="inline-flex items-center gap-2
                                 bg-blue-50
                                 text-blue-700
                                 px-3 py-2
                                 text-[10px]
                                 tracking-wider">

                        <span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>

                        {{ strtoupper($borrowing->status) }}

                    </span>

                @elseif($borrowing->status === 'returned')

                    <span class="inline-flex items-center gap-2
                                 bg-green-50
                                 text-green-700
                                 px-3 py-2
                                 text-[10px]
                                 tracking-wider">

                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>

                        RETURNED

                    </span>

                @elseif($borrowing->status === 'rejected')

                    <span class="inline-flex items-center gap-2
                                 bg-red-50
                                 text-red-600
                                 px-3 py-2
                                 text-[10px]
                                 tracking-wider">

                        <span class="w-1.5 h-1.5 bg-red-500 rounded-full"></span>

                        REJECTED

                    </span>

                @else

                    <span class="inline-flex items-center
                                 bg-gray-100
                                 text-gray-600
                                 px-3 py-2
                                 text-[10px]
                                 tracking-wider">

                        {{ strtoupper($borrowing->status) }}

                    </span>

                @endif

            </div>

        </div>

    </section>


    {{-- Admin Action --}}
    <section class="border border-gray-200 bg-white mb-8">

        <div class="bg-[#101d33] px-6 py-5">

            <p class="text-[#c3a064] text-[10px] tracking-[0.3em] uppercase mb-1">
                Administrator
            </p>

            <h2 class="font-serif text-2xl text-white">
                Manage This Borrowing
            </h2>

        </div>


        <div class="p-6 md:p-8">

            @if($borrowing->status === 'pending')

                <p class="text-sm text-gray-600 mb-6">
                    This borrowing request is waiting for administrator approval.
                </p>

                <div class="flex flex-col sm:flex-row gap-3">

                    {{-- Approve Button --}}
                    <button
                        type="button"
                        onclick="openApproveModal()"
                        class="w-full sm:w-auto
                               bg-[#101d33]
                               text-white
                               px-7 py-3
                               text-[10px]
                               tracking-widest
                               hover:bg-[#1c2d48]
                               transition
                               cursor-pointer"
                    >
                        APPROVE BORROWING
                    </button>

                    {{-- Reject Button --}}
                    <button
                        type="button"
                        onclick="openRejectModal()"
                        class="w-full sm:w-auto
                               border border-red-300
                               text-red-600
                               px-7 py-3
                               text-[10px]
                               tracking-widest
                               hover:bg-red-50
                               transition
                               cursor-pointer"
                    >
                        REJECT BORROWING
                    </button>

                </div>


            @elseif(in_array($borrowing->status, ['approved', 'borrowed']))

                <p class="text-sm text-gray-600 mb-6">
                    This book is currently being borrowed.
                    Process the return when the user brings the book back.
                </p>

                <form
                    action="{{ route('admin.borrowings.return', $borrowing) }}"
                    method="POST"
                    onsubmit="return confirm('Apakah Anda yakin ingin memproses pengembalian buku ini?');"
                >

                    @csrf

                    <button
                        type="submit"
                        class="bg-[#101d33]
                               text-white
                               px-7 py-3
                               text-[10px]
                               tracking-widest
                               hover:bg-[#1c2d48]
                               transition"
                    >
                        PROCESS RETURN →
                    </button>

                </form>


            @elseif($borrowing->status === 'returned')

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 bg-green-50 flex items-center justify-center">
                        <span class="text-green-600">
                            ✓
                        </span>
                    </div>

                    <div>

                        <p class="text-sm text-[#101d33] font-medium">
                            Book Successfully Returned
                        </p>

                        <p class="text-xs text-gray-500 mt-1">
                            This borrowing transaction has been completed.
                        </p>

                    </div>

                </div>


            @elseif($borrowing->status === 'rejected')

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 bg-red-50 flex items-center justify-center">
                        <span class="text-red-500">
                            ×
                        </span>
                    </div>

                    <div>

                        <p class="text-sm text-[#101d33] font-medium">
                            Borrowing Request Rejected
                        </p>

                        <p class="text-xs text-gray-500 mt-1">
                            This borrowing request has been rejected.
                        </p>

                    </div>

                </div>

            @endif

        </div>

    </section>


    {{-- Navigation --}}
    <div class="flex flex-col sm:flex-row justify-between gap-4">

        <a
            href="{{ route('admin.borrowings.index') }}"
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
            ← BACK TO BORROWINGS
        </a>


        <a
            href="{{ route('admin.books.show', $borrowing->book) }}"
            class="text-center
                   border border-[#101d33]
                   text-[#101d33]
                   px-6 py-3
                   text-[10px]
                   tracking-widest
                   hover:bg-[#101d33]
                   hover:text-white
                   transition"
        >
            VIEW BOOK DETAILS →
        </a>

    </div>


    {{-- Bottom Information --}}
    <div class="mt-12 bg-[#f1eee8] px-8 py-8 md:px-10">

        <p class="text-[#c3a064] text-[10px] tracking-[0.3em] uppercase mb-3">
            WestMinster Library
        </p>

        <h2 class="font-serif text-2xl text-[#101d33] mb-2">
            Every Book. Every Borrower. Every Record.
        </h2>

        <p class="text-xs text-gray-600 max-w-2xl leading-5">
            Keep borrowing records accurate and make sure
            every book returns safely to the WestMinster collection.
        </p>

    </div>

</div>

@if($borrowing->status === 'pending')

{{-- Approve Confirmation Modal --}}
<div id="approveModal" class="hidden fixed inset-0 bg-black/20 flex items-center justify-center z-50 p-4">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-sm w-full">
        <h3 class="font-serif text-2xl text-[#101d33] mb-2">
            Approve Borrowing?
        </h3>

        <p class="text-sm text-gray-500 mb-1">
            {{ $borrowing->book->title }}
        </p>

        <p class="text-sm text-gray-600 mb-6">
            Are you sure you want to approve this borrowing request for <span class="font-medium text-[#101d33]">{{ $borrowing->user->name }}</span>?
        </p>

        <div class="flex gap-3">
            <button
                type="button"
                onclick="closeApproveModal()"
                class="flex-1
                       border border-gray-300
                       text-gray-600
                       px-4 py-2
                       text-[10px]
                       tracking-widest
                       hover:border-[#101d33]
                       hover:text-[#101d33]
                       transition
                       cursor-pointer"
            >
                CANCEL
            </button>

            <form
                action="{{ route('admin.borrowings.approve', $borrowing) }}"
                method="POST"
                class="flex-1"
            >
                @csrf
                <button
                    type="submit"
                    class="w-full
                           bg-[#101d33]
                           text-white
                           px-4 py-2
                           text-[10px]
                           tracking-widest
                           hover:bg-[#1c2d48]
                           transition
                           cursor-pointer"
                >
                    APPROVE
                </button>
            </form>
        </div>
    </div>
</div>

{{-- Reject Confirmation Modal --}}
<div id="rejectModal" class="hidden fixed inset-0 bg-black/20 flex items-center justify-center z-50 p-4">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-sm w-full">
        <h3 class="font-serif text-2xl text-[#101d33] mb-2">
            Reject Borrowing?
        </h3>

        <p class="text-sm text-gray-500 mb-1">
            {{ $borrowing->book->title }}
        </p>

        <p class="text-sm text-gray-600 mb-6">
            Are you sure you want to reject this borrowing request?
        </p>

        <div class="flex gap-3">
            <button
                type="button"
                onclick="closeRejectModal()"
                class="flex-1
                       border border-gray-300
                       text-gray-600
                       px-4 py-2
                       text-[10px]
                       tracking-widest
                       hover:border-[#101d33]
                       hover:text-[#101d33]
                       transition
                       cursor-pointer"
            >
                CANCEL
            </button>

            <form
                action="{{ route('admin.borrowings.reject', $borrowing) }}"
                method="POST"
                class="flex-1"
            >
                @csrf
                <button
                    type="submit"
                    class="w-full
                           bg-red-600
                           text-white
                           px-4 py-2
                           text-[10px]
                           tracking-widest
                           hover:bg-red-700
                           transition
                           cursor-pointer"
                >
                    REJECT
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function openApproveModal() {
        document.getElementById('approveModal')?.classList.remove('hidden');
    }

    function closeApproveModal() {
        document.getElementById('approveModal')?.classList.add('hidden');
    }

    function openRejectModal() {
        document.getElementById('rejectModal')?.classList.remove('hidden');
    }

    function closeRejectModal() {
        document.getElementById('rejectModal')?.classList.add('hidden');
    }

    // Close modal when clicking backdrop
    document.getElementById('approveModal')?.addEventListener('click', function(event) {
        if (event.target === this) {
            closeApproveModal();
        }
    });

    document.getElementById('rejectModal')?.addEventListener('click', function(event) {
        if (event.target === this) {
            closeRejectModal();
        }
    });

    // Close modal on Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeApproveModal();
            closeRejectModal();
        }
    });
</script>

@endif

@endsection