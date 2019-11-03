<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;

class testMiddleware
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
        // dd($request->all());
        if($request->title=='test'){
            return $next($request);
        }
        else{
            return Redirect::back()->withErrors(['Title is Invalid']);
        }
        
    }
}
