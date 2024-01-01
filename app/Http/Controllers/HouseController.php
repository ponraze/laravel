<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HouseController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('houses');
    }

    /**
     * Display a listing of the resource.
     */
    public function search(Request $request): JsonResponse
    {
        $request->validate(
            [
                'name' => 'nullable|string|max:255',
                'bedrooms' => 'nullable|numeric',
                'bathrooms' => 'nullable|numeric',
                'storeys' => 'nullable|numeric',
                'garages' => 'nullable|numeric',
                'price_from' => 'nullable|numeric',
                'price_to' => 'nullable|numeric',
            ]
        );

        $query = House::query();

        if ($request->name !== null) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->bedrooms !== null) {
            $query->where('bedrooms',  '=', $request->bedrooms);
        }

        if ($request->bathrooms !== null) {
            $query->where('bathrooms',  '=', $request->bathrooms);
        }

        if ($request->storeys !== null) {
            $query->where('storeys',  '=', $request->storeys);
        }

        if ($request->garages !== null) {
            $query->where('garages',  '=', $request->garages);
        }

        if ($request->price_from !== null) {
            $query->where('price', '>=', $request->price_from);
        }
        if ($request->price_to !== null) {
            $query->where('price',  '<=', $request->price_to);
        }

        return response()->json($query->get());
    }
}
