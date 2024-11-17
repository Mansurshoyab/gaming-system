<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class GamerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('gamer')->check()) {
            if (Auth::guard('gamer')->viaRemember()) {
                config(['session.lifetime' => 43200]);
            } else {
                config(['session.lifetime' => 120]);
            }
            return $next($request);
        }
        Auth::guard('gamer')->logout();
        return redirect()->route('login')->with('error', 'Session expired.');
    }
}
