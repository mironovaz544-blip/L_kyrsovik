<?php

namespace App\Enums;

enum ArticleTypeEnum:int
{
case Nov =1;
case Nov2 = 2;

    public function label(): string
    {
        return match ($this) {
            self::Nov => 'Статьи',
            self::Nov2 => '',

        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn($type) => [$type->value => $type->label()])
            ->toArray();
    }
}


