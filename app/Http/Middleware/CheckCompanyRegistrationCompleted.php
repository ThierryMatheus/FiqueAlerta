<?php

namespace App\Http\Middleware;

use App\Models\Company_profile;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;

class CheckCompanyRegistrationCompleted
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param $id
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        /** @var User $user */
        $user = Auth::user();

        if($user->is_company() && !$user->has_company_profile()) {
            return redirect()->route('complete.company');
        }

        return $next($request);
    }
}
