<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Requests\api\v1\RestaurantStoreRequest;
use App\Http\Requests\api\v1\RestaurantUpdateRequest;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant = Restaurant::orderBy('name', 'asc')->get();

        return response()->json(['data' => $restaurant], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestaurantStoreRequest $request)
    {
        $restaurant = Restaurant::create($request->all());

        return response()->json(['data' => $restaurant], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        return response()->json(['data' => $restaurant], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(RestaurantUpdateRequest $request, Restaurant $restaurant)
    {
        $restaurant->update($request->all());

        return response()->json(['data' => $restaurant], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return response(null, 204);
    }
}
