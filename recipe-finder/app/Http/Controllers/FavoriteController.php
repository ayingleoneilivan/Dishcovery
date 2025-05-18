<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function toggle(Request $request)
    {
        $user = Auth::user();
        $mealId = $request->input('meal_id');

        $favorite = Favorite::where('user_id', $user->id)
            ->where('meal_id', $mealId)
            ->first();

        if ($favorite) {
            $favorite->delete();
            return response()->json(['status' => 'removed']);
        } else {
            $mealData = [
                'name' => $request->input('meal_name'),
                'thumbnail' => $request->input('meal_thumb')
            ];
            Favorite::create([
                'user_id' => $user->id,
                'meal_id' => $mealId,
                'meal_data' => $mealData
            ]);
            return response()->json(['status' => 'added']);
        }
    }
    public function index()
    {
        $user = Auth::user();
    
        $favorites = Favorite::where('user_id', $user->id)
            ->orderBy('id', 'desc')
            ->get();
    
        return view('favourites', compact('favorites'));
    }    
}