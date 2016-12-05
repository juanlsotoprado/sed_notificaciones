@extends('layouts.default')

@section('title')
Notificaciones Sed
@stop

@section('content')
<br>
<!-- /.row -->
<div class="row  col-lg-12 ">
    <div class="carga_body animated fadeIn" ng-controller="cargar_notificaciones" style="display: none">

        <form id="solicitante_form" method="post" name="Form_correo"
              class="form-horizontal inicio">
            <h3><em style="color: #666"> Cargar notificaciones de evaluación <hr></em></h3>

            <div class="panel panel-info" >

                <div class="panel-heading">

                    <h4>Cargar datos de las evaluaciones</h4>
                </div>
                <div class="panel-body" style="">
                    <a target="_blank" href="{{ url('publico/docs/dataCorreo.xls')}}" style="text-decoration: underline;color: #056FAD">Descargar ejemplo del documento a subir</a>   
                    <hr>

                    <div class="form-group">
                        <label class="control-label control-label col-lg-5 col-md-5 col-xs-12">Subir hoja de calculo <b style="color: #981717">.xls: </b></label>
                        <div class="control-label col-lg-7 col-md-7 col-xs-12">
                            <h5><em style="color: #888"> formato correo Ej. (juan@mppeuct.gob.ve)</em></h5>

                            <input id="calc" data-show-preview="false"
                                   name="calc" type="file" class="file" ng-model="formData.correo" 
                                   multiple>
                            <span class="label-red" ng-if=" !correos || correos == 'false' || correos.length < 1">Debe subir un archivo .xls</span>



                        </div>
                    </div>

                    <br>
                    <fieldset style="text-align: left;"  ng-if="correos && correos != 'false' && correos.length > 0">

                        <div class="table-responsive">          
                            <table datatable="ng" dt-options="dtOptions"table class="display  cell-border hover order-column stripe tabla_consulta"  cellspacing="0" width="100%">
                                <col style="width: 2%">
                                <col style="width: 83%">
                                <col style="width: 15%">
                                <thead>
                                    <tr>
                                        <th >#</th>
                                        <th>Correo</th>
                                        <th >Acción</th>

                                    </tr>
                                </thead>

                                <tbody class="table_bandeja_apro_tbody">
                                    <tr ng-repeat="(y,x) in correos" >
                                        <td style="color:#337ab7; font-weight: bold">@{{$index + 1}}</td>
                                        <td>@{{x}}</td>
                                        <td style="text-align: left;">
                                            <button  ng-click=" correos.splice($index, 1)"  class="btn btn-xs btn-danger "><i class="fa fa-close  fa-1x" aria-hidden="true"></i>eliminar<div class="ripple-container"></div></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </fieldset>
                </div>
            </div>
                    {{ csrf_field() }}

        </form>

        <br><br>
    </div>
    <!-- /.col-lg-12 -->


    @stop