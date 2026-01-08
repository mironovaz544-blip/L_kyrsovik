<?php

namespace App\Http\Controllers;

use App\Enums\RecipeTypeEnum;
use App\Http\Requests\CreateRecipeRequest;
use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;
use App\Models\Recipe;
use App\Recipes\PhotoRecipe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RecipeController extends Controller
{


    public function index(): View
    {
        $recipes = Recipe::with('mainPhoto')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('recipes.index', compact('recipes'));
    }

    public function create(): View
    {
        $types = RecipeTypeEnum::options();

        return view('recipes.create',compact('types'));
    }

    public function store(StoreRecipeRequest $request, PhotoRecipe $photoRecipe): RedirectResponse
    {
        $recipe = Recipe::create($request->validated());
        if ($request->hasFile('photo')) {
            $photoRecipe ->uploadPhoto($request->file('photo'),$recipe, 0);
        }

        return redirect()->route('recipes.index' )
            ->with('success', 'Рецепт успешно создан');
    }

    public function show(Recipe $recipe):View
    {
        $recipe->load('photos');

        return view('recipes.show', compact('recipe'));
    }


    public function edit(Recipe  $recipe): View
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
            ->with('success', 'Рецепт успешно обновлен !');
    }


    public function destroy(Recipe $recipe): RedirectResponse
    {
        $recipe->delete();
        return redirect()->route('recipes.index')
            ->with('success', 'Рецепт успешно удален !');

    }
}
