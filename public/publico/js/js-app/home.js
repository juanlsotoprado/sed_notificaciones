// Creación del módulo
var msn_exito = 'Se ha procesado  exitosamente';
var msn_error = 'Ha ocurrido un error al procesar';
var mppeuct = angular.module('mppeuct', ['ngSanitize', 'ngProgressLite', 'textAngular']);


mppeuct.controller('app', ["$scope", "$window", "$rootScope", 'ngProgressLite', '$timeout', function ($scope, $window, $rootScope, ngProgressLite, $timeout) {
        $rootScope.base_url = base_url;
        $rootScope.base_url_doc = base_url + 'privado/docs/';
        $rootScope.mostrar_reg = false;

    }]);



mppeuct.controller('Inicio', ["$scope", "$window", "$rootScope", 'ngProgressLite', '$timeout', '$http', '$location', function ($scope, $window, $rootScope, ngProgressLite, $timeout, $http, $location) {
        ngProgressLite.start();
        $rootScope.title = $location.path();
        $rootScope.liActive = $location.path();

        $timeout(function () {

            ngProgressLite.done();
            $rootScope.show = 1;
            $rootScope.show2 = 1;
        }, 200);
    }]);


mppeuct.controller('Administracion', ["$scope", "$window", "$rootScope", 'ngProgressLite', '$timeout', '$http', '$location', 'textAngularManager', function ($scope, $window, $rootScope, ngProgressLite, $timeout, $http, $location, textAngularManager) {
        ngProgressLite.start();
        $scope.formData = {};
        $scope.datos_registro = {};

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
