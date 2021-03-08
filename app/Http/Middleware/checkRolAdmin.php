<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkRolAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //Verificamos si el key es admin
        if(auth()->user()->rol->key=='admin'){
            return $next($request);
        }
        //Redirigimos a la raiz
        return redirect('/');
        
    }
}
