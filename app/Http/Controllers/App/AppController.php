<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Users\InternalUsersModel;


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

}
