<?php

namespace App\Enums;

enum UserRoleEnum:int
{
    case Admin = 1;
    case User = 2;


public  function label():string
{
    return match ($this) {
        self::Admin => "Администратор",
        self::User => "Пользователь",
    };
}

    public static function options():array
    {

        return collect(self::cases())
            ->mapWithKeys(fn($role) => [$role->value => $role->label()])
            ->toArray();
    }
}
