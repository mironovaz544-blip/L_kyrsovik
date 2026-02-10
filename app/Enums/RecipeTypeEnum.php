<?php

namespace App\Enums;

enum RecipeTypeEnum: int
{
    case SALADS = 1;
    case DESSERTS = 2;
    case MEAT = 3;
    case FISH = 4;
    case DRINKS = 5;




    public function label(): string
    {
        return match ($this) {
            self::SALADS => 'Салаты',
            self::DESSERTS => 'Десерты',
            self::MEAT => 'Мясные блюда',
            self::FISH => 'Рыбные блюда',
            self::DRINKS => 'Напитки',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn($type) => [$type->value => $type->label()])
            ->toArray();
    }
}
