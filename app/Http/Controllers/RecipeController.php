<?php

namespace App\Http\Controllers;

use App\Enums\RecipeTypeEnum;
use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;
use App\Models\Recipe;
use App\Recipes\PhotoRecipe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RecipeController extends Controller
{
    public function index(Request $request): View
    {
        $query = Recipe::query()
            ->with('mainPhoto')
            ->withAvg('reviews', 'rating')
            ->withCount('reviews');

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

        // Получаем количество рецептов по категориям
        $categoryCounts = [];
        foreach (RecipeTypeEnum::cases() as $type) {
            $categoryCounts[$type->value] = Recipe::where('type', $type->value)->count();
        }

        return view('recipes.index', compact('recipes', 'categoryCounts'));
    }

    public function create(): View
    {
        $types = RecipeTypeEnum::options();

        return view('recipes.create', compact('types'));
    }

    public function store(StoreRecipeRequest $request, PhotoRecipe $photoRecipe): RedirectResponse
    {
        $recipe = Recipe::create($request->validated());

        if ($request->hasFile('photo')) {
            $photoRecipe->uploadPhoto($request->file('photo'), $recipe, 0);
        }

        return redirect()->route('recipes.index')
            ->with('success', 'Рецепт успешно создан');
    }

    public function show(Recipe $recipe): View
    {
        $recipe->load('photos');

        return view('recipes.show', compact('recipe'));
    }

    public function edit(Recipe $recipe): View
    {
        $recipe->load('photos');
        $types = RecipeTypeEnum::options();

        return view('recipes.edit', compact('recipe', 'types'));
    }

    public function update(UpdateRecipeRequest $request, Recipe $recipe, PhotoRecipe $photoRecipe): RedirectResponse
    {
        $recipe->update($request->validated());

        if ($request->input('delete_photo')) {
            $mainPhoto = $recipe->mainPhoto;
            if ($mainPhoto) {
                $photoRecipe->deletePhoto($mainPhoto);
            }
        }

        if ($request->hasFile('photo')) {
            $mainPhoto = $recipe->mainPhoto;
            if ($mainPhoto) {
                $photoRecipe->deletePhoto($mainPhoto);
            }

            $photoRecipe->uploadPhoto($request->file('photo'), $recipe, 0);
        }

        return redirect()->route('recipes.index')
            ->with('success', 'Рецепт успешно обновлен!');
    }

    public function destroy(Recipe $recipe): RedirectResponse
    {
        $recipe->delete();

        return redirect()->route('recipes.index')
            ->with('success', 'Рецепт успешно удален!');
    }
}
