<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function show(Book $book)
    {
        abort_unless($book->is_archive, 404);

        return view('archive.show', compact('book'));
    }

    public function index(Request $request)
    {
        $authors = Book::where('is_archive', true)
            ->whereNotNull('author')
            ->distinct()
            ->orderBy('author')
            ->pluck('author');

        $categories = Book::where('is_archive', true)
            ->whereNotNull('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        $years = Book::where('is_archive', true)
            ->whereNotNull('publication_year')
            ->distinct()
            ->orderByDesc('publication_year')
            ->pluck('publication_year');

        $query = Book::where('is_archive', true);

        if ($request->filled('search')) {
            $search = $request->input('search');

            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%");
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

        $books = $query
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('archive.index', compact('books', 'authors', 'categories', 'years'));
    }
}