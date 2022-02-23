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


    //Relación de Clientes con Máquinas. Un cliente puede poseer distintas máquinas como Café y Agua
    //De la misma forma que por motivos de averías o cambio en las necesidades se le puede sustituir
    //Por una versión superior o inferior a las necesidades del cliente.

    public function machine(){
        return $this->belongsToMany(Machine::class);
    }

}
