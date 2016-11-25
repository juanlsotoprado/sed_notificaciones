@extends('layouts.default')

@section('title')
Notificaciones Sed
@stop

@section('content')
<br>
<!-- /.row -->
<div class="row  col-lg-12 ">
    <div class="carga_body animated fadeIn" ng-controller="Administracion" style="display: none">
        <form id="solicitante_form" method="post" name="Form_usuario"
              class="form-horizontal inicio"> 

            <h3><em style="color: #666">Administrar Funcionarios<hr></em></h3>

            <div class="panel panel-success">

                <div class="panel-heading">

                    <h4>Registrar/Modificar Funcionarios</h4>

                </div>
                <div class="panel-body" >
                    <div class="form-group">
                        <label class="control-label control-label col-lg-3 col-md-3 col-xs-12">Buscar funcionario:</label>
                        <div class="control-label col-lg-9 col-md-9 col-xs-12">
                            <div class="input-group">

                                <input ng-change="formData = {};" placeholder="Usuario ej: jsoto" type="text"
                                       class="form-control  " ng-model="usuario" required> <span
                                       class="input-group-btn " name="usuario">
                                    <button  ng-click="buscarUsusario(usuario)" 
                                             class="btn btn-info buscar_numerocedula" type="button">
                                        <i class="fa fa-search"></i>&nbsp; Buscar
                                    </button>
                                </span>
                            </div>
                            <span class="label-red" ng-if="Form_usuario.$dirty && Form_usuario.usuario.$error.required">Campo Requerido</span>

                        </div>
                    </div>

                    <div class="form-group animated fadeIn" ng-if="formData.nombreApellido">
                        <label class="control-label control-label col-lg-3 col-md-3 col-xs-12">Nombre y Apellido:</label>

                        <label   id="nombre_usuario" class="control-label col-lg-9 col-md-9 col-xs-12"
                                 style="text-align: left; color: #777;"></label>

                    </div>
                    <div class="form-group" ng-show ="formData.nombreApellido">
                        <label class="control-label control-label col-lg-3 col-md-3 col-xs-12">Perfil:</label>
                        <div class="control-label col-lg-9 col-md-9 col-xs-12">

                            <select    ng-options="data as data.descripcion for data in datos_registro.perfiles track by data.id" ng-model="formData.perfil" class="form-control" id=""  name="perfil" required>
                                <option value=""><-- Seleccione una opción --></option>

                            </select>   
                            <span class="label-red" ng-if="Form_usuario.$dirty && Form_usuario.perfil.$error.required">Campo Requerido</span>

                        </div>
                    </div>

                </div>

                <div class="panel-footer">

                    <div class="form-group">
                        <div id="botoms" class=" col-xs-12  " style="text-align: center;">

                            <button   ng-click="formData = {}"  type="button" class="submit btn 

                                      btn-success

                                      ">
                                Limpiar   

                            </button>


                            <button  ng-click="Form_usuario.$valid != false

                                            ? registrar() : ''" 

                                     ng-class="Form_usuario.$valid != false

                                                 ? '' : 'disabled'" type="button" class="submit btn  btn-primary  "> </button>

                        </div>

                    </div>
                </div>
            </div>
        </form>      

        <div class="panel panel-primary">

            <div class="panel-heading">

                <h4>Funcionarios registrados</h4>
            </div>
            <div class="panel-body">

                <fieldset style="text-align: left;"  >

                    <div class="table-responsive"> 
                        <table table class="display cell-border hover order-column stripe tabla_consulta"  cellspacing="0" width="100%">
                            <col style="width: 2%">

                            <thead>
                                <tr>
                                    <th >#</th>
                                    <th>Cédula</th>
                                    <th >Nobre y apellido</th>
                                    <th >Perfil</th>
                                    <th >Estatus</th>
                                    <th >Acción</th>

                                </tr>
                            </thead>

                            <tbody class="table_bandeja_apro_tbody">
                                <tr>
                                    @if($params['data']['users'])
                                    @php
                                    $i = 1; 
                                    @endphp
                                    @foreach ($params['data']['users'] as $user)

                                    <td style="color:#337ab7; font-weight: bold"> {{$i}}</td>
                                    <td>{{ $user -> cedula}} </td>
                                    <td>{{ $user -> nombre_apellido}} </td>
                                    <td>{{ $user -> descripcion}} </td>
                                    <td>{{ $user -> estatus}} </td>

                                    @php
                                    $i++; 
                                    @endphp
                                    @endforeach
                                    @endif
                                    <td style="text-align: left;">
                                        <button  ng-click="cambiar_estatus(x.cedula, x.estatus == 't' ? 'false' : 'true', x.estatus == 't' ? 'inactivar' : 'activar')" href="javascript:void(0)"   ng-class="x.estatus == 't' ? 'btn-danger' : 'btn - success'" class="btn  btn-xs ">hola</button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </fieldset>

            </div>


        </div>
        <br><br>
    </div>
    <!-- /.col-lg-12 -->


    @stop