<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;

    //Relación de Máquinas con Clientes. Una máquina puede estar instalada en el local de un cliente.
    //Pero podría ser retirada y asignada a otro cliente. Por este motivo la relación con el cliente sera M:N
    //Y en la tabla pivote se almacenarán las fechas de instalación y retirada.

    public function clients(){
        return $this->belongsToMany(Client::class)->withPivot('instalacion','retirada');
    }

    //Relacion con Averías. Una máquina puede sufrir distintas averías.

    public function failures(){
        return $this->belongsToMany(Failure::class)->withPivot('fecha','status');
    }

    //Relación con productos. Una máquina puede cargar distintas clases de productos.

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('unidades','fechaCarga');
    }

    //Relaciónes con especializacion

    public function machineTobacco(){
        return $this->hasOne(MachineTobacco::class);
    }

    public function machineSnack(){
        return $this->hasOne(MachineSnack::class);
    }

    public function machineWater(){
        return $this->hasOne(MachineWater::class);
    }


}
