<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Session;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            Session::flash('failure', 'El usuario no tiene permisos para acceder a este sitio.');
            return route('login');
        }
    }
}
