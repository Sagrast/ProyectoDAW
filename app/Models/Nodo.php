<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nodo extends Model
{
    protected $with = ['Labels','Categorys','Users'];

    protected $guarded = ['id','created_at','updated_at'];

    use HasFactory;

        //Relación Nodos -> usuarios (N:1)

        public function Users(){
            return $this->belongsTo(User::class);
        }

        //Relación Nodos -> Etiquetas (N:M)

        public function Labels(){
            return $this->belongsToMany(Label::class);
        }


        //Relacion con Categorias  N -> 1 . A categoría pode pertencer a varios nodos.

        public function Categorys(){
            return $this->belongsTo(Category::class);
        }
}
