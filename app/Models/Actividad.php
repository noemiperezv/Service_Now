<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividad';
    protected  $primaryKey = 'IdActividad';
    public $timestamps = false;

    protected $fillable = [
        'NomActividad', 'Description', 'FechaInicio', 'FechaFin', 'IdUsuario', 'IdProyecto'
    ];
}
