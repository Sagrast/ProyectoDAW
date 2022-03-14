<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //Relación con nodos, una categoria puede pertenercer a varios nodos.

    public function Nodos(){
        return $this->hasMany(Nodo::class);
    }
}
