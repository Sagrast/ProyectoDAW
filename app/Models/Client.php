<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    //Relacion N:M con Empleados. Un cliente puede ser atendido por varios empleados.

    public function users(){
        return $this->belongsToMany(User::class)->withPivot('Albaran','Fecha','MotivoVisita');
    }


}
