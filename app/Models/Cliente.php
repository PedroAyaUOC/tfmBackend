<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    //Desactivar las marcas de tiempo por defecto en consultas de creación
    public $timestamps = false;

    //tabla relacionada con el modelo
    protected $table = "clientes";
    //Indicamos campos visualizables en las consultas
    protected $fillable = ['nombre','apellidos','dni','idioma','email','telefono1','telefono2','observaciones','direccion','cp','idMunicipio'];
    //Campos ocultos en las consultas
    //protected $hidden = ['id'];

    //Asociamos la ciudad al cliente
    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class);
    }
}
