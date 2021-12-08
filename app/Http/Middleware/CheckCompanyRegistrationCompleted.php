<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckCompanyRegistrationCompleted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(is_null(auth()->user()->fantasy_name) || is_null(auth()->user()->type) || is_null(auth()->user()->cnpj)) {
            return redirect()->route('complete.company');
        }

        return $next($request);
    }
}
