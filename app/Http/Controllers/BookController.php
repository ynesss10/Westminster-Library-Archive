<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $authors = Book::where('is_archive', false)
            ->whereNotNull('author')
            ->distinct()
            ->orderBy('author')
            ->pluck('author');

        $categories = Book::where('is_archive', false)
            ->whereNotNull('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        $years = Book::where('is_archive', false)
            ->whereNotNull('publication_year')
            ->distinct()
            ->orderByDesc('publication_year')
            ->pluck('publication_year');

        $query = Book::where('is_archive', false);

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%");
            });
        }

        $query->when($request->filled('author'), function ($query) use ($request) {
            $query->where('author', $request->input('author'));
        });

        $query->when($request->filled('category'), function ($query) use ($request) {
            $query->where('category', $request->input('category'));
        });

        $query->when($request->filled('year'), function ($query) use ($request) {
            $query->where('publication_year', $request->input('year'));
        });

        $query->when($request->input('availability') === 'available', function ($query) {
            $query->where('physical_stock', '>', 0);
        });

        $query->when($request->input('availability') === 'unavailable', function ($query) {
            $query->where('physical_stock', 0);
        });

        $books = $query
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('books.index', compact('books', 'authors', 'categories', 'years'));
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }
}