<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://unpkg.com/@phosphor-icons/web@2.1.1"></script>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <title>Dishcovery</title>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <style>
    .text-shadow {
      text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.75);
    }
  </style>
</head>

<body class="bg-slate-100">
  <header>
    @include('navbar')
  </header>
  
  <section 
    class="my-10 px-4 sm:px-8 md:px-12 lg:px-20"
    x-data="mealCarousel"
    x-init="fetchMeals()"
  >
    <div class="relative overflow-hidden rounded-4xl h-[300px] md:h-[400px] lg:h-[500px]">

      <!-- Slides -->
      <template x-for="(meal, index) in meals" :key="meal.idMeal">
        <div 
          x-show="activeSlide === index"
          class="absolute inset-0 transition-opacity duration-700 ease-in-out"
          x-transition:enter="opacity-0"
          x-transition:enter-end="opacity-100"
        >
          <!-- Slide container with overlay -->
          <div class="relative w-full h-full rounded-4xl overflow-hidden">
            <img 
              :src="meal.strMealThumb" 
              :alt="meal.strMeal" 
              class="object-cover object-center w-full h-full"
            />
            <!-- Gradient overlay -->
            <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/30 to-transparent"></div>

            <!-- Text content -->
            <div class="absolute left-4 sm:left-10 md:left-20 top-1/4 z-30 max-w-xs sm:max-w-md">
              <h1 class="text-lg sm:text-2xl font-semibold text-amber-400 drop-shadow-lg mb-3">
                Featured Recipe
              </h1>
              <h2 
                class="text-3xl sm:text-5xl lg:text-6xl font-bold text-white drop-shadow-xl leading-tight mb-5"
                x-text="meal.strMeal"
              ></h2>
              <a 
                :href="`{{ url('/meal') }}/${meal.idMeal}`"
                class="inline-block px-5 py-3 bg-amber-400 text-black font-semibold rounded-xl shadow-md hover:bg-amber-500 transition"
              >
                View Recipe
              </a>
            </div>
          </div>
        </div>
      </template>

      <!-- Dot Buttons -->
      <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-20">
        <div class="flex space-x-2">
          <template x-for="(meal, index) in meals" :key="'dot-' + index">
            <button 
              class="w-2.5 h-2.5 rounded-full transition-all duration-200"
              @click="activeSlide = index"
              :class="activeSlide === index 
                ? 'bg-amber-400 scale-110 shadow-md' 
                : 'bg-white/70 hover:bg-amber-300'"
            ></button>
          </template>
        </div>
      </div>
    </div>
  </section>

  <section class="my-10 px-4 sm:px-8 md:px-12 lg:px-20">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
      <div class="md:col-span-1">
        <!-- Left filter (categories and cuisines) -->
        <form method="GET" id="filterForm" class="space-y-4">
        <!-- Cuisines -->
        <h1 class="text-xl font-medium">Cuisines</h1>
        @foreach($areas['data']['meals'] as $index => $area)
            <div class="{{ $index >= 15 ? 'hidden cuisine-extra mb-1' : 'mb-1' }}">
            <input 
                type="radio" 
                name="area[]" 
                value="{{ $area['strArea'] }}" 
                onchange="this.form.submit()"
                {{ is_array(request('area')) && in_array($area['strArea'], request('area')) ? 'checked' : '' }}
                id="area-{{ $index }}"
            >
            <label for="area-{{ $index }}" class="ml-2 cursor-pointer">{{ $area['strArea'] }}</label>
            </div>
        @endforeach
        @if(count($areas['data']['meals']) > 5)
            <button type="button" id="toggleCuisine" class="text-blue-600 hover:underline mt-1">See more</button>
        @endif

        <!-- Meal Types -->
        <h1 class="text-xl font-medium mt-6">Meal Types</h1>
        @foreach($categories['data']['categories'] as $index => $category)
            <div class="mb-1">
            <input 
                type="radio" 
                name="category[]" 
                value="{{ $category['strCategory'] }}" 
                onchange="this.form.submit()"
                {{ is_array(request('category')) && in_array($category['strCategory'], request('category')) ? 'checked' : '' }}
                id="category-{{ $index }}"
            >
            <label for="category-{{ $index }}" class="ml-2 cursor-pointer">{{ $category['strCategory'] }}</label>
            </div>
        @endforeach
        </form>
      </div>
      <div class="md:col-span-3">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          @foreach($meals as $meal)
            @php
              $isFavorite = auth()->check() && \App\Models\Favorite::where('user_id', auth()->id())
                  ->where('meal_id', $meal['idMeal'])
                  ->exists();
            @endphp
            <div class="bg-white rounded-2xl shadow-md overflow-hidden flex flex-col">
              <a href="{{ route('meal.details', ['id' => $meal['idMeal']]) }}">
                <img 
                  src="{{ $meal['strMealThumb'] }}" 
                  alt="{{ $meal['strMeal'] }}" 
                  class="w-full h-48 p-2 rounded-2xl object-cover"
                />
              </a>
                <div class="flex justify-between items-center px-4 pb-8 flex-grow">
                <div>
                    <p class="text-sm text-slate-500">Food</p>
                    <h1 class="text-xl font-bold">{{ $meal['strMeal'] }}</h1>
                </div>
                <button
                    class="favorite-btn mt-5"
                    style="cursor: pointer;"
                    data-meal-id="{{ $meal['idMeal'] }}" 
                    data-meal-name="{{ $meal['strMeal'] }}"
                    data-meal-thumb="{{ $meal['strMealThumb'] }}"
                    aria-label="Toggle favorite for {{ $meal['strMeal'] }}"
                >
                    <i class="text-2xl {{ $isFavorite ? 'ph-fill text-red-500' : 'ph-bold text-gray-400' }} ph-heart"></i>
                </button>
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

<script>
    document.querySelectorAll('.favorite-btn').forEach(button => {
        button.addEventListener('click', async function () {
            const mealId = this.dataset.mealId;
            const mealName = this.dataset.mealName;
            const mealThumb = this.dataset.mealThumb;
            const icon = this.querySelector('i');

            try {
                const res = await fetch("{{ route('favorite.toggle') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        meal_id: mealId,
                        meal_name: mealName,
                        meal_thumb: mealThumb
                    })
                });

                const data = await res.json();

                if (data.status === "added") {
                    icon.classList.remove('ph-bold', 'text-gray-400');
                    icon.classList.add('ph-fill', 'text-red-500');
                } else if (data.status === "removed") {
                    icon.classList.remove('ph-fill', 'text-red-500');
                    icon.classList.add('ph-bold', 'text-gray-400');
                }
            } catch (err) {
                alert("You need to login first.");
            }
        });
    });

    document.addEventListener('alpine:init', () => {
    Alpine.data('mealCarousel', () => ({
        meals: [],
        activeSlide: 0,

        async fetchMeals() {
        this.meals = [];

        while (this.meals.length < 5) {
            const res = await fetch('https://www.themealdb.com/api/json/v1/1/random.php');
            const data = await res.json();
            const meal = data.meals[0];

            // Only push meals with short names
            if (meal.strMeal.length <= 30) {
            // Prevent duplicates by ID
            if (!this.meals.some(m => m.idMeal === meal.idMeal)) {
                this.meals.push(meal);
            }
            }
        }

        this.startAutoSlide();
        },

        startAutoSlide() {
        setInterval(() => {
            this.activeSlide = (this.activeSlide + 1) % this.meals.length;
        }, 5000);
        }
    }));
    });
</script>
</body>
</html>