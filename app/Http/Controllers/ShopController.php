<?php

namespace App\Http\Controllers;

use App\Enums\RecipeTypeEnum;
use App\Http\Requests\StoreReviewRequest;
use App\Models\Recipe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShopController extends Controller
{
    public function index(): View
    {
        $recipes = Recipe::withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->with('reviews')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('shop.index', compact('recipes'));
    }

    public function recept(Request $request): View
    {
        $query = Recipe::query()
            ->with('mainPhoto')
            ->withAvg('reviews', 'rating')
            ->withCount('reviews');

        // Фильтрация по категории
        if ($request->has('category') && $request->category != '') {
            $query->where('type', $request->category);
        }

        // Сортировка
        if ($request->has('sort') && $request->sort != '') {
            switch ($request->sort) {
                case 'type_asc':
                    $query->orderBy('type');
                    break;
                case 'type_desc':
                    $query->orderByDesc('type');
                    break;
                case 'title_asc':
                    $query->orderBy('title');
                    break;
                case 'title_desc':
                    $query->orderByDesc('title');
                    break;
                case 'rating_asc':
                    $query->orderBy('reviews_avg_rating');
                    break;
                case 'rating_desc':
                    $query->orderByDesc('reviews_avg_rating');
                    break;
                case 'created_at_asc':
                    $query->orderBy('created_at');
                    break;
                case 'created_at_desc':
                    $query->orderByDesc('created_at');
                    break;
            }
        } else {
            $query->orderByDesc('created_at');
        }

        $recipes = $query->paginate(9);

        // Получаем количество рецептов по категориям
        $categoryCounts = [];
        foreach (RecipeTypeEnum::cases() as $type) {
            $categoryCounts[$type->value] = Recipe::where('type', $type->value)->count();
        }

        return view('shop.recept', compact('recipes', 'categoryCounts'));
    }

    public function articles(): View
    {
        return view('shop.articles');
    }

    public function contacts(): View
    {
        return view('shop.contacts');
    }

    public function calculators(): View
    {
        return view('shop.calculators');
    }

    public function article_1(): View
    {
        return view('shop.article_1');
    }

    public function article_2(): View
    {
        return view('shop.article_2');
    }

    public function article_3(): View
    {
        return view('shop.article_3');
    }

    public function article_4(): View
    {
        return view('shop.article_4');
    }

    public function test(): View
    {
        return view('shop.test');
    }

    public function show(Recipe $recipe): View
    {
        $recipe->load(['reviews.user', 'mainPhoto']);
        $recipe->loadAvg('reviews', 'rating');
        $recipe->loadCount('reviews');

        return view('shop.show', compact('recipe'));
    }

    public function storeReview(StoreReviewRequest $request, Recipe $recipe): RedirectResponse
    {
        $recipe->reviews()->create([
            'user_id' => auth()->id(),
            'rating' => $request->validated('rating'),
            'comment' => $request->validated('comment'),
        ]);

        return redirect()->route('shop.show', $recipe)->with('success', 'Спасибо за ваш отзыв!');
    }
}
