<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model {

    /**
     * Generated
     */

    protected $table = 'evaluacion';
    protected $fillable = ['id', 'nombre_completo', 'puntucion', 'rango', 'semestre', 'fecha', 'estatus', 'fecha_registro'];



}
