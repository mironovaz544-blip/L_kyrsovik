<?php

use App\Enums\RecipeTypeEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title',150);

            $table->text('description')->nullable();
            $table->text('counts')->nullable();
            $table->text('process')->nullable();
            $table->unsignedTinyInteger('type')->default(\App\Enums\RecipeTypeEnum::Test->value);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
