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
