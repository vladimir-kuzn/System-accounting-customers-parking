<?php

namespace Database\Seeders;

use App\Models\CarBrand;
use App\Models\CarColor;
use App\Models\CarModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class BrandsAndModelsTablesSeeder extends Seeder
{
    public function run(): void
    {
        $Data = Storage::get('cars.json');

        foreach (json_decode($Data, true) as $brandData) {
            CarBrand::create([
                'id_brand' => $brandData['id'],
                'name' => $brandData['name'],
                'cyrillic_name' => $brandData['cyrillic-name'],
                'popular' => $brandData['popular'],
                'country' => $brandData['country'],
            ]);
        }

        foreach (json_decode($Data, true) as $brandData) {
            $brand = CarBrand::where('id_brand', $brandData['id'])->first();
            foreach ($brandData['models'] as $modelData) {
                CarModel::create([
                    'id_model' => $modelData['id'],
                    'name' => $modelData['name'],
                    'cyrillic_name' => $modelData['cyrillic-name'],
                    'class' => $modelData['class'],
                    'year_from' => $modelData['year-from'],
                    'year_to' => $modelData['year-to'],
                    'brand_id' => $brand->id,
                ]);
            }
        }

        $Data = Storage::get('car_colors.json');
        foreach (json_decode($Data, true)['data-color'] as $colorData) {
            CarColor::create([
                'color_id' => $colorData['color_id'],
                'hex' => $colorData['hex'],
                'name' => $colorData['name'],
                'color' => $colorData['color'],
                'metallic' => $colorData['metallic'],
            ]);
        }
    }
}
