<?php

namespace App\Http\Controllers;

use App\Articles\PhotoArticle;
use App\Enums\ArticleTypeEnum;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index():View
    {
        $articles = Article::with('mainPhoto')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('articles.index', compact('articles'));
    }

    public function create(): View
    {
        $types = ArticleTypeEnum::options();

        return view('articles.create',compact('types'));
    }

    public function store(StoreArticleRequest $request, PhotoArticle $photoArticle): RedirectResponse
    {
        // Получаем валидированные данные без файла
        $data = $request->validated();

        // Создаем статью
        $article = Article::create($data);

        // Обрабатываем фото отдельно
        if ($request->hasFile('photo')) {
            $photoArticle->uploadPhoto($request->file('photo'), $article, 0);
        }

        return redirect()->route('articles.index')
            ->with('success', 'Рецепт успешно создан');
    }

    public function show(Article $article):View
    {
        $article->load('photos');

        return view('articles.show', compact('article'));
    }


    public function edit(Article  $article): View
    {
        $article->load('photos');
        $types = ArticleTypeEnum::options();

        return view('articles.edit', compact('article', 'types'));
    }


    public function update(UpdateArticleRequest $request, Article $article, PhotoArticle $photoArticle): RedirectResponse
    {
        $article->update($request->validated());

        if ($request->input('delete_photo')) {
            $mainPhoto = $article->mainPhoto;
            if ($mainPhoto) {
                $photoArticle->deletePhoto($mainPhoto);
            }
        }
        if ($request->hasFile('photo')) {
            $mainPhoto = $article->mainPhoto;
            if ($mainPhoto) {
                $photoArticle->deletePhoto($mainPhoto);
            }

            $photoArticle->uploadPhoto($request->file('photo'), $article, 0);
        }
        return redirect()->route('articles.index')
            ->with('success', 'Рецепт успешно обновлен !');
    }


    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();
        return redirect()->route('articles.index')
            ->with('success', 'Рецепт успешно удален !');

    }
}
