<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://unpkg.com/@phosphor-icons/web@2.1.1"></script>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <title>Favourites</title>
</head>

<body class="bg-slate-100">
  @include('navbar')

  <section class="mx-52 my-20">
    <h1 class="text-4xl font-bold">Favorites</h1>
    <hr class="my-4 flex-grow border-t border-gray-300"></hr>

    <div class="mt-8 grid grid-cols-3 gap-4">
      @forelse($favorites as $favorite)
        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
          <a href="{{ route('meal.details', ['id' => $favorite->meal_id]) }}">
            <img src="{{ $favorite->meal_data['thumbnail'] }}"
                 alt="{{ $favorite->meal_data['name'] }}"
                 class="w-full h-48 p-2 rounded-2xl object-cover">
          </a>
          <div class="flex justify-between px-4 pb-8">
            <div>
              <p class="text-sm text-slate-500">Food</p>
              <a href="{{ route('meal.details', ['id' => $favorite->meal_id]) }}">
                <h1 class="text-xl font-bold">{{ $favorite->meal_data['name'] }}</h1>
              </a>
            </div>
            <div class="flex flex-col justify-between items-end">
              <div class="flex items-center space-x-2">
              </div>
              <button 
                  class="favorite-btn"
                  style="cursor: pointer;" 
                  data-meal-id="{{ $favorite->meal_id }}" 
                  data-meal-name="{{ $favorite->meal_data['name'] }}"
                  data-meal-thumb="{{ $favorite->meal_data['thumbnail'] }}"
              >
                <i class="text-2xl ph-fill text-red-500 ph-heart"></i>
              </button>
            </div>
          </div>
        </div>
      @empty
        <p class="text-gray-600 col-span-3">You haven’t added any meals to your favorites yet.</p>
      @endforelse
    </div>
  </section>
  @include('footer')
  
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
</script>
</body>
</html>
