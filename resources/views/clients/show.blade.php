@extends('layouts.app')
@section('title', 'Клиенты')
@section('content')

    <div class="flex items-center justify-center space-x-9">
        <div class="p-4 bg-gradient-to-r from-indigo-200 via-red-200 to-yellow-100 w-fit flex items-center rounded-md">
            <div style="background-image: url('{{asset("storage/assets/profile.jpg")}}')"
                 class="bg-clip-content bg-origin-content bg-center bg-cover bg-no-repeat w-[150px] h-[200px] mr-4 rounded-md">
            </div>
            <div>
                <h1 class="font-bold text-2xl">Карточка водителя</h1>
                <div class="mt-2">
                    <h2 class="font-semibold text-xl">{{ $client->name }}</h2>
                    <p class="text-lg">{{ Str::ascii($client->name) }}</p>
                </div>
                <div class="mt-2">
                    <h2 class="font-semibold text-xl">{{ $client->address ?? 'Нет данных' }}</h2>
                    <p class="text-lg">{{ Str::ascii($client->address ?? 'Нет данных') }}</p>
                </div>
                <div class="mt-2">
                    <h2 class="font-semibold text-xl">Пол: {{ $client->gender }}</h2>
                </div>
                <div class="mt-2">
                    <h2 class="font-semibold text-xl">Телефон: {{ $client->phone }}</h2>
                    <p class="text-lg">Phone: {{ $client->phone }}</p>
                </div>
            </div>
        </div>
        <div class="flex flex-col space-y-9">
            <a href="{{ route('clients.edit', $client->id) }}" class="flex justify-center p-1 bg-blue-400 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
            </a>
            <form action="{{ route('clients.destroy', $client->id) }}" class="flex justify-center" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="flex justify-center p-1 bg-red-400 rounded-md deleteButton">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                </button>
            </form>
        </div>
    </div>


    <h2 class="text-lg font-semibold mt-4">Машины:</h2>
    @if ($client->cars->isEmpty())
        <p>Нет данных о машинах клиента.</p>
    @else
        <ul>
            @foreach ($client->cars as $car)
                <li>
                    {{ $car->brand }} {{ $car->model }} ({{ $car->license_plate }})
                </li>
            @endforeach
        </ul>
    @endif

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
