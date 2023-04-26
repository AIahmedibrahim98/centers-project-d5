<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckProductKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->hasHeader('X-APP-KEY') && $request->header('X-APP-KEY') == env('APP_KEY')) {
            return $next($request);
        }else{
           return response()->json(['message'=>'Invalid Product Key'],403);
        }

    }
}
