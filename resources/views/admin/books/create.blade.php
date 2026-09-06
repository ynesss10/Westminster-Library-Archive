@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')

<div class="max-w-6xl mx-auto px-6 py-12">

    {{-- Header --}}
    <section class="mb-10">
        <p class="text-[#c3a064] text-[10px] tracking-[0.3em] uppercase mb-3">
            Library Administration
        </p>

        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4">
            <div>
                <h1 class="font-serif text-4xl text-[#101d33] mb-3">
                    Add New Book
                </h1>

                <p class="text-sm text-gray-500 max-w-xl leading-6">
                    Add a new book to the WestMinster Library collection
                    and complete the information below.
                </p>
            </div>

            <a href="{{ route('admin.books.index') }}"
               class="text-[10px] tracking-widest text-[#101d33] border border-gray-300 px-5 py-3 hover:bg-[#101d33] hover:text-white transition text-center">
                 BACK TO BOOKS
            </a>
        </div>
    </section>


    {{-- Error Alert --}}
    @if($errors->any())
        <div class="mb-8 border border-red-200 bg-red-50 px-6 py-5">
            <p class="text-xs font-medium text-red-700 mb-3">
                Please fix the following errors:
            </p>

            <ul class="space-y-1">
                @foreach($errors->all() as $error)
                    <li class="text-xs text-red-600">
                        • {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- Form --}}
    <form action="{{ route('admin.books.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Main Information --}}
            <div class="lg:col-span-2">

                <div class="bg-white border border-gray-200">

                    <div class="bg-[#f1eee8] px-7 py-6 border-b border-gray-200">
                        <p class="text-[#c3a064] text-[10px] tracking-[0.3em] uppercase mb-2">
                            Book Information
                        </p>

                        <h2 class="font-serif text-2xl text-[#101d33]">
                            Basic Details
                        </h2>
                    </div>

                    <div class="p-7 space-y-6">

                        {{-- Title --}}
                        <div>
                            <label class="block text-[11px] tracking-widest uppercase text-gray-500 mb-2">
                                Judul Buku
                            </label>

                            <input type="text"
                                   name="title"
                                   value="{{ old('title') }}"
                                   required
                                   class="w-full border border-gray-300 px-4 py-3 text-sm text-[#101d33] focus:outline-none focus:border-[#c3a064] transition"
                                   placeholder="Masukkan judul buku">
                        </div>


                        {{-- Author + Publisher --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                            <div>
                                <label class="block text-[11px] tracking-widest uppercase text-gray-500 mb-2">
                                    Penulis
                                </label>

                                <input type="text"
                                       name="author"
                                       value="{{ old('author') }}"
                                       required
                                       class="w-full border border-gray-300 px-4 py-3 text-sm text-[#101d33] focus:outline-none focus:border-[#c3a064] transition"
                                       placeholder="Nama penulis">
                            </div>

                            <div>
                                <label class="block text-[11px] tracking-widest uppercase text-gray-500 mb-2">
                                    Penerbit
                                </label>

                                <input type="text"
                                       name="publisher"
                                       value="{{ old('publisher') }}"
                                       class="w-full border border-gray-300 px-4 py-3 text-sm text-[#101d33] focus:outline-none focus:border-[#c3a064] transition"
                                       placeholder="Nama penerbit">
                            </div>

                        </div>


                        {{-- Year + ISBN --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                            <div>
                                <label class="block text-[11px] tracking-widest uppercase text-gray-500 mb-2">
                                    Tahun Terbit
                                </label>

                                <input type="number"
                                       name="publication_year"
                                       value="{{ old('publication_year') }}"
                                       class="w-full border border-gray-300 px-4 py-3 text-sm text-[#101d33] focus:outline-none focus:border-[#c3a064] transition"
                                       placeholder="Contoh: 2026">
                            </div>

                            <div>
                                <label class="block text-[11px] tracking-widest uppercase text-gray-500 mb-2">
                                    ISBN
                                </label>

                                <input type="text"
                                       name="isbn"
                                       value="{{ old('isbn') }}"
                                       class="w-full border border-gray-300 px-4 py-3 text-sm text-[#101d33] focus:outline-none focus:border-[#c3a064] transition"
                                       placeholder="Nomor ISBN">
                            </div>

                        </div>


                        {{-- Category --}}
                        <div>
                            <label class="block text-[11px] tracking-widest uppercase text-gray-500 mb-2">
                                Kategori
                            </label>

                            <input type="text"
                                   name="category"
                                   value="{{ old('category') }}"
                                   required
                                   class="w-full border border-gray-300 px-4 py-3 text-sm text-[#101d33] focus:outline-none focus:border-[#c3a064] transition"
                                   placeholder="Contoh: Fiction, Technology, History">
                        </div>


                        {{-- Description --}}
                        <div>
                            <label class="block text-[11px] tracking-widest uppercase text-gray-500 mb-2">
                                Deskripsi
                            </label>

                            <textarea name="description"
                                      rows="6"
                                      class="w-full border border-gray-300 px-4 py-3 text-sm text-[#101d33] focus:outline-none focus:border-[#c3a064] transition resize-none"
                                      placeholder="Masukkan deskripsi buku...">{{ old('description') }}</textarea>
                        </div>

                    </div>

                </div>

            </div>


            {{-- Side Information --}}
            <div class="space-y-6">

                {{-- Stock --}}
                <div class="bg-white border border-gray-200">

                    <div class="bg-[#f1eee8] px-6 py-5 border-b border-gray-200">
                        <p class="text-[#c3a064] text-[10px] tracking-[0.3em] uppercase">
                            Collection
                        </p>

                        <h2 class="font-serif text-xl text-[#101d33] mt-1">
                            Availability
                        </h2>
                    </div>

                    <div class="p-6 space-y-5">

                        <div>
                            <label class="block text-[11px] tracking-widest uppercase text-gray-500 mb-2">
                                Stok Buku Fisik
                            </label>

                            <input type="number"
                                   name="physical_stock"
                                   value="{{ old('physical_stock', 0) }}"
                                   min="0"
                                   required
                                   class="w-full border border-gray-300 px-4 py-3 text-sm text-[#101d33] focus:outline-none focus:border-[#c3a064] transition">
                        </div>


                        <div>
                            <label for="is_archive"
                                   class="block text-[11px] tracking-widest uppercase text-gray-500 mb-2">
                                Lokasi Buku
                            </label>

                            <select name="is_archive"
                                    id="is_archive"
                                    required
                                    class="w-full border border-gray-300 px-4 py-3 text-sm text-[#101d33] bg-white focus:outline-none focus:border-[#c3a064] transition">

                                <option value="0" {{ old('is_archive', '0') == '0' ? 'selected' : '' }}>
                                    Books
                                </option>

                                <option value="1" {{ old('is_archive') == '1' ? 'selected' : '' }}>
                                    Archive
                                </option>

                            </select>
                        </div>

                    </div>

                </div>


                {{-- Files --}}
                <div class="bg-[#f1eee8] border border-[#e2ded6]">

                    <div class="px-6 py-5">
                        <p class="text-[#c3a064] text-[10px] tracking-[0.3em] uppercase mb-2">
                            Digital Assets
                        </p>

                        <h2 class="font-serif text-xl text-[#101d33]">
                            Book Files
                        </h2>
                    </div>

                    <div class="px-6 pb-6 space-y-5">

                        {{-- Cover --}}
                        <div>
                            <label class="block text-[11px] tracking-widest uppercase text-gray-500 mb-2">
                                Cover Buku
                            </label>

                            <input type="file"
                                   name="cover"
                                   accept=".jpg,.jpeg,.png,.webp"
                                   class="w-full text-xs text-gray-500
                                          file:mr-3
                                          file:border-0
                                          file:bg-[#101d33]
                                          file:text-white
                                          file:px-4
                                          file:py-2
                                          file:text-[10px]
                                          file:tracking-widest
                                          file:cursor-pointer
                                          hover:file:bg-[#1c2d48]">

                            <p class="text-[10px] text-gray-400 mt-2">
                                JPG, JPEG, PNG, atau WEBP
                            </p>
                        </div>


                        {{-- Digital File --}}
                        <div>
                            <label class="block text-[11px] tracking-widest uppercase text-gray-500 mb-2">
                                File Buku Digital
                            </label>

                            <input type="file"
                                   name="digital_file"
                                   accept=".pdf"
                                   class="w-full text-xs text-gray-500
                                          file:mr-3
                                          file:border-0
                                          file:bg-[#101d33]
                                          file:text-white
                                          file:px-4
                                          file:py-2
                                          file:text-[10px]
                                          file:tracking-widest
                                          file:cursor-pointer
                                          hover:file:bg-[#1c2d48]">

                            <p class="text-[10px] text-gray-400 mt-2">
                                File PDF
                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Action --}}
        <div class="mt-8 bg-[#101d33] px-7 py-6 flex flex-col sm:flex-row items-center justify-between gap-5">

            <div>
                <p class="text-[#c3a064] text-[10px] tracking-[0.3em] uppercase mb-1">
                    WestMinster Library
                </p>

                <p class="text-gray-300 text-xs">
                    Make sure all book information is correct before saving.
                </p>
            </div>

            <div class="flex gap-3 w-full sm:w-auto">

                <a href="{{ route('admin.books.index') }}"
                   class="flex-1 sm:flex-none border border-white/30 text-white text-[10px] tracking-widest text-center px-6 py-3 hover:bg-white hover:text-[#101d33] transition">
                    CANCEL
                </a>

                <button type="submit"
                        class="flex-1 sm:flex-none bg-[#c3a064] text-[#101d33] text-[10px] tracking-widest px-7 py-3 hover:bg-[#d2b77f] transition">
                    SAVE BOOK
                </button>

            </div>

        </div>

    </form>


    {{-- Bottom Info --}}
    <section class="mt-12 bg-[#f1eee8] px-8 py-10 md:px-12">

        <p class="text-[#c3a064] text-[10px] tracking-[0.3em] uppercase mb-3">
            WestMinster Library
        </p>

        <h2 class="font-serif text-3xl text-[#101d33] leading-tight mb-4">
            Build the Collection.<br>
            Preserve Knowledge.
        </h2>

        <p class="text-xs text-gray-600 max-w-lg leading-5">
            Add books to the collection and keep the WestMinster
            Library organized for every reader.
        </p>

    </section>

</div>

@endsection