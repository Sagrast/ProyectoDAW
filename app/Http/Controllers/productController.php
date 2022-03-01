<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(50);
        return view('web.productos.products',compact('products'));
    }

    public function filter(Request $request){

        if ($request->servicio != 'null'){
            $products = Product::where('tipo','=',$request->servicio)->where('lote','LIKE','%'.$request->lote.'%')->paginate(50);
        } else {
            $products = Product::where('lote','LIKE','%'.$request->lote.'%')->paginate(50);
        }
        return view('web.productos.products',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.productos.addProduct');
    }

    public function add(Request $request){
        $validado = $request->validate([
            'nombre' => 'required',
            'tipo' => 'required',
            'stock' => 'required',
            'fecha' => 'required',
            'lote' => 'required'
        ]);

        if ($validado) {
            $product = new Product;
            $product->nombre = $request->nombre;
            $product->tipo = $request->tipo;
            $product->stock = $request->stock;
            $product->fechaCaducidad = $request->fecha;
            $product->lote = $request->lote;
            $product->save();

            return back()->with('status','Producto añadido correctamente');
        } else {
            return back()->withInput();
        }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('web.productos.editProduct',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validado = $request->validate([
            'nombre' => 'required',
            'tipo' => 'required',
            'stock' => 'required',
            'fecha' => 'required',
            'lote' => 'required'
        ]);

        if ($validado) {
            $product = Product::find($id);
            $product->nombre = $request->nombre;
            $product->tipo = $request->tipo;
            $product->stock = $request->stock;
            $product->fechaCaducidad = $request->fecha;
            $product->lote = $request->lote;
            $product->save();

            return back()->with('status','Producto editado correctamente');
        } else {
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return back()->with('Status','Producto eliminado correctamente');

    }
}
