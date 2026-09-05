<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with(['user', 'book'])
            ->oldest()
            ->get();

        return view('admin.borrowings.index', compact('borrowings'));
    }

    public function show(Borrowing $borrowing)
    {
        $borrowing->load(['user', 'book']);

        return view('admin.borrowings.show', compact('borrowing'));
    }

    public function approve(Borrowing $borrowing)
    {
        if ($borrowing->status !== 'pending') {
            return back()->with(
                'error',
                'Peminjaman ini tidak dapat disetujui.'
            );
        }

        if ($borrowing->book->physical_stock <= 0) {
            return back()->with(
                'error',
                'Stok buku sedang habis.'
            );
        }

        $borrowing->update([
            'status' => 'approved',
            'due_date' => now()->addDays(7)->toDateString(),
        ]);

        $borrowing->book->decrement('physical_stock');

        return back()->with(
            'success',
            'Peminjaman berhasil disetujui.'
        );
    }

    public function reject(Borrowing $borrowing)
    {
        if ($borrowing->status !== 'pending') {
            return back()->with(
                'error',
                'Peminjaman ini tidak dapat ditolak.'
            );
        }

        $borrowing->update([
            'status' => 'rejected',
        ]);

        return back()->with(
            'success',
            'Peminjaman berhasil ditolak.'
        );
    }

    public function returnBook(Borrowing $borrowing)
    {
        if (!in_array($borrowing->status, ['approved', 'borrowed'])) {
            return back()->with(
                'error',
                'Buku ini belum dapat dikembalikan.'
            );
        }

        $borrowing->update([
            'status' => 'returned',
            'return_date' => now()->toDateString(),
        ]);

        $borrowing->book->increment('physical_stock');

        return back()->with(
            'success',
            'Buku berhasil dikembalikan.'
        );
    }
}