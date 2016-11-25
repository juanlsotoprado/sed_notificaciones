@extends('layouts.login')
@section('title') Notificaciones SED @stop

@section('content')
<form class="form col-md-12 center-block" action="{{ url('login') }}" method="post" >

    <div  class="panel panel-primary">

        <div class="panel-heading">

            <h4>Iniciar sesión</h4>
        </div>
        <div class="panel-body">

            <div class="form-group">
                <label for="usrname"><span class="glyphicon glyphicon-user"></span> Usuario:</label>
                <input  type="hidden"  name='ldap' id='ldap' value="false">      
                <input autocomplete="off"  type="text" class="form-control input-lg"
                       placeholder="Usuario" name='usuario' id='usuario'>                        </div>
            <div class="form-group">
                <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Contraseña:</label>
                <input autocomplete="off" type="password" class="form-control input-lg"
                       placeholder="Contraseña"  name='password' id='password'>   
            </div>
            <div class="cargando" style="display: none;color: #777;font-size: 14px;font-weight: bold;width:100%;text-align: right">Cargando...</div>
            <div class="error" style="display: none;color: #B22222;font-size: 14px;font-weight: bold;width:100%;text-align: right">Usuario o clave invalida ...</div>


        </div>
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <div class="panel-footer" style="text-align: center">

            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-off"></span> Entrar</button>

        </div>

    </div> 
    
</form>

@stop
