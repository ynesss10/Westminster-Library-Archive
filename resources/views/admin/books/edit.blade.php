@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')

<div class="max-w-5xl mx-auto px-6 py-12">

    {{-- Header --}}
    <div class="mb-10">

        <p class="text-[#c3a064] text-xs tracking-[0.3em] uppercase mb-3">
            Library Administration
        </p>

        <h1 class="font-serif text-4xl text-[#101d33] font-normal">
            Edit Book
        </h1>

        <p class="text-sm text-gray-500 mt-3 max-w-xl">
            Update the information and details of
            <span class="text-[#101d33]">
                {{ $book->title }}
            </span>
        </p>

    </div>


    {{-- Validation Errors --}}
    @if($errors->any())

        <div class="mb-8 border border-red-200 bg-red-50 px-5 py-4">

            <p class="text-xs font-medium text-red-700 mb-2">
                Please check the following errors:
            </p>

            <ul class="list-disc list-inside text-xs text-red-600 space-y-1">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- Form --}}
    <form
        id="editBookForm"
        action="{{ route('admin.books.update', $book) }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf
        @method('PUT')


        {{-- Book Information --}}
        <section class="border border-gray-200 bg-white mb-8">

            <div class="bg-[#f1eee8] px-6 py-5 border-b border-gray-200">

                <p class="text-[#c3a064] text-[10px] tracking-[0.3em] uppercase mb-1">
                    Book Information
                </p>

                <h2 class="font-serif text-2xl text-[#101d33]">
                    Book Details
                </h2>

            </div>


            <div class="p-6 md:p-8">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                    {{-- Title --}}
                    <div class="md:col-span-2">

                        <label
                            for="title"
                            class="block text-[10px] tracking-widest uppercase text-gray-600 mb-2"
                        >
                            Book Title *
                        </label>

                        <input
                            id="title"
                            type="text"
                            name="title"
                            value="{{ old('title', $book->title) }}"
                            required
                            class="w-full border border-gray-300 bg-white px-4 py-3 text-sm text-[#101d33] outline-none focus:border-[#101d33] transition"
                        >

                    </div>


                    {{-- Author --}}
                    <div>

                        <label
                            for="author"
                            class="block text-[10px] tracking-widest uppercase text-gray-600 mb-2"
                        >
                            Author *
                        </label>

                        <input
                            id="author"
                            type="text"
                            name="author"
                            value="{{ old('author', $book->author) }}"
                            required
                            class="w-full border border-gray-300 bg-white px-4 py-3 text-sm text-[#101d33] outline-none focus:border-[#101d33] transition"
                        >

                    </div>


                    {{-- Publisher --}}
                    <div>

                        <label
                            for="publisher"
                            class="block text-[10px] tracking-widest uppercase text-gray-600 mb-2"
                        >
                            Publisher
                        </label>

                        <input
                            id="publisher"
                            type="text"
                            name="publisher"
                            value="{{ old('publisher', $book->publisher) }}"
                            class="w-full border border-gray-300 bg-white px-4 py-3 text-sm text-[#101d33] outline-none focus:border-[#101d33] transition"
                        >

                    </div>


                    {{-- Publication Year --}}
                    <div>

                        <label
                            for="publication_year"
                            class="block text-[10px] tracking-widest uppercase text-gray-600 mb-2"
                        >
                            Publication Year
                        </label>

                        <input
                            id="publication_year"
                            type="number"
                            name="publication_year"
                            value="{{ old('publication_year', $book->publication_year) }}"
                            class="w-full border border-gray-300 bg-white px-4 py-3 text-sm text-[#101d33] outline-none focus:border-[#101d33] transition"
                        >

                    </div>


                    {{-- ISBN --}}
                    <div>

                        <label
                            for="isbn"
                            class="block text-[10px] tracking-widest uppercase text-gray-600 mb-2"
                        >
                            ISBN
                        </label>

                        <input
                            id="isbn"
                            type="text"
                            name="isbn"
                            value="{{ old('isbn', $book->isbn) }}"
                            class="w-full border border-gray-300 bg-white px-4 py-3 text-sm text-[#101d33] outline-none focus:border-[#101d33] transition"
                        >

                    </div>


                    {{-- Category --}}
                    <div>

                        <label
                            for="category"
                            class="block text-[10px] tracking-widest uppercase text-gray-600 mb-2"
                        >
                            Category *
                        </label>

                        <input
                            id="category"
                            type="text"
                            name="category"
                            value="{{ old('category', $book->category) }}"
                            required
                            class="w-full border border-gray-300 bg-white px-4 py-3 text-sm text-[#101d33] outline-none focus:border-[#101d33] transition"
                        >

                    </div>


                    {{-- Book Location --}}
                    <div>

                        <label
                            for="is_archive"
                            class="block text-[10px] tracking-widest uppercase text-gray-600 mb-2"
                        >
                            Lokasi Buku
                        </label>

                        <select
                            id="is_archive"
                            name="is_archive"
                            required
                            class="w-full border border-gray-300 bg-white px-4 py-3 text-sm text-[#101d33] outline-none focus:border-[#101d33] transition"
                        >
                            <option value="0" {{ old('is_archive', $book->is_archive) == 0 ? 'selected' : '' }}>
                                Books
                            </option>

                            <option value="1" {{ old('is_archive', $book->is_archive) == 1 ? 'selected' : '' }}>
                                Archive
                            </option>
                        </select>

                    </div>


                    {{-- Stock --}}
                    <div>

                        <label
                            for="physical_stock"
                            class="block text-[10px] tracking-widest uppercase text-gray-600 mb-2"
                        >
                            Physical Stock *
                        </label>

                        <input
                            id="physical_stock"
                            type="number"
                            name="physical_stock"
                            value="{{ old('physical_stock', $book->physical_stock) }}"
                            min="0"
                            required
                            class="w-full border border-gray-300 bg-white px-4 py-3 text-sm text-[#101d33] outline-none focus:border-[#101d33] transition"
                        >

                    </div>


                    {{-- Description --}}
                    <div class="md:col-span-2">

                        <label
                            for="description"
                            class="block text-[10px] tracking-widest uppercase text-gray-600 mb-2"
                        >
                            Description
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            rows="6"
                            class="w-full border border-gray-300 bg-white px-4 py-3 text-sm text-[#101d33] outline-none focus:border-[#101d33] transition resize-none"
                        >{{ old('description', $book->description) }}</textarea>

                    </div>

                </div>

            </div>

        </section>


        {{-- Current Book --}}
        <section class="border border-gray-200 bg-white mb-8">

            <div class="bg-[#f1eee8] px-6 py-5 border-b border-gray-200">

                <p class="text-[#c3a064] text-[10px] tracking-[0.3em] uppercase mb-1">
                    Current Collection
                </p>

                <h2 class="font-serif text-2xl text-[#101d33]">
                    Book Preview
                </h2>

            </div>


            <div class="p-6 md:p-8 flex flex-col sm:flex-row gap-6 items-start">

                {{-- Cover --}}
                @if($book->cover)

                    <img
                        src="{{ asset('storage/' . $book->cover) }}"
                        alt="{{ $book->title }}"
                        class="w-28 h-40 object-cover border border-gray-200"
                    >

                @else

                    <div class="w-28 h-40 bg-[#f1eee8] border border-gray-200 flex items-center justify-center">

                        <span class="text-[10px] text-gray-400 text-center">
                            NO<br>
                            COVER
                        </span>

                    </div>

                @endif


                {{-- Info --}}
                <div>

                    <p class="text-[10px] text-gray-400 uppercase tracking-widest mb-2">
                        Currently Editing
                    </p>

                    <h3 class="font-serif text-2xl text-[#101d33] mb-2">
                        {{ $book->title }}
                    </h3>

                    <p class="text-sm text-gray-600 mb-3">
                        {{ $book->author }}
                    </p>

                    <span class="inline-block bg-[#f1eee8] text-[#101d33] px-3 py-1 text-[10px]">
                        {{ $book->category }}
                    </span>

                </div>

            </div>

        </section>


        {{-- Actions --}}
        <div class="flex flex-col-reverse sm:flex-row justify-between items-center gap-4">

            <a
                href="{{ route('admin.books.index') }}"
                class="w-full sm:w-auto text-center
                       border border-gray-300
                       text-gray-600
                       px-6 py-3
                       text-[10px]
                       tracking-widest
                       hover:border-[#101d33]
                       hover:text-[#101d33]
                       transition"
            >
                CANCEL
            </a>


            <button
                type="button"
                onclick="openConfirmModal()"
                class="w-full sm:w-auto
                       bg-[#101d33]
                       text-white
                       px-7 py-3
                       text-[10px]
                       tracking-widest
                       hover:bg-[#1c2d48]
                       transition
                       cursor-pointer"
            >
                CONFIRM CHANGES
            </button>

        </div>

    </form>


    {{-- Bottom Information --}}
    <div class="mt-12 bg-[#f1eee8] px-8 py-8">

        <p class="text-[#c3a064] text-[10px] tracking-[0.3em] uppercase mb-3">
            WestMinster Library
        </p>

        <h2 class="font-serif text-2xl text-[#101d33] mb-2">
            Keep Every Detail Accurate.
        </h2>

        <p class="text-xs text-gray-600 max-w-2xl leading-5">
            Accurate book information helps visitors discover
            and enjoy the Westminster Library collection.
        </p>

    </div>

</div>

{{-- Update Confirmation Modal --}}
<div id="confirmModal" class="hidden fixed inset-0 bg-black/20 flex items-center justify-center z-50 p-4">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-sm w-full">
        <h3 class="font-serif text-2xl text-[#101d33] mb-2">
            Confirm Changes?
        </h3>

        <p class="text-sm text-gray-500 mb-1">
            {{ $book->title }}
        </p>

        <p class="text-sm text-gray-600 mb-6">
            Are you sure you want to save changes to this book?
        </p>

        <div class="flex gap-3">
            <button
                type="button"
                onclick="closeConfirmModal()"
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

            <button
                type="button"
                onclick="submitEditForm()"
                class="flex-1
                       bg-[#101d33]
                       text-white
                       px-4 py-2
                       text-[10px]
                       tracking-widest
                       hover:bg-[#1c2d48]
                       transition
                       cursor-pointer"
            >
                CONFIRM
            </button>
        </div>
    </div>
</div>

<script>
    function openConfirmModal() {
        const form = document.getElementById('editBookForm');
        if (!form.reportValidity()) {
            return;
        }
        document.getElementById('confirmModal').classList.remove('hidden');
    }

    function closeConfirmModal() {
        document.getElementById('confirmModal').classList.add('hidden');
    }

    function submitEditForm() {
        document.getElementById('editBookForm').submit();
    }

    // Handle form submit (e.g. if Enter key is pressed in an input)
    document.getElementById('editBookForm')?.addEventListener('submit', function(event) {
        event.preventDefault();
        openConfirmModal();
    });

    // Close modal when clicking outside
    document.getElementById('confirmModal')?.addEventListener('click', function(event) {
        if (event.target === this) {
            closeConfirmModal();
        }
    });

    // Close modal on Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeConfirmModal();
        }
    });
</script>

@endsection