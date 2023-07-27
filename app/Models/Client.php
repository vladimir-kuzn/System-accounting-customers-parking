<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Client extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'gender', 'phone', 'address'];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
