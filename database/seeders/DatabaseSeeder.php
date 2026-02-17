<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\News;
use App\Models\Recipe;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory(10)->create();
        Recipe::factory(count: 10)->create();
        Review::factory(10)->create();
        Article::factory(10)->create();
        News   ::factory(10)->create();
    }
}
