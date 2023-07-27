<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::with('cars')->paginate(10);
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'gender' => 'required',
            'phone' => 'required|unique:clients',
            'address' => 'nullable',
            'cars' => 'required|array|min:1',
            'cars.*.brand' => 'required',
            'cars.*.model' => 'required',
            'cars.*.color' => 'required',
            'cars.*.license_plate' => 'required|unique:cars',
        ]);

        if ($validator->fails()) {
            return redirect()->route('clients.create')
                ->withErrors($validator)
                ->withInput();
        }

        $clientData = $request->only(['name', 'gender', 'phone', 'address']);
        $client = Client::create($clientData);

        foreach ($request->input('cars') as $carData) {
            $car = $client->cars()->create($carData);
        }

        return redirect()->route('clients.index')->with('success', 'Клиент и автомобили успешно добавлены!');
    }

    public function show(Client $client)
    {
        $client->load('cars');
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        $client->load('cars');
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        // Удаляем все связанные автомобили
        $client->cars()->forceDelete();

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'gender' => 'required',
            'phone' => 'required|unique:clients,phone,' . $client->id,
            'address' => 'nullable',
            'cars' => 'required|array|min:1',
            'cars.*.brand' => 'required',
            'cars.*.model' => 'required',
            'cars.*.color' => 'required',
            'cars.*.license_plate' => 'required|unique:cars',
        ]);

        if ($validator->fails()) {
            return redirect()->route('clients.edit', $client->id)
                ->withErrors($validator)
                ->withInput();
        }

        $clientData = $request->only(['name', 'gender', 'phone', 'address']);
        $client->update($clientData);



        foreach ($request->input('cars') as $carData) {
            $car = new Car($carData);
            // Создаем и сохраняем новый автомобиль и связываем его с клиентом
            $client->cars()->save($car);
        }

        return redirect()->route('clients.index')->with('success', 'Данные клиента успешно обновлены!');
    }

    public function destroy(Client $client)
    {
        $client->cars()->delete();
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Клиент и его автомобили успешно удалены!');
    }
}
