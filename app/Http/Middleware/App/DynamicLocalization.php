<?php

namespace App\Http\Middleware\App;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class DynamicLocalization
{
    public array $accepted_localizations = [
        'pt-br',
        'en'
    ];

    public array $timezones = [
        'pt-br' => 'America/Sao_Paulo',
        'UTC'   => 'UTC',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $localization = $request->route('localization');

        if(! in_array($request->route('localization'), $this->accepted_localizations)) {
            $localization = 'en';
        }

        if(! isset($this->timezones[$localization])) {
            $timezone = $this->timezones['UTC'];
        } else {
            $timezone = $this->timezones[$localization];
        }

        config(['app.user_timezone' => $timezone]);

        App::setLocale($localization);

        return $next($request);
    }
}
