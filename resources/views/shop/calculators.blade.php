@extends('layouts.shop')

@section('title', 'Калькулятор калорий - Вкусняшка')
@section('content')

    <div class="bg-green-100 h-screen flex">
        <div class="container mx-auto px-4 py-8">

            <div class="max-w-md mx-auto bg-white rounded-xl shadow-md p-6 space-y-6 mt-10">
                <h1 class="text-3xl font-bold text-center text-green-500">Калькулятор калорий</h1>

                <!-- Форма ввода данных -->
                <form id="calorieForm" class="space-y-4">
                    <!-- Пол -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Ваш пол</label>
                        <div class="flex space-x-4">
                            <label class="flex items-center">
                                <input type="radio" name="gender" value="male" class="form-radio text-green-500 mr-2" required>
                                Мужчина
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="gender" value="female" class="form-radio text-green-500 mr-2">
                                Женщина
                            </label>
                        </div>
                    </div>

                    <!-- Возраст -->
                    <div>
                        <label for="age" class="block text-sm font-medium text-gray-700">Возраст (лет)</label>
                        <input type="number" id="age" name="age" min="18" max="100" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    </div>

                    <!-- Вес -->
                    <div>
                        <label for="weight" class="block text-sm font-medium text-gray-700">Вес (кг)</label>
                        <input type="number" id="weight" name="weight" step="0.1" min="40" max="300" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    </div>

                    <!-- Рост -->
                    <div>
                        <label for="height" class="block text-sm font-medium text-gray-700">Рост (см)</label>
                        <input type="number" id="height" name="height" min="100" max="250" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    </div>

                    <!-- Уровень активности -->
                    <div>
                        <label for="activity" class="block text-sm font-medium text-gray-700 mb-2">Уровень активности</label>
                        <select id="activity" name="activity" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required>
                            <option value="1.2">Сидячий образ жизни (минимум движения)</option>
                            <option value="1.375">Лёгкая активность (1–3 тренировки в неделю)</option>
                            <option value="1.55">Средняя активность (3–5 тренировок)</option>
                            <option value="1.725">Высокая активность (6–7 тренировок)</option>
                            <option value="1.9">Экстремальная активность (тяжёлый труд/спорт)</option>
                        </select>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-br from-lime-200 to-green-500 text-white py-2 px-4 rounded-md hover:from-green-600 hover:to-lime-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Рассчитать</button>
                </form>

                <!-- Результат -->
                <div id="result" class="hidden mt-6 p-4 bg-green-50 border border-green-200 rounded-md">
                    <p class="text-lg font-medium text-green-800">Ваша суточная норма калорий:</p>
                    <p id="calories" class="text-3xl font-bold text-green-900 mt-2"></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('calorieForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Получаем значения из формы
            const gender = document.querySelector('input[name="gender"]:checked').value;
            const age = parseFloat(document.getElementById('age').value);
            const weight = parseFloat(document.getElementById('weight').value);
            const height = parseFloat(document.getElementById('height').value);
            const activity = parseFloat(document.getElementById('activity').value);

            // Формула Миффлина Сан Жеора
            let bmr;
            if (gender === 'male') {
                bmr = 10 * weight + 6.25 * height - 5 * age + 5;
            } else {
                bmr = 10 * weight + 6.25 * height - 5 * age - 161;
            }

            // Учитываем уровень активности
            const dailyCalories = Math.round(bmr * activity);

            // Выводим результат
            document.getElementById('calories').textContent = dailyCalories + ' ккал';
            document.getElementById('result').classList.remove('hidden');
        });
    </script>

@endsection

