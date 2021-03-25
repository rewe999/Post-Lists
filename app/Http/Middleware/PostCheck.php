<?php

namespace App\Http\Middleware;

use Closure;

class PostCheck
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
        if ($request->name == "ADAM123") {
            dump($request->name);
        }
        return $next($request);
    }
}
