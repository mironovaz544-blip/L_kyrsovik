<?php

namespace App\Enums;

enum AdviceTypeEnum: int
{
    case Sov = 1;
    case Sov2= 2;
    case Sov3 = 3;
    case Sov4 = 4;
    case Sov5 = 5;




    public function label(): string
    {
        return match ($this) {
            self::Sov => 'Салаты',
            self::Sov2 => 'Десерты',
            self::Sov3 => 'Мясные блюда',
            self::Sov4 => 'Рыбные блюда',
            self::Sov5 => 'Напитки',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn($type) => [$type->value => $type->label()])
            ->toArray();
    }
}
