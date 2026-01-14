<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Model;
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

    public function recept(Request $request): View
    {
        $query = Recipe::withCount('reviews')->with('reviews');
        $sort = $request->input('sort');


        if ($sort === 'type_asc') {
            $query->orderBy('type', 'asc');
        } elseif ($sort === 'type_desc') {
            $query->orderBy('type', 'desc');
        }

        if ($sort === 'title_asc') {
            $query->orderBy('title', 'asc');
        } elseif ($sort === 'title_desc') {
            $query->orderBy('title', 'desc');
        }

        if ($sort === 'rating_asc') {
            $query->orderBy('rating', 'asc');
        } elseif ($sort === 'rating_desc') {
            $query->orderBy('rating', 'desc');
        }

        $results = $query->get();

        $recipes = $query->paginate(9);
        //$recipes = Recipe::withCount('reviews')
         //   ->with('reviews')
          //  ->orderBy('created_at', 'desc')
           // ->paginate(9);
        return view('shop.recept', compact('recipes'));
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
