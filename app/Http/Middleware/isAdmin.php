<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;


class isAdmin
{
    /**
     * Handle an incoming request, if the user is_admin resolves the request
     * if not, is redirected to home
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (auth()->check() && auth()->user()->is_admin)
        return $next($request);

        return redirect('/');

    }
}
