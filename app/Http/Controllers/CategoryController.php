<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guest()) {
        
            Session::flash('failure', 'El usuario no tiene permisos para acceder a este sitio.'); 

            return redirect(route('home'));

        }

        if(Auth::user()->type != 'admin')
        {
            Session::flash('failure', 'El usuario no tiene permisos para administrar categorias.'); 

            return redirect(route('home'));
        }

        $categories = Category::orderBy('name', 'asc')->paginate(8);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::guest()) {
        
            Session::flash('failure', 'El usuario no tiene permisos para acceder a este sitio.'); 

            return redirect(route('home'));

        }
        
        if(Auth::user()->type != 'admin')
        {
            Session::flash('failure', 'El usuario no tiene permisos para crear categorias.'); 

            return redirect(route('home'));
        }

        return view("categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        if (Auth::guest()) {
        
            Session::flash('failure', 'El usuario no tiene permisos para acceder a este sitio.'); 

            return redirect(route('home'));

        }
  
        if(Auth::user()->type != 'admin')
        {
            Session::flash('failure', 'El usuario no tiene permisos para crear categorias.'); 

            return redirect(route('home'));
        }

        $input = $request->all();
        $category = new Category();
        $category->fill($input);
        $category->save();

        Session::flash('success', 'Categoria creada exitosamente'); 

        return redirect(route('categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        if (Auth::guest()) {
        
            Session::flash('failure', 'El usuario no tiene permisos para acceder a este sitio.'); 

            return redirect(route('home'));

        }
        if(Auth::user()->type != 'admin')
        {
            Session::flash('failure', 'El usuario no tiene permisos para modificar categorias.'); 

            return redirect(route('home'));
        }
        return view("categories.edit", compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, Category $category)
    {
        $input = $request->all();

        //$password=$user->password->getClientOriginalName();
        //$user['password']=$password;
        //$user->update(['password', $password]);

        $category->fill($input);
        $category->save();

        Session::flash('success', 'Categoria actualizada exitosamente'); 

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (Auth::guest()) {
        
            Session::flash('failure', 'El usuario no tiene permisos para acceder a este sitio.'); 

            return redirect(route('home'));

        }   
        if(Auth::user()->type != 'admin')
        {
            Session::flash('failure', 'El usuario no tiene permisos para modificar categorias.'); 

            return redirect(route('home'));
        }
    
        $category->delete();

        Session::flash('success', 'Categoria removida exitosamente'); 

        return redirect(route('categories.index'));
    }
}
