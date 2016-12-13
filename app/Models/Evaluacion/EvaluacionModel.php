<?php

namespace App\Models\Evaluacion;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use DB;

class EvaluacionModel extends Model {

    public
            function registrar_notificacion($data) {
        DB::beginTransaction();
        try {
            if (!empty($data['data']) && !empty($data['data_detalle'])) {
                DB::table('evaluacion_detalle')->where('anno', '=', $data['data']['anno'])->where('periodo', '=', $data['data']['periodo'])->delete();
                DB::table('evaluacion')->where('anno', '=', $data['data']['anno'])->where('periodo', '=', $data['data']['periodo'])->delete();

                $dataset = array(
                    'periodo' => $data['data']['periodo'],
                    'anno' => $data['data']['anno'],
                    'id_usuario' => Session::get('id_usuario'),
                    'estatus' => true,
                    'fecha' => 'now()',
                    'nombre_doc_subido' => $data['data']['nombre_doc_subido'],
                    'nombre_doc_actual' => $data['data']['nombre_doc_actual']
                );
                $id_evaluacion = DB::table('evaluacion')->insertGetId($dataset, 'id');

                $dataset = array(
                    'periodo' => $data['data']['periodo'],
                    'anno' => $data['data']['anno'],
                    'id_usuario' => Session::get('id_usuario'),
                    'estatus' => true,
                    'fecha' => 'now()',
                    'fecha_registro' => 'now()',
                    'nombre_doc_subido' => $data['data']['nombre_doc_subido'],
                    'nombre_doc_actual' => $data['data']['nombre_doc_actual']
                );
                DB::table('traza_eva')->insert($dataset);

                foreach ($data['data_detalle'] as $key => $value) {

                    $dataset = array(
                        'periodo' => $data['data']['periodo'],
                        'anno' => $data['data']['anno'],
                        'id_usuario' => Session::get('id_usuario'),
                        'id_evaluacion' => $id_evaluacion,
                        'fecha' => 'now()',
                        'cedula' => $value[1],
                        'nombre_completo' => $value[2],
                        'puntuacion' => $value[3],
                        'rango' => $value[4]
                    );
                    DB::table('evaluacion_detalle')->insert($dataset);

                    $dataset = array(
                        'periodo' => $data['data']['periodo'],
                        'anno' => $data['data']['anno'],
                        'id_usuario' => Session::get('id_usuario'),
                        'id_evaluacion' => $id_evaluacion,
                        'fecha' => 'now()',
                        'fecha_registro' => 'now()',
                        'cedula' => $value[1],
                        'nombre_completo' => $value[2],
                        'puntuacion' => $value[3],
                        'rango' => $value[4]
                    );
                    DB::table('trazas_eva_detalle')->insert($dataset);
                }

                DB::commit();
                return true;
            } else {
                throw new Exception('Data correcta a actualizar.');
            }
        } catch (Exception $exc) {
            error_log($exc, 0);
            DB::rollback();
            return false;
        }
    }

}
