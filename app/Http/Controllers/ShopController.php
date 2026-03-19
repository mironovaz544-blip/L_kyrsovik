<?php

namespace App\Http\Controllers;

use App\Advices\PhotoAdvice;
use App\Enums\AdviceTypeEnum;
use App\Enums\RecipeTypeEnum;
use App\Http\Requests\StoreAdviceRequest;
use App\Http\Requests\StoreReviewRequest;
use App\Models\Advice;
use App\Models\Recipe;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log; // Добавим для логирования

class ShopController extends Controller
{
    /**
     * Главная страница
     */
    public function index(Request $request): View
    {
        // Получаем 4 последних основных рецептов
        $latestRecipes = Recipe::query()
            ->with('mainPhoto')
            ->withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->orderByDesc('created_at')
            ->limit(4)
            ->get();

        // Получаем 4 последних рецептов от пользователей (Advice)
        $userRecipes = Advice::query()
            ->with('mainPhoto')
            ->with('user')
            ->orderByDesc('created_at')
            ->limit(4)
            ->get();

        // Получаем последние 5 статей для слайдера
        $latestArticles = Article::query()
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        return view('shop.index', compact('latestRecipes', 'userRecipes', 'latestArticles'));
    }

    /**
     * Страница со списком рецептов
     */
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

    /**
     * Страница контактов
     */
    public function contacts(): View
    {
        return view('shop.contacts');
    }

    /**
     * Страница калькуляторов
     */
    public function calculators(): View
    {
        return view('shop.calculators');
    }

    /**
     * Страница теста
     */
    public function test(): View
    {
        return view('shop.test');
    }
    /**
     * Показать детальную страницу рецепта от пользователя
     */
    public function showUserAdvice(Advice $advice): View
    {
        $advice->load('user', 'photos');
        return view('shop.show-user', compact('advice'));
    }

    /**
     * Страница со списком всех рецептов от пользователей (Advice)
     */
    public function userRecept(Request $request): View
    {
        $query = Advice::query()
            ->with('mainPhoto')
            ->with('user')
            ->orderByDesc('created_at');

        // Поиск по названию
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('description', 'LIKE', '%' . $searchTerm . '%');
            });
        }

        // Фильтрация по категории
        if ($request->filled('category')) {
            $query->where('type', $request->category);
        }

        // Сортировка
        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'title_asc':
                    $query->orderBy('title');
                    break;
                case 'title_desc':
                    $query->orderByDesc('title');
                    break;
                case 'oldest':
                    $query->orderBy('created_at');
                    break;
                default:
                    $query->orderByDesc('created_at');
            }
        } else {
            $query->orderByDesc('created_at');
        }

        $userRecipes = $query->paginate(9)->withQueryString();

        // Получаем количество рецептов по категориям
        $categoryCounts = [];
        foreach (AdviceTypeEnum::cases() as $type) {
            $categoryCounts[$type->value] = Advice::where('type', $type->value)->count();
        }

        return view('shop.user-recept', compact('userRecipes', 'categoryCounts'));

    }


    /**
     * Показать форму создания рецепта (для авторизованных пользователей)
     */
    public function createAdvice(): View
    {
        // Получаем типы рецептов для выпадающего списка
        $types = AdviceTypeEnum::options();

        return view('shop.create-advice', compact('types'));
    }

    /**
     * Сохранить новый рецепт от пользователя
     */
    public function storeAdvice(StoreAdviceRequest $request, PhotoAdvice $photoAdvice): RedirectResponse
    {
        try {
            // Получаем валидированные данные
            $data = $request->validated();

            // Добавляем ID текущего пользователя
            $data['user_id'] = auth()->id();

            // Создаем рецепт
            $advice = Advice::create($data);

            // Загружаем фото, если оно есть
            if ($request->hasFile('photo')) {
                $photoAdvice->uploadPhoto($request->file('photo'), $advice, 0);
            }

            // Логируем успешное добавление
            Log::info('Новый рецепт добавлен пользователем', [
                'user_id' => auth()->id(),
                'advice_id' => $advice->id,
                'title' => $advice->title
            ]);

            // Перенаправляем на ГЛАВНУЮ страницу с успешным сообщением
            return redirect()->route('shop.index')
                ->with('success', 'Ваш рецепт "' . $advice->title . '" успешно добавлен! Спасибо, что делитесь рецептами с нашим сообществом!');

        } catch (\Exception $e) {
            // Логируем ошибку
            Log::error('Ошибка при добавлении рецепта', [
                'user_id' => auth()->id(),
                'error' => $e->getMessage()
            ]);

            // В случае ошибки
            return redirect()->back()
                ->withInput()
                ->with('error', 'Произошла ошибка при сохранении рецепта. Пожалуйста, попробуйте еще раз.');
        }
    }
    /**
     * Страница со списком статей
     */
    public function article(): View
    {
        // Получаем все статьи с пагинацией
        $articles = Article::query()
            ->orderByDesc('created_at')
            ->paginate(6);

        return view('shop.article', compact('articles'));
    }

    /**
     * Показать детальную страницу рецепта
     */
    public function show(Recipe $recipe): View
    {
        $recipe->load(['reviews.user', 'mainPhoto']);
        $recipe->loadAvg('reviews', 'rating');
        $recipe->loadCount('reviews');

        return view('shop.show', compact('recipe'));
    }

    /**
     * Показать детальную страницу статьи
     */
    public function showArticle(Article $article): View
    {
        return view('shop.show-article', compact('article'));
    }

    /**
     * Сохранить отзыв на рецепт
     */
    public function storeReview(StoreReviewRequest $request, Recipe $recipe): RedirectResponse
    {
        $recipe->reviews()->create([
            'user_id' => auth()->id(),
            'rating' => $request->validated('rating'),
            'comment' => $request->validated('comment'),
        ]);

        return redirect()->route('shop.show', $recipe)
            ->with('success', 'Спасибо за ваш отзыв!');
    }
}
