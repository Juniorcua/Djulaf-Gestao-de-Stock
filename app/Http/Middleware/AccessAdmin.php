<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;
// use Auth;

class AccessAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->hasAnyRole(['Admin'])) {
            return $next($request);
        }

        return redirect('/')->with('danger', 'Utilizador não esta associado a nenhum papel! / Não possui privilegios [contacte o administrador]');
        return $next($request);
    }
}
