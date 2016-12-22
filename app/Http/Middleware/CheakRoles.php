<?php

namespace App\Http\Middleware;

use Closure;

class CheakRoles
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
        if($request->user()===null)
        {
            return redirect()->guest('login');
        }
        $actions = $request->route()->getAction();
        $role = isset($actions['roles']) ? $actions['roles']:null ;
        if($request->user()->hasRole($role) || !$role)
        {
            return $next($request);
        }
        return redirect()->guest('login');
    }
}
