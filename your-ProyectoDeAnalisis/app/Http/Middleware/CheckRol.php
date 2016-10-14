<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class CheckRol
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
        if ($request->user() === null) {
            Session::flush();
            Session::put('codigo','valor'); 
            return redirect()->route('signin');
        }
        $actions = $request->route()->getAction();
        $roles = isset($actions['roles']) ? $actions['roles'] : null;

        if ($request->user()->tieneALgunRol($roles) || !$roles) {
            return $next($request);
        }
        return response("No posee permisos necesarios para acceder a esta pagina", 401);
    }

}
