<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        if(auth()->check()){
            if (auth()->user()->role == 'student') {
                return $next($request);
            } else {
                return redirect('/')->with('msg', 'Not Admin access');
            }
        } else {
            return redirect('/')->with('msg', 'Not Admin access');
        }
    }
}
