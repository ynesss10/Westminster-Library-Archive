<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen">

    <div class="min-h-screen flex">
        <div class="hidden lg:block lg:w-[55%]
                   bg-cover bg-center" style="background-image: url('{{ asset('images/register-bg.jpg') }}');">
        </div>

        <div class="w-full lg:w-[45%] bg-white flex flex-col">
            <div class="w-full max-w-md mx-auto px-8 -mt-20 lg:px-10">

                <div class="-mb-24">
                    <img src="{{ asset('images/logo.png') }}" alt="WestMinster Logo" class="w-100 -ml-12">
                </div>

                <div class="mb-5">
                    <h1 class="text-3xl md:text-4xl text-[#2D2058] font-serif">
                        Create an Account
                    </h1>
                </div>




                @if ($errors->any())
                    <div class="mb-5 rounded-lg bg-red-50 border border-red-200 p-4">
                        <ul class="text-sm text-red-600 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="/register" class="space-y-3">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm text-[#33285B] mb-1">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full h-9 px-3 rounded-full
                                   border border-[#E7C985]
                                   text-sm text-gray-700
                                   placeholder-[#E5CFA0]
                                   focus:outline-none
                                   focus:ring-1
                                   focus:ring-[#D9AE58]
                                   focus:border-[#D9AE58]">
                    </div>

                    <div>
                        <label for="email" class="block text-sm text-[#33285B] mb-1">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required class="w-full h-9 px-3 rounded-full
                                   border border-[#E7C985]
                                   text-sm text-gray-700
                                   placeholder-[#E5CFA0]
                                   focus:outline-none
                                   focus:ring-1
                                   focus:ring-[#D9AE58]
                                   focus:border-[#D9AE58]">
                    </div>

                    <div>
                        <label for="password" class="block text-sm text-[#33285B] mb-1">Password</label>
                        <input type="password" id="password" name="password" required class="w-full h-9 px-3 rounded-full
                                   border border-[#E7C985]
                                   text-sm text-gray-700
                                   placeholder-[#E5CFA0]
                                   focus:outline-none
                                   focus:ring-1
                                   focus:ring-[#D9AE58]
                                   focus:border-[#D9AE58]">
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm text-[#33285B] mb-1">
                            Confirm Password
                        </label>

                        <input type="password" id="password_confirmation" name="password_confirmation" required class="w-full h-9 px-3 rounded-full
                                   border border-[#E7C985]
                                   text-sm text-gray-700
                                   placeholder-[#E5CFA0]
                                   focus:outline-none
                                   focus:ring-1
                                   focus:ring-[#D9AE58]
                                   focus:border-[#D9AE58]
                                   mb-5">
                    </div>

                    <button type="submit" class="bg-[#D9AE58] text-white py-3 px-39 rounded-full hover:bg-[#C19A4B]
                               focus:outline-none focus:ring-2 focus:ring-[#D9AE58] focus:ring-offset-2 font-bold">
                        Create
                    </button>
                </form>

                <p class="text-center text-sm text-[#4B416C] mt-2">
                    Already have an account?
                    <a href="/login" class="underline hover:text-[#D19F3F]">Login</a>
                </p>

            </div>
        </div>

    </div>

</body>

</html>