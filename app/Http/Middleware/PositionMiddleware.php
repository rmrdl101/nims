<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PositionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$positions)
    {
        if (Auth::check())
        {
            foreach ($positions as $position) {
                if(auth()->user()->hasPosition($position)) {
                    return $next($request);
                }
            }

            abort(404);
        }
        else
        {
            return redirect('/');
        }
    }
}
