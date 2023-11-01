<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        // $guards = empty($guards) ? [null] : $guards;

        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         return redirect()->route('customerlist');
        //     }
        // }
        if (Auth::check()) {
            if (Auth::user()->type === 'superadmin') {
                return redirect()->route('superadmin.dashboard');
            } elseif (Auth::user()->type === 'admin') {
                return redirect()->route('admin.dashboard');
            }
        } else {
            return $next($request);
        }
    }
}
