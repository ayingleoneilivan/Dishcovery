<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://unpkg.com/@phosphor-icons/web@2.1.1"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>{{ $meal['strMeal'] }}</title>
</head>
<style>
        .favorite-btn {
            transition: background-color 0.3s ease;
            cursor: pointer;
            padding: 0.625rem 1rem; /* 10px 16px */
            border-radius: 0.5rem; /* rounded-lg */
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background-color: black;
            color: white;
        }

        .favorite-btn.active {
            background-color: #ff4d6d; /* pink/red when active */
            color: white;
        }

    </style>

<body class="b">
    <header>
        @include('navbar')
    </header>
            
    <section class="mx-40 my-20">
        <div class="px-4 2xl:px-0">
            <div class="grid grid-cols-3 group space-x-20">
                <div class="col-span-2 shrink-0">
                    <div class="">
                        <img src="{{ $meal['strMealThumb'] }}" alt="{{ $meal['strMeal'] }}" class="object-cover rounded-2xl">
                    </div>
                </div>
                <div class="col-span-1 mt-6 sm:mt-8 lg:mt-0">
                    <h1 class="text-2xl font-bold sm:text-4xl">{{ $meal['strMeal'] }}</h1>
                    <h2 class="mt-2 sm:text-xl font-light text-gray-500">{{ $meal['strCategory'] }} - {{ $meal['strArea'] }}</h2>

                    <div class="mt-4">
                        <h3 class="font-medium sm:text-2xl">Ingredients</h3>
                        <ul class="mt-4 ml-4 list-disc">
                            @for ($i = 1; $i <= 20; $i++)
                                @if (!empty($meal['strIngredient' . $i]) && !empty($meal['strMeasure' . $i]))
                                    <li>{{ $meal['strMeasure' . $i] }} {{ $meal['strIngredient' . $i] }}</li>
                                @endif
                            @endfor
                        </ul>
                    </div>

                    <div class="mt-4">
                        <h3 class="font-medium sm:text-2xl">Instructions</h3>
                        <p class="mt-2">{{ $meal['strInstructions'] }}</p>
                    </div>

                    <hr class="my-4 flex-grow border-t border-gray-300"></hr>

                    {{-- Updated Favorite Button --}}
                    @auth
                        <button
                            class="favorite-btn {{ $isFavorite ? 'active' : '' }}"
                            data-meal-id="{{ $meal['idMeal'] }}"
                            data-meal-name="{{ $meal['strMeal'] }}"
                            data-meal-thumb="{{ $meal['strMealThumb'] }}"
                        >
                            <i class="text-lg sm:text-xl {{ $isFavorite ? 'ph-fill text-white' : 'ph-bold text-gray-400' }} ph-heart"></i>  
                            <span>
                                {{ $isFavorite ? 'Remove from Favorites' : 'Add to Favorites' }}
                            </span>
                        </button>
                    @endauth
                </div>
            </div>
        </div>
    </section>
    
    @include('footer')

    @auth
<script>
    document.querySelectorAll('.favorite-btn').forEach(button => {
        button.addEventListener('click', async function () {
            const mealId = this.dataset.mealId;
            const mealName = this.dataset.mealName;
            const mealThumb = this.dataset.mealThumb;
            const icon = this.querySelector('i');
            const textSpan = this.querySelector('span');

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
                    icon.classList.add('ph-fill', 'text-white');
                    this.classList.add('active');
                    textSpan.textContent = "Remove from Favorites";
                } else if (data.status === "removed") {
                    icon.classList.remove('ph-fill', 'text-white');
                    icon.classList.add('ph-bold', 'text-gray-400');
                    this.classList.remove('active');
                    textSpan.textContent = "Add to Favorites";
                }
            } catch (err) {
                alert("You need to login first.");
            }
        });
    });
</script>
@endauth
</body>
</html>
