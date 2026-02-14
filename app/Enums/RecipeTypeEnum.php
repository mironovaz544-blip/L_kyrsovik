<?php

namespace App\Enums;

enum RecipeTypeEnum: int
{
    case Test = 1;
    case Test2 = 2;
    case Test3 = 3;
    case Test4 = 4;
    case Test5 = 5;




    public function label(): string
    {
        return match ($this) {
            self::Test => 'Салаты',
            self::Test2 => 'Десерты',
            self::Test3 => 'Мясные блюда',
            self::Test4 => 'Рыбные блюда',
            self::Test5 => 'Напитки',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn($type) => [$type->value => $type->label()])
            ->toArray();
    }
}
