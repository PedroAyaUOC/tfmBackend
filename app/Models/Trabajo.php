<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    use HasFactory;

    //Desactivar las marcas de tiempo por defecto en consultas de creación
    public $timestamps = false;

    //tabla relacionada con el modelo
    protected $table = "trabajos";
    //Indicamos campos visualizables en las consultas
    protected $fillable = ['fEntrada','expediente','descripcion','observaciones','coordenadaX','coordenadaY','refCatastro','direccion','idMunicipio','idTipo','idCliente'];
    //Campos ocultos en las consultas
    //protected $hidden = ['id'];

    //Asociamos la ciudad al trabajo
    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class);
    }

    //Asociamos el tipo de trabajo al trabajo
    public function tipoTrabajo()
    {
        return $this->belongsTo(TipoTrabajo::class);
    }

    //Asociamos el cliente al trabajo
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    //Asociamos archivos al trabajo
    public function ArchivosTrabajo()
    {
        return $this->hasMany(ArchivoTrabajo::class, 'id');      //Relación uno a mucho
    }
}
