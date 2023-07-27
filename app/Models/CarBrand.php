<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarBrand extends Model
{
    public $timestamps = false;

    protected $fillable = ['id_brand', 'name', 'cyrillic_name', 'popular', 'country'];

    public function models()
    {
        return $this->hasMany(CarModel::class);
    }
}
