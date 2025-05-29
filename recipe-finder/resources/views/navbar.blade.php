<nav class="bg-black text-white py-5 px-4 sm:px-6 md:px-10 lg:px-32">
  <div class="flex justify-between items-center">

    <!-- Logo -->
    <div class="flex items-center space-x-2">
      <i class="text-3xl text-amber-500 ph ph-chef-hat"></i>
      <h1 class="text-xl sm:text-2xl font-semibold tracking-wide">
        <span class="text-amber-500">Dish</span>covery
      </h1>
    </div>

    <!-- Desktop Navigation Links -->
    <ul class="hidden md:flex space-x-4 lg:space-x-8 text-base lg:text-lg">
      <li><a href="{{ route('meals.index') }}" class="hover:text-amber-500 transition">Home</a></li>
      <li><a href="{{ route('about') }}" class="hover:text-amber-500 transition">About</a></li>
    </ul>

    <!-- Desktop Search -->
    <form action="{{ route('meals.index') }}" method="GET"
      class="hidden md:flex md:flex-grow md:max-w-md lg:max-w-lg mx-6 bg-white rounded overflow-hidden text-black">
      <input type="text" name="search" value="{{ request('search') }}" placeholder="Search meals..."
        class="flex-grow px-4 py-3 text-sm placeholder-gray-500 focus:outline-none" required />
      <button type="submit" class="px-4 bg-amber-500 text-white hover:bg-amber-600">
        <i class="ph ph-magnifying-glass text-xl"></i>
      </button>
    </form>

    <!-- Desktop Icons -->
    <div class="hidden md:flex items-center space-x-5">
      <a href="{{ route('favorites.index') }}" class="text-2xl">
        <i class="ph ph-heart"></i>
      </a>

      <!-- User Dropdown -->
      <div class="relative group">
        <button class="text-2xl focus:outline-none">
          <i class="ph ph-user"></i>
        </button>
        <div
          class="absolute right-0 mt-2 w-40 bg-white text-black rounded-md shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition duration-200 z-50">
          @if (Route::has('login'))
            @auth
              <a href="" class="block px-4 py-2 text-sm hover:bg-gray-100">Profile</a>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 text-sm hover:bg-gray-100">Logout</button>
              </form>
            @else
              <a href="{{ route('login') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">Login</a>
              <a href="{{ route('register') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">Register</a>
            @endauth
          @endif
        </div>
      </div>
    </div>

    <!-- Mobile Hamburger -->
    <button id="nav-toggle" class="md:hidden text-white focus:outline-none">
      <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>
  </div>

  <!-- Mobile Menu -->
  <div id="nav-menu" class="hidden md:hidden mt-4 space-y-4 px-2">
    <ul class="flex flex-col space-y-2 text-base">
      <li><a href="{{ route('meals.index') }}" class="hover:text-amber-500">Home</a></li>
      <li><a href="{{ route('about') }}" class="hover:text-amber-500">About</a></li>
    </ul>

    <form action="{{ route('meals.index') }}" method="GET"
      class="flex bg-white text-black rounded overflow-hidden mt-4">
      <input type="text" name="search" value="{{ request('search') }}" placeholder="Search meals..."
        class="flex-grow px-4 py-2 text-sm placeholder-gray-500 focus:outline-none" required />
      <button type="submit" class="px-4 bg-amber-500 text-white hover:bg-amber-600">
        <i class="ph ph-magnifying-glass text-xl"></i>
      </button>
    </form>

    <div class="flex space-x-6 items-center mt-4">
      <a href="{{ route('favorites.index') }}" class="text-2xl">
        <i class="ph ph-heart"></i>
      </a>

      <!-- Mobile User Dropdown -->
      <div class="relative group">
        <button class="text-2xl focus:outline-none">
          <i class="ph ph-user"></i>
        </button>
        <div
          class="absolute right-0 mt-2 w-40 bg-white text-black rounded-md shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition duration-200 z-50">
          @if (Route::has('login'))
            @auth
              <a href="" class="block px-4 py-2 text-sm hover:bg-gray-100">Profile</a>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 text-sm hover:bg-gray-100">Logout</button>
              </form>
            @else
              <a href="{{ route('login') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">Login</a>
              <a href="{{ route('register') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">Register</a>
            @endauth
          @endif
        </div>
      </div>
    </div>
  </div>
</nav>

<!-- JavaScript for mobile toggle -->
<script>
  document.getElementById('nav-toggle').addEventListener('click', function () {
    const menu = document.getElementById('nav-menu');
    menu.classList.toggle('hidden');
  });
</script>
