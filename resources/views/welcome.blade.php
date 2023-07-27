@extends('layouts.app')
@section('title', 'Cистема учёта клиентов автостоянки')
@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold mb-4">Добро пожаловать на страницу учета клиентов автостоянки!</h1>
        <p class="text-lg text-gray-600 mb-8">Здесь представлено мое выполненное тестовое задание на фреймворке Laravel с использованием Tailwind CSS.</p>

        <h2 class="text-xl font-semibold mb-4">Описание задания:</h2>
        <p class="mb-4">Задача была разработать систему учета клиентов автостоянки. Система должна предоставлять возможность создания, редактирования и удаления данных о клиентах и их автомобилях. Также требовалось вести учет того, сколько и какие автомобили находятся на стоянке.</p>
        <p class="mb-4">Для этого были определены две основные сущности:</p>
        <ul class="list-disc ml-8 mb-8">
            <li>Клиент: Содержит информацию о ФИО, поле, телефоне, адресе и минимум одном автомобиле.</li>
            <li>Автомобиль: Содержит информацию о марке, модели, цвете кузова, государственном номере и статусе нахождения на стоянке.</li>
        </ul>

        <h2 class="text-xl font-semibold mb-4">Используемые технологии:</h2>
        <p class="mb-4">Для выполнения задания я выбрал фреймворк Laravel последней стабильной версии. Вся система была реализована с использованием PHP 8.1 и MySQL 8.0</p>
        <p class="mb-4">Для стилизации страницы и создания отзывчивого дизайна я использовал библиотеку стилей Tailwind CSS.</p>

        <h2 class="text-xl font-semibold mb-4">Реализованные страницы:</h2>
        <ol class="list-decimal ml-8 mb-8">
            <li>
                <strong>Просмотр всех клиентов и их машин:</strong> На этой странице можно просмотреть всех клиентов с их автомобилями с пагинацией. Для каждого клиента предоставлены ссылки на страницу редактирования и кнопка удаления.
            </li>
            <li>
                <strong>Страница создания клиента и данных о его машинах:</strong> Здесь можно добавить нового клиента и информацию о его автомобилях.
            </li>
            <li>
                <strong>Страница редактирования клиента и данных о его машинах:</strong> На этой странице можно изменить информацию о клиенте и его автомобилях.
            </li>
            <li>
                <strong>Просмотр всех автомобилей на стоянке:</strong> Здесь можно увидеть список всех автомобилей, находящихся на стоянке. Есть форма для выбора существующего клиента и его автомобилей. Можно менять статус автомобиля (на стоянке/отсутствует).
            </li>
        </ol>

        <p class="mb-4">Система также была защищена от XSS атак и SQL-инъекций.</p>

        <p class="text-lg text-gray-600 mt-8">Спасибо за возможность выполнить это тестовое задание! Буду рад ответить на ваши вопросы и предоставить дополнительные детали о проекте.</p>
        <div class="flex text-xl text-gray-600 mt-8 space-x-1">
            <p>Мой сайт:</p> <a href="https://pheo.dev" target="_blank" class="text-blue-600 underline">pheo.dev</a>
        </div>
    </div>
    <p>Laravel v{{ Illuminate\Foundation\Application::VERSION }}</p>

@endsection
