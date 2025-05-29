<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://unpkg.com/@phosphor-icons/web@2.1.1"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <title>{{ $meal['strMeal'] }}</title>
  <style>
    .favorite-btn {
      transition: background-color 0.3s ease;
      cursor: pointer;
      padding: 0.625rem 1rem;
      border-radius: 0.5rem;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      background-color: black;
      color: white;
    }
    .favorite-btn.active {
      background-color: #ff4d6d;
      color: white;
    }
  </style>
</head>

<body class="bg-slate-50 min-h-screen">
  @include('navbar')

  <section class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-16 xl:px-20 my-20">
    <div class="flex flex-col lg:flex-row gap-10 sm:gap-20 lg:gap-20 items-start">
      
      <!-- Image Left (Fixed on desktop only) -->
      <div class="flex-shrink-0 w-full lg:w-[500px] lg:h-[500px] flex justify-center items-start">
        <img
          src="{{ $meal['strMealThumb'] }}"
          alt="{{ $meal['strMeal'] }}"
          class="rounded-2xl object-cover shadow-md w-full h-auto lg:h-full"
        />
      </div>

      <!-- Content Right -->
      <div class="flex-1 w-full overflow-visible mt-8 lg:mt-0">
        <!-- Meal Info -->
        <div class="text-left">
          <h1 class="text-2xl sm:text-4xl font-bold">{{ $meal['strMeal'] }}</h1>
          <h2 class="mt-2 text-base sm:text-xl text-gray-500 font-light">
            {{ $meal['strCategory'] }} - {{ $meal['strArea'] }}
          </h2>
        </div>

        <!-- Tabs -->
        <div class="mt-6">
          <div class="border-b border-gray-200">
            <nav class="-mb-px flex gap-6" id="tabs">
              <button
                class="tab-link text-sm sm:text-base font-medium text-gray-500 hover:text-black border-b-2 border-transparent pb-2 active"
                data-tab="ingredients"
              >
                Ingredients
              </button>
              <button
                class="tab-link text-sm sm:text-base font-medium text-gray-500 hover:text-black border-b-2 border-transparent pb-2"
                data-tab="instructions"
              >
                Instructions
              </button>
            </nav>
          </div>

          <div id="tab-content" class="mt-4 max-h-[350px] overflow-auto pr-2">
            <!-- Ingredients Tab -->
            <div class="tab-panel" id="ingredients" style="display: block;">
              <ul class="ml-4 list-disc text-sm sm:text-base leading-relaxed">
                @for ($i = 1; $i <= 20; $i++)
                  @if (!empty($meal['strIngredient' . $i]) && !empty($meal['strMeasure' . $i]))
                    <li>{{ $meal['strMeasure' . $i] }} {{ $meal['strIngredient' . $i] }}</li>
                  @endif
                @endfor
              </ul>
            </div>

            <!-- Instructions Tab -->
            <div class="tab-panel" id="instructions" style="display: none;">
              <p class="text-sm sm:text-base leading-relaxed whitespace-pre-line break-words">
                {{ $meal['strInstructions'] }}
              </p>
            </div>
          </div>
        </div>

        <!-- Favorite Button -->
        <div class="mt-6 text-left w-full">
          @auth
            <button
              class="favorite-btn {{ $isFavorite ? 'active' : '' }}"
              data-meal-id="{{ $meal['idMeal'] }}"
              data-meal-name="{{ $meal['strMeal'] }}"
              data-meal-thumb="{{ $meal['strMealThumb'] }}"
            >
              <i class="text-lg sm:text-xl {{ $isFavorite ? 'ph-fill text-white' : 'ph-bold text-gray-400' }} ph-heart"></i>
              <span>{{ $isFavorite ? 'Remove from Favorites' : 'Add to Favorites' }}</span>
            </button>
          @endauth
        </div>
      </div>
    </div>
  </section>

  @include('footer')

  <!-- Tabs Script -->
  <script>
    const tabLinks = document.querySelectorAll(".tab-link");
    const tabPanels = document.querySelectorAll(".tab-panel");

    tabLinks.forEach((link) => {
      link.addEventListener("click", () => {
        tabLinks.forEach((btn) =>
          btn.classList.remove("active", "border-black", "text-black")
        );
        tabPanels.forEach((panel) => (panel.style.display = "none"));

        link.classList.add("active", "border-black", "text-black");
        document.getElementById(link.dataset.tab).style.display = "block";
      });
    });
  </script>

  @auth
    <script>
      document.querySelectorAll(".favorite-btn").forEach((button) => {
        button.addEventListener("click", async function () {
          const mealId = this.dataset.mealId;
          const mealName = this.dataset.mealName;
          const mealThumb = this.dataset.mealThumb;
          const icon = this.querySelector("i");
          const textSpan = this.querySelector("span");

          try {
            const res = await fetch("{{ route('favorite.toggle') }}", {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
              },
              body: JSON.stringify({
                meal_id: mealId,
                meal_name: mealName,
                meal_thumb: mealThumb,
              }),
            });

            const data = await res.json();

            if (data.status === "added") {
              icon.classList.remove("ph-bold", "text-gray-400");
              icon.classList.add("ph-fill", "text-white");
              this.classList.add("active");
              textSpan.textContent = "Remove from Favorites";
            } else if (data.status === "removed") {
              icon.classList.remove("ph-fill", "text-white");
              icon.classList.add("ph-bold", "text-gray-400");
              this.classList.remove("active");
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
