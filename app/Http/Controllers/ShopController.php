<?php

namespace App\Http\Controllers;

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
            ->with('reviews')
            ->orderBy('created_at', 'desc')
            ->paginate(12);
        return view('shop.index', compact('recipes'));
    }



    public function show(Recipe $recipe): View
    {
        $recipe->load(['reviews.user']);
        return view('shop.show', compact('recipe'));
    }
    public function storeReview(StoreReviewRequest $request, Recipe $recipe): RedirectResponse

    {
        $recipe->reviews()->create([
            'user_id' => auth()->id(),
            'rating' => $request->validated('rating'),
            'comment' => $request->validated('comment'),

        ]);

        return redirect()->route('shop.show', $recipe)-> with('success', 'Спасибо за ваш отзыв' );
    }

}
