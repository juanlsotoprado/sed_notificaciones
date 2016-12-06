<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Common;
use App\Models\Users\InternalUsersModel;
use App\Models\Evaluacion\EvaluacionModel;
use Illuminate\Http\Request;
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
            $fileName = "calc." . $extension;
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
                            $formatoCount = 0;
                            //  error_log(print_r($data->sheets[0]['cells'], true));

                            if (!empty($data->sheets[0]['cells'])) {
                                foreach ($data->sheets[0]['cells'] as $key => $value) {
                                    if ($key > 1) {

                                        for ($i = 1; $i < 5; $i++) {
                                            $dataxls[$i] = empty($value[$i]) ? '' : utf8_encode($value[$i]);
                                        }

                                        $dataxls_final[] = $dataxls;

                                        if ($dataxls[1] == '' && $formatoCount < 30) {

                                            $formato[$key . "-A"]['valor'] = $dataxls[1];
                                            $formato[$key . "-A"]['linea'] = $key . " - A";
                                            $formato[$key . "-A"]['error'] = "Campo vacio";
                                            $formatoCount++;
                                        } else if (!preg_match("/^[1-9]*$/", $dataxls[1]) && $formatoCount < 30) {

                                            $formato[$key . "-A"]['valor'] = $dataxls[1];
                                            $formato[$key . "-A"]['linea'] = $key . " - A";
                                            $formato[$key . "-A"]['error'] = "El campo debe ser numérico";
                                            $formatoCount++;
                                        }

                                        if ($dataxls[2] == '' && $formatoCount < 30) {

                                            $formato[$key . "-B"]['valor'] = $dataxls[2];
                                            $formato[$key . "-B"]['linea'] = $key . " - B";
                                            $formato[$key . "-B"]['error'] = "Campo vacio";
                                            $formatoCount++;
                                        }

                                        if ($dataxls[3] == '' && $formatoCount < 30) {

                                            $formato[$key . "-C"]['valor'] = $dataxls[3];
                                            $formato[$key . "-C"]['linea'] = $key . " - C";
                                            $formato[$key . "-C"]['error'] = "Campo vacio";
                                            $formatoCount++;
                                        } else if (!preg_match("/^[1-5]{1}[0-9]{2}$/", $dataxls[3]) && $formatoCount < 30) {

                                            $formato[$key . "-C"]['valor'] = $dataxls[3];
                                            $formato[$key . "-C"]['linea'] = $key . " - C";
                                            $formato[$key . "-C"]['error'] = "El campo debe ser numérico del 1 al 500";
                                            $formatoCount++;
                                        }


                                        if ($dataxls[4] == '' && $formatoCount < 30) {

                                            $formato[$key . "-D"]['valor'] = $dataxls[4];
                                            $formato[$key . "-D"]['linea'] = $key . " - D";
                                            $formatoCount++;
                                        }
                                    }
                                }
                            }

                            unlink(public_path() . "/" . $path . $fileName);
                        }

                        if (!empty($dataxls_final)) {

                            if ($formatoCount < 1) {

                                $evaluacion = new EvaluacionModel();

                                if (!$evaluacion->registrar_notificacion(array("data" => $request->input(), "data_detalle" => $dataxls_final,))) {

                                    $this->params['mensaje'] = 'error';
                                };

                                $this->params['mensaje'] = 'exito';
                            } else {

                                $this->params['datos'] = $formato;
                                $this->params['mensaje'] = 'error2';
                            }
                        } else {

                            $this->params['mensaje'] = 'error';
                        }

                        $estatus = true;
                    } else {

                        error_log(print_r("Error al cargar ", true));
                    }

                    break;
                default:
                    error_log(print_r("Extension no valida :" . $mime, true));
            }
        }

        if (!$estatus) {

            $this->params['mensaje'] = 'error';
        }


        return response()->json($this->params);
    }

}
