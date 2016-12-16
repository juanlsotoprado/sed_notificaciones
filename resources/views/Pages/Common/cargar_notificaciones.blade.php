@extends('layouts.default')

@section('title')
{{ $params['page']}}
@stop

@section('content')
<br>
<!-- /.row -->
<div class="row  col-lg-12 ">
    <div class="carga_body animated fadeIn" ng-controller="cargar_notificaciones" style="display: none">

        <form id="Form_notificaciones" method="post" name="Form_notificaciones"
              class="form-horizontal inicio" action="{{url('procesar_notificaciones')}}">
            <h3><em style="color: #666"> Cargar notificaciones de evaluación <hr></em></h3>

            <div class="panel panel-info" >

                <div class="panel-heading">

                    <h4>Cargar datos de las evaluaciones</h4>
                </div>
                <div class="panel-body" style="">
                    <a target="_blank" href="{{ url('publico/docs/dataSed.xls')}}" style="text-decoration: underline;color: #056FAD">Descargar ejemplo del documento a subir</a>   
                    <hr>


                    <br>
                    <div class="form-group">
                        <label class="control-label control-label col-lg-3 col-md-3 col-xs-12">Año:</label>
                        <div class="control-label col-lg-4 col-md-4 col-xs-12">

                            <select ng-model="formData.anno" class="form-control" id="anno" name="anno" required>
                                <option value=""><-- Seleccione una opción --></option>

                                @for ($i = 2015; $i <= date("Y"); $i++)
                                <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                            <span class="label-red" ng-if="Form_notificaciones.$dirty && Form_notificaciones.anno.$error.required">Campo Requerido</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label control-label col-lg-3 col-md-3 col-xs-12">Periodo:</label>
                        <div class="control-label col-lg-4 col-md-4 col-xs-12">

                            <select ng-model="formData.periodo" class="form-control" id="periodo" name="periodo" required >
                                <option value=""><-- Seleccione una opción --></option>
                                <option value="1">Primer periodo</option>
                                <option value="2">Segundo periodo</option>
                            </select>
                            <span class="label-red" ng-if="Form_notificaciones.$dirty && Form_notificaciones.periodo.$error.required">Campo Requerido</span>
                        </div>
                    </div>
                    <div class="animated fadeIn form-group" ng-show="!Form_notificaciones.anno.$error.required && !Form_notificaciones.periodo.$error.required">
                        <label class="control-label control-label col-lg-3 col-md-3 col-xs-12">Subir hoja de calculo <b style="color: #981717">.xls: </b></label>
                        <div class="control-label col-lg-7 col-md-7 col-xs-12">

                            <input id="calc" data-show-preview="false"
                                   name="calc" type="file" class="file"
                                   multiple>

                            <span class="label-red" ng-if="!formData.calc">Debe subir un archivo .xls</span>


                        </div>
                    </div> 
                </div>
                <div class="panel-footer">

                    <div class="form-group">
                        <div id="botoms" class=" col-xs-12  " style="text-align: center;">

                            <button   ng-click="limpiar()"  type="button" class="submit btn 

                                      btn-success

                                      ">
                                Limpiar   

                            </button>


                            <button  ng-click="Form_notificaciones.$valid != false && formData.calc

                                                ? registrar() : ''" 

                                     ng-class="Form_notificaciones.$valid != false  && formData.calc

                                                 ? '' : 'disabled'" type="button" class="submit btn  btn-primary  "> Registrar </button>

                        </div>

                    </div>
                </div>
            </div>

            {{ csrf_field()}}

        </form>
    </div>   

    <!-- /.col-lg-12 -->


    @stop
    