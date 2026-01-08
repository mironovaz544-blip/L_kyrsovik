<?php

namespace App\Enums;

enum RecipeTypeEnum: int
{
case Test = 1;
case Test2 = 2;


public  function label(): string
{
    return match ($this) {
        self::Test => 'Салаты',
        self::Test2 => 'Сладкое',
    };
}

public static function options(): array
{
    return collect(self::cases())
        ->mapWithKeys(fn($test) => [$test->value => $test->label()])
        ->toArray();
}


}
