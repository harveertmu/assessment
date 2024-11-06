<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FinanceMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user() || auth()->user()->hasRole('Finance') || auth()->user()->hasRole('Admin')) {
            return $next($request);

        }else{
            return redirect('/'); // Redirect if not authorized

        }

    }
}
