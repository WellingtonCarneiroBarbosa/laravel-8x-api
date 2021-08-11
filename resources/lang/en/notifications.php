<?php

return [
    /**
    |--------------------------------------------------------------------------
    | Notifications
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by application to get notifications messages
    |
    */

    "users" => [
        "create-password" => [
            "subject"   => "Your Chegow Access Code",
            "line-1"    => "Welcome to Chegow.",
            "code"      => "Your code to create your password and access your account is:",
        ],

        "reset-password" => [
            "subject"   => "Your Chegow Password Reset Code: :code",
            "line-1"    => "Your code to reset your password is:",
            "line-2"    => "This code is valid until: :validity",
        ]
    ],
];