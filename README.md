# Laravel 8X Api Initializator

## About

Laravel web framework has a lot of functions that we don't use when we're builting
an api. So, I created this repo to gain time.

## Instalation

Is commom, just:

1. Install dependencies
```
composer install
```

2. Set-Up .env based on .env.example

3. Enjoy 
```
php artisan serv --port=8001
```

p.s
If you receive an unauthorized message, you should pass a header called "Service-Authorization" with content "localhost_secret" to use the api.

This is customized on app/Providers/RouteServiceProvider::boot and app/Http/Middlewares/Authenticate
