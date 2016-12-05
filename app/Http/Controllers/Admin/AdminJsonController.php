<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Common;
use App\Models\Users\InternalUsersModel;
use Illuminate\Http\Request;
use Storage;
use Spreadsheet_Excel_Reader;

class AdminJsonController extends Controller {

    /**
     * Show si va
     * the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function __construct() {

        $this->middleware('Json');
        $this->params = array();
    }

    public function get_usuario(Request $request) {

        $ldap_funcionario = new Common();

        $param_ldap = $ldap_funcionario->Buscar_usuario_ldap($request->all());

        if ($param_ldap) {
            $this->params['casos']['data'] = $param_ldap;

            $internal_user = new InternalUsersModel();
            $param_sitem = $internal_user->existingUser($param_ldap['numcedula']);

            if ($param_sitem) {

                $this->params['casos']['sistema'] = $param_sitem;
            } else {

                $this->params['casos']['sistema'] = 'false';
            }
        } else {

            $this->params['casos'] = 'ldap';
        }

        // error_log(print_r($this->params, true));
        //  dd($request->all());

        return response()->json($this->params);
    }

    public function get_perfiles(Request $request) {

        $internal_user = new InternalUsersModel();
        $this->params['casos'] = $internal_user->get_perfiles();

        //  dd($request->all());

        return response()->json($this->params);
    }

    public function registrar_modificar_funcionario(Request $request) {

        $internal_user = new InternalUsersModel();
        $this->params['casos'] = $internal_user->registrar_modificar_funcionario($request->all());

        //  dd($request->all());

        return response()->json($this->params);
    }

    public function set_estatus(Request $request) {

        $internal_user = new InternalUsersModel();
        $this->params['casos'] = $internal_user->set_estatus($request->all());

        //  dd($request->all());

        return response()->json($this->params);
    }

    public function procesar_notificaciones(Request $request) {

        $fecha = date_create();

        $estatus = false;

        if ($request->hasFile('calc')) {


            $mime = $request->file('calc')->getMimeType();
            $extension = strtolower($request->file('calc')->getClientOriginalExtension());
            $fileName = "calc-" . date_timestamp_get($fecha) . "." . $extension;
            $path = "privado/docs/";

            switch ($mime) {
                case "application/vnd.ms-office":
                    if ($request->file('calc')->isValid()) {
                        if ($request->file('calc')->move($path, $fileName)) {

                            include(app_path() . '/Library/Excel/reader.php');

                            // ExcelFile($filename, $encoding);
                            $data = new Spreadsheet_Excel_Reader();
                            $data->setOutputEncoding('CP1251');
                            $data->read(public_path() . "/" . $path . $fileName);
                            $formato = false;
                            // error_log(print_r($data->sheets[0]['cells'], true));
                            foreach ($data->sheets[0]['cells'] as $key => $value) {

                                if (!preg_match("/^[1-9]{3}[0-9]{7}$/", $value[1])) {


                                    $formato[$key]['valor'] = $value[1];
                                    $formato[$key]['linea'] = $key;
                                }

                                $dataxls[$value[1]] = $value[1];
                            }


                            if ($dataxls) {

                                if (!$formato) {

                                    foreach ($dataxls as $key => $value) {

                                        $sms[] = $value;
                                    }

                                    $this->params['datos'] = $dataxls;
                                    $this->params['mensaje'] = 'exito';
                                } else {

                                    $this->params['datos'] = $formato;
                                    $this->params['mensaje'] = 'error2';

                                    unlink(public_path() . "/" . $path . $fileName);
                                }
                            } else {

                                $this->params['mensaje'] = 'error';
                                unlink(public_path() . "/" . $path . $fileName);
                            }

                            $estatus = true;
                        } else {
                            unlink(public_path() . "/" . $path . $fileName);

                            error_log(print_r("Error al cargar ", true));
                        }
                    }
                    break;
                default:
                    error_log(print_r("Extension no valida :" . $mime, true));
            }
        }

        if (!$estatus) {

            $this->params['mensaje'] = 'error';
            unlink(public_path() . "/" . $path . $fileName);
        }

        error_log(print_r($this->params, true));

        return response()->json($this->params);
    }

}
