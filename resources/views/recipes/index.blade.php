@vite(['resources/css/app.css'])
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Пользователи</title>
</head>
<body>

<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-3xl font-semibold text-green-500">Рецепты</h1>
        <a href="{{ route('recipes.index') }}" class="bg-gradient-to-r from-lime-400 to-green-500 hover:from-green-700 hover:to-lime-500 text-white font-medium py-2 px-4 rounded">
            Создать нового
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead class="bg-gray-100">
            <tr>
                <th class="border border-gray-200 px-4 py-2 text-left text-lg font-medium text-green-600">ID</th>
                <th class="border border-gray-200 px-4 py-2 text-left text-lg font-medium text-green-600">Заголовок</th>
                <th class="border border-gray-200 px-4 py-2 text-left text-lg font-medium text-green-600">Фото</th>
                <th class="border border-gray-200 px-4 py-2 text-left text-lg font-medium text-green-600">Описание</th>
                <th class="border border-gray-200 px-4 py-2 text-left text-lg font-medium text-green-600">Состав</th>
                <th class="border border-gray-200 px-4 py-2 text-left text-lg font-medium text-green-600">Процесс</th>
                <th class="border border-gray-200 px-4 py-2 text-left text-lg font-medium text-green-600">Тип</th>
                <th class="border border-gray-200 px-4 py-2 text-left text-lg font-medium text-green-600">Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($recipes as $recipe)
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-200 px-4 py-2 text-sm text-gray-700">{{ $recipe->id }}</td>
                    <td class="border border-gray-200 px-4 py-2 text-sm text-gray-700">{{ $recipe->title }}</td>
                    <td class="border border-gray-200 px-4 py-2 text-sm text-gray-700">{{ $recipe->image }}</td>
                    <td class="border border-gray-200 px-4 py-2 text-sm text-gray-700">{{ $recipe->description }}</td>
                    <td class="border border-gray-200 px-4 py-2 text-sm text-gray-700">{{ $recipe->count }}</td>
                    <td class="border border-gray-200 px-4 py-2 text-sm text-gray-700">{{ $recipe->process }}</td>
                    <td class="border border-gray-200 px-4 py-2 text-sm text-gray-700">{{ $recipe->type }}</td>
                    <td class="border border-gray-200 px-4 py-2 text-sm text-gray-700 flex gap-2">
                        <a href="{{ route('recipes.show', $recipe) }}" class="bg-gradient-to-r from-lime-500 to-green-600 hover:from-green-600 hover:to-lime-500 text-white px-4 py-2 rounded text-sm">
                            Показать
                        </a>
                        <a href="{{ route('recipes.edit', $recipe) }}" class="bg-gradient-to-r from-amber-400 to-red-500 hover:from-red-600 hover:to-amber-500  text-white px-4 py-2 rounded text-sm">
                            Изменить
                        </a>
                        <form action="{{ route('recipes.destroy', $recipe) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-gradient-to-r from-fuchsia-500 to-red-500 hover:from-red-700 hover:to-fuchsia-400 text-white px-4 py-2 rounded text-sm">
                                Удалить
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-4 py-2 text-center text-gray-500">Нет данных</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>


</div>

</body>
</html>

