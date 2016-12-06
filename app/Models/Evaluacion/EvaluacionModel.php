<?php

namespace App\Models\Evaluacion;

use Illuminate\Database\Eloquent\Model;
use DB;

class EvaluacionModel extends Model {

    public function registrar_notificacion($data) {

        error_log(print_r($data, true));
        return true;


        /*
          DB::beginTransaction();

          try {


          DB::insert('insert into usuario (cedula, estatus,fecha,id_perfil,nombre_apellido) values (?,?,?,?,?)', [ $data['numcedula'], true, 'now()', $data['perfil']['id'], $data['nombreApellido']]);



          DB::commit();

          return true;
          } catch (\Exception $exc) {
          error_log($exc, 0);
          DB::rollback();
          return false;
          } */
    }

}
