<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    //Relación con usuarios. Todo usuario tiene un unico perfil

    public function users(){
        return $this->hasOne(User::class);
    }
}
