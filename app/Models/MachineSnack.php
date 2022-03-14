<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineSnack extends Model
{
    use HasFactory;

    //Relacion con tabla padre Máquinas.

    public function machines(){
        return $this->hasOne(Machine::class);
    }
}
