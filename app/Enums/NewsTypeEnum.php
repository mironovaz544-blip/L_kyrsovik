<?php

namespace App\Enums;

enum NewsTypeEnum:int
{
case New = 1;
case New2 = 2;


public function label(): string
{
    return match ($this) {
        self::New => 'Новости',
        self::New2 => 'Разное',

    };
}

public static function options(): array
{
    return collect(self::cases())
        ->mapWithKeys(fn($type) => [$type->value => $type->label()])
        ->toArray();
}
}
