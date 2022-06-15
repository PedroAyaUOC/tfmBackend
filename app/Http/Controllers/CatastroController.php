<?php

namespace App\Http\Controllers;
use App\gpointconverter\GpointConverter;



use Illuminate\Http\Request;

class CatastroController extends Controller
{
    //const URL_CATASTRO = "http://ovc.catastro.meh.es/ovcservweb/OVCSWLocalizacionRC/OVCCoordenadas.asmx/Consulta_RCCOOR?SRS=EPSG:25830&Coordenada_X=582163&Coordenada_Y=4134099";

    public function findRefCatastroUTM($coorX, $coorY)
    {
        $infoCatastro = '';
        $refCatastro = '';

        $aux = new GpointConverter(); // Create an empty point 
	 	$utm = $aux->convertLatLngToUtm($coorX, $coorY);

        $x= $utm[0];
		$y= $utm[1];
			
        $urlBase = "http://ovc.catastro.meh.es/ovcservweb/OVCSWLocalizacionRC/OVCCoordenadas.asmx/Consulta_RCCOOR?";
        $srs = "EPSG:25830";

        //$url = "http://ovc.catastro.meh.es/ovcservweb/OVCSWLocalizacionRC/OVCCoordenadas.asmx/Consulta_RCCOOR?SRS=EPSG:25830&Coordenada_X=582163&Coordenada_Y=4134099";
        $urlPeticion= $urlBase . "SRS=". $srs ."&Coordenada_X=".$x."&Coordenada_Y=".$y."";
        $infoCatastro = simplexml_load_file($urlPeticion);

        if((int)$infoCatastro->{'control'}->cucoor > 0 ){
            $refCatastro = (isset($infoCatastro->{'coordenadas'}->{'coord'}->{'pc'}->pc1)) ? $infoCatastro->{'coordenadas'}->{'coord'}->{'pc'}->pc1 : '-' ;
            $refCatastro .= (isset($infoCatastro->{'coordenadas'}->{'coord'}->{'pc'}->pc2)) ? $infoCatastro->{'coordenadas'}->{'coord'}->{'pc'}->pc2 : '-' ;
        } else {
            $refCatastro = 'Desconocida';
        }
        
        return response()->json($refCatastro, 201);    //Devolvemos el objeto creado en json como respuesta para confirmar la correcta creación indicando mensaje 201
    }


}
