<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://unpkg.com/@phosphor-icons/web@2.1.1"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Sign Up</title>
</head>

<body class="bg-slate-100">
    <div class="bg-white flex flex-col w-full md:w-1/2 xl:w-2/5 2xl:w-2/5 3xl:w-1/3 mx-auto p-8 md:p-10 2xl:p-12 3xl:p-14 my-20 rounded-2xl shadow-xl">
        <div class="flex flex-row gap-3">
            <div class="flex justify-center w-full">
                <i class="text-5xl text-amber-500 ph-bold ph-chef-hat"></i>
            </div>
        </div>

        <form method="POST" action="{{ route('register') }}" class="flex flex-col">
            @csrf

            {{-- Name --}}
            <div class="mt-8">
                <label for="name" class="block text-sm font-medium text-black">Name</label>
                <div class="mt-2 relative text-gray-400">
                    <span class="absolute inset-y-0 left-0 flex items-center p-1 pl-3"><i class="ph-bold ph-user"></i></span>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        class="pl-12 mb-2 bg-gray-50 text-gray-600 border border-gray-300 sm:text-sm rounded-lg focus:ring-1 focus:ring-gray-400 block w-full p-2.5"
                        placeholder="Your Name" required autofocus autocomplete="name" maxlength="50" pattern="[A-Za-z0-9 ]+">
                </div>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mt-2">
                <label for="email" class="block text-sm font-medium text-black">Email</label>
                <div class="mt-2 relative text-gray-400">
                    <span class="absolute inset-y-0 left-0 flex items-center p-1 pl-3"><i class="ph-bold ph-envelope-simple"></i></span>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="pl-12 mb-2 bg-gray-50 text-gray-600 border border-gray-300 sm:text-sm rounded-lg focus:ring-1 focus:ring-gray-400 block w-full p-2.5"
                        placeholder="Email Address" required autocomplete="username" maxlength="40" pattern="[A-Za-z0-9@.]+">
                </div>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mt-2">
                <label for="password" class="block text-sm font-medium text-black">Password</label>
                <div class="mt-2 relative text-gray-400">
                    <span class="absolute inset-y-0 left-0 flex items-center p-1 pl-3"><i class="ph-bold ph-key"></i></span>
                    <input type="password" name="password" id="password"
                        class="pl-12 mb-2 bg-gray-50 text-gray-600 border border-gray-300 sm:text-sm rounded-lg focus:ring-1 focus:ring-gray-400 block w-full p-2.5"
                        placeholder="••••••••••" required autocomplete="new-password" maxlength="25" pattern="[A-Za-z0-9]+">
                </div>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="mt-2">
                <label for="password_confirmation" class="block text-sm font-medium text-black">Confirm Password</label>
                <div class="mt-2 relative text-gray-400">
                    <span class="absolute inset-y-0 left-0 flex items-center p-1 pl-3"><i class="ph-bold ph-key"></i></span>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="pl-12 mb-2 bg-gray-50 text-gray-600 border border-gray-300 sm:text-sm rounded-lg focus:ring-1 focus:ring-gray-400 block w-full p-2.5"
                        placeholder="••••••••••" required autocomplete="new-password" maxlength="25" pattern="[A-Za-z0-9]+">
                </div>
                @error('password_confirmation')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Terms --}}
            <div class="mt-2 flex items-center">
                <input type="checkbox" name="terms" id="terms" class="form-checkbox">
                <label for="terms" class="ms-2 text-sm text-gray-600">I agree to the <a href="" class="underline hover:text-gray-900">Terms of Service</a> and <a href="" class="underline hover:text-gray-900">Privacy Policy</a></label>
            </div>

            {{-- Submit --}}
            <button type="submit"
                class="mt-8 w-full text-white bg-black focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center hover:cursor-pointer">
                Sign Up
            </button>

            {{-- Login link --}}
            <div class="mt-8 flex justify-center">
                <a href="{{ route('login') }}" class="text-sm text-gray-500 hover:text-gray-900 hover:underline">Already have an account? Login</a>
            </div>
        </form>

        {{-- OR separator --}}
        <div class="relative flex py-8 items-center">
            <div class="flex-grow border-t border-gray-200"></div>
            <span class="flex-shrink mx-4 font-medium text-gray-500">OR</span>
            <div class="flex-grow border-t border-gray-200"></div>
        </div>

        {{-- Social login --}}
        <div class="flex gap-2 justify-center">
            <a href="" class="flex items-center gap-2 bg-black py-2 px-4 rounded-md text-gray-200">
                <i class="ph-bold ph-google-logo"></i>
                <span>Google</span>
            </a>
        </div>
    </div>
</body>
</html>
