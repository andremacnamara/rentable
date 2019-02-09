<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckAccountVerified
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
        if (!auth()->user()->accountVerified()) {
            flash('Your account must be verified first')->warning();
            return redirect()->route('home');
        }

        return $next($request);
    }
}
