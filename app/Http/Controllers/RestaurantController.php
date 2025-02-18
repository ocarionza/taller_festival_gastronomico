<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Restaurant;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Comment;
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
        if(Auth::user()->type != 'admin' & Auth::user()->type != 'owner')
        {
            Session::flash('failure', 'El usuario no tiene permisos para administrar restaurantes.'); 

            return redirect(route('home.index'));
        }

        if(Auth::user()->type != 'admin')
        {
            $restaurants = Restaurant::owned(Auth::id())->orderBy('name', 'asc')->paginate(8);
            $categories = Category::orderBy('name', 'asc')->pluck('name', 'id');
            return view('restaurants.index', compact('restaurants', 'categories'));
        }else{
            $restaurants = Restaurant::orderBy('name', 'asc')->paginate(8);
            $categories = Category::orderBy('name', 'asc')->pluck('name', 'id');
            return view('restaurants.index', compact('restaurants', 'categories'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if(Auth::user()->type != 'admin' & Auth::user()->type != 'owner')
        {
            Session::flash('failure', 'El usuario no tiene permisos para crear restaurantes.'); 

            return redirect(route('home.index'));
        }


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

        if(Auth::user()->type != 'admin' & Auth::user()->type != 'owner')
        {
            Session::flash('failure', 'El usuario no tiene permisos para crear restaurantes.'); 

            return redirect(route('home.index'));
        }

        $input = $request->all();

        if ($archivo=$request->file('file')) {
            $nombre = $archivo->getClientOriginalName();
            $archivo->move('images', $nombre);
            $input['logo'] = $nombre;
        }

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

        return redirect(route('restaurants.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        $categories = Category::orderBy('name', 'asc')->pluck('name', 'id');
        return view('restaurants.show', compact('restaurant', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
    if(Auth::user()->type != 'admin' & Auth::user()->type != 'owner')
    {
        Session::flash('failure', 'El usuario no tiene permisos para modificar restaurantes.'); 

        return redirect(route('home.index'));
    }

    
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

        if ($archivo=$request->file('file')) {
            $nombre = $archivo->getClientOriginalName();
            $archivo->move('images', $nombre);
            $input['logo'] = $nombre;
            $restaurant->update(['logo', $nombre]);
        }

        $restaurant->fill($input);
        $restaurant->user_id = Auth::id(); 
        $restaurant->save();

        Session::flash('success', 'Restaurante modificado exitosamente'); 

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
        if(Auth::user()->type != 'admin' & Auth::user()->type != 'owner')
        {
            Session::flash('failure', 'El usuario no tiene permisos para remover restaurantes.'); 

            return redirect(route('home.index'));
        }

        $restaurant->delete();

        Session::flash('success', 'Restaurante removido exitosamente'); 

        return redirect(route('restaurants.index'));
    }

    /////////////////////////////////////////////////////

    public function showFrontPage(Request $request)
    {
        $filter = $request['filter'] ?? null;

        if(!$request['filter'])
            $restaurants = Restaurant::orderBy('name', 'asc')->paginate(8);
        else
        {
            $restaurants = Restaurant::orderBy('name', 'asc')->where('category_id', '=', $request['filter'])->paginate(8);
            $restaurants->appends(['filter' => $filter]);
        }

        $categories = Category::orderBy('name', 'asc')->pluck('name', 'id');

        return view('front_page.index', compact('restaurants', 'categories', 'filter'));
    }

    public function welcome()
    {
        $restaurants = Restaurant::orderBy('name', 'asc')->get();
        return view('home.index', compact('restaurants'));
    }

    public function view(Restaurant $restaurant)
    {
        $categories = Category::orderBy('name', 'asc')->pluck('name', 'id');
        return view('restaurants.show', compact('restaurant', 'categories'));
    }

}
