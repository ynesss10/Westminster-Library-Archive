@extends('layouts.app')

@section('title', 'Kelola Buku')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-12">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-5 mb-10">

        <div>
            <p class="text-[#c3a064] text-xs tracking-[0.3em] uppercase mb-3">
                Library Administration
            </p>

            <h1 class="font-serif text-4xl text-[#101d33] font-normal">
                Manage Books
            </h1>

            <p class="text-sm text-gray-500 mt-3 max-w-xl">
                Manage the Westminster Library collection,
                including books, authors, categories, and stock.
            </p>
        </div>

        <a href="{{ route('admin.books.create') }}"
           class="inline-flex items-center justify-center
                  bg-[#101d33] text-white
                  px-5 py-3
                  text-[10px] tracking-widest
                  hover:bg-[#1c2d48]
                  transition">

            + &nbsp; ADD NEW BOOK

        </a>

    </div>


    {{-- Success Message --}}
    @if(session('success'))

        <div class="mb-6 border border-green-200 bg-green-50 px-5 py-4">

            <p class="text-xs text-green-700">
                {{ session('success') }}
            </p>

        </div>

    @endif


    {{-- Search & Information --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

        <div>
            <h2 class="font-serif text-2xl text-[#101d33]">
                Book Collection
            </h2>

            <p class="text-xs text-gray-500 mt-1">
                Browse and manage all books in the library.
            </p>
        </div>


        {{-- Search --}}
        <form action="{{ route('admin.books.index') }}"
              method="GET"
              class="flex w-full md:w-auto">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search books..."
                class="w-full md:w-72
                       border border-gray-300
                       bg-white
                       px-4 py-3
                       text-xs
                       text-gray-700
                       outline-none
                       focus:border-[#101d33]"
            >

            <button
                type="submit"
                class="bg-[#101d33]
                       text-white
                       px-5
                       text-[10px]
                       tracking-widest
                       hover:bg-[#1c2d48]
                       transition"
            >
                SEARCH
            </button>

        </form>

    </div>


    {{-- Books Table --}}
    <div class="border border-gray-200 bg-white overflow-x-auto">

        <table class="w-full text-left">

            <thead class="bg-[#f1eee8] border-b border-gray-200">

                <tr>

                    <th class="px-5 py-4 text-[10px] tracking-widest text-gray-600 uppercase text-center">
                        Cover
                    </th>

                    <th class="px-5 py-4 text-[10px] tracking-widest text-gray-600 uppercase text-center">
                        Book
                    </th>

                    <th class="px-5 py-4 text-[10px] tracking-widest text-gray-600 uppercase text-center">
                        Author
                    </th>

                    <th class="px-5 py-4 text-[10px] tracking-widest text-gray-600 uppercase text-center">
                        Category
                    </th>

                    <th class="px-5 py-4 text-[10px] tracking-widest text-gray-600 uppercase text-center">
                        Location
                    </th>

                    <th class="px-5 py-4 text-[10px] tracking-widest text-gray-600 uppercase text-center">
                        Stock
                    </th>

                    <th class="px-5 py-4 text-[10px] tracking-widest text-gray-600 uppercase text-center">
                        Action
                    </th>

                </tr>

            </thead>


            <tbody class="divide-y divide-gray-100">

                @forelse($books as $book)

                    <tr class="hover:bg-[#faf9f6] transition">

                        {{-- Cover --}}
                        <td class="px-5 py-3 text-center flex items-center justify-center">

                            @if($book->cover)

                                <img
                                    src="{{ asset('storage/' . $book->cover) }}"
                                    alt="{{ $book->title }}"
                                    class="w-40 h-56 object-contain"
                                >

                            @else

                                <div class="w-40 h-56
                                            bg-[#f1eee8]
                                            flex items-center justify-center">

                                    <span class="text-[9px] text-gray-400 text-center">
                                        NO<br>COVER
                                    </span>

                                </div>

                            @endif

                        </td>


                        {{-- Title --}}
                        <td class="px-5 py-3 text-center">

                            <p class="text-sm font-medium text-[#101d33]">
                                {{ $book->title }}
                            </p>

                            @if(isset($book->isbn))
                                <p class="text-[10px] text-gray-400 mt-1">
                                    ISBN {{ $book->isbn }}
                                </p>
                            @endif

                        </td>
                        <td class="px-5 py-3 text-center">

                            <span class="text-sm font-medium text-[#101d33]">
                                {{ $book->author }}
                            </span>

                        </td>


                        {{-- Category --}}
                        <td class="px-5 py-3 text-center">

                            <span class="inline-block
                                         text-[#101d33]
                                         px-3 py-1
                                         text-sm font-medium">

                                {{ $book->category }}

                            </span>

                        </td>


                        {{-- Location --}}
                        <td class="px-5 py-3 text-center">

                            @if($book->is_archive)

                                <span class="inline-block bg-[#f1eee8] text-[#101d33] px-3 py-1 text-[10px] tracking-wider uppercase">
                                    Archive
                                </span>

                            @else

                                <span class="inline-block bg-green-50 text-green-700 px-3 py-1 text-[10px] tracking-wider uppercase">
                                    Books
                                </span>

                            @endif

                        </td>


                        {{-- Stock --}}
                        <td class="px-5 py-3 text-center">

                            @if($book->physical_stock > 0)

                                <span class="inline-flex items-center gap-2
                                             text-sm font-medium text-green-700">

                   

                                    {{ $book->physical_stock }}

                                </span>

                            @else

                                <span class="inline-flex items-center gap-2
                                             text-sm font-medium text-red-600">

                                    <span class="w-1.5 h-1.5 bg-red-500 rounded-full"></span>

                                    Out of stock

                                </span>

                            @endif

                        </td>


                        {{-- Actions --}}
                        <td class="px-5 py-3">

                            <div class="flex items-center justify-center gap-2">

                                <a
                                    href="{{ route('admin.books.show', $book) }}"
                                    class="text-[10px]
                                           tracking-wider
                                           text-gray-600
                                           hover:text-[#101d33]"
                                >
                                    DETAIL
                                </a>


                                <a
                                    href="{{ route('admin.books.edit', $book) }}"
                                    class="text-[10px]
                                           tracking-wider
                                           text-[#101d33]
                                           hover:text-[#c3a064]"
                                >
                                    EDIT
                                </a>


                                <button
                                    type="button"
                                    onclick="openDeleteModal(this.dataset.url, '{{ addslashes($book->title) }}')"
                                    data-url="{{ route('admin.books.destroy', $book) }}"
                                    class="text-[10px]
                                           tracking-wider
                                           text-red-500
                                           hover:text-red-700
                                           cursor-pointer"
                                >
                                    DELETE
                                </button>

                            </div>

                        </td>

                    </tr>


                @empty

                    <tr>

                        <td colspan="7" class="px-5 py-16 text-center">

                            <p class="font-serif text-xl text-[#101d33]">
                                No books found.
                            </p>

                            <p class="text-xs text-gray-500 mt-2">
                                There are currently no books in the collection.
                            </p>

                            <a
                                href="{{ route('admin.books.create') }}"
                                class="inline-block mt-5
                                       text-[10px]
                                       tracking-widest
                                       text-[#101d33]
                                       border-b border-[#c3a064]
                                       pb-1"
                            >
                                ADD YOUR FIRST BOOK →
                            </a>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    {{-- Pagination --}}
    @if($books->hasPages())

        <div class="mt-8 flex justify-center">

            {{ $books->links() }}

        </div>

    @endif


    {{-- Bottom Information --}}
    <div class="mt-12 bg-[#f1eee8] px-8 py-8 md:px-10">

        <p class="text-[#c3a064] text-[10px] tracking-[0.3em] uppercase mb-3">
            WestMinster Library
        </p>

        <h2 class="font-serif text-2xl text-[#101d33] mb-2">
            Preserve the Collection.
        </h2>

        <p class="text-xs text-gray-600 max-w-2xl leading-5">
            Keep book information accurate and up to date
            so visitors can easily discover the library's collection.
        </p>

    </div>

</div>

{{-- Delete Confirmation Modal --}}
<div id="deleteModal" class="hidden fixed inset-0 bg-black/20 flex items-center justify-center z-50 p-4">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-sm w-full">
        <h3 class="font-serif text-2xl text-[#101d33] mb-2">
            Delete Book?
        </h3>

        <p class="text-sm text-gray-500 mb-1">
            <span id="modalBookTitle"></span>
        </p>

        <p class="text-sm text-gray-600 mb-6">
            This action cannot be undone.
        </p>

        <div class="flex gap-3">
            <button
                type="button"
                onclick="closeDeleteModal()"
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
                id="deleteForm"
                method="POST"
                class="flex-1"
            >
                @csrf
                @method('DELETE')

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
                    DELETE
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function openDeleteModal(deleteUrl, bookTitle) {
        document.getElementById('modalBookTitle').textContent = 'Delete "' + bookTitle + '"?';
        document.getElementById('deleteForm').action = deleteUrl;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }

    // Close modal when clicking outside
    document.getElementById('deleteModal')?.addEventListener('click', function(event) {
        if (event.target === this) {
            closeDeleteModal();
        }
    });
</script>

@endsection