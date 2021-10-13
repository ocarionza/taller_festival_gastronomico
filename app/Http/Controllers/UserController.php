<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreUserResquest;

class UserController extends Controller
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
            Session::flash('failure', 'El usuario no tiene permisos para administrar usuarios.'); 

            return redirect(route('home'));
        }
        $users = User::orderBy('name', 'asc')->paginate(8);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        if (Auth::guest()) {
        
            Session::flash('failure', 'El usuario no tiene permisos para acceder a este sitio.'); 

            return redirect(route('home'));

        }
            
        if(Auth::user()->type != 'admin')
        {
            Session::flash('failure', 'El usuario no tiene permisos para crear usuarios.'); 

            return redirect(route('home'));
        }
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserResquest $request)
    {
        if (Auth::guest()) {
        
            Session::flash('failure', 'El usuario no tiene permisos para acceder a este sitio.'); 

            return redirect(route('home'));

        }
        if(Auth::user()->type != 'admin')
        {
            Session::flash('failure', 'El usuario no tiene permisos para crear usuarios.'); 

            return redirect(route('home'));
        }

        $input = $request->all();
        $user = new User();
        $user->fill($input);
        //$user->password = bcrypt($user->password);
        $user->save();

        Session::flash('success', 'Usuario agregado exitosamente'); 

        return redirect(route('home'));
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
    public function edit(User $user)
    {
        if (Auth::guest()) {
        
            Session::flash('failure', 'El usuario no tiene permisos para acceder a este sitio.'); 

            return redirect(route('home'));

        }
            
        if(Auth::user()->type != 'admin')
        {
            Session::flash('failure', 'El usuario no tiene permisos para modificar usuarios.'); 

            return redirect(route('home'));
        }
        $password=$user['password'];

        return view("users.edit", compact('user', 'password'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserResquest $request, User $user)
    {
        $input = $request->all();

        //$password=$user->password->getClientOriginalName();
        //$user['password']=$password;
        //$user->update(['password', $password]);



        $user->fill($input);
        $user->save();

        Session::flash('success', 'Usuario modificado exitosamente'); 

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Auth::guest()) {
        
            Session::flash('failure', 'El usuario no tiene permisos para acceder a este sitio.'); 

            return redirect(route('home'));

        }
            
        if(Auth::user()->type != 'admin')
        {
            Session::flash('failure', 'El usuario no tiene permisos para modificar usuarios.'); 

            return redirect(route('home'));
        }
        $user->delete();
    
        Session::flash('success', 'Usuario removido exitosamente'); 

        return redirect(route('users.index'));
    }
}
