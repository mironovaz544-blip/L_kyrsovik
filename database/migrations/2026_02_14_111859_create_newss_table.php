<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('newss', function (Blueprint $table) {
            $table->id();
            $table->string('title',150);
            $table->text('description')->nullable();
            $table->text('story')->nullable();
            $table->unsignedTinyInteger('type')->default(\App\Enums\NewsTypeEnum::New->value);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('newss');
    }
};
