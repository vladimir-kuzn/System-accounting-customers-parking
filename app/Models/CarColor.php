<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarColor extends Model
{
    public $timestamps = false;

    protected $fillable = ['color_id', 'hex', 'name', 'color', 'metallic'];
}
