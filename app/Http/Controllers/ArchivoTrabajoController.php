<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArchivoTrabajo;         //Asociamos modelo a clase para consultas
use Illuminate\Support\Facades\Storage;

class ArchivoTrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $archivo = ArchivoTrabajo::create($request->all());
        return response()->json($archivo, 201);    //Devolvemos el objeto creado en json como respuesta para confirmar la correcta creación indicando mensaje 201
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function storeFile(Request $request)
    {
        $archivo = new ArchivoTrabajo;
        if($request->hasFile('fichero')) {
            //$completeFileName = $request->file('fichero')->getClientOriginalName();
            //$fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extension = $request->file('fichero')->getClientOriginalExtension();
            $nombre = $request->slug . "_" . time() . "." . $extension;
            //$request->slug = $nombre;
            $request['slug'] = $nombre;
            $archivo = ArchivoTrabajo::create($request->all());
            $path = $request->file('fichero')->storeAs('public/archivos', $nombre);
        }
        
        return response()->json($archivo, 201);    //Devolvemos el objeto creado en json como respuesta para confirmar la correcta creación indicando mensaje 201
    }*/

    public function storeFile($id, Request $request)
    {
        $archivo = New ArchivoTrabajo;
        if($request->hasFile('fichero')) {
            $extension = $request->file('fichero')->getClientOriginalExtension();
            $nombre = sha1(rand()) . "". time() . "." . $extension;
            $archivo = ArchivoTrabajo::findORFail($id)->update(['slug' => $nombre,]);
            $path = $request->file('fichero')->storeAs('public/archivos', $nombre);
        }
        
        return response()->json($archivo, 201);    //Devolvemos el objeto creado en json como respuesta para confirmar la correcta creación indicando mensaje 201
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Display a files list of a job.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function archivosTrabajoShow($id)
    {
        return ArchivoTrabajo::where("idTrabajo","=", $id)->get();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $archivo = ArchivoTrabajo::findOrFail($id);
        

        if(Storage::exists('public/archivos/'. $archivo['slug'])){
            Storage::delete('public/archivos/'. $archivo['slug']);
            $archivo->delete();
        }

        return 204;    //Devolvemos el objeto creado en json como respuesta para confirmar la correcta creación indicando mensaje 204    

    }
}
