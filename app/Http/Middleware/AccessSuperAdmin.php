<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AccessSuperAdmin
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
        if (Auth::user()->hasAnyRole('SuperAdmin')) {
            return $next($request);
        }

        return redirect('/')->with('danger', 'Utilizador não esta associado a nenhum papel! / Não possui privilegios [contacte o administrador]');
    }
}
