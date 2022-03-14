<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    //Relacion de etiquetas con Nodos, una etiqueta puede estar en varios nodos.

    public function Nodos(){
        return $this->belongsToMany(Nodo::class);
    }
}
