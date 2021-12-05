<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table = 'proyecto';
    protected  $primaryKey = 'IdProyecto';


    protected $fillable = [
        'NomProyecto', 'FechaInicio', 'FechaFin', 'IdUsuario'
    ];
}
