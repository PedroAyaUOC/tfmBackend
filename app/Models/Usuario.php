<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Usuario extends Authenticatable
{
    use HasApiTokens, Notifiable;

    //use HasApiTokens, HasFactory, Notifiable;

    //Desactivar las marcas de tiempo por defecto en consultas de creación
    public $timestamps = false;

    //tabla relacionada con el modelo
    protected $table = "usuarios";
    //Indicamos campos visualizables en las consultas
    //protected $fillable = ['nombre','login','email','password','permiso'];
    protected $fillable = ['nombre','login','email','permiso'];
    //Campos ocultos en las consultas
    //protected $hidden = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
