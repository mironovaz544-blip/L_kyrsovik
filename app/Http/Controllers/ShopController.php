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
    public function index(Request $request): View
    {
        // Получаем 6 последних рецептов для отображения на главной (опционально)
        $latestRecipes = Recipe::query()
            ->with('mainPhoto')
            ->withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->orderByDesc('created_at')
            ->limit(6)
            ->get();

        return view('shop.index', compact('latestRecipes'));
    }

    public function recept(Request $request): View
    {
        $query = Recipe::query()
            ->with('mainPhoto')
            ->withAvg('reviews', 'rating')
            ->withCount('reviews');

        // ПОИСК ПО НАЗВАНИЮ И ПЕРВЫМ БУКВАМ
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;

            // Если поиск по одной букве (поиск по первым буквам)
            if (mb_strlen($searchTerm) === 1) {
                $query->where(function($q) use ($searchTerm) {
                    $q->where('title', 'LIKE', $searchTerm . '%')
                        ->orWhere('title', 'LIKE', mb_strtolower($searchTerm) . '%')
                        ->orWhere('title', 'LIKE', mb_strtoupper($searchTerm) . '%');
                });
            } else {
                // Полнотекстовый поиск по названию
                $query->where(function($q) use ($searchTerm) {
                    $q->where('title', 'LIKE', '%' . $searchTerm . '%')
                        ->orWhere('description', 'LIKE', '%' . $searchTerm . '%');
                });
            }
        }

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

        // Получаем количество рецептов по категориям (с учетом поиска)
        $categoryCounts = [];
        foreach (RecipeTypeEnum::cases() as $type) {
            $categoryQuery = Recipe::where('type', $type->value);

            // Применяем тот же поиск для подсчета в категориях
            if ($request->has('search') && $request->search != '') {
                $searchTerm = $request->search;
                if (mb_strlen($searchTerm) === 1) {
                    $categoryQuery->where(function($q) use ($searchTerm) {
                        $q->where('title', 'LIKE', $searchTerm . '%')
                            ->orWhere('title', 'LIKE', mb_strtolower($searchTerm) . '%')
                            ->orWhere('title', 'LIKE', mb_strtoupper($searchTerm) . '%');
                    });
                } else {
                    $categoryQuery->where(function($q) use ($searchTerm) {
                        $q->where('title', 'LIKE', '%' . $searchTerm . '%')
                            ->orWhere('description', 'LIKE', '%' . $searchTerm . '%');
                    });
                }
            }

            $categoryCounts[$type->value] = $categoryQuery->count();
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
