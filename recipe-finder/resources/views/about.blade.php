<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@phosphor-icons/web@2.1.1"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Dishcovery</title>
</head>
<body class="bg-slate-100">

    <!-- Navbar -->
    @include('navbar') <!-- since your file is navbar.blade.php -->

    <!-- Main Content -->
    <main>
<div class="max-w-6xl mx-auto px-6 py-12 text-gray-800">

    <!-- Header -->
    <h1 class="text-5xl font-extrabold text-amber-600 mb-8 text-center">About Dishcovery</h1>

    <!-- Introduction -->
    <p class="max-w-xl mx-auto text-lg mb-6 text-gray-700 leading-relaxed text-center">
        Welcome to <span class="font-bold text-amber-600">Dishcovery</span> — your go-to destination for discovering mouthwatering recipes tailored to your tastes and lifestyle. Whether you're a seasoned home chef or just starting your culinary journey, our platform empowers you to explore a wide variety of meals with ease, confidence, and creativity.
    </p>



    <!-- Mission Section -->
    <div class="bg-white p-6 rounded-xl shadow-md mb-10">
        <h2 class="text-2xl font-bold text-amber-500 mb-4">Our Mission</h2>
        <p class="text-gray-700 leading-relaxed">
            At Dishcovery, our mission is to make cooking easier and more enjoyable. We aim to empower everyone — from busy students to home cooks — to prepare tasty meals using the ingredients they already have. We believe food should be fun, inspiring, and accessible to all.
        </p>
    </div>

    <!-- How It Works Section -->
    <div class="bg-amber-50 p-6 rounded-xl shadow-inner mb-10">
        <h2 class="text-2xl font-bold text-amber-600 mb-4">How It Works</h2>
        <ul class="list-disc pl-6 text-gray-700 space-y-2">
            <li>Search recipes by ingredient, name, or meal category.</li>
            <li>Browse detailed instructions with cooking time and nutrition info.</li>
            <li>Save your favorite meals for quick access later.</li>
            <li>Get inspired daily with handpicked featured recipes.</li>
        </ul>
    </div>

    <!-- Features -->
    <div class="mb-12">
        <h2 class="text-2xl font-bold text-amber-600 mb-6">What Makes Dishcovery Special</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-5 rounded-lg shadow hover:shadow-lg transition">
                <i class="ph ph-magnifying-glass text-3xl text-amber-500 mb-4"></i>
                <h3 class="text-lg font-semibold mb-2">Smart Search</h3>
                <p class="text-sm text-gray-600">Find meals based on ingredients, time, and preferences.</p>
            </div>
            <div class="bg-white p-5 rounded-lg shadow hover:shadow-lg transition">
                <i class="ph ph-heart text-3xl text-amber-500 mb-4"></i>
                <h3 class="text-lg font-semibold mb-2">Save Favorites</h3>
                <p class="text-sm text-gray-600">Keep your favorite dishes one click away.</p>
            </div>
            <div class="bg-white p-5 rounded-lg shadow hover:shadow-lg transition">
                <i class="ph ph-bowl-food text-3xl text-amber-500 mb-4"></i>
                <h3 class="text-lg font-semibold mb-2">Diverse Recipes</h3>
                <p class="text-sm text-gray-600">From Filipino classics to international delights.</p>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="relative p-6 rounded-lg shadow-inner text-center bg-amber-100 overflow-hidden">
        <div 
            class="absolute inset-0 bg-cover bg-center opacity-70" 
            style="background-image: url('{{ asset('images/Pizza.jpg') }}');">
        </div>
        <div class="absolute inset-0 bg-black opacity-40"></div>
        <div class="relative z-10 text-white">
            <h2 class="text-2xl font-bold mb-2">Start Cooking Today</h2>
            <p class="mb-4">Sign up, search, and discover recipes that fit your cravings!</p>
            <a href="{{ route('meals.index') }}" class="inline-block bg-amber-600 px-6 py-2 rounded-full hover:bg-amber-700 transition">
                Browse Recipes
            </a>
        </div>
    </div>


</div>

    </main>

</body>
</html>