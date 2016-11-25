<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Users\InternalUsersModel;

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

        //  dd($this->params->data);
        return view("Pages/admin/admin_usuario", ['params' => $this->params]);
    }

}
