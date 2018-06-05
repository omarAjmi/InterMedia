<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authacc
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
        $isClient = !is_null(Auth::user()->client);
        $isAdmin = !is_null(Auth::user()->technician);
        if($isClient and Auth::id() != $request->id){
            abort(401, 'Unauthorized');
        } else if($isAdmin and !Auth::user()->technician->admin){
            abort(401, 'Unauthorized');
        }
        return $next($request);
    }
}
