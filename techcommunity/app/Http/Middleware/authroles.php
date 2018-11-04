<?php

namespace App\Http\Middleware;

use Closure;

class authroles
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
        if ((auth()->user()->role == 'author')|| (auth()->user()->role == 'user')) {
            return redirect('home');
        }
        
        return $next($request);
    }
}