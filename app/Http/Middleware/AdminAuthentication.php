<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;

class AdminAuthentication
{
 
    public function handle($request, Closure $next)
    {
        if ($request->user())
        {
            if ($request->user()->status == 1)
           {
              if (  ($request->user()->role == 1) || ($request->user()->role == 0)) {
               return $next($request);
              }
           }
       }
       return new RedirectResponse(url('/'));
   }
}