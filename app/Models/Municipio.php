<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    //Desactivar las marcas de tiempo por defecto en consultas de creación
    public $timestamps = false;

    //tabla relacionada con el modelo
    protected $table = "municipios";
    //Indicamos campos visualizables en las consultas
    protected $fillable = ['nombre','idProvincia'];
    //Campos ocultos en las consultas
    //protected $hidden = ['id'];

    //Asociamos la provincia a la ciudad
    public function provincia()
    {
        return $this->belongsTo(Provincia::class);
    }
}
