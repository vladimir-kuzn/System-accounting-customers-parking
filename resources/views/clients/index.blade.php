@extends('layouts.app')
@section('title', 'Клиенты')
@section('content')

    <div class="container mx-auto p-4">
        <div class="flex space-x-4 mb-4">
            <h1 class="text-2xl font-bold">Список клиентов</h1>
            <a class="text-2xl font-bold leading-none px-2 py-1 bg-blue-400 rounded-md"
               href="{{route('clients.create')}}">+</a>
        </div>
        @if ($clients->isEmpty())
            <p>Нет данных о клиентах.</p>
        @else
            <div class="grid grid-cols-6 gap-0 bg-gray-100 p-4 rounded-lg">
                <div class="col-span-1 text-center">ФИО</div>
                <div class="col-span-1 text-center">Пол</div>
                <div class="col-span-1 text-center">Номер телефона</div>
                <div class="col-span-1 text-center">Адрес</div>
                <div class="col-span-1 text-center">Редактировать</div>
                <div class="col-span-1 text-center">Удалить</div>
                <!-- Данные клиентов -->
                @foreach ($clients as $client)
                    <div
                        class="col-span-1 @if($loop->odd) bg-gray-300 @endif p-2 border-t border-black text-center">{{ $client->name }}</div>
                    <div
                        class="col-span-1 @if($loop->odd) bg-gray-300 @endif p-2 border-t border-black text-center">{{ $client->gender }}</div>
                    <div
                        class="col-span-1 @if($loop->odd) bg-gray-300 @endif p-2 border-t border-black text-center">{{ $client->phone }}</div>
                    <div
                        class="col-span-1 @if($loop->odd) bg-gray-300 @endif p-2 border-t border-black text-center">{{ $client->address }}</div>
                    <div class="col-span-1 @if($loop->odd) bg-gray-300 @endif p-2 border-t border-black text-center flex justify-center">
                        <a href="{{ route('clients.edit', $client->id) }}"
                           class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded h-fit">Редактировать</a>
                    </div>
                    <div class="col-span-1 @if($loop->odd) bg-gray-300 @endif p-2 border-t border-black">
                        <form action="{{ route('clients.destroy', $client->id) }}"
                              class="flex justify-center" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded deleteButton">
                                Удалить
                            </button>
                        </form>
                    </div>
                    <!-- Здесь других клиентов по аналогии -->
                    <div
                        class="col-span-6 @if($loop->odd) bg-gray-300 @endif p-4 border-t border-gray-400 border-dashed">
                        <!-- Таблица машин для клиента -->
                        <h3 class="text-lg font-semibold mb-2">Машины клиента:</h3>
                        @if($client->cars->isEmpty())
                            <h3 class="text-lg font-semibold mb-2">Нет машин</h3>
                        @else
                            <div class="grid grid-cols-6 gap-4 p-4">
                                <div class="col-span-1 font-semibold text-center">Бренд</div>
                                <div class="col-span-1 font-semibold text-center">Модель</div>
                                <div class="col-span-1 font-semibold text-center">Цвет</div>
                                <div class="col-span-1 font-semibold text-center">Гос. номер</div>
                                <div class="col-span-1 font-semibold text-center">Редактировать</div>
                                <div class="col-span-1 font-semibold text-center">Удалить</div>
                                <!-- Данные о машинах клиента -->
                                @foreach ($client->cars as $car)
                                    <div class="col-span-1 text-center">{{ $car->brand }}</div>
                                    <div class="col-span-1 text-center">{{ $car->model }}</div>
                                    <div class="col-span-1 text-center">{{ $car->color }}</div>
                                    <div class="col-span-1 text-center">
                                        <x-license-plate
                                            carId="{{ $car->id }}"
                                            loopLast="{{ $loop->last }}"
                                            isOnParking="{{ $car->is_on_parking }}"
                                            licensePlate="{{ $car->license_plate }}"/>
                                    </div>
                                    <div class="col-span-1 text-center flex justify-center">
                                        <a href="{{ route('cars.edit', $car->id) }}"
                                           class="block bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded">Редактировать</a>
                                    </div>
                                    <div class="col-span-1 text-center">
                                        <form action="{{ route('cars.destroy', $car->id) }}"
                                              class="flex justify-center" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded deleteButton">
                                                Удалить
                                            </button>
                                        </form>
                                    </div>
                                @endforeach
                                <!-- Здесь другие машины клиента по аналогии -->
                            </div>
                        @endif
                    </div>
                @endforeach
                <!-- Здесь других клиентов и их машины по аналогии -->
            </div>

            <div class="mt-4">
                {{ $clients->links() }}
            </div>
        @endif
    </div>

    <script>
        const submitButtons = document.querySelectorAll('.deleteButton');

        function showConfirmationBeforeSubmit(event) {
            event.preventDefault();
            const form = event.target.closest('form');
            const isConfirmed = window.confirm('Вы уверены, что хотите удалить данные?');
            if (isConfirmed) {
                form.submit();
            } else {
            }
        }

        submitButtons.forEach(button => {
            button.addEventListener('click', showConfirmationBeforeSubmit);
        });
    </script>
@endsection
