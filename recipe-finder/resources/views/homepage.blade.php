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
<header>
    @include('navbar')
</header>
<section class="my-12 mx-20">
<!-- <section class="my-16 w-full max-w-screen-xl mx-auto"> -->
    <div class="relative h-56 overflow-hidden rounded-4xl md:h-96">
        <img class="relative bottom-4" src="/images/Pork Adobo.jpg" alt="">
        <div class="absolute top-20 left-20">
            <h1 class="text-3xl font-semibold text-shadow-xs text-shadow-black text-amber-400">Trending now</h1>
            <h2 class="text-6xl font-bold text-shadow-xs/30 text-shadow-black text-white">Pork Adobo</h2>
        </div>
        <div class="flex absolute bottom-12 -translate-x-1/2 left-1/2 space-x-2">
            <button class="w-3 h-3"><i class="text-7xl text-amber-400 opacity-100 ph-bold ph-dot"></i></button>
            <button class="w-3 h-3"><i class="text-7xl text-white opacity-75 ph-bold ph-dot"></i></button>
            <button class="w-3 h-3"><i class="text-7xl text-white opacity-75 ph-bold ph-dot"></i></button>
            <button class="w-3 h-3"><i class="text-7xl text-white opacity-75 ph-bold ph-dot"></i></button>
            <button class="w-3 h-3"><i class="text-7xl text-white opacity-75 ph-bold ph-dot"></i></button>
        </div>
    </div>
</section>

<section class="my-16 mx-20">
<!-- <section class="my-16 w-full max-w-screen-xl mx-auto"> -->
    <div class="grid grid-cols-4">
        <div class="col-span-1">
        <form method="GET" id="filterForm">
    <!-- Cuisines -->
    <h1 class="text-xl font-medium">Cuisines</h1>
    @foreach($areas['data']['meals'] as $index => $area)
        <div class="{{ $index >= 5 ? 'hidden cuisine-extra' : '' }}">
            <input 
                type="checkbox" 
                name="area[]" 
                value="{{ $area['strArea'] }}" 
                onchange="this.form.submit()"
                {{ is_array(request('area')) && in_array($area['strArea'], request('area')) ? 'checked' : '' }}>
            <label>{{ $area['strArea'] }}</label><br>
        </div>
    @endforeach
    @if(count($areas['data']['meals']) > 5)
        <button type="button" id="toggleCuisine" class="text-blue-600 hover:underline mt-1">See more</button>
    @endif

    <!-- Meal Types -->
    <h1 class="text-xl font-medium mt-6">Meal Types</h1>
    @foreach($categories['data']['categories'] as $index => $category)
        <div class="{{ $index >= 5 ? 'hidden category-extra' : '' }}">
            <input 
                type="checkbox" 
                name="category[]" 
                value="{{ $category['strCategory'] }}" 
                onchange="this.form.submit()"
                {{ is_array(request('category')) && in_array($category['strCategory'], request('category')) ? 'checked' : '' }}>
            <label>{{ $category['strCategory'] }}</label><br>
        </div>
    @endforeach
    @if(count($categories['data']['categories']) > 5)
        <button type="button" id="toggleCategory" class="text-blue-600 hover:underline mt-1">See more</button>
    @endif
</form>


        </div>
        <div class="col-span-3">
            <div class="grid grid-cols-3 gap-4">
            @foreach($meals as $meal)
                <div class="bg-white rounded-2xl shadow-md overflow-hidden">
                    <a href="#">
                        <img src="{{ $meal['strMealThumb'] }}" alt="{{ $meal['strMeal'] }}" class="w-full h-48 p-2 rounded-2xl object-cover">
                    </a>
                    <div class="flex justify-between px-4 pb-8">
                        <div>
                            <p class="text-sm text-slate-500">Food</p>
                            <h1 class="text-xl font-bold">{{ $meal['strMeal'] }}</h1>
                            <!-- <h2 class="text-xl font-semibold text-amber-500">30 Mins</h2> -->
                        </div>
                        <div class="flex flex-col justify-between items-end">
                            <div class="flex items-center space-x-2">
                                <i class="ph-fill ph-star text-yellow-400"></i>
                                <p class="text-sm text-slate-500">4.9</p> <!-- Optional: static rating -->
                            </div>
                            <i class="text-2xl ph-bold ph-heart"></i>
                        </div>
                    </div>
                </div>
            @endforeach

                
            </div>
        </div>
    </div>
</section>


@include('footer')
<script>
    const toggleCuisine = document.getElementById('toggleCuisine');
    const cuisineExtras = document.querySelectorAll('.cuisine-extra');
    let cuisineExpanded = false;

    toggleCuisine?.addEventListener('click', () => {
        cuisineExpanded = !cuisineExpanded;
        cuisineExtras.forEach(el => el.classList.toggle('hidden'));
        toggleCuisine.textContent = cuisineExpanded ? 'See less' : 'See more';
    });

    const toggleCategory = document.getElementById('toggleCategory');
    const categoryExtras = document.querySelectorAll('.category-extra');
    let categoryExpanded = false;

    toggleCategory?.addEventListener('click', () => {
        categoryExpanded = !categoryExpanded;
        categoryExtras.forEach(el => el.classList.toggle('hidden'));
        toggleCategory.textContent = categoryExpanded ? 'See less' : 'See more';
    });
</script>

</body>
</html>