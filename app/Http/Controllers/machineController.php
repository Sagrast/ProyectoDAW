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
     */
    public function index()
    {
        $machines = Machine::paginate(25);
        return view('web.machines.machine', compact('machines'));
    }

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
     */
    public function create()
    {
        return view('web.machines.addMachine');
    }

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
     */
    public function show($id)
    {
        $machine = Machine::find($id);
        $clients = $machine->clients()->latest('instalacion')->get();
        $averias = $machine->failures()->latest('fecha')->get();


        return view('web.machines.infoMachine', compact('machine', 'clients', 'averias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $machine = Machine::find($id);

        return view('web.machines.editMachine', compact('machine'));
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
            'marca' => 'required',
            'modelo' => 'required',
            'lectura' => 'required',
            'tipo' => 'required',
            'serial' => 'required'
        ]);

        if ($validado) {
            $machine = Machine::find($id);
            $machine->marca = $request->marca;
            $machine->modelo = $request->modelo;
            $machine->lectura = $request->lectura;
            $machine->tipo = $request->tipo;
            $machine->serial = $request->serial;
            $machine->update();

            return back()->with('status', 'Maquina añadida correctamente');
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
        $machine = Machine::find($id);
        $machine->delete();

        return back()->with('Status', 'Máquina eliminada correctamente');
    }

    public function close($id)
    {
        $failure = Failure::find($id);
        $failure->estado = 'Arreglado';
        $failure->update();

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
