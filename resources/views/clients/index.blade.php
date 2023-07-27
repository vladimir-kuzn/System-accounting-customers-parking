@extends('layouts.app')
@section('title', 'Клиенты')
@section('content')

    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Список клиентов</h1>
        @if ($clients->isEmpty())
            <p>Нет данных о клиентах.</p>
        @else
        <table class="table-fixed">
            <thead>
                <tr>
                    <th class="p-2">ФИО</th>
                    <th class="p-2">Пол</th>
                    <th class="p-2">Номер телефона</th>
                    <th class="p-2">Адрес</th>
                    <th class="p-2">Гос. номера
                        <br>
                        <span class="text-black bg-white px-1 border-2 rounded-md border-black uppercase">Отсутствует</span>
                        <br class="mb-1">
                        <span class="text-black bg-green-400 px-1 border-2 rounded-md border-black uppercase">На стоянке</span>
                    </th>
                    <th></th>
                    <th class="p-2">Редактировать</th>
                    <th></th>
                    <th class="p-2">Удалить</th>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($clients as $client)
                    <tr class="@if($loop->odd) bg-gray-300 @endif">
                        <td class="p-2 text-center">
                            <a href="{{route('clients.show', $client->id)}}" class="underline underline-offset-2">
                                {{ $client->name }}
                            </a>
                        </td>
                        <td class="p-2 text-center">{{ $client->gender }}</td>
                        <td class="p-2 text-center">{{ $client->phone }}</td>
                        <td class="p-2 text-center">{{ $client->address }}</td>
                        <td class="p-1 flex flex-col text-center items-center">
                            @foreach ($client->cars as $client_car)
                                <x-license-plate
                                    carId="{{ $client_car->id }}"
                                    loopLast="{{ $loop->last }}"
                                    isOnParking="{{ $client_car->is_on_parking }}"
                                    licensePlate="{{ $client_car->license_plate }}"/>
                            @endforeach
                        </td>
                        <td></td>
                        <td class="p-2 flex flex-col text-center items-center">
                            <a href="{{ route('clients.edit', $client->id) }}" class="flex justify-center p-1 bg-blue-400 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </a>
                        </td>
                        <td></td>
                        <td class="p-2 flex flex-col text-center items-center">
                            <form action="{{ route('clients.destroy', $client->id) }}" class="flex justify-center" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="flex justify-center p-1 bg-red-400 rounded-md deleteButton">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
