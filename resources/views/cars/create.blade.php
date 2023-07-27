<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Создать автомобиль</h1>
    @include('cars._form', ['car' => null, 'action' => route('cars.store')])
</div>
