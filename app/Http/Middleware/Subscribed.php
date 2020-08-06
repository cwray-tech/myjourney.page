<?php

namespace App\Http\Middleware;

use Closure;

class Subscribed
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
        if($request->user() and ! $request->user()->subscribed('main'))
            return redirect('/subscribe')->with('status', 'Subscribe to a plan and start writing Journeys!');

        return $next($request);
    }
}
