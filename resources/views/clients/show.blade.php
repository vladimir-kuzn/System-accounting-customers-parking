@extends('layouts.app')
@section('title', 'Клиенты')
@section('content')

    <h2 class="text-lg font-semibold mt-4">Клиент:</h2>
    <table class="table-auto">
        <tbody>
        <tr>
            <td>name:</td>
            <td>{{ $client->name }}</td>
        </tr>
        <tr>
            <td>gender:</td>
            <td>{{ $client->gender }}</td>
        </tr>
        <tr>
            <td>phone:</td>
            <td>{{ $client->phone }}</td>
        </tr>
        <tr>
            <td>address:</td>
            <td>{{ $client->address ?? 'Нет данных' }}</td>
        </tr>
        <tr>
            <td>updated_at:</td>
            <td>{{ $client->updated_at }}</td>
        </tr>
        <tr>
            <td>created_at:</td>
            <td>{{ $client->created_at }}</td>
        </tr>
        </tbody>
    </table>
    <div class="flex space-x-4 mt-2">
        <a href="{{ route('clients.edit', $client->id) }}" class="block w-max p-2 bg-blue-400 rounded-md">
            Редактировать
        </a>
        <form action="{{ route('clients.destroy', $client->id) }}" class="block" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="w-max p-2 bg-red-400 rounded-md deleteButton">
                Удалить
            </button>
        </form>
    </div>


    <h2 class="text-lg font-semibold mt-4">Машины клиента:</h2>
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
