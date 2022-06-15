<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trabajo;         //Asociamos modelo a clase para consultas

class TrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Trabajo::all();
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
        $trabajo = Trabajo::create($request->all());
        return response()->json($trabajo, 201);    //Devolvemos el objeto creado en json como respuesta para confirmar la correcta creación indicando mensaje 201
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Trabajo::find($id);
    }

    /**
     * Display a jobs list of a customer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trabajosClienteShow($id)
    {
        return Trabajo::where("idCliente","=", $id)->get();
    }

    

    /**
     * Display a jobs list of a customer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trabajosFilterList($id, $fInicio, $fFin)
    {
        if($id == 0) {  //buscamos solo entre fechas
            return Trabajo::whereBetween('fEntrada', [$fInicio, $fFin])->get();
        } else {    //buscamos un tipo concreto entre fechas
            return Trabajo::where("idTipo","=", $id)
                ->whereBetween('fEntrada', [$fInicio, $fFin])
                ->get();
        }
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
        $trabajo = Trabajo::findOrFail($id);
        $trabajo->update($request->all());

        return response()->json($trabajo, 200);    //Devolvemos el objeto creado en json como respuesta para confirmar la correcta creación indicando mensaje 200
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
}
