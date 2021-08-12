<?php

return [
    /**
    |--------------------------------------------------------------------------
    | Errors
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by application to get errors message.
    |
    */

    "default"       => "Sorry. Something went wrong.",

    "validation"    => "Your request contains invalid fields.",

    "validation-hint" => "Check that the parameters provided are valid.",

    "param-required" => ":param param is required to this URI",

    "unauthenticated"  => [
        "description"   => "This uri is protected by authentication.",
        "hint"          => "Check the validity of your token."
    ],

    "user_permission_denied" => [
        "description"   => "User does not have permission to perform this action.",
        "hint"          => "Display the permission denied message in your application.",
        "message"       => "You are not allowed to perform this action."
    ],

    "reset-password" => [
        "invalid_code" => [
            "description"   => "The password reset code is invalid or expired.",
            "hint"          => "Check the password reset code provided.",
            "message"       => "This code is invalid or expired."
        ]
    ],

    "resource_not_found" => [
        "description"   => "Invalid UUID or URI does not exist.",
        "hint"          => "Checks the uuid provided or the uri provided.",
        "message"       => "Record or uri not found."
    ],

    "internal_server_error" => [
        "description"   => "Something wrong happened to our server.",
        "hint"          => "Report the error to support team.",
        "message"       => "Sorry. Something went wrong."
    ],

    "password" => [
        "length"            => "At least 8 characters.",
        "numbers"           => "At least 1 number.",
        "uppercase"         => "At least 1 uppercase char.",
        "special_chars"     => "At least 1 special char.",
        "lowercase"         => "At least 1 lowercase char."
    ],
];
