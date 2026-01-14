@extends('layouts.shop')

@section('title', 'Тест - Вкусняшка')
@section('content')

    <div class="bg-green-100 h-screen flex">

        <body class="bg-gray-100 font-sans leading-normal tracking-normal">

        <div class="container mx-auto px-4 py-8 mb-6">
            <h1 class="text-4xl font-bold text-center text-green-500 mb-6">
                Кулинарный тест
            </h1>
            <p class="text-center text-gray-600 text-xl mb-8">
                Проверьте свои знания о кулинарии и ингредиентах!
            </p>

            <!-- Блок теста -->
            <div id="quiz" class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
                <div id="questions">
                    <!-- Вопросы будут вставляться JS -->
                </div>

                <button
                    id="submitBtn"
                    class="mt-6 w-full bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline">
                    Проверить ответы
                </button>

                <div id="result" class="mt-6 p-4 border-t border-gray-200 hidden">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Результат</h2>
                    <p id="scoreText" class="text-lg text-gray-700"></p>
                    <p id="feedback" class="text-gray-600 mt-2"></p>
                </div>
            </div>
        </div>

        <script>
            // Данные теста: вопросы, варианты, правильные ответы
            const quizData = [
                {
                    question: "Какой ингредиент делает тесто пышным?",
                    options: ["Соль", "Сода", "Сахар", "Масло"],
                    answer: 1 // индекс правильного ответа (сода)
                },
                {
                    question: "Как называется техника нарезки овощей кубиками?",
                    options: ["Жюльен", "Брюнуаз", "Карпаччо", "Тартар"],
                    answer: 1 // брюнуаз
                },
                {
                    question: "Какой жир лучше использовать для жарки при высокой температуре?",
                    options: ["Сливочное масло", "Оливковое масло", "Кокосовое масло", "Свиной жир"],
                    answer: 3 // свиной жир
                },
                {
                    question: "Что такое «дегласирование»?",
                    options: [
                        "Удаление жира с поверхности бульона",
                        "Добавление жидкости для растворения остатков на сковороде",
                        "Процеживание соуса",
                        "Взбивание яиц с сахаром"
                    ],
                    answer: 1 // добавление жидкости
                },
                {
                    question: "Какая температура оптимальна для выпечки бисквита?",
                    options: ["120 °C", "150 °C", "180 °C", "220 °C"],
                    answer: 2 // 180 °C
                }
            ];

            // Элементы DOM
            const questionsContainer = document.getElementById('questions');
            const submitBtn = document.getElementById('submitBtn');
            const resultDiv = document.getElementById('result');
            const scoreText = document.getElementById('scoreText');
            const feedback = document.getElementById('feedback');

            // Рендерим вопросы
            function renderQuestions() {
                quizData.forEach((item, index) => {
                    const questionDiv = document.createElement('div');
                    questionDiv.className = 'mb-6';

                    questionDiv.innerHTML = `
          <h3 class="text-lg font-medium text-gray-800 mb-3">
            Вопрос ${index + 1}: ${item.question}
          </h3>
        `;

                    item.options.forEach((option, optIndex) => {
                        const label = document.createElement('label');
                        label.className = 'block mb-2';
                        label.innerHTML = `
            <input
              type="radio"
              name="question_${index}"
              value="${optIndex}"
              class="mr-2 leading-tight"
            />
            <span class="text-gray-700">${option}</span>
          `;
                        questionDiv.appendChild(label);
                    });

                    questionsContainer.appendChild(questionDiv);
                });
            }

            // Проверяем ответы
            function checkAnswers() {
                let score = 0;

                quizData.forEach((item, index) => {
                    const selected = document.querySelector(`input[name="question_${index}"]:checked`);
                    if (selected && parseInt(selected.value) === item.answer) {
                        score++;
                    }
                });

                // Выводим результат
                scoreText.textContent = `Вы набрали ${score} из ${quizData.length} баллов.`;

                if (score === quizData.length) {
                    feedback.textContent = "Отлично! Вы настоящий кулинарный эксперт.";
                } else if (score >= quizData.length * 0.6) {
                    feedback.textContent = "Хорошо! У вас хорошие знания, но есть куда расти.";
                } else {
                    feedback.textContent = "Неплохо, но стоит повторить основы кулинарии.";
                }

                resultDiv.classList.remove('hidden');
            }

            // Инициализация
            renderQuestions();

            // Обработчик кнопки
            submitBtn.addEventListener('click', checkAnswers);
        </script>
        </body>

    </div>
@endsection
