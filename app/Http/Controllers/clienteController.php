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
     *
     * Lista paginados la lista total de clientes en la base de datos.
     */
    public function index()
    {
        $clients = Client::paginate(25);

        return view('web.clientes.client', compact('clients'));
    }

    /**
     * Funcion de filtrado de usuarios.
     * Devuelve la vista client con el resultado de obetenido según los valores enviados mediante el objeto Request.
     *
     *  */

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
        //Si las validaciones son correctas, asocia los valores obtenidos en el Request con los atributos del objeto Client
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
     *
     * Devuelve la vista infoCliente con los datos asociados al ID que recibe como parametro.
     */
    public function show($id)
    {
        //Busca el cliente con el ID recibido
        $cliente = Client::find($id);
        //Devuelve los usuarios que han tenido relación con dicho cliente ordenados de por fecha descendiente.
        $data = $cliente->users()->latest('fecha')->get();
        //Devuelve los usuarios cuyo rol sea distinto a cliente.
        $users = User::where('rol', '!=', 'cliente')->get();
        //Devuelve las máquinas asociadas al cliente seleccionado por ID
        $machine = $cliente->machine()->get();


        return view('web.clientes.infoClient', compact('cliente', 'data', 'users', 'machine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     * Devuelve la vista de edicion de clientes y las máquinas disponibles que se corresponden con el servicio prestado al cliente.
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
     *
     * Mediente el objeto request recibimos los nuevos parametros a validar.
     * Tras realizar la validacion de estos, se procede a realizar la actualización en la BDD.
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
     *
     * Recibe un ID por el cual filtrar el cliente a borrar.
     * Una vez encontrado se llama a la función delete()
     */
    public function destroy($id)
    {
        $cliente = Client::find($id);
        $cliente->delete();
        return back()->with('status', 'Cliente eliminado correctamente.');
    }
}
