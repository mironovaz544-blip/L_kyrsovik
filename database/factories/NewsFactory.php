<?php

namespace Database\Factories;

use App\Enums\NewsTypeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' =>fake()->words(3, true),
            'description' =>fake()->paragraph(),
            'story' =>fake()->paragraph(),
            'type'=>fake()->randomElement(NewsTypeEnum::class::cases()),
        ];
    }
}
