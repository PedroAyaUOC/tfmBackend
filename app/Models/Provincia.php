<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;

    //Desactivar las marcas de tiempo por defecto en consultas de creación
    public $timestamps = false;

    //tabla relacionada con el modelo
    protected $table = "provincias";
    //Indicamos campos visualizables en las consultas
    protected $fillable = ['nombre'];
    //Campos ocultos en las consultas
    //protected $hidden = ['id'];
}
