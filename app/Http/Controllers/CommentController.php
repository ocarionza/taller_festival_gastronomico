<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Comment;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreCommentRequest;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storec(StoreCommentRequest $request, $id)
    {
        //TODO
        if(Auth::check())
        {   
            $input = request()->all();
            
            if($input['comment'] == null | $input['score'] == null){
                Session::flash('failure', 'Debe ingresar los campos solicitados');
                return redirect()->route('restaurants.show', ['restaurant' => $id]);
            }else{
                $comment = new Comment();
                $comment->fill($input);
                $comment->user_id = Auth::id();
                $comment->restaurant_id = $id;
                $comment->save();

                Session::flash('success', 'Comentario publicado');
                return redirect()->route('restaurants.show', ['restaurant' => $id]);
            }
            
            
        }

        Session::flash('failure', 'Debe estar logueado para hacer comentarios.'); 
        return redirect()->route('front_page.index');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



}
