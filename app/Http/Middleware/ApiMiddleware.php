<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ApiMiddleware
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
        if (!Auth::guest() && !Auth::user()->user_details()->select('api_key')->get()->isEmpty()) {
            return $next($request);
        }

        return redirect()->back()->with('alert','You dont have api key.Please press the get api key button');
    }
}
