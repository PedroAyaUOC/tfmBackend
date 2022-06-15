<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivoTrabajo extends Model
{
    use HasFactory;

    //Desactivar las marcas de tiempo por defecto en consultas de creación
    public $timestamps = false;

    //tabla relacionada con el modelo
    protected $table = "archivo_trabajos";
    //Indicamos campos visualizables en las consultas
    protected $fillable = ['fCreacion','titulo', 'slug', 'idTrabajo'];
    //Campos ocultos en las consultas
    //protected $hidden = ['id'];

    //Asociamos el trabajo al archivo
    public function trabajo()
    {
        return $this->belongsTo(Trabajo::class);
    }
}
