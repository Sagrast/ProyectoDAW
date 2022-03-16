<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * Funcion index: Devuelve la página principal del controlador admin (panel de control de usuarios).
     * De forma paginada
     */
    public function index()
    {
        $users = User::paginate(50);
        return view('web.admin.users', compact('users'));
    }

    /**
     * Funcion filter: Devuelve una vista con los usuarios filtrados en función de los parametros recibidos por el objeto Request.
     *
     */
    public function filter(Request $request)
    {

        if ($request->rol != "null") {
            $users = User::where('rol', "=", $request->rol)->where('name', 'LIKE', '%' . $request->name . '%')->paginate(50);
        } else {
            $users = User::where('name', 'LIKE', '%' . $request->name . '%')->paginate(50);
        }
        return view('web.admin.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     *
     * Devuelve la vista infoUser, datos detallados del usuario seleccionado en la base de datos
     * mediante el valor recibido por el parametro ID
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('web.admin.infoUser', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     * Devuelve la vista de edicion de usuarios. Selecciona un usuario basado en el ID recibido como parametro y lo devuelve
     * Con la vista para mostrar los datos actuales antes de su edición, si fuese necesario.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('web.admin.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *  Funcion update: Recibe como parametros un objeto Request y una ID de usuario.
     * Si se cumplen las validaciones, se procede a realizar la actualización de la base de datos.
     *
     */
    public function update(Request $request, $id)
    {
        $validar = $request->validate([
            'name' => 'required',
            'rol' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'dni' => 'required',
            'direccion' => 'required'
        ]);

        if ($validar) {

            //En una variable se almacena el objeto usuario devuelto en la búsqueda.
            //Y se asocian los lo valores del request con los atributos del objeto.
            $update = User::findOrFail($id);
            $update->name = $request->name;
            $update->email = $request->email;
            //Si se recibe un nuevo password, lo asociamos con su atributo.
            if ($request->password) {
                $update->password = $request->password;
            }
            $update->rol = $request->rol;
            $update->save();
            //salvamos los atributos correspondientes a la tabla Usuario y revisamos los campos de la tabla 1:1
            if (!isset($update->perfils->id)) {
                DB::insert('INSERT INTO `perfils`(`id`, `DNI`, `direccion`, `telefono`, `user_id`)
                VALUES (NULL,"' . $request->dni . '","' . $request->direccion . '",' . $request->telefono . ',' . $request->id . ')');
            } else {
                DB::update('UPDATE `perfils` SET updated_at="' . now() . '",DNI="' . $request->dni . '",direccion="' . $request->direccion . '",telefono="'.$request->telefono.'" WHERE user_id = ' . $request->id . '');
            }
            return back()->with('status', 'Datos Actualizados Correctamente');
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
     * Recibe un ID para buscar el usuario que deseamos eliminar y se llama a la funcion delete.
     *
     */
    public function destroy($id)
    {
        $delete = User::find($id);
        $delete->delete();
        return back()->with('status','Usuario eliminado correctamente.');
    }
}
