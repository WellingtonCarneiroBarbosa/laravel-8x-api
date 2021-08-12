<?php

$prefixes = [
    'created' => 'criado com sucesso',
    'updated' => 'atualizado com sucesso',
    'deleted' => 'excluído permanentemente com sucesso'
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
        "created" => "Usuário criado com sucesso.",
    ],

    "customers" => [
        "created" => "Usuário {$prefixes['created']}.",
        "updated" => "Usuário {$prefixes['updated']}.",
        "deleted" => "Usuário {$prefixes['deleted']}.",
    ],

    "password-reset" => [
        "sent" => 'Seu código de redefinição foi enviado via :via. Este código expira em :minutes minutos.',
        "reseted" => "Senha atualizada.",
    ]
];
