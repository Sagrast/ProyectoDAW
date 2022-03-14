<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineTobacco extends Model
{
    use HasFactory;

    //Relación con tabla padre Máqinas

    public function machines(){
        return $this->hasOne(Machine::class);
    }
}
