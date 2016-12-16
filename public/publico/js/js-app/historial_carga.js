
mppeuct.controller('historial_carga', ["$scope", "$window", "$rootScope", 'ngProgressLite', '$timeout', '$http', '$location', 'textAngularManager', function ($scope, $window, $rootScope, ngProgressLite, $timeout, $http, $location, textAngularManager) {
        ngProgressLite.start();
        $scope.formData = {};
        $scope.datos_registro = {};


        $scope.descargar = function ($dato) {

          $window.open("../privado/docs/" + $dato)
          
        };

        $timeout(function () {

            $('.tabla_consulta').DataTable({
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });

            $(".carga_body").css("display", "block");
            ngProgressLite.done();
            $rootScope.show = true;
            $rootScope.show2 = true;
        }, 0);
    }]);