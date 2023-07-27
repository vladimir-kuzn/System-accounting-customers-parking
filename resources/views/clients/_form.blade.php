<form action="{{ $action }}" method="POST">
    @csrf
    @if (isset($method))
        @method($method)
    @endif

    <div class="mb-4">
        <label for="name" class="block font-semibold">ФИО</label>
        <input type="text" name="name" id="name" class="border px-4 py-2 w-full" value="{{ old('name', $client->name ?? '') }}">
        @error('name')
        <p class="text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="gender" class="block font-semibold">Пол</label>
        <input type="text" name="gender" id="gender" class="border px-4 py-2 w-full" value="{{ old('gender', $client->gender ?? '') }}">
        @error('gender')
        <p class="text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="phone" class="block font-semibold">Телефон</label>
        <input type="text" name="phone" id="phone" class="border px-4 py-2 w-full" value="{{ old('phone', $client->phone ?? '') }}">
        @error('phone')
        <p class="text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="address" class="block font-semibold">Адрес</label>
        <input type="text" name="address" id="address" class="border px-4 py-2 w-full" value="{{ old('address', $client->address ?? '') }}">
    </div>

    <div class="mb-4">
        <h2 class="text-lg font-semibold">Машины клиента</h2>
        <div id="cars">
            @if (old('cars'))
                @foreach (old('cars') as $index => $carData)
                    @include('cars._car_input', ['inputNamePrefix' => "cars[{$index}]", 'carData' => $carData])
                @endforeach
            @else
                @foreach ($client->cars ?? [0 => []] as $index => $car)
                    @include('cars._car_input', ['inputNamePrefix' => "cars[{$index}]", 'carData' => $car])
                @endforeach
            @endif
        </div>
        <button type="button" class="mt-2 p-2 bg-blue-500 text-white rounded hover:bg-blue-600" onclick="addCarInput()">Добавить машину</button>
        @error('cars')
        <p class="text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Сохранить</button>
</form>

<script>
    function addCarInput() {
        const carsDiv = document.getElementById('cars');
        const index = carsDiv.children.length;
        const inputNamePrefix = `cars[${index}]`;
        const carInput = `
            <div class="mt-4" data-input-car-index="${inputNamePrefix}">
                <label for="${inputNamePrefix}[brand]" class="block font-semibold">Марка</label>
                <input type="text" name="${inputNamePrefix}[brand]" class="border px-4 py-2 w-full" value="">
                <label for="${inputNamePrefix}[model]" class="block font-semibold">Модель</label>
                <input type="text" name="${inputNamePrefix}[model]" class="border px-4 py-2 w-full" value="">
                <label for="${inputNamePrefix}[color]" class="block font-semibold">Цвет кузова</label>
                <input type="text" name="${inputNamePrefix}[color]" class="border px-4 py-2 w-full" value="">
                <label for="${inputNamePrefix}[license_plate]" class="block font-semibold">Гос. Номер РФ</label>
                <input type="text" name="${inputNamePrefix}[license_plate]" class="border px-4 py-2 w-full" value="">
            </div>
            <a href="#" data-input-car-index="${inputNamePrefix}">удалить поле</a>
        `;
        carsDiv.insertAdjacentHTML('beforeend', carInput);
    }
</script>

<script>
    // Получаем все ссылки с атрибутом data-input-car-index
    const links = document.querySelectorAll('a[data-input-car-index]');

    // Добавляем обработчик события click для каждой ссылки
    links.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Предотвращаем переход по ссылке

            const dataIndex = this.getAttribute('data-input-car-index');

            // Находим div-элемент с соответствующим атрибутом data-input-car-index и удаляем его
            const divToDelete = document.querySelector(`div[data-input-car-index="${dataIndex}"]`);
            if (divToDelete) {
                divToDelete.remove();
            }
        });
    });
</script>
