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
    public function news()
    {
        $nodos = Nodo::latest('data')->paginate(5);

        return view('web.nodos.news', compact('nodos'));
    }

    public function show(Nodo $post)
    {

        //Consulta que retorna la lista de Post de la misma categoria.
        //Filtrando por ID y descartando la ID del objeto Nodo que recibe la función.
        //ordenado por el mas reciente por fecha y limitado a 4 resultados
        $equals = Nodo::where('category_id', $post->category_id)
            ->latest('data')
            ->where('id', '!=', $post->id)
            ->take(4)
            ->get();

        return view('web.nodos.article', compact('post', 'equals'));
    }

    public function labels(label $label)
    {

        $equals = $label->nodos()->latest('data')->paginate(5);


        return view('web.nodos.labels', compact('equals', 'label'));
    }

    public function create()
    {
        //array de Categorias
        $categoria = Category::all();
        //Array de etiquetas
        $etiquetas = Label::all();
        return view('web.nodos.create', compact('categoria', 'etiquetas'));
    }

    public function store(Request $request)
    {
        $validado = $request->validate([
            'titulo' => 'required',
            'subtitulo' => 'required',
            'category' => 'required',
            'etiquetas' => 'required',
            'content' => 'required'
        ]);


        if ($validado) {

            //Insercion de nuevo Nodo.
            $nodos = new Nodo;
            $nodos->titulo = $request->titulo;
            $nodos->subtitulo = $request->subtitulo;
            $nodos->contidoHTML = $request->content;
            $nodos->user_id = Auth::id();
            $nodos->data = now();
            $nodos->category_id = $request->category;


            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imgName = Str::slug($request->title) . "." . $image->guessExtension();
                $route = public_path("img/post/");
                copy($image->getRealPath(), $route . $imgName);
                $nodos->img = $imgName;

            }

            $nodos->save();

            //$labels = Label::create($request->etiquetas);
            $nodos->Labels()->attach($request->etiquetas);


         return redirect('/dashboard')->with('status', 'Noticia añadida');
         } else {
            return back()->withInput();
        }
    }
}

