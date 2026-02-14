<?php

namespace Database\Factories;

use App\Enums\ArticleTypeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{

    public function definition(): array
    {
        return [
            'title' =>fake()->words(3, true),
            'concept' =>fake()->paragraph(),
            'texts' =>fake()->paragraph(),
            'type'=>fake()->randomElement(ArticleTypeEnum::class::cases()),
        ];
    }
}
