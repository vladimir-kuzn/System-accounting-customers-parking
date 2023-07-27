<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Автомобили на стоянке</h1>
    @if ($parkedCars->isEmpty())
        <p>На стоянке нет автомобилей.</p>
    @else
        <ul>
            @foreach ($parkedCars as $car)
                <li class="border-b mb-4 pb-2">
                    {{ $car->brand }} {{ $car->model }} ({{ $car->license_plate }})
                    <form action="{{ route('cars.update.parking_status') }}" method="POST" class="inline-block">
                        @csrf
                        <input type="hidden" name="car_id" value="{{ $car->id }}">
                        <input type="hidden" name="is_on_parking" value="{{ $car->is_on_parking ? 0 : 1 }}">
                        <button type="submit" class="text-blue-600 hover:underline">
                            {{ $car->is_on_parking ? 'Убрать с стоянки' : 'Поставить на стоянку' }}
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
</div>
