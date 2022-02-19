<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nodo;
use App\Models\Label;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


/*
    Controlador dedicado a la parte Blog del portal. Perteneciente a la seccion 'Noticias'.
*/

class NodoController extends Controller
{
    public function news(){
        $nodos = Nodo::latest('data')->paginate(5);

        return view('web.nodos.news',compact('nodos'));
    }

    public function show(Nodo $post){

        //Consulta que retorna la lista de Post de la misma categoria.
        //Filtrando por ID y descartando la ID del objeto Nodo que recibe la función.
        //ordenado por el mas reciente por fecha y limitado a 4 resultados
       $equals = Nodo::where('category_id',$post->category_id)
                        ->latest('data')
                        ->where('id','!=',$post->id)
                        ->take(4)
                        ->get();

       return view('web.nodos.article',compact('post','equals'));

    }

    public function labels(label $label){

        $equals = $label->nodos()->latest('data')->paginate(5);


        return view('web.nodos.labels',compact('equals','label'));

    }

    public function create(){
        //array de Categorias
        $categoria = Category::all();
        //Array de etiquetas
        $etiquetas = Label::all();
       return view('web.nodos.create',compact('categoria','etiquetas'));
    }

    public function store(Request $request){
        $validate = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'category' => 'required',
            'etiquetas' => 'required',
            'content' => 'required'
        ]);


        if ($validate){

            //Insercion de nuevo Nodo.
            $nodos = new Nodo;
            $nodos->titulo = $request->title;
            $nodos->subtitulo = $request->subtitle;
            $nodos->content = $request->content;
            $nodos->user_id = Auth::id();

            if ($request->hasFile('image')){
                $image = $request->file('image');
                $imgName = Str::slug($request->title).".".$image->guessExtension();
                $route = public_path("img/post/");
                copy($image->getRealPath(),$route.$imgName);
                $nodos->img = $imgName;
            $nodos->Labels()->attach($request->etiquetas);

        } else {
            return back()->withInput();
        }
    }


    }
}

