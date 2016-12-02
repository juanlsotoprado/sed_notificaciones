// Creación del módulo
var msn_exito = 'Se ha procesado  exitosamente';
var msn_error = 'Ha ocurrido un error al procesar';
var mppeuct = angular.module('mppeuct', ['ngSanitize', 'ngProgressLite', 'textAngular']);


mppeuct.controller('app', ["$scope", "$window", "$rootScope", 'ngProgressLite', '$timeout', function ($scope, $window, $rootScope, ngProgressLite, $timeout) {
        $rootScope.base_url = base_url;
        $rootScope.base_url_doc = base_url + 'privado/docs/';
        $rootScope.mostrar_reg = false;

    }]);