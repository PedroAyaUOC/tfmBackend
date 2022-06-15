<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;         //Asociamos modelo a clase para consultas
use App\Http\Requests\UsuarioRegisterRequest;         //Asociamos modelo a clase para consultas
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Usuario::all();
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
     * Store a newly created resource in storage. Hash::make($request->password)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = Usuario::create($request->all());
        /*Usuario::create([
            'nombre' => $request->nombre,
            'login' => $request->login,
            'email' => $request->email,
            'password' =>  $request->password,
            'permiso' => $request->permiso,
            'remember_token' => $request->permiso,
        ]);*/
        return response()->json($usuario, 201);    //Devolvemos el objeto creado en json como respuesta para confirmar la correcta creación indicando mensaje 201
    }

    public function register(UsuarioRegisterRequest $request)
    {
        //$usuario = Usuario::create($request->all());
        Usuario::create([
            'nombre' => $request->nombre,
            'login' => $request->login,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'permiso' => $request->permiso,
        ]);
        return response()->json($usuario, 201);    //Devolvemos el objeto creado en json como respuesta para confirmar la correcta creación indicando mensaje 201
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Usuario::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $aux = '';

        $usuario = Usuario::findOrFail($id);
        /*if(!empty($request->password))
            $aux = $request->password;

        /*Usuario::update([
            'nombre' => $request->nombre,
            'login' => $request->login,
            'email' => $request->email,
            'password' =>  Hash::make($aux),
            'permiso' => $request->permiso,
            'remember_token' => $request->remember_token,
        ]);*/
        $usuario->update($request->all());

        return response()->json($usuario, 200);    //Devolvemos el objeto creado en json como respuesta para confirmar la correcta creación indicando mensaje 200    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return 204;    //Devolvemos el objeto creado en json como respuesta para confirmar la correcta creación indicando mensaje 204    
    }

    public function user(Request $request) 
    {
        return $request->user();
    }
}
