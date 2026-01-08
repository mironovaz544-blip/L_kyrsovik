<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReviewRequest;
use App\Models\Recipe;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function index()
    {
        $reviews = Review::with(['user','recipe'])->get();
        return view('reviews.index', compact('reviews'));
    }


    public function create()
    {
        $users = User::all();
        $recipes = Recipe::all();
        return view('reviews.create', compact('users','recipes'));

    }

    public function store(CreateReviewRequest $request): RedirectResponse
    {
        Review::create($request->validated());
        return redirect()->route('reviews.index');
    }

    public function show(Review $review)
    {
        $review = $review->load(['user', 'recipe']) ;
        return view('reviews.show', compact('review'));
    }

    public function edit(Review $review)
    {
        $users = User::all();
        $recipes = Recipe::all();
        return view('reviews.edit', compact('review','users','recipes',));
    }


    public function update(CreateReviewRequest $request, Review $review):RedirectResponse
    {
        $review->update($request->validated());
        return redirect()->route('reviews.index');
    }


    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('reviews.index');
    }
}
