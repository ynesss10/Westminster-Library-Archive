<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'title' => 'Transportasi',
                'author' => 'Bookbot',
                'publisher' => 'Bookbot',
                'publication_year' => 2024,
                'isbn' => '9780000000001',
                'category' => 'Kehidupan',
                'description' => 'Aku punya sepeda mainan dan ayah bisa mengendarai sepeda besar sendirian. Jenjang buku: C (9 halaman).',
                'cover' => 'images/books/Book1.jpeg',
                'digital_file' => 'files/books/Transportasi.pdf',
                'physical_stock' => 5,
                'is_archive' => false,
            ],
            [
                'title' => 'Aum, Aum, Dinosaurus!',
                'author' => 'Lavanya Naidu',
                'publisher' => 'Bookbot',
                'publication_year' => 2024,
                'isbn' => '9780000000002',
                'category' => 'Hewan',
                'description' => 'Ini Dino. Mereka suka bersama. Tapi ini tidak! Mereka suka rumput. Tapi ini tidak! Apa kamu suka Dino? Jenjang buku: A (7 halaman).',
                'cover' => 'images/books/Book2.png',
                'digital_file' => 'files/books/Aum, Aum, Dinosaurus!.pdf',
                'physical_stock' => 5,
                'is_archive' => false,
            ],
            [
                'title' => 'Apakah Aku Istimewa?',
                'author' => 'Syeda Farzana Zaman Rumpa',
                'publisher' => 'Bookbot',
                'publication_year' => 2024,
                'isbn' => '9780000000003',
                'category' => 'Hewan',
                'description' => 'Aku istimewah, karena aku mempunyai cahaya. Diadaptasi dari "What Does the Firefly Have?" dan diilustrasikan oleh Mahbubur Rahman. Jenjang buku: B2 (10 halaman).',
                'cover' => 'images/books/Book3.png',
                'digital_file' => 'files/books/Apakah Aku Istimewa.pdf',
                'physical_stock' => 5,
                'is_archive' => false,
            ],
        ];

        foreach ($books as $book) {
            Book::updateOrCreate(
                ['isbn' => $book['isbn']],
                $book
            );
        }
    }
}