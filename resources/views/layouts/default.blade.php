<!DOCTYPE html>
<html lang="en"  ng-app="mppeuct" ng-init="iniciar = true">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title id="title">@yield('title')</title>

    <head>
        @include('includes.default.head')
    </head>

    <body ng-controller="app">
        <br><br>
        <div id="wrapper">

            <div class="col-lg-10 col-lg-offset-1" style="background-color: white;
                 box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;margin-bottom: 15px;">

                <div class="col-lg-12" style="background-color: white">
                    <img    class="img-responsive normativa-left" alt=""
                            src="http://apis.mppeuct.gob.ve/img/comun/normativa-izquierda-transparente.png">
                    <img   class="img-responsive normativa-right" alt=""
                           src="http://apis.mppeuct.gob.ve/img/comun/normativa-derecha.png">
                </div>
                <br>
                <br>
                <br>

                <header>

                    @include('includes.default.header')

                </header>

                <div  id="page-wrapper" >
                    @yield('content')
                    <br/>
                </div>
                <div  class=" modal" id="mymodal" role="dialog">
                    <div class="modal-dialog modal-lg animated zoomIn">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <span ng-show="modal.caso">    <h4 class="modal-title"  > <em style="color:#3c8dbc"> </em><span ng-show="modal.caso"> /  <span style="color: #999"> N° Cédula :</span> <b></b></h4>     </span>          

                            </div>
                            <div class=" modal-body">
                                <div ng-include src="modal.template"></div>

                            </div>
                            <div class="modal-footer">
                                <div ng-bind="modal.footer"></div>
                                <br>
                                <button  type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <br>

            <br>
            <footer>

                @include('includes.default.footer')

            </footer>

            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

                @include('includes.default.scripts')

</body>
</html>


