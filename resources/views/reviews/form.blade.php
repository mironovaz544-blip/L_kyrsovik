@php
    $review = $review ?? null;
@endphp

<div class="space-y-4">

    <div>
        <label for="user_id" class="block text-xl font-medium text-green-600">Выберите пользователя:</label>
        <select name="user_id" id="user_id" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm">
            @foreach($users as $key => $value)
                <option value="{{ $key }}" @selected(old('user_id', $review?->user_id) == $key)> {{ $value->userFullName() }}
                </option>
            @endforeach
        </select>
        @error('role')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="recipe_id" class="block text-xl font-medium text-green-600">Выберите услугу:</label>
        <select name="recipe_id" id="recipe_id" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm">
            @foreach($recipes as $key => $value)
                <option value="{{ $key }}" @selected(old('recipe_id', $review?->recipe_id) == $key)> {{ $value->title }}
                </option>
            @endforeach
        </select>
        @error('recipe_id')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="rating" class="block text-xl font-medium text-green-600">Рейтинг</label>
        <input value="{{ old('rating', $review?->rating) }}" type="text" id="rating" name="rating" required
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm">
        @error('rating')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="comment" class="block text-xl font-medium text-green-600">Комментарий</label>
        <input value="{{ old('comment', $review?->comment) }}" type="text" id="comment" name="comment" required
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm">
        @error('comment')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>


    <div>
        <button type="submit"
                class="bg-gradient-to-r from-lime-400 to-green-500 hover:from-green-700 hover:to-lime-500 text-white font-medium py-2 px-4 rounded">
            Сохранить данные
        </button>
    </div>

</div>


