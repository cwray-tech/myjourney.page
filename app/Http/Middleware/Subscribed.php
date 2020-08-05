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
            return redirect('/')->with('status', 'You need to subscribe before you can create or edit journeys.');

        return $next($request);
    }
}
