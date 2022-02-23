<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class vehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * Busca en la base de datos todos los vehiculos y los muestra en una lista.
     */
    public function index()
    {
        $vehicles = Vehicle::paginate(10);

        return view('web.gestion.vehicles', compact('vehicles'));
    }

    public function add(Request $request){

        $validado = $request->validate([
            'descripcion' => 'required',
            'matricula'=> 'required',
            'kilometros' => 'required',
            'itv' => 'required'
        ]);

        if ($validado) {
        $car = new Vehicle;
        $car->descripcion = $request->descripcion;
        $car->matricula = $request->matricula;
        $car->kilometros = $request->kilometros;
        $car->itv = $request->itv;
        $car->save();

        return back()->with('status','Vehículo añadido conrrectamente');
        } else {
            return back()->withInput();
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * Función que devuelve la vista para la inserción de nuevos vehiculos en la base de datos.
     */
    public function create()
    {
        return view('web.gestion.addVehicle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * Función que inserta en la tabla pivote los conductores asociados los vehiculos y la fecha en la que se ha realizado.
     */
    public function store(Request $request)
    {
       DB::insert('INSERT INTO user_vehicle (user_id,vehicle_id,fecha) VALUES ('.$request->user.','.$request->vehicle.',"'.$request->fecha.'")');
        return back()->with('status','Insercion correcta');
    }

    //Funcion de filtrado: Busca en la bdd matriculas que contengan la cadena envíada y devuelve los resultados encontrados.

    public function filter(Request $request)
    {

        $vehicles = Vehicle::where('matricula', 'LIKE', '%' . $request->matricula . '%')->paginate(5);

        return view('web.gestion.vehicles', compact('vehicles'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * Función que busca en la BDD los usuarios con un rol distinto a cliente para poder asociarlos a los vehiculos.
     */
    public function show($id)
    {
        $vehicles = Vehicle::find($id);
        $data = $vehicles->users()->get();
        $users = User::where('rol','!=','cliente')->get();

        return view('web.gestion.infoVehicles',compact('data','vehicles','users'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * Función que devuelve la vista de actualización de un vehículo con los datos del vehículo indicado mediante la ID de este.
     */
    public function edit($id)
    {
        $vehicle = Vehicle::find($id);
        return view('web.gestion.updateVehicle',compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     * Función que procesa los datos de la vista de actualización de vehículos actualizando los datos del ID de vehículo recibido por parametro.
     */
    public function update(Request $request, $id)
    {
        $validado = $request->validate([
            'descripcion' => 'required',
            'matricula'=> 'required',
            'kilometros' => 'required',
            'itv' => 'required'
        ]);

        if ($validado) {
        $car = Vehicle::find($id);
        $car->descripcion = $request->descripcion;
        $car->matricula = $request->matricula;
        $car->kilometros = $request->kilometros;
        $car->itv = $request->itv;
        $car->update();

        return back()->with('status','Vehículo actualizado correctamente');
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
     * Función que elimina un vehículo de la BDD en función de la ID recibida por parametro.
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();

        return back()->with('status','Vehiculo eliminado correctamente');
    }

}
