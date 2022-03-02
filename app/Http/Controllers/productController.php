<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('web.productos.products', compact('products'));
    }

    public function filter(Request $request)
    {

        if ($request->servicio != 'null') {
            $products = Product::where('tipo', '=', $request->servicio)->where('lote', 'LIKE', '%' . $request->lote . '%')->paginate(50);
        } else {
            $products = Product::where('lote', 'LIKE', '%' . $request->lote . '%')->paginate(50);
        }
        return view('web.productos.products', compact('products'));
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

    public function add(Request $request)
    {
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

            return back()->with('status', 'Producto añadido correctamente');
        } else {
            return back()->withInput();
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * Función que añade la carga de los productos en las máquinas del cliente escogido.
     */
    public function store(Request $request)
    {
        $validar = $request->validate([
            "fecha" => 'required'
        ]);

        if ($validar) {

            for ($i = 0; $i < count($request->carga); $i++) {
                $producto = Product::find($request->id[$i]);
                if ($producto->stock >= $request->carga[$i]) {
                    DB::insert('INSERT INTO machine_product (machine_id,product_id,fechaCarga,unidades) VALUES (' . $request->maquina . ',' . $request->id[$i] . ',"' . $request->fecha . '",' . $request->carga[$i] . ')');
                    DB::update('UPDATE products SET stock = stock - ' . $request->carga[$i] . ' WHERE id = ' . $request->id[$i]);
                } else {
                    return back()->with('status', $producto->nombre . ': Stock insuficiente');
                }
            }
            return back()->with('status','Carga realizada correctamente');
        } else {
            return back()->withInput();
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     * //Devuelve el formulario de insercion de productos en máquinas.
     */
    public function show($id)
    {
        $client = Client::find($id);
        $machine = $client->machine()->where('estado', '=', 'produccion')->get();
        $products = Product::where('tipo', '=', $client->servicio)->get();

        return view('web.cargas.cargas', compact('client', 'products', 'machine'));
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

        return view('web.productos.editProduct', compact('product'));
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

            return back()->with('status', 'Producto editado correctamente');
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

        return back()->with('Status', 'Producto eliminado correctamente');
    }
}
