<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dish;
use Illuminate\Support\Facades\Auth;

class DishController extends Controller
{
    public function index()
    {
        $dishes = Dish::with('user')->paginate(10);
        return response()->json($dishes);
    }

    public function show(Dish $dish)
    {
        return response()->json($dish);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:2048',
            'image' => 'required|image|max:2048',
            'recipe' => 'required|string',
        ]);

        $dish = Dish::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'image' => $request->file('image')->store('dishes', 'public'),
            'recipe' => $validated['recipe'], 
            'user_id' => Auth::id(),
        ]);


        return response()->json(['message' => 'Plat créé', 'dish' => $dish], 201);
    }

    public function update(Request $request, Dish $dish)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'sometimes|string|max:2048',
            'image' => 'nullable|image|max:2048',
            'recipe' => 'sometimes|string',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('dishes', 'public');
        }

        $dish->update($validated);

        return response()->json(['message' => 'Plat mis à jour', 'dish' => $dish]);
    }

    public function destroy(Dish $dish)
    {
        $dish->delete();
        return response()->json(['message' => 'Plat supprimé']);
    }
}
