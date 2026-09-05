@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <section class="bg-[#f7f4ef] px-6 py-16 md:px-16 md:py-20">
        <div class="mx-auto max-w-3xl">
            <div class="mb-10 flex items-center gap-5">
                <div class="flex h-20 w-20 items-center justify-center rounded-full bg-[#D6A84F] text-3xl font-bold text-[#16213A]">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#A16207]">Your Account</p>
                    <h1 class="mt-1 font-serif text-4xl text-[#16213A]">Profile</h1>
                </div>
            </div>

            @if (session('status'))
                <div class="mb-6 border border-green-200 bg-green-50 px-5 py-4 text-sm text-green-700">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->updateProfileInformation->any())
                <div class="mb-6 border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-700">
                    <ul class="space-y-1">
                        @foreach ($errors->updateProfileInformation->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white p-6 shadow-sm md:p-8">
                <h2 class="font-serif text-2xl text-[#16213A]">Personal Information</h2>
                <p class="mt-2 text-sm text-gray-600">Update the information connected to your library account.</p>

                <form method="POST" action="/user/profile-information" class="mt-8 space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="name" class="mb-2 block text-sm font-medium text-[#16213A]">Name</label>
                        <input id="name" name="name" type="text" value="{{ old('name', auth()->user()->name) }}" required class="w-full rounded-md border border-gray-300 px-4 py-3 text-sm text-gray-700 focus:border-[#D6A84F] focus:outline-none focus:ring-1 focus:ring-[#D6A84F]">
                    </div>

                    <div>
                        <label for="email" class="mb-2 block text-sm font-medium text-[#16213A]">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email', auth()->user()->email) }}" required class="w-full rounded-md border border-gray-300 px-4 py-3 text-sm text-gray-700 focus:border-[#D6A84F] focus:outline-none focus:ring-1 focus:ring-[#D6A84F]">
                    </div>

                    <button type="submit" class="rounded-md bg-[#16213A] px-6 py-3 text-sm font-semibold text-white transition hover:bg-[#26375e]">
                        Save Changes
                    </button>
                </form>
            </div>

            <div class="mt-6 flex items-center justify-between gap-4 border-t border-gray-300 pt-6">
                <div>
                    <h2 class="font-serif text-2xl text-[#16213A]">Sign out</h2>
                    <p class="mt-1 text-sm text-gray-600">End your current Westminster session.</p>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="rounded-md bg-red-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-red-700">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection