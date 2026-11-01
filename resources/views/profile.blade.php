
@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <section class="min-h-screen bg-[#f7f4ef] px-5 py-8 md:px-8 md:py-10">
        <div class="mx-auto max-w-3xl">

            {{-- Profile Header --}}
            <div class="mb-7 flex items-center gap-4">
                <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-full bg-[#D6A84F] text-2xl font-semibold text-[#16213A]">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>

                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-[#A16207]">
                        Your Account
                    </p>

                    <h1 class="mt-1 text-2xl font-semibold text-[#16213A]">
                        Welcome back, {{ auth()->user()->name }}
                    </h1>

                    <p class="mt-1 text-sm text-[#536079]">
                        Manage your library membership and activity.
                    </p>
                </div>
            </div>

            {{-- Success Message --}}
            @if (session('status'))
                <div class="mb-4 border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                    {{ session('status') }}
                </div>
            @endif

            {{-- Validation Errors --}}
            @if ($errors->updateProfileInformation->any())
                <div class="mb-4 border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                    <ul class="space-y-1">
                        @foreach ($errors->updateProfileInformation->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Borrowing Statistics --}}
            <div class="mb-5 grid grid-cols-1 gap-3 sm:grid-cols-3">

                <div class="rounded-lg border border-[#E5DED3] bg-white p-4">
                    <div class="mb-2 flex items-center gap-2 text-[#A16207]">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 4.5A2.5 2.5 0 0 1 7.5 2H20v18H7.5A2.5 2.5 0 0 1 5 17.5z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 17.5A2.5 2.5 0 0 1 7.5 15H20M9 2v13"/>
                        </svg>
                        <span class="text-xs text-[#536079]">Borrowed</span>
                    </div>

                    <p class="text-xl font-semibold text-[#16213A]">
                        {{ $currentlyBorrowed ?? 0 }}
                    </p>
                </div>

                <div class="rounded-lg border border-[#E5DED3] bg-white p-4">
                    <div class="mb-2 flex items-center gap-2 text-[#A16207]">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="9" stroke-width="1.8"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 7v5l3 2"/>
                        </svg>
                        <span class="text-xs text-[#536079]">Pending</span>
                    </div>

                    <p class="text-xl font-semibold text-[#16213A]">
                        {{ $pendingRequests ?? 0 }}
                    </p>
                </div>

                <div class="rounded-lg border border-[#E5DED3] bg-white p-4">
                    <div class="mb-2 flex items-center gap-2 text-[#A16207]">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 5H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-4"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m8 12 2 2 4-4M8 17h8M9 3h6v5H9z"/>
                        </svg>
                        <span class="text-xs text-[#536079]">Total Borrowed</span>
                    </div>

                    <p class="text-xl font-semibold text-[#16213A]">
                        {{ $totalBorrowed ?? 0 }}
                    </p>
                </div>

            </div>

            {{-- Personal Information --}}
            <div class="border border-[#E5DED3] bg-white p-5 md:p-6">
                <div class="mb-5">
                    <h2 class="font-serif text-xl text-[#16213A]">
                        Personal Information
                    </h2>

                    <p class="mt-1 text-sm text-[#536079]">
                        Update your library account information.
                    </p>
                </div>

                <form method="POST"
                      action="/user/profile-information"
                      class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="name" class="mb-1.5 block text-sm font-medium text-[#16213A]">
                            Full Name
                        </label>

                        <input
                            id="name"
                            name="name"
                            type="text"
                            value="{{ old('name', auth()->user()->name) }}"
                            required
                            class="w-full rounded-md border border-[#D5D9E1] bg-white px-3 py-2.5 text-sm text-[#16213A] focus:border-[#D6A84F] focus:outline-none focus:ring-1 focus:ring-[#D6A84F]">
                    </div>

                    <div>
                        <label for="email" class="mb-1.5 block text-sm font-medium text-[#16213A]">
                            Email Address
                        </label>

                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email', auth()->user()->email) }}"
                            required
                            class="w-full rounded-md border border-[#D5D9E1] bg-white px-3 py-2.5 text-sm text-[#16213A] focus:border-[#D6A84F] focus:outline-none focus:ring-1 focus:ring-[#D6A84F]">
                    </div>

                    <div class="pt-1">
                        <button
                            type="submit"
                            class="rounded-md bg-[#16213A] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#26375e]">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>

            {{-- Account Actions --}}
            <div class="mt-5 flex items-center justify-between gap-4 border-t border-[#D5D9E1] pt-5">
                <div>
                    <h2 class="text-base font-semibold text-[#16213A]">
                        Sign out
                    </h2>
                    <p class="mt-1 text-sm text-[#536079]">
                        End your current session.
                    </p>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="rounded-md border border-red-200 px-4 py-2 text-sm font-medium text-red-600 transition hover:bg-red-50">
                        Logout
                    </button>
                </form>
            </div>

        </div>
    </section>
@endsection
