<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreRestaurantResquest;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::owned(Auth::id())->orderBy('name', 'asc')->get();

        return view('restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->pluck('name', 'id');

        return view("restaurants.create", compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRestaurantResquest $request)
    {
        $input = $request->all();

        // $validated = $request->validate([
        //     'name'        => 'required|string|min:5|max:50',
        //     'description' => 'required|string|min:10',
        //     'city'        => 'required|string|min:5|max:30',
        //     'phone'       => 'required|alpha_dash|min:10|max:10',
        //     'category_id' => 'required|exists:categories,id',
        //     'delivery'    => [
        //         'required',
        //         Rule::in(['y', 'n']),
        //     ],
        // ]);

        // Restaurant::create($input);

        $restaurant = new Restaurant();
        $restaurant->fill($input);
        $restaurant->user_id = Auth::id(); 
        $restaurant->save();

        Session::flash('success', 'Restaurante agregado exitosamente'); 

        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        return view('restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $categories = Category::orderBy('name', 'asc')->pluck('name', 'id');

        return view("restaurants.edit", compact('categories', 'restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRestaurantResquest $request, Restaurant $restaurant)
    {
        $input = $request->all();

        $restaurant->fill($input);
        $restaurant->user_id = Auth::id(); 
        $restaurant->save();

        Session::flash('success', 'Restaurante editado exitosamente'); 

        return redirect(route('restaurants.index'));
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

        Session::flash('success', 'Restaurante removido exitosamente'); 

        return redirect(route('restaurants.index'));
    }

    /////////////////////////////////////////////////////

    public function showFrontPage()
    {
        $restaurants = Restaurant::orderBy('name', 'asc')->get();

        $restaurantsOwner1 = Restaurant::where('user_id', '=', '1')->orderBy('name', 'asc')->get();

        return view('front_page.index', compact('restaurants', 'restaurantsOwner1'));
    }
}
