<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with('book')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('borrowings.index', compact('borrowings'));
    }

    public function request(Book $book)
    {
        if (!$book->is_archive) {
            return back()->with(
                'error',
                'Buku ini tidak menggunakan sistem request.'
            );
        }

        $existingBorrowing = Borrowing::where('user_id', auth()->id())
            ->where('book_id', $book->id)
            ->whereIn('status', ['pending', 'approved', 'borrowed'])
            ->exists();

        if ($existingBorrowing) {
            return back()->with(
                'error',
                'Buku ini masih memiliki peminjaman aktif.'
            );
        }

        Borrowing::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
            'borrowing_date' => now()->toDateString(),
            'due_date' => null,
            'return_date' => null,
            'status' => 'pending',
        ]);

        return back()->with(
            'success',
            'Request peminjaman berhasil dikirim.'
        );
    }

    public function borrow(Book $book)
    {
        if ($book->is_archive) {
            return back()->with(
                'error',
                'Buku Archive harus melalui request peminjaman.'
            );
        }

        $existingBorrowing = Borrowing::where('user_id', auth()->id())
            ->where('book_id', $book->id)
            ->whereIn('status', ['pending', 'approved', 'borrowed'])
            ->exists();

        if ($existingBorrowing) {
            return back()->with(
                'error',
                'Buku ini masih memiliki peminjaman aktif.'
            );
        }

        if ($book->physical_stock <= 0) {
            return back()->with(
                'error',
                'Stok buku sedang habis.'
            );
        }

        Borrowing::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
            'borrowing_date' => now()->toDateString(),
            'due_date' => now()->addDays(7)->toDateString(),
            'return_date' => null,
            'status' => 'borrowed',
        ]);

        $book->decrement('physical_stock');

        return back()->with(
            'success',
            'Buku berhasil dipinjam.'
        );
    }

    public function returnBook(Borrowing $borrowing)
    {
        if ($borrowing->user_id !== auth()->id()) {
            abort(403);
        }

        if (!in_array($borrowing->status, ['approved', 'borrowed'])) {
            return back()->with(
                'error',
                'Buku tidak dapat dikembalikan.'
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