<?php

namespace Database\Factories;

use App\Enums\AdviceTypeEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class AdviceFactory extends Factory
{

    public function definition(): array
    {
        return [
            'title' =>fake()->words(3, true),

            'description' =>fake()->paragraph(),
            'counts' =>fake()->paragraph(),
            'process' =>fake()->paragraph(),
            'type'=>fake()->randomElement(AdviceTypeEnum::class::cases()),
            'user_id' => User::factory(),
        ];
    }
}
