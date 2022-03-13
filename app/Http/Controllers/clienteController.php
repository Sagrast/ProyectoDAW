<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Machine;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class clienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::paginate(25);

        return view('web.clientes.client', compact('clients'));
    }

    public function filter(Request $request)
    {
        if ($request->servicio != 'null') {
            $clients = Client::where('servicio', '=', $request->servicio)->where('nombre', 'LIKE', '%' . $request->name . '%')->paginate(50);
        } else {
            $clients = Client::where('nombre', 'LIKE', '%' . $request->name . '%')->paginate(50);
        }
        return view('web.clientes.client', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     *
     * Devuelve la vista con el formulario de alta de un nuevo cliente.
     */
    public function create()
    {
        return view('web.clientes.addClient');
    }

    //Metodo que añade en la base de datos un nuevo cliente

    public function add(Request $request)
    {

        $validado = $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'cif' => 'required|max:9',
            'telefono' => 'required',
            'email' => 'required',
            'servicio' => 'required',
        ]);

        if ($validado) {
            $client = new Client;
            $client->nombre = $request->nombre;
            $client->direccion = $request->direccion;
            $client->cif = $request->cif;
            $client->telefono = $request->telefono;
            $client->email = $request->email;
            $client->servicio = $request->servicio;
            $client->save();

            return back()->with('status', 'Cliente añadido correctamente');
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
     * Insecion en la tabla pivote para el control de visitas.
     */
    public function store(Request $request)
    {

        $validar = $request->validate([
            'user' => 'required',
            'fecha' => 'required',
            'motivo' => 'required',
            'albaran' => 'required',
            'cliente' => 'required'
        ]);

        if ($validar) {
            DB::insert('INSERT INTO client_user (user_id,client_id,Fecha,MotivoVisita,Albaran) VALUES (' . $request->user . ',' . $request->cliente . ',"' . $request->fecha . '","' . $request->motivo . '",' . $request->albaran . ')');
            return back()->with('status', 'Insercion correcta');
        } else {
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Client::find($id);
        $data = $cliente->users()->latest('fecha')->get();
        $users = User::where('rol', '!=', 'cliente')->get();
        $machine = $cliente->machine()->get();


        return view('web.clientes.infoClient', compact('cliente', 'data', 'users', 'machine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        $machine = Machine::where('tipo', '=', $client->servicio)->where('estado', '=', 'disponible')->get();

        return view('web.clientes.editCliente', compact('client', 'machine'));
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
            'email' => 'required',
            'direccion' => 'required',
            'cif' => 'required',
            'servicio' => 'required',
            'telefono' => 'required'
        ]);

        if ($validado) {
            $client = Client::find($id);
            $client->nombre = $request->nombre;
            $client->email = $request->email;
            $client->direccion = $request->direccion;
            $client->cif = $request->cif;
            $client->servicio = $request->servicio;
            $client->telefono = $request->telefono;
            $client->update();

            return back()->with('status', 'Cliente actualizado correctamente');
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
        $cliente = Client::find($id);
        $cliente->delete();
        return back()->with('status', 'Cliente eliminado correctamente.');
    }
}
