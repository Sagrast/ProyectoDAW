<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nodo extends Model
{
    protected $with = ['Labels','Comments','Categorys','Users'];
    use HasFactory;

        //Relación Nodos -> usuarios (N:1)

        public function Users(){
            return $this->belongsTo(User::class);
        }

        //Relación Nodos -> Etiquetas (N:M)

        public function Labels(){
            return $this->belongsToMany(Label::class);
        }

        //Relación con Comentarios-> N:1 o nodo pode ter distintos comentarios.

        public function Comments(){
            return $this->hasMany(Comment::class);
        }

        //Relacion con Categorias  N -> 1 . A categoría pode pertencer a varios nodos.

        public function Categorys(){
            return $this->belongsTo(Category::class);
        }
}
