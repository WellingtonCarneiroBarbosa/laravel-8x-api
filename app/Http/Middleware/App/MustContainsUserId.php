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
        if(! $request->hasHeader('Auth-User-Identification')) {
            return apiResponser()->messageResponse(__("errors.header-required", ['header' => 'auth_user_id']),
                Response::HTTP_BAD_REQUEST
            );
        } else {
            $request->request->add([
                'auth_user_id' => $request->header('Auth-User-Identification')
            ]);
        }

        return $next($request);
    }
}
