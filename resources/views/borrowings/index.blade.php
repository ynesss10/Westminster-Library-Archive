@extends('layouts.app')

@section('title', 'My Borrowings')

@section('content')

    <section class="bg-[#f7f4ef] px-6 md:px-16 py-12">

        <h1 class="font-serif text-3xl text-navy mb-6">
            My Borrowings
        </h1>

        <div class="flex flex-col gap-6">

            @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 text-sm rounded-md px-4 py-3">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-50 border border-red-200 text-red-700 text-sm rounded-md px-4 py-3">
                    {{ session('error') }}
                </div>
            @endif

            {{-- PENDING APPROVAL --}}
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="font-serif text-lg text-navy pb-3 mb-4 border-b border-gold/40">
                    Pending Approval
                </h3>

                <div class="flex flex-col divide-y divide-gray-100">
                    @forelse ($pendingBorrowings ?? [] as $item)
                        <div class="flex items-center justify-between py-3 text-sm">
                            <span class="text-navy">
                                {{ $item->book->title ?? $item->title }} by {{ $item->book->author ?? $item->author }}
                            </span>
                            <span class="text-gold font-medium whitespace-nowrap">
                                Request Submitted | {{ \Carbon\Carbon::parse($item->requested_at ?? $item->created_at)->format('d/m/Y') }}
                            </span>
                        </div>
                    @empty
                        <p class="text-gray-400 text-sm py-3">Tidak ada permintaan yang menunggu persetujuan.</p>
                    @endforelse
                </div>
            </div>

            {{-- ACTIVE BORROWINGS --}}
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="font-serif text-lg text-navy pb-3 mb-4 border-b border-gold/40">
                    Active Borrowings
                </h3>

                <div class="flex flex-col divide-y divide-gray-100">
                    @forelse ($activeBorrowings ?? [] as $item)
                        <div class="flex items-center justify-between py-3 text-sm">
                            <span class="text-navy">
                                {{ $item->book->title ?? $item->title }} by {{ $item->book->author ?? $item->author }}
                            </span>
                            <span class="text-gold font-medium whitespace-nowrap">
                                Active | {{ \Carbon\Carbon::parse($item->borrowed_at ?? $item->start_date)->format('d/m/Y') }}
                                - {{ \Carbon\Carbon::parse($item->due_at ?? $item->end_date)->format('d/m/Y') }}
                            </span>
                        </div>
                    @empty
                        <p class="text-gray-400 text-sm py-3">Tidak ada peminjaman aktif.</p>
                    @endforelse
                </div>
            </div>

        </div>

    </section>

@endsection