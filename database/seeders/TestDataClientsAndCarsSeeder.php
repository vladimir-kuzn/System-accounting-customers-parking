<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TestDataClientsAndCarsSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('ru_RU'); // Создаем экземпляр Faker на русском языке
        $count = 50;

        for ($i = 0; $i < $count; $i++) {
            $gender = $faker->randomElement(['Мужчина', 'Женщина']);
            $name = $faker->name($gender === 'Мужчина' ? 'male' : 'female');
            $phone = $faker->unique()->numerify('79#########'); // 11-значный номер телефона
            $address = $faker->address;


            \DB::table('clients')->insert([
                'name' => $name,
                'gender' => $gender,
                'phone' => $phone,
                'address' => $address,
            ]);
        }

        $count = 60;

        for ($i = 0; $i < $count; $i++) {
            $brand = \DB::select("SELECT * FROM car_brands ORDER BY RAND() LIMIT 1");
            $model = \DB::select("SELECT * FROM car_models WHERE brand_id = :brand_id", ['brand_id' => $brand[0]->id]);
            $color = \DB::select("SELECT name FROM car_colors ORDER BY RAND() LIMIT 1")[0]->name;

            $allowedChars = ['А', 'В', 'Е', 'К', 'М', 'Н', 'О', 'Р', 'С', 'Т', 'У', 'Х'];
            // Генерируем буквы и цифры для автомобильного номера
            $firstLetters = $faker->randomElements($allowedChars, 1, false);
            $digits = $faker->numberBetween(100, 999);
            $lastLetters = $faker->randomElements($allowedChars, 2, false);
            $regionCode = $faker->numberBetween(10, 999);
            $license_plate = implode('', $firstLetters) . $digits . implode('', $lastLetters) . $regionCode;

            $client_id = \DB::select("SELECT id FROM clients ORDER BY RAND() LIMIT 1")[0]->id;
            $is_on_parking = $faker->boolean;


            \DB::table('cars')->insert([
                'brand' => $brand[0]->name,
                'model' => $model[0]->name,
                'color' => $color,
                'license_plate' => $license_plate,
                'client_id' => $client_id,
                'is_on_parking' => $is_on_parking
            ]);
        }
    }
}
