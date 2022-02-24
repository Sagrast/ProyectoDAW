<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Failure;
use App\Models\Machine;
use App\Models\User;
use Illuminate\Http\Request;

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
        return view('web.machines.machine',compact('machines'));
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

    public function add(Request $request){
        $validado = $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'lectura' => 'required',
            'tipo' => 'required',
            'serial' => 'required'
        ]);

        if ($validado) {
            $machine = new Machine;
            $machine->marca = $request->marca;
            $machine->modelo = $request->modelo;
            $machine->lectura = $request->lectura;
            $machine->tipo = $request->tipo;
            $machine->serial = $request->serial;
            $machine->save();

            return back()->with('status','Maquina añadida correctamente');
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


        return view('web.machines.infoMachine',compact('machine','clients','averias'));

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

            return back()->with('status','Maquina añadida correctamente');
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

        return back()->with('Status','Máquina eliminada correctamente');
    }

    public function close($id)
    {
        $failure = Failure::find($id);
        $failure->estado = 'Arreglado';
        $failure->update();

        return back()->with('Status','Incidencia cerrada');
    }
}
