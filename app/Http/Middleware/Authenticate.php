<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
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
        $secrets = explode(",", config('app.secrets'));

        if($request->hasHeader('Service-Authorization')) {
            if(in_array($request->header('Service-Authorization'), $secrets)) {
                return $next($request);
            }
        }

        throw new AuthenticationException();
    }
}
