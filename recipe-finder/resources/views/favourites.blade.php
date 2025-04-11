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
    <header>
        <nav class="py-4 px-40 bg-black text-white">
            <div class="flex justify-between items-center">
                <div class="flex space-x-2 items-center">
                    <i class="text-4xl text-amber-500 ph ph-chef-hat"></i>
                    <h1 class="text-2xl font-medium tracking-wider"><span class="text-amber-500 ">Dish</span>covery</h1>
                </div>
                <ul class="flex space-x-12 text-lg">
                    <a href="/dist/index.html"><li>Home</li></a>
                    <li>Recipes</li>
                    <li>About</li>
                </ul>
                <div class="flex justify-between items-center w-1/3 rounded-sm text-slate-500 bg-white">
                    <form class="ml-4">Search</form>
                    <i class="p-2 rounded-e-sm text-xl ph ph-magnifying-glass bg-amber-500 text-white"></i>
                </div>
                <div class="flex space-x-4 items-center">
                    
                    <a class="text-2xl" href="/dist/favourites.html"> <i class=" ph ph-heart"></i></a>
                    <a class="text-2xl" href="/dist/login.html"><i class="ph ph-user"></i></a>
                </div>
            </div>
        </nav>
    </header>
            
    <section class="mx-52 my-20">

        <h1 class="text-4xl font-bold">Favorites</h1>
        
        <hr class="my-4 flex-grow border-t border-gray-300"></hr>
            <div class="mt-8 grid grid-cols-3 gap-4">
                <div class=" bg-white rounded-2xl shadow-md overflow-hidden ">
                    <a href="/dist/product_details.html"><img src="/public/images/Pork Adobo.jpg" alt="Product 1" class="w-full h-48 p-2 rounded-2xl object-cover"></a>
                    <div class="flex justify-between px-4 pb-8">
                        <div class="">
                            <p class=" text-sm text-slate-500">Food</p>
                            <a href="/dist/product_details.html"><h1 class="text-xl font-bold">Pork Adobo</h1></a>
                            <h2 class="text-xl font-semibold text-amber-500">60 mins</h2>
                        </div>
                        <div class="flex flex-col justify-between items-end">
                            <div class="flex items-center space-x-2">
                                <i class="ph-fill ph-star text-yellow-400"></i>
                                <p class="text-sm text-slate-500">4.9</p>
                            </div>
                            <i class="text-2xl ph-fill ph-heart text-rose-500"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow-md overflow-hidden ">
                    <a href="/dist/product_details.html"><img src="/public/images/Butter Chicken.jpg" alt="Product 1" class="w-full h-48 p-2 rounded-2xl object-cover"></a>
                    <div class="flex justify-between px-4 pb-8">
                        <div class="">
                            <p class=" text-sm text-slate-500">Food</p>
                            <a href="/dist/product_details.html"><h1 class="text-xl font-bold">Pork Adobo</h1></a>
                            <h2 class="text-xl font-semibold text-amber-500">60 mins</h2>
                        </div>
                        <div class="flex flex-col justify-between items-end">
                            <div class="flex items-center space-x-2">
                                <i class="ph-fill ph-star text-yellow-400"></i>
                                <p class="text-sm text-slate-500">4.9</p>
                            </div>
                            <i class="text-2xl ph-fill ph-heart text-rose-500"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow-md overflow-hidden ">
                    <a href="/dist/product_details.html"><img src="/public/images/Massaman Chicken Curry.jpg" alt="Product 1" class="w-full h-48 p-2 rounded-2xl object-cover"></a>
                    <div class="flex justify-between px-4 pb-8">
                        <div class="">
                            <p class=" text-sm text-slate-500">Food</p>
                            <a href="/dist/product_details.html"><h1 class="text-xl font-bold">Pork Adobo</h1></a>
                            <h2 class="text-xl font-semibold text-amber-500">60 mins</h2>
                        </div>
                        <div class="flex flex-col justify-between items-end">
                            <div class="flex items-center space-x-2">
                                <i class="ph-fill ph-star text-yellow-400"></i>
                                <p class="text-sm text-slate-500">4.9</p>
                            </div>
                            <i class="text-2xl ph-fill ph-heart text-rose-500"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow-md overflow-hidden ">
                    <a href="/dist/product_details.html"><img src="/public/images//Pizza.jpg" alt="Product 1" class="w-full h-48 p-2 rounded-2xl object-cover"></a>
                    <div class="flex justify-between px-4 pb-8">
                        <div class="">
                            <p class=" text-sm text-slate-500">Food</p>
                            <a href="/dist/product_details.html"><h1 class="text-xl font-bold">Pork Adobo</h1></a>
                            <h2 class="text-xl font-semibold text-amber-500">60 mins</h2>
                        </div>
                        <div class="flex flex-col justify-between items-end">
                            <div class="flex items-center space-x-2">
                                <i class="ph-fill ph-star text-yellow-400"></i>
                                <p class="text-sm text-slate-500">4.9</p>
                            </div>
                            <i class="text-2xl ph-fill ph-heart text-rose-500"></i>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@include('footer')
</body>
</html>
