<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;

class Language
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
        if($locale = Session::get('locale')){
            App::setLocale($locale);
        }
        return $next($request);
    }
}
