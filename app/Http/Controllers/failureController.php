<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Failure;
use App\Models\Machine;
use Illuminate\Auth\Events\Failed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class failureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $nueva = new Failure;
        $averias = $nueva->paginate(50);
        $open = DB::select('SELECT * FROM machines INNER JOIN failure_machine ON machines.id = failure_machine.machine_id INNER JOIN failures ON failure_machine.failure_id = failures.id WHERE status = "pendiente"');



        return view('web.failures.failures',compact('averias','open'));
    }

    //Funcion de busqueda.

    public function filter(Request $request)
    {

        if ($request->servicio != 'null') {
            $averias = Failure::where('servicio', '=', $request->servicio)->where('descripcion', 'LIKE', '%' . $request->descripcion . '%')->paginate(50);
        } else {
            $averias = Failure::where('descripcion', 'LIKE', '%' . $request->descripcion . '%')->paginate(50);
        }
        return view('web.failures.failures', compact('averias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.failures.addFailure');
    }

    public function add(Request $request){
        $validado = $request->validate([
            'descripcion' => 'required',
            'servicio' => 'required'
        ]);

        if ($validado) {
            $failure = new Failure;
            $failure->descripcion = $request->descripcion;
            $failure->servicio = $request->servicio;

            $failure->save();

            return back()->with('status','Averia añadida correctamente');
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
        $validar = $request->validate([
            'machineId' => 'required',
            'fail' => 'required',
            'fecha' => 'required'
        ]);

        if ($validar){
            DB::insert('insert into failure_machine (machine_id,failure_id, fecha, status) values ('.$request->machineId.','.$request->fail.',"'.$request->fecha.'","Pendiente")');
            return back()->with('status',"Avería Creada");
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
        $machine = $cliente->machine()->get();
        $failure = Failure::where('servicio','=',$cliente->servicio)->get();

        return view('web.failures.alert',compact('cliente','machine','failure'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $averias = Failure::find($id);

        return view('web.failures.editFailure',compact('averias'));
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
            'descripcion' => 'required',
            'servicio' => 'required'
        ]);

        if ($validado){

        $failure = Failure::find($id);
        $failure->descripcion = $request->descripcion;
        $failure->servicio = $request->servicio;
        $failure->update();

        return back()->with('status','Avería actualizada correctamente');

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
        $failure = Failure::find($id);
        $failure->delete();

        return back()->with('status','Avería eliminada correctamente');
    }
}
