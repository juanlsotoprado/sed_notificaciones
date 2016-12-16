@extends('layouts.default')

@section('title')
{{ $params['page']}}
@stop

@section('content')
<br>
<!-- /.row -->
<div class="row  col-lg-12 ">
    <div class="carga_body animated fadeIn" ng-controller="historial_carga" style="display: none">

        <h3><em style="color: #666">Historial de carga de notificaciónes<hr></em></h3> 
        <div class="panel panel-primary">

            <div class="panel-heading">

                <h4>Funcionarios registrados</h4>
            </div>
            <div class="panel-body">

                <fieldset style="text-align: left;"  >

                    <div class="table-responsive"> 
                        <table table class="display cell-border hover order-column stripe tabla_consulta table-responsive"  cellspacing="0" width="100%">
                            <col style="width: 2%">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Año</th>
                                    <th>Periodo</th>
                                    <th >fecha de Carga </th>
                                    <th >Nobre archivo subido</th>
                                    <th >Nobre archivo Actual</th>
                                     <th >Cédula</th>
                                    <th >Nobre y Apellido</th>
                                    <th >Estatus</th>
                                    <th >Acción</th>

                                </tr>
                            </thead>

                            <tbody class="table_bandeja_apro_tbody">
                                @if($params['data']['historial'])
                                @php
                                $i = 1; 
                                @endphp
                                @foreach ($params['data']['historial'] as $historial)
                                <tr>
                                    <td style="color:#337ab7; font-weight: bold"> {{$i}}</td>


                                    <td>{{$historial->anno}}</td>
                                    <td>{{$historial->periodo == 1?'Primero':'Segundo'}} </td>
                                    <td> {{$historial->fecha}} </td>
                                    <td>{{$historial->nombre_doc_subido}} </td>
                                    <td> {{$historial->nombre_doc_actual}} </td>
                                    <td>{{$historial->cedula}} </td>
                                    <td>{{$historial->nombre_apellido}} </td>
                                    <td>{{$historial->estatus == 1?'Activo':'Inactivo'}} </td>


                                    <td style="text-align: left;">

                                        <button ng-click="descargar('<?= $historial->nombre_doc_actual ?>')"  href="javascript:void(0)"   class="btn btn-success btn-xs"><div class="ripple-container">Descargar</div></button>

                                    </td>
                                </tr>
                                @php
                                $i++; 
                                @endphp
                                @endforeach
                                @endif


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