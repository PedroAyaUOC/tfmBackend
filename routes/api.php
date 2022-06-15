<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArchivoTrabajoController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\TipoTrabajoController;
use App\Http\Controllers\TrabajoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CatastroController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

//Rutas autenticación
//Route::get('users', [UserController::class, 'index']);

Route::get('user', [UsuarioController::class, 'user'])->middleware('auth:api');
Route::post('register', [UsuarioController::class, 'register']);
Route::post('usuarios', [UsuarioController::class, 'store']);
//Route::get('usuarios', [UsuarioController::class, 'index']);


//Rutas clientes
Route::get('clientes', [ClienteController::class, 'index']);
Route::get('clientes/{id}', [ClienteController::class, 'show']);
Route::post('clientes', [ClienteController::class, 'store']);
Route::put('clientes/{id}', [ClienteController::class, 'update']);
Route::get('clientes/filter/{dni}/{nombre}', [ClienteController::class, 'clientesFilterList']);


//Rutas Trabajos
Route::get('trabajos', [TrabajoController::class, 'index']);
Route::get('trabajos/{id}', [TrabajoController::class, 'show']);
Route::post('trabajos', [TrabajoController::class, 'store']);
Route::get('trabajos/cliente/{id}', [TrabajoController::class, 'trabajosClienteShow']);
Route::put('trabajos/{id}', [TrabajoController::class, 'update']);
Route::get('trabajos/filter/{id}/{fInicio}/{fFin}', [TrabajoController::class, 'trabajosFilterList']);

//Rutas Archivo Trabajo
Route::get('archivos', [ArchivoTrabajoController::class, 'index']);
Route::get('archivos/{id}', [ArchivoTrabajoController::class, 'show']);
Route::post('archivos', [ArchivoTrabajoController::class, 'store']);        //subir archivos desde api
Route::post('archivos/{id}', [ArchivoTrabajoController::class, 'storeFile']);        //subir archivos desde angular
Route::get('archivos/trabajo/{id}', [ArchivoTrabajoController::class, 'archivosTrabajoShow']);
Route::delete('archivos/{id}', [ArchivoTrabajoController::class, 'destroy']);

//Rutas Usuarios
Route::get('usuarios', [UsuarioController::class, 'index']);
Route::get('usuarios/{id}', [UsuarioController::class, 'show']);
Route::post('usuarios', [UsuarioController::class, 'store']);
Route::put('usuarios/{id}', [UsuarioController::class, 'update']);
Route::delete('usuarios/{id}', [UsuarioController::class, 'destroy']);

//Rutas Tipos Trabajo
Route::get('tiposTrabajo', [TipoTrabajoController::class, 'index']);
Route::post('tipoTrabajo', [TipoTrabajoController::class, 'store']);

//Rutas Municipios
Route::get('municipios', [MunicipioController::class, 'index']);
Route::get('municipios/{id}', [MunicipioController::class, 'show']);
Route::get('municipios/provincia/{id}', [MunicipioController::class, 'municipiosProvinciaShow']);

//Rutas Provincias
Route::get('provincias', [ProvinciaController::class, 'index']);

//Rutas Referencias Catastro
Route::get('refCatastro/{coorX}/{coorY}', [CatastroController::class, 'findRefCatastroUTM']);

