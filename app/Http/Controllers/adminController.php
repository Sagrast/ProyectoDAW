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
     */
    public function index()
    {
        $users = User::paginate(50);
        return view('web.admin.users', compact('users'));
    }

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

            $update = User::findOrFail($id);
            $update->name = $request->name;
            $update->email = $request->email;
            if ($request->password) {
                $update->password = $request->password;
            }
            $update->rol = $request->rol;
            $update->save();

            if (!isset($update->perfils->id)) {
                DB::insert('INSERT INTO `perfils`(`id`, `created_at`, `updated_at`, `DNI`, `direccion`, `telefono`, `user_id`)
                VALUES (NULL,"' . now() . '","' . now() . '","' . $request->dni . '","' . $request->direccion . '",' . $request->telefono . ',' . $request->id . ')');
            } else {
                DB::update('UPDATE `perfils` SET updated_at="' . now() . '",DNI="' . $request->dni . '",direccion="' . $request->direccion . '",telefono="' . $request->telefono . '" WHERE user_id = ' . $request->id . '');
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
     */
    public function destroy($id)
    {
        $delete = User::find($id);
        $delete->delete();
        return back();
    }
}
