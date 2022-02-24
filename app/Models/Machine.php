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

    public function failures(){
        return $this->hasMany(Failure::class);
    }

}
