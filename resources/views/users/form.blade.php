@php
    $user = $user ?? null;
@endphp

<div class="space-y-4">

    <div>
        <label for="role" class="block text-xl font-medium text-green-600">Выберите роль:</label>
        <select name="role" id="role" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm">
            @foreach($roles as $key => $value)
                <option value="{{ $key }}" @selected(old('role->value', $user?->role?->value) == $key)>
                    {{ $value }}
                </option>
            @endforeach
        </select>
        @error('role')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="name" class="block text-xl font-medium text-green-600">Имя</label>
        <input value="{{ old('name', $user?->name) }}" type="text" id="name" name="name" required
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm">
        @error('name')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="surname" class="block text-xl font-medium text-green-600">Фамилия</label>
        <input value="{{ old('surname', $user?->surname) }}" type="text" id="surname" name="surname" required
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm">
        @error('surname')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="patronymic" class="block text-xl font-medium text-green-600">Отчество</label>
        <input value="{{ old('patronymic', $user?->patronymic) }}" type="text" id="patronymic" name="patronymic" required
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm">
        @error('patronymic')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="email" class="block text-xl font-medium text-green-600">Эл.почта</label>
        <input value="{{ old('email', $user?->email) }}" type="email" id="email" name="email" required
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm">
        @error('email')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="password" class="block text-xl font-medium text-green-600">Пароль</label>
        <input type="password" id="password" name="password"
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm"
               @if(!$user) required @endif>
        @error('password')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
        @if($user)
            <p class="text-gray-500 text-sm mt-1">Оставьте поле пустым, если не хотите менять пароль</p>
        @endif
    </div>

    <div>
        <button type="submit"
                class="bg-gradient-to-r from-lime-400 to-green-500 hover:from-green-700 hover:to-lime-500 text-white font-medium py-2 px-4 rounded">
            Сохранить данные
        </button>
    </div>

</div>
