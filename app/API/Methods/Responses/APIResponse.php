<?php

namespace App\API\Methods\Responses;

use Illuminate\Http\JsonResponse;
use App\API\Interfaces\HTTPResponse;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class APIResponse implements HTTPResponse
{
    public function response(array $data, ?string $message = "", string $http_code = Response::HTTP_OK, array $headers = []): JsonResponse
    {
        if(empty($data)) {
            throw new Exception("Data array param can not be empty. Use messageResponse method to send messages responses.");
        }

        $response = [
            "data"      => $data,
            "status"    => $http_code
        ];

        if(! empty($message)) {
            $response["message"] = $message;
        }

        return response()->json(
            $response,
            $http_code,
            $headers
        );
    }

    public function messageResponse(string $message, string $http_code = Response::HTTP_OK, array $headers = []): JsonResponse
    {
        if(empty($message)) {
            throw new Exception("Message string param can not be empty.");
        }

        $response = [
            "message"   => $message,
            "status"    => $http_code
        ];

        return response()->json(
            $response,
            $http_code,
            $headers
        );
    }

    public function validationResponse(array $errors, string $message, string $http_code = Response::HTTP_UNPROCESSABLE_ENTITY, array $headers = []): JsonResponse
    {
        if(empty($message)) {
            throw new Exception("Message string param can not be empty.");
        }

        $response = [
            "error"             => "validation",
            "error_description" => $message,
            "hint"              => __("errors.validation-hint"),
            "message"           => $message,
            "errors"            => $errors,
            "status"            => $http_code,
        ];

        return response()->json(
            $response,
            $http_code,
            $headers
        );
    }

    public function errorResponse(string $error, string $error_description, string $hint, string $message, string $http_code = Response::HTTP_INTERNAL_SERVER_ERROR, array $headers = []): JsonResponse
    {
        $response = [
            "error"                 => $error,
            "error_description"     => $error_description,
            "hint"                  => $hint,
            "message"               => $message,
            "status"                => $http_code
        ];

        return response()->json(
            $response,
            $http_code,
            $headers
        );
    }

    public function userDoesNotHasPermissionToAction(): JsonResponse
    {
        $http_code = Response::HTTP_FORBIDDEN;

        $error_type = "user_permission_denied";

        return $this->errorResponse(
            $error_type,
            __("errors.{$error_type}.description"),
            __("errors.{$error_type}.hint"),
            __("errors.{$error_type}.message"),
            $http_code
        );
    }
}
