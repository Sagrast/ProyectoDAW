<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

      //Relación con nodo: Un comentario so pode estar nun nodo.

      public function Nodos(){
        return $this->belongsTo(Nodo::class);
    }

    //Relación con Usuario: Un comentario pertence a un so usuario.

    public function Users(){
        return $this->belongsTo(User::class);
    }
}
