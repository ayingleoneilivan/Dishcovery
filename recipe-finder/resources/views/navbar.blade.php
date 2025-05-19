<nav class="py-4 px-40 bg-black text-white">
    <div class="flex justify-between items-center">
        <!-- Logo -->
        <div class="flex space-x-2 items-center">
            <i class="text-4xl text-amber-500 ph ph-chef-hat"></i>
            <h1 class="text-2xl font-medium tracking-wider">
                <span class="text-amber-500">Dish</span>covery
            </h1>
        </div>

        <!-- Nav Links -->
        <ul class="flex space-x-12 text-lg">
            <li></li>
            <li></li>
            <a href="{{ route('meals.index') }}"><li>Home</li></a>
            <a href="{{ route('about') }}"><li>About</li></a>
        </ul>

        <!-- Search Bar -->
        <div class="flex justify-between items-center w-1/2 rounded-sm text-slate-500 bg-white">
            <form action="{{ route('meals.index') }}" method="GET" class="flex w-full bg-white rounded-sm overflow-hidden">
                <!-- Input field on the left -->
                <input
                    type="text"
                    name="search"
                    placeholder="Search meals..."
                    value="{{ request('search') }}"
                    class="flex-grow px-4 py-2 text-black placeholder:text-gray-400 focus:outline-none"
                    required
                />

                <!-- Button on the right -->
                <button type="submit" class="px-4 bg-amber-500 text-white hover:bg-amber-600 transition-colors">
                    <i class="ph ph-magnifying-glass text-xl"></i>
                </button>
            </form>
        </div>

        <!-- Icons -->
        <div class="flex space-x-4 items-center relative">
            <a class="text-2xl" href="{{ route('favorites.index') }}">
                <i class="ph ph-heart"></i>
            </a>

            <!-- Dropdown wrapper (hover stays active here) -->
            <div class="relative group">
                <button class="text-2xl focus:outline-none">
                    <i class="ph ph-user"></i>
                </button>

                <!-- Dropdown content -->
                <div class="absolute right-0 mt-2 w-40 bg-white text-black rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-150 z-50">
                    @if (Route::has('login'))
                        @auth            
                            <a href="" class="block px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-100">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" style="cursor: pointer;" class="block w-full text-left px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-100">
                                    Logout
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="block px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-100">Login</a>
                            <a href="{{ route('register') }}" class="block px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-100">Register</a>
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>
