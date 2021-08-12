<?php

namespace App\API\Interfaces;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

interface HTTPResponse
{
    /**
     * Returns a response with data. Message is optional
     *
     * @param array $data
     * @param string|null $message
     * @param string $http_code
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public function response(array $data, ?string $message, string $http_code = Response::HTTP_OK, array $headers = []): JsonResponse;

    /**
     * Returns a response with message.
     *
     * @param string $message
     * @param string $http_code
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public function messageResponse(string $message, string $http_code = Response::HTTP_OK, array $headers = []): JsonResponse;

    /**
     * Returns a validation message response.
     *
     * @param array $errors
     * @param string $message
     * @param string $http_code
     * @param array $headers
     * @return JsonResponse
     */
    public function validationResponse(array $errors, string $message, string $http_code = Response::HTTP_UNPROCESSABLE_ENTITY, array $headers = []): JsonResponse;

    /**
     * Returns an error response
     *
     * @param string $error
     * @param string $error_description
     * @param string $hint
     * @param string $message
     * @param string $http_code
     * @param array $headers
     * @return JsonResponse
     */
    public function errorResponse(string $error, string $error_description, string $hint, string $message, string $http_code = Response::HTTP_INTERNAL_SERVER_ERROR, array $headers = []): JsonResponse;

    /**
     * Returns a permission response
     *
     * @return JsonResponse
     */
    public function userDoesNotHasPermissionToAction(): JsonResponse;
}
