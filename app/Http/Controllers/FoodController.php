<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class FoodController extends Controller
{
    public function index() {
        $foods = Food::all();
        return response($foods);
    }

    public function getFood($id) {
        $food = Food::find($id);
        if($food == null) {
            return response(['message' => 'Food not found'], 404);
        }
        return response()->json($food);
    }

    public function newFood(Request $request){
        $food = Food::create($request -> all());
        return response()->json($food);
    }

    public function updateFood(Request $request, $id) {
        $food = food::find($id);
        if($food == null) {
            return response(['message' => 'Food not found'], 404);
        }
        $food->name = $request->name;
        $food->price = $request->price;
        $food->description = $request->description;
        $food->save();
        return response($food);
    }
    public function destroyFood ($id) {
        $food = food::find($id);
        if($food == null) {
            return response(['message' => 'Food not found'], 404);
        }
        $food->delete();
        return response(['message' => 'Food deleted']);
    }
}
