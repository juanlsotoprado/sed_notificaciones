<nav class="navbar navbar-default navbar-static-top barra-top " style="border-bottom: #bce8f1 1px solid;-webkit-box-shadow: -1px 29px 22px -23px rgba(0,0,0,0.43);
     -moz-box-shadow: -1px 29px 22px -23px rgba(0,0,0,0.43);
     box-shadow: -1px 29px 22px -23px rgba(0,0,0,0.43);">

    <div class="navbar-header" >
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Sistema de notificaciones del SED </span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <em class="navbar-brand" > <b style="color: #a3303d;font-size: 20px" class=" fa fa-institution"></b><span style="font-size: 16px">&nbsp;Sistema de notificaciones del SED &nbsp;</span>


        </em><br>
    </div>
    <!-- /.navbar-header -->

    <ul  class="nav navbar-top-links navbar-right animated zoomIn">

        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown"  >
                <i class="fa fa-user fa-fw top-barra"></i><i class="fa fa-caret-down"></i> &nbsp; {{ Session::get('user')}}<em>&nbsp;<b>( {{Session::get('nombre_perfil') }} )</em> </b>

            </a>


            <ul  style="width: 100%" class="dropdown-menu dropdown-user">
                <li><a href="{{ url('logout')}}" style="text-decoration:underline;"><b><i class="fa fa-sign-out fa-fw" ></i>Cerrar sesión</b></a>
                </li>
            </ul>

            <!-- /.dropdown-user -->
        </li>

        <!-- /.dropdown -->
    </ul>

    <!-- /.navbar-top-links -->
    <br>

    <div  style="background-color: white" class="navbar-default sidebar " role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav " id="side-menu">


                @if (Session::get('id_perfil') == 1)

                <li>
                    <a href="{{ url('admin/Inicio')}}" class='{{ $params['page'] == "inicio"? "active":"" }}'><i class="fa fa-caret-right" aria-hidden="true"></i> &nbsp;Inicio</a>
                </li>
                <li>
                    <a href="{{ url('admin/admin_usuario')}}" class='{{ $params['page'] == "admin_usuario"? "active":"" }}'><i class="fa fa-caret-right" aria-hidden="true"></i> &nbsp;Administarción de usuario</a>
                </li>
                <li>
                    <a href="{{ url('admin/cargar_notificaciones')}}" class='{{ $params['page'] == "cargar_notificaciones"? "active":"" }}'><i class="fa fa-caret-right" aria-hidden="true"></i> &nbsp;Cargar notificaciones</a>
                </li>

                @endif

                @if (Session::get('id_perfil') == 4)

                <li>
                    <a href="{{ url('analista/Inicio')}}" class='{{ $params['page'] == "inicio"? "active":"" }}'><i class="fa fa-caret-right" aria-hidden="true"></i> &nbsp;Inicio</a>
                </li>
                <li>
                    <a href="{{ url('analista/cargar_notificaciones')}}" class='{{ $params['page'] == "cargar_notificaciones"? "active":"" }}'><i class="fa fa-caret-right" aria-hidden="true"></i> &nbsp;Cargar notificaciones</a>
                </li>

                @endif

            </ul>
        </div>

    </div>
</nav>