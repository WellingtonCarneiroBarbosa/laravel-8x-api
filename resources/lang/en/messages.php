<?php

$prefixes = [
    'created' => 'created successfully',
    'updated' => 'updated successfully',
    'deleted' => 'permanently deleted successfully'
];

return [
    /**
    |--------------------------------------------------------------------------
    | Messages
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by application to get success messages
    | after an action.
    |
    */

    "users" => [
        "created" => "User {$prefixes['created']}.",
    ],

    "customers" => [
        "created" => "User {$prefixes['created']}.",
        "updated" => "User {$prefixes['updated']}.",
        "deleted" => "User {$prefixes['deleted']}.",
    ],

    "password-reset" => [
        "sent" => 'Your password reset code sent via :via. Code expires in :minutes minutes.',
        "reseted" => "Password updated.",
    ]
];
