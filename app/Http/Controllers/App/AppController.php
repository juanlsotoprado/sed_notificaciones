<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Users\InternalUsersModel;
use App\Models\Evaluacion\EvaluacionModel;

class AppController extends Controller {

    /**
     * Show si va
     * the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function __construct() {

        $this->params = array();
    }

    public function Inicio() {

        $this->params['page'] = "inicio";

        return view("Pages/Common/inicio", ['params' => $this->params]);
    }

    public function cargar_notificaciones() {

        $this->params['page'] = "cargar_notificaciones";
        $internal_user = new InternalUsersModel();

        $this->params['data']['users'] = $internal_user->Buscar_usuario_sistem();

        //dd($this->params);
        return view("Pages/Common/cargar_notificaciones", ['params' => $this->params]);
    }

    public function historial_carga() {

        $this->params['page'] = "historial_carga";

        $evaluacion = new EvaluacionModel();


        $this->params['data']['historial'] = $evaluacion->historial_data();

        //dd($this->params);
        return view("Pages/Common/historial_carga", ['params' => $this->params]);
    }

}
