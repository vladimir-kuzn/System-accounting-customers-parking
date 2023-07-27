@extends('layouts.app')
@section('title', 'Клиенты')
@section('content')

    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">{{ $car->brand }} {{ $car->model }}</h1>
        <p>Цвет: {{ $car->color }}</p>
        <p>Гос. Номер РФ: </p>
        <x-license-plate
            carId="{{ $car->id }}"
            loopLast="{{ true }}"
            isOnParking="{{ $car->is_on_parking }}"
            licensePlate="{{ $car->license_plate }}"/>
        <p>Статус: {{ $car->is_on_parking ? 'На стоянке' : 'Отсутствует на стоянке' }}</p>
        <form action="{{ route('cars.update.parking_status') }}" method="POST" class="inline-block">
            @csrf
            <input type="hidden" name="car_id" value="{{ $car->id }}">
            <input type="hidden" name="is_on_parking" value="{{ $car->is_on_parking ? 0 : 1 }}">
            <button type="submit" class="text-blue-600 hover:underline">
                {{ $car->is_on_parking ? 'Убрать с стоянки' : 'Поставить на стоянку' }}
            </button>
        </form>
    </div>

@endsection
