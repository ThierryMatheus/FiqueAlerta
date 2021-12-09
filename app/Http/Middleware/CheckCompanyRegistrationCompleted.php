<?php

namespace App\Http\Middleware;

use App\Models\Company_profile;
use Closure;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

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
//        $company = Company_profile::all();
//
//        if(isEmpty($company)) {
//            return redirect()->route('complete.company');
//        }

        return $next($request);
    }
}
