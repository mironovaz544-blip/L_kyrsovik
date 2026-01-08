<?php

namespace App\Models;

use App\Enums\RecipeTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Recipe extends Model
{
    use HasFactory;

    protected $table = 'recipes';

    protected $fillable = [
        'title',

        'description',
        'counts',
        'process',
        'type'
    ];

    protected $casts = [
        'type' => RecipeTypeEnum::class,
    ];


    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function averageRating(): float
    {
        return round($this->reviews()->avg('rating') ?? 0, 1);
    }
    public function reviewsCount(): int{
        return $this->reviews()->count();
    }

    public function photos(): MorphMany
    {
        return $this->morphMany(Photo::class, 'photoable')->orderBy('order');
    }
    public function mainPhoto(): MorphOne
    {
        return $this->morphOne(Photo::class, 'photoable')->orderBy('order');
    }
    public function getThumbnailUrlAttribute(): ?string
    {
        return $this->mainPhoto?->thumbnail_url;
    }
    public function getDetailImageUrlAttribute(): ?string
    {
        return $this->mainPhoto?->detail_url;
    }
    protected static function booted(): void{
        static::deleting(function (Recipe $recipe) {
            $recipe->photos()->each(function (Photo $photo) {
                $photo->delete();
            });
        });
    }
}

