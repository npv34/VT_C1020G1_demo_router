<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class CheckAge
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
        // code logic
        $birthday = $request->birthday;

        $age = Carbon::parse($birthday)->age;
        if ($age < 18) {
            return redirect()->route('auth.showFormRegister')
                ->with('error', 'Ban chua du 18t');
        }

        return $next($request);
    }
}
