<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;         //Asociamos modelo a clase para consultas

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cliente::all();
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
        $cliente = Cliente::create($request->all());
        return response()->json($cliente, 201);    //Devolvemos el objeto creado en json como respuesta para confirmar la correcta creación indicando mensaje 201
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Cliente::find($id);
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
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());

        return response()->json($cliente, 200);    //Devolvemos el objeto creado en json como respuesta para confirmar la correcta creación indicando mensaje 200
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display a jobs list of a customer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function clientesFilterList($dni, $nombre)
    {
        return Cliente::where("dni","=", $dni)
            ->orWhere("nombre", "like", $nombre)
            ->orWhere("apellidos","like", $nombre)
            ->get();
    }
}
