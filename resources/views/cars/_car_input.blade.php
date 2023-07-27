<div class="mt-4" data-input-car-index="{{ $inputNamePrefix }}">
    <label for="{{ $inputNamePrefix }}[brand]" class="block font-semibold">Марка</label>
    <input type="text" name="{{ $inputNamePrefix }}[brand]" class="border px-4 py-2 w-full" value="{{ old($inputNamePrefix . '.brand', $carData['brand'] ?? '') }}">
    <label for="{{ $inputNamePrefix }}[model]" class="block font-semibold">Модель</label>
    <input type="text" name="{{ $inputNamePrefix }}[model]" class="border px-4 py-2 w-full" value="{{ old($inputNamePrefix . '.model', $carData['model'] ?? '') }}">
    <label for="{{ $inputNamePrefix }}[color]" class="block font-semibold">Цвет кузова</label>
    <input type="text" name="{{ $inputNamePrefix }}[color]" class="border px-4 py-2 w-full" value="{{ old($inputNamePrefix . '.color', $carData['color'] ?? '') }}">
    <label for="{{ $inputNamePrefix }}[license_plate]" class="block font-semibold">Гос. Номер РФ</label>
    <input type="text" name="{{ $inputNamePrefix }}[license_plate]" class="border px-4 py-2 w-full" value="{{ old($inputNamePrefix . '.license_plate', $carData['license_plate'] ?? '') }}">
    <a href="#" data-input-car-index="{{ $inputNamePrefix }}">удалить поле</a>
</div>
