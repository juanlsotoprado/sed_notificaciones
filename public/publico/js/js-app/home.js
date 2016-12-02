// Creación del módulo
var msn_exito = 'Se ha procesado  exitosamente';
var msn_error = 'Ha ocurrido un error al procesar';
var mppeuct = angular.module('mppeuct', ['ngSanitize', 'ngProgressLite', 'textAngular']);


mppeuct.controller('app', ["$scope", "$window", "$rootScope", 'ngProgressLite', '$timeout', function ($scope, $window, $rootScope, ngProgressLite, $timeout) {
        $rootScope.mostrar_reg = false;

    }]);

mppeuct.directive('ngEnter', function () {
    return function (scope, element, attrs) {
        element.bind("keydown keypress", function (event) {
            if (event.which === 13) {
                scope.$apply(function () {
                    scope.$eval(attrs.ngEnter);
                });

                event.preventDefault();
            }
        });
    };
});