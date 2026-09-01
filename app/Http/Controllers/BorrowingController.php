<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;

class BorrowingController extends Controller
{
    public function request(Book $book)
    {
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
}