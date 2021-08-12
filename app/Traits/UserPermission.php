<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait UserPermission
{
    /**
     * Checks if user has permission to perform an action
     *
     * @param string $auth_user_id
     * @param string $action
     * @param string $entity
     * @return boolean
     */
    public function userHasPermissionTo(string $auth_user_id, string $action, string $entity): bool
    {
        $client = new Client([
            "base_uri" => config('app.web_client_provider_url'),
        ]);

        $headers = [
            'Service-Authorization' => config('app.web_client_provider_franchise_secret'),
        ];

        $form_params = [
            'action' => $action,
            'entity' => $entity
        ];

        $response = $client->request("POST", "/api/franchises/user/{$auth_user_id}/check-permission", [
            'form_params'   => $form_params,
            'headers'       => $headers,
            'http_errors' => false
        ]);

        $body = $response->getBody();

        $response = json_decode($body, true);

        if(isset($response['permission'])) {
            return (bool) $response['permission'];
        }

        return false;
    }

    /**
     * Return forbidden response if user does not has permission to
     * perform an anction
     *
     * @param string $auth_user_id
     * @param string $action
     * @param string $entity
     * @return array
     */
    public function denyIfDoesNotHasPermission(string $auth_user_id, string $action, string $entity): array
    {
        $has_permission = $this->userHasPermissionTo($auth_user_id, $action, $entity);

        if(! $has_permission) {
            $result = [
                "passes"    => false,
                "deny"      => apiResponser()->userDoesNotHasPermissionToAction(),
            ];
        } else {
            $result = [
                "passes" => true
            ];
        }

        return $result;
    }
}
