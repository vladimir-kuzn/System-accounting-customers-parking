<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::with('client')->paginate(10);
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'brand' => 'required',
            'model' => 'required',
            'color' => 'required',
            'license_plate' => 'required|unique:cars',
        ]);

        if ($validator->fails()) {
            return redirect()->route('cars.create')
                ->withErrors($validator)
                ->withInput();
        }

        Car::create($request->all());

        return redirect()->route('cars.index')->with('success', 'Автомобиль успешно добавлен!');
    }

    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }

    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $validator = Validator::make($request->all(), [
            'brand' => 'required',
            'model' => 'required',
            'color' => 'required',
            'license_plate' => 'required|unique:cars,license_plate,' . $car->id,
        ]);

        if ($validator->fails()) {
            return redirect()->route('cars.edit', $car->id)
                ->withErrors($validator)
                ->withInput();
        }

        $car->update($request->all());

        return redirect()->route('cars.index')->with('success', 'Данные автомобиля успешно обновлены!');
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Автомобиль успешно удален!');
    }

    public function parking()
    {
        $parkedCars = Car::where('is_on_parking', true)->get();
        $clients = Client::with('cars')->get();

        return view('cars.parking', compact('parkedCars', 'clients'));
    }

    public function updateParkingStatus(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'is_on_parking' => 'required|boolean',
        ]);

        $car = Car::find($request->car_id);
        $car->is_on_parking = $request->is_on_parking;
        $car->save();

        return redirect()->route('cars.parking')->with('success', 'Статус автомобиля обновлен!');
    }
}
