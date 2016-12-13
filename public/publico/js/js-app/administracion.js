
mppeuct.controller('Administracion', ["$scope", "$window", "$rootScope", 'ngProgressLite', '$timeout', '$http', '$location', 'textAngularManager', function ($scope, $window, $rootScope, ngProgressLite, $timeout, $http, $location, textAngularManager) {
        ngProgressLite.start();
        $scope.formData = {};
        $scope.datos_registro = {};


        $scope.redirec_admin = function () {
            $timeout(function () {
                $window.location = "/admin/admin_usuario";
            }, 0);
        };

        $scope.cambiar_estatus = function (cedula, estatus, estatus_clave) {

            $.jAlert({'type': 'confirm',
                'title': '¡Responder!',
                'size': 'auto',
                'theme': 'dark_green',
                'backgroundColor': 'white',
                'confirmQuestion': '¿Está seguro que desea ' + estatus_clave + ' al funcionario?',
                'confirmBtnText': 'Si',
                'denyBtnText': 'No',
                'showAnimation': 'zoomIn',
                'hideAnimation': 'fadeOutDown',
                'onConfirm': function () {

                    $http({
                        method: 'POST',
                        url: "/admin/set_estatus",
                        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                        data: $.param({cedula: cedula, estatus: estatus}),
                    }).then(function successCallback(respuesta) {
                        respuesta = respuesta.data;
                        // console.log(respuesta);

                        if (String(respuesta.casos).trim() != 'false') {
                            $.jAlert({
                                'title': '¡Éxito!',
                                'content': 'se le ha cambiado el estatus al funcionario',
                                'theme': 'dark_blue',
                                'size': 'auto',
                                'showAnimation': 'bounceInDown',
                                'hideAnimation': 'bounceOutDown',
                                'closeOnEsc': true, 'closeOnClick': true,
                                'btns': {'text': 'Aceptar', 'theme': 'black',
                                    'onClick': function () {

                                        $scope.redirec_admin();

                                    }},
                                'onClose': function () {
                                    $scope.redirec_admin();
                                }
                            });
                        } else {
                            $.jAlert({
                                'title': '¡Error!.',
                                'content': 'No se pudo cambiado el estatus al funcionario',
                                'theme': 'brown',
                                'size': 'auto',
                                'showAnimation': 'bounceInDown',
                                'hideAnimation': 'bounceOutDown',
                                'btns': {'text': 'Aceptar', 'theme': 'black'},
                                'closeOnEsc': true, 'closeOnClick': true,
                            });
                        }

                    }, function errorCallback(respuesta) {
                        $.jAlert({
                            'title': '¡Error!.',
                            'content': 'No se pudo cambiado el estatus al funcionario',
                            'theme': 'black',
                            'size': 'auto',
                            'showAnimation': 'bounceInDown',
                            'hideAnimation': 'bounceOutDown',
                            'btns': {'text': 'Aceptar', 'theme': 'black'},
                            'closeOnEsc': true, 'closeOnClick': true,
                        });
                        console.log('error');

                    });

                }, 'onDeny': function () {

                }
            });
        };

        $scope.registrar = function () {
            var valor = $scope.modificar ? '<b>modificar</b>' : '<b>registrar</b>';
            var valor2 = $scope.modificar ? '<b>modificado</b>' : '<b>registrado</b>';

            $.jAlert({'type': 'confirm',
                'title': '¡Responder!',
                'size': 'auto',
                'theme': 'dark_green',
                'backgroundColor': 'white',
                'confirmQuestion': '¿Está seguro que desea ' + valor + '   este funcionario?',
                'confirmBtnText': 'Si', 'denyBtnText': 'No',
                'showAnimation': 'zoomIn',
                'hideAnimation': 'fadeOutDown',
                'onConfirm': function () {

                    // console.log($scope.formData);

                    $http({
                        method: 'POST',
                        url: "/admin/registrar_modificar_funcionario",
                        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                        data: $.param($scope.formData),
                    }).then(function successCallback(respuesta) {
                        respuesta = respuesta.data;
                        // console.log(respuesta);

                        if (String(respuesta.casos).trim() != 'false') {

                            $.jAlert({
                                'title': '¡Éxito!',
                                'content': 'Se ha ' + valor2 + ' este funcionario exitosamente.',
                                'theme': 'dark_blue',
                                'size': 'auto',
                                'showAnimation': 'bounceInDown',
                                'hideAnimation': 'bounceOutDown',
                                'closeOnEsc': true, 'closeOnClick': true,
                                'btns': {'text': 'Aceptar', 'theme': 'black',
                                    'onClick': function () {
                                        $scope.redirec_admin();
                                    }},
                                'onClose': function () {
                                    $scope.redirec_admin();
                                }
                            });
                            $scope.formData = {};
                            //$rootScope.get_secciones2();

                        } else {
                            $.jAlert({
                                'title': '¡Error!.',
                                'content': 'Problemas al ' + valor + ' este funcionario.',
                                'theme': 'black',
                                'size': 'auto',
                                'showAnimation': 'bounceInDown',
                                'hideAnimation': 'bounceOutDown',
                                'btns': {'text': 'Aceptar', 'theme': 'black'},
                                'closeOnEsc': true, 'closeOnClick': true,
                            });
                        }

                    }, function errorCallback(respuesta) {

                        $.jAlert({
                            'title': '¡Error!.',
                            'content': 'Problemas al ' + valor + ' este funcionario.',
                            'theme': 'black',
                            'size': 'auto',
                            'showAnimation': 'bounceInDown',
                            'hideAnimation': 'bounceOutDown',
                            'btns': {'text': 'Aceptar', 'theme': 'black'},
                            'closeOnEsc': true, 'closeOnClick': true,
                        });
                        console.log('error');

                    });


                }, 'onDeny': function () {
                }
            });
        };

        $http({
            method: 'POST',
            url: "/admin/get_perfiles",
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        }).then(function successCallback(respuesta) {
            respuesta = respuesta.data;
            // console.log(respuesta);


            if (String(respuesta.casos).trim() != 'false') {

                $scope.datos_registro.perfiles = respuesta.casos;

            }

            $timeout(function () {

                ngProgressLite.done();
                $rootScope.show = 1;
                $rootScope.show2 = 1;

            }, 0);

        }, function errorCallback(respuesta) {
            $timeout(function () {

                ngProgressLite.done();
                $rootScope.show = 1;
                $rootScope.show2 = 1;

            }, 0);

            console.log('error: index.php/App_servicios/Get_perfiles/');

        });


        $scope.buscarUsusario = function (usuario) {
            $scope.modificar = false;
            $scope.formData.modificar = true;
            $scope.formData.correo = false;
            $scope.formData = {};
            usuario != undefined ? usuario : usuario = '';
            if (usuario.trim() != '') {

                var data = {funcionario: usuario};
                $http({
                    method: 'POST',
                    url: "/admin/get_user",
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    data: $.param(data)
                }).then(function successCallback(respuesta) {
                    respuesta = respuesta.data;
                    // console.log(respuesta);

                    if (String(respuesta.casos).trim() == 'ldap' || String(respuesta.casos).trim() == 'false') {

                        $.jAlert({
                            'title': '¡Error!.',
                            'content': 'El funcionario <b>' + usuario + '</b>, no fue encontrado..',
                            'theme': 'black',
                            'size': 'auto',
                            'showAnimation': 'bounceInDown',
                            'hideAnimation': 'bounceOutDown',
                            'btns': {'text': 'Aceptar', 'theme': 'black'},
                            'closeOnEsc': true, 'closeOnClick': true,
                        });

                    } else {

                        $scope.formData.numcedula = respuesta.casos.data.numcedula;
                        $scope.formData.correo = respuesta.casos.data.correo;
                        if (respuesta.casos.sistema != 'false') {

                            //  console.log('entrosssss');

                            $scope.modificar = true;
                            $scope.formData.modificar = true;

                            $scope.formData.perfil = {id: respuesta.casos.sistema.id_perfil, descripcion: respuesta.casos.sistema.nombre_perfil};

                        }


                        $scope.formData.nombreApellido = respuesta.casos.data.nombre;

                    }

                }, function errorCallback(respuesta) {

                    $.jAlert({
                        'title': '¡Error!.',
                        'content': 'Problemas al buscar el funcionario.',
                        'theme': 'black',
                        'size': 'auto',
                        'showAnimation': 'bounceInDown',
                        'hideAnimation': 'bounceOutDown',
                        'btns': {'text': 'Aceptar', 'theme': 'black'},
                        'closeOnEsc': true, 'closeOnClick': true,
                    });
                    console.log('error');

                });

            } else {

                $.jAlert({
                    'title': '¡Error!.',
                    'content': 'El campo funcionario no debe estar vacio.w',
                    'theme': 'black',
                    'size': 'auto',
                    'showAnimation': 'bounceInDown',
                    'hideAnimation': 'bounceOutDown',
                    'btns': {'text': 'Aceptar', 'theme': 'black'},
                    'closeOnEsc': true, 'closeOnClick': true, 'closeOnClick': true,
                });


            }
        }

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



mppeuct.controller('cargar_notificaciones', ["$scope", "$window", "$rootScope", 'ngProgressLite', '$timeout', '$http', '$location', 'textAngularManager', function ($scope, $window, $rootScope, ngProgressLite, $timeout, $http, $location, textAngularManager) {
        ngProgressLite.start();
        $scope.formData = {};
        $scope.datos_registro = {};
        $scope.una = '10';
        extScope = $scope;


        $scope.limpiar = function () {
            $scope.formData = {};
            $('#calc').fileinput('clear');
        };

        $scope.registrar = function () {

            $.jAlert({'type': 'confirm',
                'title': '¡Responder!',
                'size': 'auto',
                'theme': 'dark_green',
                'backgroundColor': 'white',
                'confirmQuestion': '¿Está seguro que desea cargar esta notificaciones?',
                'confirmBtnText': 'Si',
                'denyBtnText': 'No',
                'showAnimation': 'zoomIn',
                'hideAnimation': 'fadeOutDown',
                'onConfirm': function () {

                    $('#calc').fileinput('upload');

                }, 'onDeny': function () {


                }
            });
        };


        $('#calc').fileinput({
            language: 'es',
            uploadUrl: "procesar_notificaciones", // server
            browseClass: 'btn btn-raised btn-primary  btn-sm',
            removeClass: 'btn btn-raised btn-danger  btn-sm',
            uploadClass: 'btn btn-raised btn-success  btn-sm',
            //dropZoneTitle: 'Arrastrar y soltar los archivos aquí &hellip;',
            // overwriteInitial: false,
            uploadAsync: false,
            previewFileType: "xls",
            allowedFileExtensions: ['xls'],
            maxFileCount: 1,
            elErrorContainer: "#errorBlockcalc",
            uploadExtraData: function () {
                return {
                    anno: $('#anno').val(),
                    periodo: $('#periodo').val(),
                    _token: $("input[name='_token']").val()
                };
            },
            btnDefault: '<button type="{type}" tabindex="500" title="{title}" class="{css}"{status}>{icon}{label}</button>',
        });



        $('#calc').on('fileloaded', function (event, files, extra) {

            $(".fileinput-upload-button").remove();
            extScope.$apply(function () {
                extScope.formData.calc = true;
            });

        });

        $('#calc').on('filecleared', function (event) {

            extScope.$apply(function () {

                extScope.formData.calc = false;

            });
        });


        $('#calc').on('filecustomerror', function (event, files, extra) {
            $('#calc').fileinput('clear');
        });

        $('#calc').on('fileuploaded', function (event, files, extra) {
            $('#calc').fileinput('clear');
        });

        $('#calc').on('filebatchuploadcomplete', function (event, files, extra) {
            $('#calc').fileinput('clear');
        });

        $('#calc').on('filebatchuploadsuccess', function (event, data, previewId, index) {
            var form = data.form, files = data.files, extra = data.extra,
                    response = data.response, reader = data.reader;

            extScope.$apply(function () {

                console.log(response.datos);

                extScope.correos = response.datos;

                if (response.mensaje == "exito") {

                    $.jAlert({
                        'title': '¡Éxito!',
                        'content': 'Se han cargado estas notificaciones exitosamente.',
                        'theme': 'dark_blue',
                        'size': 'auto',
                        'showAnimation': 'bounceInDown',
                        'hideAnimation': 'bounceOutDown',
                        'closeOnEsc': true, 'closeOnClick': true,
                        'btns': {'text': 'Aceptar', 'theme': 'black',
                            'onClick': function () {
                                $scope.limpiar();
                            }},
                        'onClose': function () {
                            $scope.limpiar();
                        }
                    });

                } else if (response.mensaje == "error2") {

                    var msg = "<b style='color:black;font-size:16px'>Problemas al cargar el archivo, se consiguieron campos con formatos no válidos.</b><br><br><br>";

                    if (response.datos) {

                        angular.forEach(response.datos, function (value2, key2) {

                            msg += " * <b>linea: <em style='color :red;'>" + value2.linea + "</em></b> <br> <b>* Dato: <em style='color :#777;'>" + value2.valor + "</em></b><br><b>* Error:<em style='color :#337ab7;'> " + value2.error + "</em></b><hr></b>";

                        });

                    }

                    $.jAlert({
                        'title': '¡Error!.',
                        'content': msg,
                        'theme': 'gray',
                        'size': 'auto',
                        'showAnimation': 'bounceInDown',
                        'hideAnimation': 'bounceOutDown',
                        'btns': {'text': 'Aceptar', 'theme': 'black'},
                        'closeOnEsc': true, 'closeOnClick': true, 'closeOnClick': true
                    });


                } else {


                    $.jAlert({
                        'title': '¡Error!.',
                        'content': 'Problemas al cargar el archivo, intente de nuevo.',
                        'theme': 'black',
                        'size': 'auto',
                        'showAnimation': 'bounceInDown',
                        'hideAnimation': 'bounceOutDown',
                        'btns': {'text': 'Aceptar', 'theme': 'black'},
                        'closeOnEsc': true, 'closeOnClick': true, 'closeOnClick': true
                    });
                }


                //  console.log(response);


            })
            $('#calc').fileinput('clear');


        });

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