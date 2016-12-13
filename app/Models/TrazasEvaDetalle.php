<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrazasEvaDetalle extends Model {

    /**
     * Generated
     */

    protected $table = 'trazas_eva_detalle';
    protected $fillable = ['id', 'id_usuario', 'fecha', 'cedula', 'nombre_completo', 'puntuacion', 'rango', 'fecha_registro', 'anno', 'periodo', 'id_evaluacion'];


    public function mensaje_enviados_traza_id_usuario_fkey() {
        return $this->belongsTo(\App\Models\Usuario::class, 'id_usuario', 'id');
    }


}
