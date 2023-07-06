<?php

namespace App\Http\Controllers;

use App\Models\Hotel;

use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        return $hotels;
    }

    public function store(Request $request)
    {
        $hotel = Hotel::create($request->all());
        return response()->json([
            'message' => 'Hotel created successfully',
            'hotel' => $hotel
        ], 201);
    }

    public function search($name)
    {
        return Hotel::where('name', 'like', '%' . $name . '%')->get();
    }
}
