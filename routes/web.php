<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShopController::class, 'index'])->name('shop.index');
Route::get('/product/{recipe}', [ShopController::class, 'show'])->name('shop.show');
Route::post('/product/{recipe}/review', [ShopController::class, 'storeReview'])->name('shop.review.store')->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/recept',[ShopController::class,'recept'])->name('recept.index');
Route::get('/contacts',[ShopController::class,'contacts'])->name('contacts.index');
Route::get('/calculators',[ShopController::class,'calculators'])->name('calculators.index');
Route::get('/test',[ShopController::class,'test'])->name('test.index');
Route::get('/article', [ShopController::class, 'article'])->name('shop.article');
Route::get('/article/{article}', [ShopController::class, 'showArticle'])->name('shop.show-article');




Route::middleware('auth')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('recipes', RecipeController::class);
    Route::resource('reviews', ReviewController::class);
    Route::resource('articles', ArticleController::class);
    Route::resource('newss', NewsController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/email', [ProfileController::class, 'updateEmail'])->name('profile.email.update');
    Route::patch('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');

});

require __DIR__.'/auth.php';
