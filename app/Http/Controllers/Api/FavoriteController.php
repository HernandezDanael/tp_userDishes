<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dish;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Auth::user()->favorites()->with('user')->get();
        return response()->json($favorites);
    }

    public function store(Dish $dish)
    {
        $user = Auth::user();
        $user->favorites()->attach($dish->id);

        return response()->json(['message' => 'Plat ajouté aux favoris']);
    }

    public function destroy(Dish $dish)
    {
        $user = Auth::user();
        $user->favorites()->detach($dish->id);

        return response()->json(['message' => 'Plat retiré des favoris']);
    }
}
