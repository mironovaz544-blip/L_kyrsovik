<?php

namespace App\Http\Controllers;

use App\Enums\RecipeTypeEnum;
use App\Http\Requests\CreateRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;
use App\Models\Recipe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RecipeController extends Controller
{


    public function index(): View
    {
        $recipes = Recipe::all();
        return view('recipes.index', compact('recipes'));
    }

    public function create(): View
    {
        $roles = RecipeTypeEnum::options();

        return view('recipes.index', compact('roles'));
    }

    public function store(CreateRecipeRequest $request): RedirectResponse
    {
       Recipe::create($request->validated());
       return redirect()->route('recipe.index');
    }
    public function show(Recipe $recipe):View
    {
        return view('recipes.show', compact('recipe'));
    }


    public function edit(Recipe  $recipe): View
    {
        $roles = RecipeTypeEnum::options();

        return view('recipes.index', compact('recipe', 'roles'));
    }


    public function update(UpdateRecipeRequest $request, Recipe $recipe): RedirectResponse
    {
        $recipe->update($request->validated());
        return redirect()->route('recipes.index');
    }


    public function destroy(Recipe $recipe): RedirectResponse
    {
        $recipe->delete();
        return redirect()->route('recipes.index');
    }
}
