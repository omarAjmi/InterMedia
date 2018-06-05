<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthorizeAccToOrder
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
        if(is_null(Auth::user()->client)) {
            return $next($request);
        } else if(Auth::user()->client->orders->where('id', $request->id)->isEmpty()) {
            abort(401, 'Unauthorized');
        } else {
            return $next($request);
        }
    }
}
