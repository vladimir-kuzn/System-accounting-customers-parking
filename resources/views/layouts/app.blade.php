<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-100">
    <nav class="bg-blue-500 p-4">
        <div class="container mx-auto flex space-x-16">
            <a href="{{route('home')}}" class="text-white font-bold text-xl">Главная</a>
            <a href="{{route('clients.index')}}" class="text-white font-bold text-xl">Клиенты</a>
            <a href="{{route('cars.index')}}" class="text-white font-bold text-xl">Машины</a>
        </div>
    </nav>

    <div class="container mx-auto py-8">
        @yield('content')
    </div>

    @vite('resources/js/app.js')
</body>

</html>
