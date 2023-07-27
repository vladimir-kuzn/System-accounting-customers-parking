<form action="{{ $action }}" method="POST">
    @csrf
    @if (isset($method))
        @method($method)
    @endif

    <div class="mb-4">
        <label for="brand" class="block font-semibold">Марка</label>
        <input type="text" name="brand" id="brand" class="border px-4 py-2 w-full" value="{{ old('brand', $car->brand ?? '') }}">
        @error('brand')
        <p class="text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="model" class="block font-semibold">Модель</label>
        <input type="text" name="model" id="model" class="border px-4 py-2 w-full" value="{{ old('model', $car->model ?? '') }}">
        @error('model')
        <p class="text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="color" class="block font-semibold">Цвет кузова</label>
        <input type="text" name="color" id="color" class="border px-4 py-2 w-full" value="{{ old('color', $car->color ?? '') }}">
        @error('color')
        <p class="text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="license_plate" class="block font-semibold">Гос. Номер РФ</label>
        <input type="text" name="license_plate" id="license_plate" class="border px-4 py-2 w-full" value="{{ old('license_plate', $car->license_plate ?? '') }}">
        @error('license_plate')
        <p class="text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Сохранить</button>
</form>
