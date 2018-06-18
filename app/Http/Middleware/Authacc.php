<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        // dd($isClient, !Auth::user()->confirmed);
        if($isClient and Auth::id() != $request->id){
            
        } else if($isClient and !Auth::user()->confirmed){
            Session::flash('notConfirmed', "Votre compte n'est pas confirmé, S'il vous plaît confirmer votre adresse e-mail avec l'email que nous avons envoyé!");
            return redirect("/");
        } else if($isAdmin and !Auth::user()->technician->admin){
            redirect("/");
        }
        return $next($request);
    }
}
