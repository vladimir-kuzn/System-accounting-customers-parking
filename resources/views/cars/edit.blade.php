<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Редактировать автомобиль</h1>
    @include('cars._form', ['car' => $car, 'action' => route('cars.update', $car), 'method' => 'PUT'])
</div>
