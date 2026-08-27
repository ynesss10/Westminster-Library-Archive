<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrowing;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBooks = Book::count();

        $totalUsers = User::count();

        $pendingBorrowings = Borrowing::where('status', 'pending')->count();

        $activeBorrowings = Borrowing::where('status', 'borrowed')->count();

        return view('admin.dashboard', compact(
            'totalBooks',
            'totalUsers',
            'pendingBorrowings',
            'activeBorrowings'
        ));
    }
}
