<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    //Relación con empleados. Un vehículo puede ser conducido por varios empleados.

    function users(){
        return $this->belongsToMany(User::class)->withPivot('fecha');
    }
}
