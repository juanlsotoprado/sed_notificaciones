<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model {

    /**
     * Generated
     */

    protected $table = 'evaluacion';
    protected $fillable = ['fecha', 'estatus', 'id_usuario', 'id', 'anno', 'periodo', 'nombre_doc_subido', 'nombre_doc_actual'];


    public function evaluacion_id_usuario_fkey() {
        return $this->belongsTo(\App\Models\Usuario::class, 'id_usuario', 'id');
    }

    public function evaluacion_id_usuario_fkey() {
        return $this->belongsToMany(\App\Models\Usuario::class, 'evaluacion_detalle', 'id_evaluacion', 'id_usuario');
    }

    public function evaluacion_detalle_id_evaluacion_fkey() {
        return $this->hasMany(\App\Models\EvaluacionDetalle::class, 'id_evaluacion', 'id');
    }


}
