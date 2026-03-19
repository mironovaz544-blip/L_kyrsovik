<?php

namespace App\Http\Controllers;

use App\Advices\PhotoAdvice;
use App\Enums\AdviceTypeEnum;
use App\Http\Requests\StoreAdviceRequest;
use App\Http\Requests\UpdateAdviceRequest;
use App\Models\Advice;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class AdviceController extends Controller
{

    public function index(Request $request): View
    {
        $query = Advice::query()
            ->with('mainPhoto')
            ->with('user');

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

        $advices = $query->paginate(5); // Вернул обратно 5 записей на страницу

        // Сохраняем query параметры для пагинации
        if ($request->anyFilled(['sort', 'category'])) {
            $advices->appends($request->only(['sort', 'category']));
        }

        // Получаем количество рецептов по категориям
        $categoryCounts = [];
        foreach (AdviceTypeEnum::cases() as $type) {
            $categoryCounts[$type->value] = Advice::where('type', $type->value)->count();
        }

        return view('advices.index', compact('advices', 'categoryCounts'));
    }


    public function create(): View
    {
        $types = AdviceTypeEnum::options();
        $users = User::all()->keyBy('id');

        return view('advices.create', compact('types', 'users'));
    }


    public function store(StoreAdviceRequest $request, PhotoAdvice $photoAdvice): RedirectResponse
    {
        try {
            $data = $request->validated();

            if (!isset($data['user_id'])) {
                $data['user_id'] = auth()->id();
            }

            $advice = Advice::create($data);

            if ($request->hasFile('photo')) {
                $photoAdvice->uploadPhoto($request->file('photo'), $advice, 0);
            }

            Log::info('Рецепт создан', [
                'advice_id' => $advice->id,
                'user_id' => $data['user_id'],
                'title' => $advice->title
            ]);

            return redirect()->route('advices.index')
                ->with('success', 'Рецепт "' . $advice->title . '" успешно создан');

        } catch (\Exception $e) {
            Log::error('Ошибка при создании рецепта: ' . $e->getMessage());

            return redirect()->back()
                ->withInput()
                ->with('error', 'Произошла ошибка при создании рецепта. Пожалуйста, попробуйте еще раз.');
        }
    }


    public function show(Advice $advice): View
    {
        $advice->load('photos', 'user');

        return view('advices.show', compact('advice'));
    }


    public function edit(Advice $advice): View
    {
        $advice->load('photos', 'user');
        $types = AdviceTypeEnum::options();
        $users = User::all()->keyBy('id');

        return view('advices.edit', compact('advice', 'types', 'users'));
    }


    public function update(UpdateAdviceRequest $request, Advice $advice, PhotoAdvice $photoAdvice): RedirectResponse
    {
        try {
            $advice->update($request->validated());

            if ($request->input('delete_photo')) {
                $mainPhoto = $advice->mainPhoto;
                if ($mainPhoto) {
                    $photoAdvice->deletePhoto($mainPhoto);
                }
            }

            if ($request->hasFile('photo')) {
                $mainPhoto = $advice->mainPhoto;
                if ($mainPhoto) {
                    $photoAdvice->deletePhoto($mainPhoto);
                }

                $photoAdvice->uploadPhoto($request->file('photo'), $advice, 0);
            }

            Log::info('Рецепт обновлен', ['advice_id' => $advice->id]);

            return redirect()->route('advices.index')
                ->with('success', 'Рецепт "' . $advice->title . '" успешно обновлен!');

        } catch (\Exception $e) {
            Log::error('Ошибка при обновлении рецепта: ' . $e->getMessage());

            return redirect()->back()
                ->withInput()
                ->with('error', 'Произошла ошибка при обновлении рецепта.');
        }
    }


    public function destroy(Advice $advice, PhotoAdvice $photoAdvice): RedirectResponse // Добавил PhotoAdvice в параметры
    {
        try {
            $title = $advice->title;

            // Удаляем связанные фото через PhotoAdvice
            foreach ($advice->photos as $photo) {
                $photoAdvice->deletePhoto($photo); // Теперь $photoAdvice определен
            }

            $advice->delete();

            Log::info('Рецепт удален', ['advice_id' => $advice->id, 'title' => $title]);

            return redirect()->route('advices.index')
                ->with('success', 'Рецепт "' . $title . '" успешно удален!');

        } catch (\Exception $e) {
            Log::error('Ошибка при удалении рецепта: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Произошла ошибка при удалении рецепта.');
        }
    }
}
