<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    public $timestamps = false;

    protected $fillable = ['id_model', 'name', 'cyrillic_name', 'class', 'year_from', 'year_to'];

    public function brand()
    {
        return $this->belongsTo(CarBrand::class);
    }
}
