<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {

    /**
     * Generated
     */

    protected $table = 'usuario';
    protected $fillable = ['id', 'cedula', 'estatus', 'fecha', 'id_perfil', 'nombre_apellido'];


    public function usuario_id_perfil_fkey() {
        return $this->belongsTo(\App\Models\Perfil::class, 'id_perfil', 'id');
    }

    public function evaluacion_detalle_id_evaluacion_fkey() {
        return $this->belongsToMany(\App\Models\Evaluacion::class, 'evaluacion_detalle', 'id_usuario', 'id_evaluacion');
    }

    public function evaluacion_id_usuario_fkey() {
        return $this->hasMany(\App\Models\Evaluacion::class, 'id_usuario', 'id');
    }

    public function mensaje_enviados_traza_id_usuario_fkey() {
        return $this->hasMany(\App\Models\TrazasEvaDetalle::class, 'id_usuario', 'id');
    }

    public function evaluacion_id_usuario_fkey() {
        return $this->hasMany(\App\Models\TrazaEva::class, 'id_usuario', 'id');
    }

    public function evaluacion_id_usuario_fkey() {
        return $this->hasMany(\App\Models\EvaluacionDetalle::class, 'id_usuario', 'id');
    }


}
