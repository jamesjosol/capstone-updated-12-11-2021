<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isFileOwnerMiddleware
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
        $path = $request->route('path');
        $res = preg_replace("/[^0-9]/", "", $path);
        if(auth()->user()->id == $res || auth()->user()->role == 1) {
            return $next($request);
        }else {
            return redirect()->route('login');
        }
    }
}
