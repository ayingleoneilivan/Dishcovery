<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://unpkg.com/@phosphor-icons/web@2.1.1"></script>
    <title>Sign In - Recipe App</title>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100">
    <div class="bg-white flex flex-col w-full md:w-1/2 xl:w-2/5 2xl:w-2/5 3xl:w-1/3 mx-auto p-8 md:p-10 2xl:p-12 3xl:p-14 my-20 rounded-2xl shadow-xl">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="flex justify-center">
            <i class="text-5xl text-amber-500 ph-bold ph-chef-hat"></i>
        </div>

        <form method="POST" action="{{ route('login') }}" class="flex flex-col">
            @csrf

            <!-- Email Address -->
            <div class="mt-8">
                <label for="email" class="block text-sm font-medium text-black">Email</label>
                <div class="mt-2 relative text-gray-400">
                    <span class="absolute inset-y-0 left-0 flex items-center p-1 pl-3">
                        <i class="ph-bold ph-envelope-simple"></i>
                    </span>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus maxlength="40" pattern="[a-zA-Z0-9@.]*" class="pl-12 mb-2 bg-gray-50 text-gray-600 border border-gray-300 rounded-lg block w-full p-2.5 focus:outline-none focus:ring-1 focus:ring-gray-400" placeholder="Email Address">
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-2">
                <label for="password" class="block text-sm font-medium text-black">Password</label>
                <div class="mt-2 relative text-gray-400">
                    <span class="absolute inset-y-0 left-0 flex items-center p-1 pl-3">
                        <i class="ph-bold ph-key"></i>
                    </span>
                    <input type="password" id="password" name="password" required maxlength="25" pattern="[a-zA-Z0-9]*" class="pl-12 mb-2 bg-gray-50 text-gray-600 border border-gray-300 rounded-lg block w-full p-2.5 focus:outline-none focus:ring-1 focus:ring-gray-400" placeholder="••••••••••">
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <button type="submit" class="w-full mt-4 text-white bg-[#000000] rounded-lg text-sm px-5 py-2.5 text-center focus:ring-4 focus:ring-primary-300">Login</button>

            <div class="mt-8 flex justify-center">
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-sm text-gray-500 hover:text-gray-900 hover:underline">Don't have an account yet? Register</a>
                @endif
            </div>
        </form>
        <div class="relative flex py-8 items-center">
            <div class="flex-grow border-t border-gray-200"></div>
            <span class="flex-shrink mx-4 font-medium text-gray-500">OR</span>
            <div class="flex-grow border-t border-gray-200"></div>
        </div>

        <div class="flex gap-2 justify-center">
            <a href="" class="flex items-center gap-2 px-4 py-2 bg-black rounded-md text-gray-200">
                <i class="ph-bold ph-google-logo"></i>
                <span>Google</span>
            </a>
        </div>
    </div>
</body>
</html>