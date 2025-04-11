<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://unpkg.com/@phosphor-icons/web@2.1.1"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Pork Adobo</title>
</head>

<body class="b">
    <header>
        @include('navbar')
    </header>
            
    <section class="mx-40 my-20">
        <div class="px-4 2xl:px-0">
            <div class="grid grid-cols-3 group space-x-20">
                <div class="col-span-2 shrink-0">
                    <div class="">
                        <img src="images/Pork Adobo.jpg" alt="" class="object-cover rounded-2xl">
                    </div>
                </div>
                <div class="col-span-1 mt-6 sm:mt-8 lg:mt-0">
                    <h1 class="text-2xl font-bold sm:text-4xl ">Pork Adobo</ph1>
                    <h2 class="mt-2 sm:text-xl font-light text-gray-500">Food</h2>
                    <div class="">
                        <h1 class="mt-4 font-medium sm:text-2xl">Ingredients</h1>
                        <div class="">
                            <ul class="mt-4 ml-4 list-disc"> 
                                <li>2 tablespoons neutral oil (such as vegetable, canola, or avocado oil)</li>
                                <li>2 pounds boneless pork shoulder or pork butt (cut into large chunks)</li>
                                <li>¼ cup cane vinegar or white vinegar</li>
                                <li>⅓ cup low sodium soy sauce</li>
                                <li>6 cloves garlic (chopped)</li>
                                <li>1 bay leaf</li>
                                <li>2 teaspoons black peppercorns</li>
                                <li>2 teaspoons sugar (or brown sugar)</li>
                                <li>2 cups water</li>
                            </ul>
                            
                        </div>
                    </div>

                    <hr class="my-4 flex-grow border-t border-gray-300"></hr>

                    <div class="mt-4">
                        <button type="submit" class="flex items-center justify-center py-2.5 px-4 text-sm sm:text-lg font-medium rounded-lg bg-black text-white">
                            <i class="ph-bold ph-heart-straight text-sm sm:text-lg"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    @include('footer')
</body>
</html>
