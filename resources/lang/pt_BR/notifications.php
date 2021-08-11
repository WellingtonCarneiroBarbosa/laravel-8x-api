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
            "subject"   => "Seu código de acesso Chegow",
            "line-1"    => "Bem-vindo à Chegow.",
            "code"      => "Seu código para criar sua senha e sua conta é:",
        ],

        "reset-password" => [
            "subject"   => "Seu código de redefinição de senha Chegow: :code",
            "line-1"    => "Seu código para redefinir sua senha é:",
            "line-2"    => "Este código é válido até: :validity",
        ]
    ],
];