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
     *
     * Función que devuelve la vista con el listado de productos incluido en la BDD de forma páginada.
     */
    public function index()
    {
        $products = Product::paginate(50);
        return view('web.productos.products', compact('products'));
    }

    /**
     * Funcion que devuelve la lista de productos basada en los parametros recibidos.
     */

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
     *
     * Función que devuelve la vista de creación de nuevos productos.
     */
    public function create()
    {
        return view('web.productos.addProduct');
    }


    /**
     *
     * Función que recibe un objeto Request con los valores del nuevo producto a insertar en la BDD.
     * Si los parametros son validados correctamente se procede a la inserción.
     *
     */
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
     * Recibe un array con la Id de los productos a insertar y su cantidad, para recorrer un bucle.
     * Antes de cada inserción comprueba que el stock disponible es suficiente, de no ser así interrumpe el proceso avisando de que no hay stock suficinte.
     *
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
            return back()->with('status', 'Carga realizada correctamente');
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
     * Devuelve la vista de cargas de producto del cliente seleccionado.
     * Se comprueba que el cliente tenga una máquina instalada.
     * Se devuelven los productos que complan con el servicio suminitrado al cliente.
     */
    public function show($id)
    {
        $client = Client::find($id);
        $machine = $client->machine()->where('estado', '=', 'produccion')->get();
        $products = Product::where('tipo', '=', $client->servicio)->get();

        if (count($machine) > 0) {
            return view('web.cargas.cargas', compact('client', 'products', 'machine'));
        } else {
            return back()->with('status', 'El cliente seleccionado no tiene ninguna máquina asociada');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     * Devuelve la vista de edición del producto cuya ID se recibe como parametro.
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
     *
     * Actualiza el producto cuya ID se recibe como parametro.
     * Realiza la validacion de los parametros recibidos por el objeto Request y si son correctos procede a la actualizacion.
     *
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
     *
     * Elimina el producto cuya ID se recibe como parametro.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return back()->with('Status', 'Producto eliminado correctamente');
    }


    //Función que devuelve el historico de Cargas del cliente seleccionado
    public function history($id)
    {

        $fechas = DB::select('SELECT DISTINCT fechaCarga from machine_product');
        $cargas = DB::select('SELECT * FROM products inner join machine_product ON products.id = machine_product.product_id WHERE machine_id = ' . $id . '');
        if (count($cargas) > 0) {
            return view('web.cargas.history', compact('cargas','fechas'));
        } else {
            return back()->with('status', 'Este Cliente aún no tiene cargas realizadas');
        }
    }

    //Función que filtra el historico de cargas por una Fecha recibida en el formulario

    public function filterLoadDate(Request $request)
    {
        $fechas = DB::select('SELECT DISTINCT fechaCarga from machine_product');
        $cargas = DB::select('SELECT * FROM products inner join machine_product ON products.id = machine_product.product_id WHERE fechaCarga = "' . $request->fecha . '"');
        return view('web.cargas.history', compact('cargas','fechas'));
    }
}
