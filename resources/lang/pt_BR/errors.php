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

    "default"       => "Desculpe. Algo errado ocorreu.",

    "validation"    => "Sua requisição contém campos inválidos.",

    "validation-hint" => "Verifique se os parâmetros providos são válidos.",

    "unauthenticated"  => [
        "description"   => "Esta uri é protegida por autenticação.",
        "hint"          => "Verifique a validade de seu token."
    ],

    "reset-password" => [
        "invalid_code" => [
            "description"   => "O código de redefinição de senha é inválido ou expirou.",
            "hint"          => "Verifique o código de redefinição de senha provido.",
            "message"       => "Este código é inválido ou expirou."
        ]
    ],

    "resource_not_found" => [
        "description"   => "UUID inválido ou a URI solicitada não existe.",
        "hint"          => "Verifique o UUID provido ou a URI provida.",
        "message"       => "Registro não encontrada ou URI não encontrada."
    ],

    "internal_server_error" => [
        "description"   => "Algo errado ocorreu com nosso servidor.",
        "hint"          => "Reporte o erro para o time de suporte.",
        "message"       => "Desculpe. Algo errado ocorreu."
    ],

    "password" => [
        "length"            => "Pelo menos 8 caracteres.",
        "numbers"           => "Pelo menos 1 número.",
        "uppercase"         => "Pelo menos 1 caractere maiúsculo.",
        "special_chars"     => "Pelo menos 1 caractere especial.",
        "lowercase"         => "Pelo menos 1 caractere minúsculo."
    ],
];
