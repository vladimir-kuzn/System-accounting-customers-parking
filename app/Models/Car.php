<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use SoftDeletes;

    protected $fillable = ['brand', 'model', 'color', 'license_plate', 'is_on_parking'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
