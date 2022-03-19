<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Failure;
use App\Models\Machine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class machineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * Devuelve la vista indice con el listado de máquinas de la base de datos de forma paginada.
     *
     */
    public function index()
    {
        $machines = Machine::paginate(25);
        return view('web.machines.machine', compact('machines'));
    }

    /**
     *
     * Devuelve la vista indice con los datos recibidos por la consulta que ejecuta el filtrado.
     *
     */
    public function filter(Request $request)
    {

        if ($request->servicio != 'null') {
            $machines = Machine::where('tipo', '=', $request->servicio)->where('marca', 'LIKE', '%' . $request->name . '%')->paginate(50);
        } else {
            $machines = Machine::where('marca', 'LIKE', '%' . $request->name . '%')->paginate(50);
        }
        return view('web.machines.machine', compact('machines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     *
     * Devuelve la vista que se contiene el formulario para añadir nuevos productos.
     */
    public function create()
    {
        return view('web.machines.addMachine');
    }

    /**
     *
     * Funcion que añade una nueva máquina a la base de datos.
     * Si la validación de parametros es correcta, asocia los atributos del objeto request con los del objeo machine
     * y llama la función salvar.
     *
     */
    public function add(Request $request) {

            $validado = $request->validate([
                'marca' => 'required',
                'modelo' => 'required',
                'lectura' => 'required',
                'estado' => 'required',
                'tipo' => 'required',
                'serial' => 'required',
            ]);

        if ($validado) {
            $machine = new Machine;
            $machine->marca = $request->marca;
            $machine->modelo = $request->modelo;
            $machine->lectura = $request->lectura;
            $machine->tipo = $request->tipo;
            $machine->serial = $request->serial;

            $machine->save();

            //Para los atributos correspondientes a las tablas de especialización usamos el metodo que nos devuelve el ultimo insert realizado
            //y realizamos un insert en la tabla correspondiente del parametro recibido.

            $machineID = DB::getPdo()->lastInsertId();

            if ($request->tipo == 'tabaco' && isset($request->carriles)){
                DB::insert('INSERT INTO `machine_tobaccos`(`id`, `created_at`, `updated_at`, `machine_id`, `carriles`) VALUES (NULL,"'.now().'","'.now().'",'.$machineID.','.$request->carriles.')');

            } else if($request->tipo == 'snacks' && isset($request->espirales)) {
                DB::insert('INSERT INTO `machine_snacks`(`id`, `created_at`, `updated_at`, `machine_id`, `espirales`) VALUES (NULL,"'.now().'","'.now().'",'.$machineID.','.$request->espirales.')');
            } else if ($request->tipo == 'agua' && isset($request->water)) {
                DB::insert('INSERT INTO `machine_waters`(`id`, `created_at`, `updated_at`, `machine_id`, `aguaCaliente`) VALUES (NULL,"'.now().'","'.now().'",'.$machineID.','.$request->water.')');
            }

            return back()->with('status', 'Maquina añadida correctamente');
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
     * Devuelve la vista detallada de una máquina seleccionada mediante la ID recibida.
     *
     * En ella devolvemos tambien los clientes con los que ha sido relacionada en orden descendiente por fecha de instalación.
     */
    public function show($id)
    {
        $machine = Machine::find($id);
        $clients = $machine->clients()->latest('instalacion')->get();
        $tipo = "";

        if ($machine->tipo == 'tabaco'){
            $tipo = $machine->machineTobacco;
        } else if ($machine->tipo == 'snacks'){
            $tipo = $machine->machineSnack;
        } else if ($machine->tipo == 'agua') {
            $tipo = $machine->machineWater;
        }

        return view('web.machines.infoMachine', compact('machine', 'clients','tipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     * Vista que devuelve la vista de edicion de máqinas y los valores de la máquina seleccionada mediante el ID recibido
     */
    public function edit($id)
    {
        $machine = Machine::find($id);
        $tipo = "";

        if ($machine->tipo == 'tabaco'){
            $tipo = $machine->machineTobacco;
        } else if ($machine->tipo == 'snacks'){
            $tipo = $machine->machineSnack;
        } else if ($machine->tipo == 'agua') {
            $tipo = $machine->machineWater;
        }

        return view('web.machines.editMachine', compact('machine','tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     * Funcion de actualización de máquinas. Si la validación de parametros es correcta, procedemos a la asociacion de valores de atributos
     * y realizamos la actualizacion.
     */
    public function update(Request $request, $id)
    {
        $validado = $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'lectura' => 'required',
            'tipo' => 'required',
            'serial' => 'required',
        ]);

        if ($validado) {
            $machine = Machine::find($id);
            $machine->marca = $request->marca;
            $machine->modelo = $request->modelo;
            $machine->lectura = $request->lectura;
            $machine->tipo = $request->tipo;
            $machine->serial = $request->serial;
            $machine->update();

            if ($request->tipo == 'tabaco' && isset($request->carriles)){
                DB::update('update machine_tobaccos set carriles = '.$request->carriles.' where machine_id = '.$id.'');
            } else if($request->tipo == 'snacks' && isset($request->espirales)) {
                DB::update('update machine_snacks set espirales = '.$request->espirales.' where machine_id = '.$id.'');
            } else if ($request->tipo == 'agua' && isset($request->water)) {
                DB::update('update machine_tobaccos set carriles = '.$request->water.' where machine_id = '.$id.'');
            }

            return back()->with('status', 'Maquina editada correctamente');
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
     * Función que elimina una máqina seleccionandola por e ID recibido como parametro.
     */
    public function destroy($id)
    {
        $machine = Machine::find($id);
        $machine->delete();

        return back()->with('Status', 'Máquina eliminada correctamente');
    }

    /**
     * Funcion que cierra una incidencia. Marca el estado de una incidencia asociada a una máquina en su tabla pivote como arreglado.
     */

    public function close($id)
    {

        DB::update('UPDATE failure_machine SET status = "arreglado" where id = '.$id.'');

        return back()->with('Status', 'Incidencia cerrada');
    }


    //Funcion que retira una máquina de un cliente. Añade una fecha de baja y cambia el estado de la máquina a disponible.

    public function withdraw($id, $cliente)
    {

        DB::table('client_machine')->where('machine_id', '=', $id, 'AND', 'cliente_id', '=', $cliente)->update(array('retirada' => now()));

        $machine = Machine::find($id);
        $machine->estado = "disponible";
        $machine->update();

        return back();
    }

    //Funcion que asocia una máquina a un cliente. Añade una fecha de instalacion y cambia el estado de la máquina a produccion.
    public function install($id, $cliente)
    {

        DB::insert('INSERT INTO client_machine (machine_id,client_id,instalacion) VALUES (' . $id . ',' . $cliente . ',"' . now() . '")');

        $machine = Machine::find($id);
        $machine->estado = "produccion";
        $machine->update();

        return back()->with('status', 'Maquina asociada correctamente');
    }
}
