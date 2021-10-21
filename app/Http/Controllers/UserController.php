<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreUserResquest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->type != 'admin')
        {
            Session::flash('failure', 'El usuario no tiene permisos para administrar usuarios.'); 

            return redirect(route('home.index'));
        }

        $users = User::orderBy('id', 'asc')->paginate(8);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        if(Auth::user()->type != 'admin')
        {
            Session::flash('failure', 'El usuario no tiene permisos para crear usuarios.'); 

            return redirect(route('home.index'));
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
        if(Auth::user()->type != 'admin')
        {
            Session::flash('failure', 'El usuario no tiene permisos para crear usuarios.'); 

            return redirect(route('home.index'));
        }

        $input = $request->all();
        $user = new User();
        $user->fill($input);
        $user->password = bcrypt($user->password);
        $user->save();

        Session::flash('success', 'Usuario agregado exitosamente'); 

        return redirect(route('users.index'));
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
        if(Auth::user()->type != 'admin')
        {
            Session::flash('failure', 'El usuario no tiene permisos para modificar usuarios.'); 

            return redirect(route('home.index'));
        }

        $oldPassword = $user->password;

        return view("users.edit", compact('user', 'oldPassword'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $input = $request->all();

        //$password=$user->password->getClientOriginalName();
        //$user['password']=$password;
        //$user->update(['password', $password]);

        if (!$input['password']){
            $user->fill(['name', 'email', 'type']);
        }else{
            $user->fill($input);
            $user->password = bcrypt($user->password);
        }

        
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
        if(Auth::user()->type != 'admin')
        {
            Session::flash('failure', 'El usuario no tiene permisos para modificar usuarios.'); 

            return redirect(route('home.index'));
        }
        $user->delete();
    
        Session::flash('success', 'Usuario removido exitosamente'); 

        return redirect(route('users.index'));
    }
}
