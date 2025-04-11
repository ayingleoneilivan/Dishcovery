<?php

namespace App\Http\Controllers;

use App\Services\MealService;

use Illuminate\Http\Request;

class MealController extends Controller
{
    protected $mealService;

    public function __construct(MealService $mealService)
    {
        $this->mealService = $mealService;
    }

    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $selectedCategory = $request->input('category', '');
        $selectedArea = $request->input('area', '');

        $meals = [];
        $error = null;

        // Filter by area or category
        if ($selectedCategory) {
            $result = $this->mealService->filterByCategory($selectedCategory);
            $meals = $result['success'] ? $result['data']['meals'] ?? [] : [];
        } elseif ($selectedArea) {
            $result = $this->mealService->filterByArea($selectedArea);
            $meals = $result['success'] ? $result['data']['meals'] ?? [] : [];
        } elseif ($search) {
            $result = $this->mealService->searchMeals($search);
            $meals = $result['success'] ? $result['data']['meals'] ?? [] : [];
        } else {
            // Default: show meals starting with "a"
            $result = $this->mealService->searchMeals('a');
            $meals = $result['success'] ? $result['data']['meals'] ?? [] : [];
        }

        $categories = $this->mealService->getCategories();
        $areas = $this->mealService->getAreas();

        if (empty($meals)) {
            $error = 'No meals found matching your criteria. Try another search term or filter.';
        }

        return view('homepage', compact(
            'meals', 'categories', 'areas',
            'search', 'selectedCategory', 'selectedArea', 'error'
        ));
    }


    public function testApi()
    {
        $results = [
            'random_meal' => $this->mealService->searchMeals('a'),
            'categories' => $this->mealService->getCategories(),
            'areas' => $this->mealService->getAreas(),
        ];
        
        return response()->json($results);
    }
}