<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Failure extends Model
{
    use HasFactory;

    //Metodo de relación con Máqinas, una avería puede producirse en distintas máquinas.

    public function machines(){
        return $this->belongsToMany(Machine::class)->withPivot('fecha','status');
    }
}
