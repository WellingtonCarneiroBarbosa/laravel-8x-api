<?php

namespace App\Exceptions;

use Exception;
use Throwable;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        if(! config('app.debug')) {
            $this->renderable(function (Throwable $e, $request) {
                if($e instanceof \Illuminate\Validation\ValidationException) {
                    return apiResponser()->validationResponse(
                        $e->errors(),
                        __("errors.validation")
                    );
                }

                if($e instanceof \Illuminate\Auth\AuthenticationException) {
                    $error_type = "unauthenticated";

                    return apiResponser()->errorResponse(
                        $error_type,
                        __("errors.{$error_type}.description"),
                        __("errors.{$error_type}.hint"),
                        $e->getMessage(),
                        \Symfony\Component\HttpFoundation\Response::HTTP_UNAUTHORIZED
                    );
                }

                if($e instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
                    $error_type = "resource_not_found";

                    return apiResponser()->errorResponse(
                        $error_type,
                        __("errors.{$error_type}.description"),
                        __("errors.{$error_type}.hint"),
                        __("errors.{$error_type}.message"),
                        \Symfony\Component\HttpFoundation\Response::HTTP_NOT_FOUND
                    );
                }

                $error_type = "internal_server_error";

                return apiResponser()->errorResponse(
                $error_type,
                    __("errors.{$error_type}.description"),
                    __("errors.{$error_type}.hint"),
                    __("errors.{$error_type}.message"),
                    \Symfony\Component\HttpFoundation\Response::HTTP_INTERNAL_SERVER_ERROR
                );
            });
        }
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof QueryException) {
            $message = mb_convert_encoding($exception->getMessage(), 'ASCII');
            throw new Exception($message);
        }

        return parent::render($request, $exception);
    }
}
