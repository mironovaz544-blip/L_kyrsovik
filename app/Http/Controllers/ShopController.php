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
        // Получаем 6 последних рецептов для отображения на главной
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

        // ПОИСК ПО НАЗВАНИЮ И ОПИСАНИЮ
        if ($request->filled('search')) {
            $searchTerm = $request->search;

            // Если поиск по одной букве
            if (mb_strlen($searchTerm) === 1) {
                $query->where(function($q) use ($searchTerm) {
                    $q->where('title', 'LIKE', $searchTerm . '%')
                        ->orWhere('title', 'LIKE', mb_strtolower($searchTerm) . '%')
                        ->orWhere('title', 'LIKE', mb_strtoupper($searchTerm) . '%');
                });
            } else {
                // Полнотекстовый поиск
                $query->where(function($q) use ($searchTerm) {
                    $q->where('title', 'LIKE', '%' . $searchTerm . '%')
                        ->orWhere('description', 'LIKE', '%' . $searchTerm . '%');
                });
            }
        }

        // Фильтрация по категории
        if ($request->filled('category')) {
            $query->where('type', $request->category);
        }

        // Сортировка
        if ($request->filled('sort')) {
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
                    $query->orderBy('reviews_avg_rating', 'asc');
                    break;
                case 'rating_desc':
                    $query->orderBy('reviews_avg_rating', 'desc');
                    break;
                case 'created_at_asc':
                    $query->orderBy('created_at');
                    break;
                case 'created_at_desc':
                    $query->orderByDesc('created_at');
                    break;
                default:
                    $query->orderByDesc('created_at');
            }
        } else {
            $query->orderByDesc('created_at');
        }

        $recipes = $query->paginate(9)->withQueryString();

        // Получаем количество рецептов по категориям (с учетом поиска)
        $categoryCounts = $this->getCategoryCounts($request);

        return view('shop.recept', compact('recipes', 'categoryCounts'));
    }

    /**
     * Получить количество рецептов по категориям с учетом поиска
     */
    private function getCategoryCounts(Request $request): array
    {
        $categoryCounts = [];

        // Если есть поисковый запрос, используем его для подсчета
        $searchTerm = $request->filled('search') ? $request->search : null;

        foreach (RecipeTypeEnum::cases() as $type) {
            $query = Recipe::where('type', $type->value);

            // Применяем тот же поиск для подсчета в категориях
            if ($searchTerm) {
                if (mb_strlen($searchTerm) === 1) {
                    $query->where(function($q) use ($searchTerm) {
                        $q->where('title', 'LIKE', $searchTerm . '%')
                            ->orWhere('title', 'LIKE', mb_strtolower($searchTerm) . '%')
                            ->orWhere('title', 'LIKE', mb_strtoupper($searchTerm) . '%');
                    });
                } else {
                    $query->where(function($q) use ($searchTerm) {
                        $q->where('title', 'LIKE', '%' . $searchTerm . '%')
                            ->orWhere('description', 'LIKE', '%' . $searchTerm . '%');
                    });
                }
            }

            $categoryCounts[$type->value] = $query->count();
        }

        return $categoryCounts;
    }

    public function contacts(): View
    {
        return view('shop.contacts');
    }

    public function calculators(): View
    {
        return view('shop.calculators');
    }

    public function test(): View
    {
        return view('shop.test');
    }

    public function article(): View
    {
        // Получаем все статьи с пагинацией
        $articles = \App\Models\Article::query()
            ->orderByDesc('created_at')
            ->paginate(6);

        return view('shop.article', compact('articles'));
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
