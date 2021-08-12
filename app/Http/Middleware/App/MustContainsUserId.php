<?php

namespace App\Http\Middleware\App;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MustContainsUserId
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
        if(! $request->has('user_id')) {
            return apiResponser()->messageResponse(__("errors.param-required", ['param' => 'user_id']),
                Response::HTTP_BAD_REQUEST
            );
        }

        return $next($request);
    }
}
