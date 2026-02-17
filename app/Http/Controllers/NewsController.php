<?php

namespace App\Http\Controllers;

use App\Enums\NewsTypeEnum;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;
use App\Newss\PhotoNews;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $newss = News::with('mainPhoto') // Изменил имя переменной
        ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('newss.index', compact('newss')); // Передаем $newss
    }

    public function create(): View
    {
        $types = NewsTypeEnum::options();

        return view('newss.create', compact('types'));
    }

    public function store(StoreNewsRequest $request, PhotoNews $photoNews): RedirectResponse
    {
        $news = News::create($request->validated());
        if ($request->hasFile('photo')) {
            $photoNews->uploadPhoto($request->file('photo'), $news, 0);
        }

        return redirect()->route('newss.index')
            ->with('success', 'Новость успешно создана'); // Исправлено
    }

    public function show(News $news): View
    {
        $news->load('photos');

        return view('newss.show', compact('news'));
    }

    public function edit(News $news): View
    {
        $news->load('photos');
        $types = NewsTypeEnum::options();

        return view('newss.edit', compact('news', 'types'));
    }

    public function update(UpdateNewsRequest $request, News $news, PhotoNews $photoNews): RedirectResponse
    {
        $news->update($request->validated());

        if ($request->input('delete_photo')) {
            $mainPhoto = $news->mainPhoto;
            if ($mainPhoto) {
                $photoNews->deletePhoto($mainPhoto);
            }
        }

        if ($request->hasFile('photo')) {
            $mainPhoto = $news->mainPhoto;
            if ($mainPhoto) {
                $photoNews->deletePhoto($mainPhoto);
            }

            $photoNews->uploadPhoto($request->file('photo'), $news, 0);
        }

        return redirect()->route('newss.index')
            ->with('success', 'Новость успешно обновлена!'); // Исправлено
    }

    public function destroy(News $news): RedirectResponse
    {
        $news->delete();

        return redirect()->route('newss.index')
            ->with('success', 'Новость успешно удалена!'); // Исправлено
    }
}
