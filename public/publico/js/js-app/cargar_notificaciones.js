
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

                //console.log(response.datos);

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