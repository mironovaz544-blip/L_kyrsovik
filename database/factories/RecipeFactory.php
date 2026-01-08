<?php

namespace Database\Factories;

use App\Enums\RecipeTypeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;


class RecipeFactory extends Factory
{

    public function definition(): array
    {
        return [
            'title' =>fake()->words(3, true),

            'description' =>fake()->paragraph(),
            'counts' =>fake()->paragraph(),
            'process' =>fake()->paragraph(),
            'type'=>fake()->randomElement(RecipeTypeEnum::class::cases()),
        ];
    }
}
