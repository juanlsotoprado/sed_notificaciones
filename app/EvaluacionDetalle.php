<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluacionDetalle extends Model {

    /**
     * Generated
     */

    protected $table = 'evaluacion_detalle';
    protected $fillable = ['id', 'nombre_completo', 'puntuacion', 'rango', 'fecha', 'cedula', 'id_usuario', 'id_evaluacion', 'anno', 'periodo', 'nombre_doc_subido', 'nombre_doc_actual'];


    public function evaluacion_id_usuario_fkey() {
        return $this->belongsTo(\App\Models\Usuario::class, 'id_usuario', 'id');
    }

    public function evaluacion_detalle_id_evaluacion_fkey() {
        return $this->belongsTo(\App\Models\Evaluacion::class, 'id_evaluacion', 'id');
    }


}
