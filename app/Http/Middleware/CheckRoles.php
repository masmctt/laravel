<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle($request, Closure $next, $role, $role2) es mejor utilizar func.
    public function handle($request, Closure $next)
    {
        // dd($role2);
        // $roles = func_get_args();
        // $roles = array_slice($roles,2); // esta funcion quita los dos primeros parametros
        $roles = array_slice(func_get_args(),2);
        // dd($roles);
        // foreach ($roles as $key => $role) {
            if (auth()->User()->hasRoles($roles)) {
                return $next($request);
            }
        // }
        return redirect('/');

    }
}
