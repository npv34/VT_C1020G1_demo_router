<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Local
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
        // kiem tra session co session ten la locale khong?
        // neu khong co thi lay gia tri mac dinh
        if (!session()->has('locale')){
            $localeDefault = config('app.locale');
            session()->put('locale', $localeDefault);
        }

        // set lai gia tri locale
        App::setLocale(session('locale'));

        return $next($request);
    }
}
