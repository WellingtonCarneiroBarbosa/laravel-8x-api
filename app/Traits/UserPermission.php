<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait UserPermission
{
    public function userHasPermissionTo(string $user_id, string $action, string $entity): bool
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

        $response = $client->request("POST", "/api/franchises/user/{$user_id}/check-permission", [
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
}
