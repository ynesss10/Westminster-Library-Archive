<?php

namespace App\Http\Controllers;

use App\Models\Book;

class ArchiveController extends Controller
{
    public function index()
    {
        $books = Book::where('is_archive', true)
            ->latest()
            ->get();

        return view('archive.index', compact('books'));
    }
}