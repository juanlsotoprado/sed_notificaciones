<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Common;
use App\Models\Users\InternalUsersModel;
use Illuminate\Http\Request;

class AdminController extends Controller {

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

    public function admin_usuario() {

        $this->params['page'] = "admin_usuario";
        $internal_user = new InternalUsersModel();

        $this->params['data']['users'] = $internal_user->Buscar_usuario_sistem();

        //dd($this->params);
        return view("Pages/administracion/admin_usuario", ['params' => $this->params]);
    }
    
}
