function MostrarReporte(id_proyecto) {

    //al seleccionar el proyecto se cargan las vistas de la pagina

    $("#panelCenter_2_1").load("../../Reportes/view/viewPanelesResumenProyecto.php", function() {

        $("#divTablaAvances").load("../../Reportes/controller/controllerResumenAvances.php", {
            id_proyecto: id_proyecto,
            opcion: 1
        }, function(data) {


            ordenarcolor("resumeneavances");
        });


        $("#divResumenEficiencias").load("../../Reportes/controller/controllerResumendeEficiencias.php", {
            id_con_proyecto: id_proyecto
        }, function(data) {


            ordenarcolor("resumeneficiencias2");
        });

        // parte que genera el reporte por horas de cada delegacio y por actividad
        $("#divResumenHoras").load("../../Reportes/controller/controllerResumenAvances.php", {
            id_proyecto: id_proyecto,
            opcion: 2
        }, function(data) {

            ordenarcolor("resumenhoras");
        });
        //fin
        //genera reporte semanal
        $("#fecha_inicio_reporte").datepicker({
            dateFormat: 'yy-mm-dd',
            firstDay: 1
        });
        $("#fecha_fin_reporte").datepicker({
            dateFormat: 'yy-mm-dd',
            firstDay: 1
        });
        //generar el reporte con el filtrado que se elije
        $("#generar_reporte").on({
            click: function() {
                if (($("#fecha_inicio_reporte").val() === "") || ($("#fecha_fin_reporte").val() === "")) {
                    $(function() {
                        $("#ventanAlertas").html("Ingresa Fechas");
                        $("#ventanAlertas").attr('style', 'visible');
                        $("#ventanAlertas").dialog({
                            modal: true,
                            title: 'Conductor',
                            show: 'explode',
                            hide: 'explode',
                            buttons: {
                                Aceptar: function() {

                                    $(this).dialog("close");


                                }
                            }
                        });
                    });
                } else if ($("#fecha_inicio_reporte").val() > $("#fecha_fin_reporte").val()) {
                    $(function() {
                        $("#ventanAlertas").html("Fechas Incorrectas!!!");
                        $("#ventanAlertas").attr('style', 'visible');
                        $("#ventanAlertas").dialog({
                            modal: true,
                            title: 'Conductor',
                            show: 'explode',
                            hide: 'explode',
                            buttons: {
                                Aceptar: function() {

                                    $(this).dialog("close");


                                }
                            }
                        });
                    });
                } else {
                    $("#reporte_factura").load('../../Reportes/controller/controllerResumendeEficienciasFiltrado.php', {
                        id_proyecto: id_proyecto,
                        fecha_inicial: $("#fecha_inicio_reporte").val(),
                        fecha_final: $("#fecha_fin_reporte").val()

                    }, function() {
                        //inicio codigo para filtrar la tabla

                        //busca el id de la tabla despues la etiqueta tbody y la etiqueta tr
                        $("#reportefacturafiltrado tbody tr").each(function(index) {

                            var fila1, fila2, fila3, fila4, fila5, fila6, fila7, fila8, fila9, fila10, fila11, fila12;

                            $(this).children("td").each(function(index2) {
                                switch (index2) {
                                    case 0:
                                        fila1 = $(this).text();
                                        break;
                                    case 1:
                                        fila2 = $(this).text();
                                        break;
                                    case 2:
                                        fila3 = $(this).text();
                                        break;
                                    case 3:
                                        fila4 = $(this).text();
                                        break;
                                    case 4:
                                        fila5 = $(this).text();
                                        break;
                                    case 5:
                                        fila6 = $(this).text();
                                        break;
                                    case 6:
                                        fila7 = $(this).text();
                                        break;
                                    case 7:
                                        fila8 = $(this).text();
                                        break;
                                    case 8:
                                        fila9 = $(this).text();
                                        break;
                                    case 9:
                                        fila10 = $(this).text();
                                        break;
                                    case 10:
                                        fila11 = $(this).text();
                                        break;
                                    case 11:
                                        fila12 = $(this).text();
                                        break;
                                } //fin switch
                            });

                            //if para fechas
                            if ($("#fecha_inicio_reporte").val() <= fila12 && $("#fecha_fin_reporte").val() >= fila12) {

                            } else {
                                $(this).css("display", "none");
                            }
                        }); //fin each

                        //fin codigo para filtrar la tabla
                    });

                }
            }
        });

    });
}


function ordenarcolor(idtabla) {
    $(".ordenarcolor").on({
        click: function() {
            $("#" + idtabla + "  tbody tr").each(function(index) {

                if ((index % 2) === 0) {
                    $(this).css("background", "#BDBDBD");
                } else {
                    $(this).css("background", "#E6E6E6");
                }
            })

        }
    });
}


function MostrarDelegacionReporte(id_proyecto) {
    var id_delegacion;
    var identificador_delegacion;
    var nombre;
    var km_lineales;
    var seleccion;
    var km_ruteador;
    //    $("#titulo_proyectod").html("Proyecto: ");
    //
    //    $("#atras_proyectosrd").on({
    //        click: function() {
    //            $('#panelCenter_1_1').html("");
    //            $('#panelLeft_2_1').html("");
    //            Proyectosreportes(3);
    //        }
    //    })
    $("#panelCenter_1_1").load("../../Reportes/view/viewGridDelegacion.php", function() {

        $("#tabla_Admin_DelegacionR").jqGrid({
            url: '../../Reportes/controller/controllerReporteDelegacion.php',
            postData: {
                opcion: "listar",
                id_proyecto: id_proyecto
            },
            datatype: 'json',
            height: 249,
            colNames: ['id_delegacion', 'identificador_delegacion', 'Nombre', 'KM_lineales', 'KM_ruteador'],
            colModel: [{
                    display: 'id_delegacion',
                    name: 'id_delegacion',
                    width: 10,
                    sortable: true,
                    hidden: true
                },
                {
                    display: 'identificador_delegacion',
                    name: 'identificador_delegacion',
                    width: 15,
                    sortable: true,
                    align: 'right',
                    hidden: true

                },
                {
                    display: 'Nombre',
                    name: 'Nombre',
                    width: 15,
                    sortable: true,
                    stype: 'select',
                    align: 'right'
                },
                {
                    display: 'KM_lineales',
                    name: 'KM_lineales',
                    width: 15,
                    sortable: true,
                    align: 'right'
                },
                {
                    display: 'KM_ruteador',
                    name: 'KM_ruteador',
                    width: 15,
                    sortable: true,
                    align: 'right'
                }
            ],
            rowNum: 10,
            pager: '#pager3',
            sortname: 'id_delegacion',
            viewrecords: true,
            sortorder: "asc",
            emptyrecords: "No existen registros",
            autoheight: true,
            autowidth: true,
            scrollOffset: 22,
            onSelectRow: function(id) {
                seleccion = true;
                $('#panelLeft_2_1').html("");
                $('#panelCenter_2_1').html("");
                id_delegacion = $(this).jqGrid('getCell', id, 0);
                identificador_delegacion = $(this).jqGrid('getCell', id, 1);
                nombre = $(this).jqGrid('getCell', id, 2);
                km_lineales = $(this).jqGrid('getCell', id, 3);
                km_ruteador = $(this).jqGrid('getCell', id, 4);
                reportemostrardelegacion(id_delegacion, identificador_delegacion, nombre);
            }
        })

        $("#tabla_Admin_DelegacionR").jqGrid('navGrid', '#pager3', {
            edit: false,
            add: false,
            search: false,
            del: false,
            refresh: false,
            view: false
        });
    });
}

function reportemostrardelegacion(id_delegacion, identificador_delegacion, nombre) {


    $.post("../../Reportes/controller/controllerReporteDelegacion.php", {},
        function(data) {

            $.ajax({
                url: "../../Reportes/view/viewReporteDelegacion.php",
                success: function(data) {
                    $("#panelCenter_2_1").html(data);
                },
                beforeSend: function() {

                },
                complete: function() {

                    // carga la grafica de km
                    $.ajax({
                        url: "../../Reportes/controller/controllerReporteDelegacion.php",
                        data: {
                            opcion1: 1,
                            id_delegacion: id_delegacion,
                            identificador_delegacion: identificador_delegacion
                        },
                        success: function(data11) {
                            //                                alert(data11);
                            var da1 = eval(data11);
                            //                                alert(da1);
                            var options1 = {
                                chart: {
                                    renderTo: 'divReporteDelegacionGraficaKM',
                                    type: 'spline'
                                },
                                credits: {
                                    enabled: false
                                },
                                title: {
                                    text: 'kms Colectados por Hora',
                                    x: -20
                                },
                                xAxis: {
                                    categories: [{}]
                                },
                                tooltip: {
                                    formatter: function() {
                                        var s = '<b>' + this.x + '</b>';

                                        $.each(this.points, function(i, point) {
                                            s += '<br/>' + point.series.name + ': ' + point.y;
                                        });

                                        return s;
                                    },
                                    shared: true
                                },
                                series: [{}, {}]
                            };

                            options1.xAxis.categories = da1[0];
                            options1.series[0].name = 'Km por hora al dia';
                            options1.series[0].data = da1[1];
                            options1.series[1].name = 'Promedio';
                            options1.series[1].data = da1[2];
                            var chart = new Highcharts.Chart(options1);
                        },
                        complete: function() {

                            // carga la grafica de horas
                            $.ajax({
                                url: "../../Reportes/controller/controllerReporteDelegacion.php",
                                data: {
                                    opcion1: 2,
                                    id_delegacion: id_delegacion,
                                    identificador_delegacion: identificador_delegacion
                                },
                                success: function(data) {

                                    var datosHoras = eval(data);
                                    var options = {
                                        chart: {
                                            renderTo: 'divReporteDelegacionGraficaHoras',
                                            type: 'spline'
                                        },
                                        credits: {
                                            enabled: false
                                        },
                                        title: {
                                            text: 'Horas Trabajadas Vs  Horas FDC',
                                            x: -20
                                        },
                                        xAxis: {
                                            categories: [{}]
                                        },
                                        tooltip: {
                                            formatter: function() {
                                                var s = '<b>' + this.x + '</b>';

                                                $.each(this.points, function(i, point) {
                                                    s += '<br/>' + point.series.name + ': ' + point.y;
                                                });

                                                return s;
                                            },
                                            shared: true
                                        },
                                        series: [{}, {}]
                                    };

                                    options.xAxis.categories = datosHoras[0];
                                    options.series[0].name = 'Horas totales del dia';
                                    options.series[0].data = datosHoras[1];
                                    options.series[1].name = 'FDC';
                                    options.series[1].data = datosHoras[2];
                                    var chart = new Highcharts.Chart(options);
                                },
                                complete: function() {

                                    // carga la grafica de global
                                    $.ajax({
                                        url: "../../Reportes/controller/controllerReporteDelegacion.php",
                                        data: {
                                            opcion1: 3,
                                            id_delegacion: id_delegacion,
                                            identificador_delegacion: identificador_delegacion
                                        },
                                        success: function(dat) {
                                            var valores = new Array();
                                            var num;
                                            var a = new Array();
                                            a = eval(dat);
                                            for (var i = 0; i < a.length; i++) {
                                                num = a[i].toString().split(",");
                                                valores[i] = num[1];
                                            }
                                            $(function() {

                                                $('#divReporteDelegacionGraficaGlobal').highcharts({
                                                    chart: {
                                                        plotBackgroundColor: null,
                                                        plotBorderWidth: null,
                                                        plotShadow: false
                                                    },
                                                    title: {
                                                        text: 'Grafica'
                                                    },
                                                    tooltip: {
                                                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                                                    },
                                                    plotOptions: {
                                                        pie: {
                                                            allowPointSelect: true,
                                                            cursor: 'pointer',
                                                            dataLabels: {
                                                                enabled: true,
                                                                color: '#000000',
                                                                connectorColor: '#000000',
                                                                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                                                            }
                                                        }
                                                    },
                                                    series: [{
                                                        type: 'pie',
                                                        name: 'Browser share',
                                                        data: [
                                                            ['FDC Prep', parseFloat(valores[1])],
                                                            ['FDC', parseFloat(valores[2])],
                                                            ['DT equipment', parseFloat(valores[3])],
                                                            ['DT Wheather', parseFloat(valores[4])],
                                                            ['Travel & Commute', parseFloat(valores[5])],
                                                            ['DT Other', parseFloat(valores[6])],
                                                            ['Training', parseFloat(valores[7])]
                                                        ]
                                                    }]
                                                });

                                            });
                                        },
                                        complete: function() {

                                            $.ajax({
                                                url: "../../Reportes/controller/controllerReporteDelegacion.php",
                                                data: {
                                                    opcion1: 4,
                                                    id_delegacion: id_delegacion,
                                                    identificador_delegacion: identificador_delegacion
                                                },
                                                success: function(data) {
                                                    $("#divReporteDelegacionGraficaDatos").html(data);

                                                    $(function() {
                                                        $('#reporteDelegacion').footable();
                                                        //            
                                                        $('#change-page-size').change(function(e) {
                                                            e.preventDefault();
                                                            var pageSize = $(this).val();
                                                            $('.footable').data('page-size', pageSize);
                                                            $('.footable').trigger('footable_initialized');
                                                        });
                                                    });
                                                },
                                                complete: function() {
                                                    $.ajax({
                                                        url: "../../Reportes/controller/controllerReporteDelegacion.php",
                                                        data: {
                                                            opcion1: 5,
                                                            id_delegacion: id_delegacion,
                                                            nombre: nombre
                                                        },
                                                        success: function(data) {
                                                            $("#divReporteDelegacionGraficaTotales").html(data);
                                                            $(function() {
                                                                $('#reporteDelegaciontotal').footable();
                                                                //            
                                                                $('#change-page-size').change(function(e) {
                                                                    e.preventDefault();
                                                                    var pageSize = $(this).val();
                                                                    $('.footable').data('page-size', pageSize);
                                                                    $('.footable').trigger('footable_initialized');
                                                                });
                                                            });
                                                        },
                                                        complete: function() {

                                                        }
                                                    });
                                                }
                                            });
                                        }
                                    });
                                }
                            });
                        }
                    });
                }
            });
        });
}

function MostrarReporteConductor(id_proyecto) {
    var seleccion = false;
    var id_conductor_asignadoa_proyecto;
    var nombre;

    //    var estatus;
    if ($("#panelCenter_1_1").height() !== 300)

    {
        $("#panelCenter_1_1").css("height", "+=300");
        $("#panelCenter_2_1").css("height", "-=290");
    }
    $('#panelCenter_1_1').load('../../Reportes/view/viewGridReportePorPersona.php', {}, function(data) {


        //                               $.post("../../Proyecto/controller/controllerProyectos.php",{opcion:'mostrar'},function (data){
        //                                  
        //                                  
        //                                  alert(data);
        //                              })

        $("#tabla_ReporteConductores").jqGrid({
            url: '../../Reportes/controller/controllerReportePorPersona.php',
            postData: {
                id_proyecto: id_proyecto,
                opcion: 'listar',
                opcion2: 'grid'
            },
            datatype: 'json',
            height: 247,
            colNames: ['id_conductor', 'Nombre', 'id_conductor_asignadoa_proyecto', 'Telefono', 'E-mail'],
            colModel: [{
                    display: 'id_conductor',
                    name: 'id_proyecto',
                    width: 10,
                    sortable: true,
                    hidden: true


                },
                {
                    display: 'Nombre',
                    name: 'Nombre',
                    width: 25,
                    sortable: true,
                    align: 'right'

                },
                {
                    display: 'id_conductor_asignadoa_proyecto',
                    name: 'id_conductor_asignadoa_proyecto',
                    hidden: true,
                    width: 10,
                    sortable: true,
                    align: 'right'
                },
                {
                    display: 'Telefono',
                    name: 'Telefono',
                    width: 25,
                    sortable: true,
                    align: 'right'
                        //  hidden:true
                },
                {
                    display: 'Email',
                    name: 'Email',
                    width: 25,
                    sortable: true,
                    align: 'right'
                        //  hidden:true
                },
            ],
            rowNum: 10,
            pager: '#pager3',
            sortname: 'id_conductor',
            viewrecords: true,
            sortorder: "asc",
            emptyrecords: "No existen registros",
            autoheight: true,
            autowidth: true,
            scrollOffset: 22,
            onSelectRow: function(id) {
                seleccion = true;

                id_conductor_asignadoa_proyecto = $(this).jqGrid('getCell', id, 2);

                $("#panelCenter_2_1").html("");
                $('#panelLeft_2_1').html("");
                $('#titulo_pagina_3').val("");
                //                armarproyecto(id_proyecto);
                $('#titulo_pagina_2').val(nombre);

                MostrarReportePorPersona(id_conductor_asignadoa_proyecto);
            }


        });
        $("#tabla_ReporteConductores").jqGrid('navGrid', '#pager3', {
            edit: false,
            add: false,
            search: false,
            del: false,
            refresh: false,
            view: false
        });


        //mostrar reporte conductor
        $("#tabla_ReporteConductores").jqGrid('navButtonAdd', '#pager2', {
            caption: "<img src=../../interfaz/view/images/conduc.jpg width='18' height='20'/>",
            buttonicon: "ui-icon-vacio",
            cursor: "pointer",
            title: "Mostrar conductores",
            //        id:"NuevoUsu",
            onClickButton: function() {
                if (seleccion) {
                    $('#panelLeft_2_1').html("");
                    $('#titulo_pagina_3').val("");
                    MostrarReporteConductor(id_proyecto);

                    //  seleccion = false;
                } else {

                    $(function() {
                        $("#ventanAlertas").html("Elija un proyecto");
                        $("#ventanAlertas").attr('style', 'visible');
                        $("#ventanAlertas").dialog({
                            modal: true,
                            title: 'Conductor',
                            show: 'explode',
                            hide: 'explode',
                            buttons: {
                                Aceptar: function() {

                                    $(this).dialog("close");
                                    $("#tabla_ReporteConductores").trigger("reloadGrid");

                                }
                            }
                        });
                    });

                }

            }
        });
        //fin mostrar reporte

    });
}


function MostrarReportePorPersona(id_conductor_asignadoa_proyecto) {
    var dias;
    var horas;
    var promedio;
    var dd;
    $("#panelCenter_2_1").load("../../Reportes/view/viewPanelesReportePorPersona.php", {}, function() {
        $.post("../../Reportes/controller/controllerReportePorPersona.php", {
                id_conductor_asigandoa_proyecto: id_conductor_asignadoa_proyecto,
                opcion2: 'reporte',
                opcion3: 'graficline'
            }, function(data1)

            {

                var da = eval(data1);
                var options = {
                    chart: {
                        renderTo: 'divGraficasPorPersonaLienal',
                        type: 'line'
                    },
                    credits: {
                        enabled: false
                    },
                    title: {
                        text: 'Horas/Promedio Horas',
                        x: -20
                    },
                    xAxis: {
                        categories: [{}],
                        labels: {
                            rotation: -45
                        }
                    },
                    yAxis: {
                        title: {
                            text: 'Horas'
                        },
                        plotLines: [{
                            value: 0,
                            width: 1,
                            color: '#808080'
                        }]
                    },
                    tooltip: {
                        formatter: function() {
                            var s = '<b>' + this.x + '</b>';

                            $.each(this.points, function(i, point) {
                                s += '<br/>' + point.series.name + ': ' + point.y;
                            });

                            return s;
                        },
                        shared: true
                    },
                    series: [{}, {}]
                };

                options.xAxis.categories = da[0];
                options.series[0].name = 'horas';
                options.series[0].data = da[1];
                options.series[1].name = 'promedio';
                options.series[1].data = da[2];
                var chart = new Highcharts.Chart(options);
                //fin parte grafica lineal
                $.post("../../Reportes/controller/controllerReportePorPersona.php", {
                    id_conductor_asigandoa_proyecto: id_conductor_asignadoa_proyecto,
                    opcion2: 'reporte',
                    opcion3: 'graficpie'
                }, function(data) {

                    var valores = new Array();
                    var num;
                    //                alert(data);

                    var a = new Array();

                    a = eval(data);

                    for (var i = 0; i < a.length; i++) {

                        num = a[i].toString().split(",");

                        valores[i] = num[1];



                    }

                    $(function() {
                        $('#grafActivity').highcharts({
                            chart: {
                                plotBackgroundColor: null,
                                plotBorderWidth: null,
                                plotShadow: false
                            },
                            title: {
                                text: 'Grafica'
                            },
                            tooltip: {
                                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                            },
                            plotOptions: {
                                pie: {
                                    allowPointSelect: true,
                                    cursor: 'pointer',
                                    dataLabels: {
                                        enabled: true,
                                        color: '#000000',
                                        connectorColor: '#000000',
                                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                                    }
                                }
                            },
                            series: [{
                                type: 'pie',
                                name: 'Browser share',
                                data: [
                                    ['FDC Prep', parseFloat(valores[1])],
                                    ['FDC', parseFloat(valores[2])],
                                    ['DT equipment', parseFloat(valores[3])],
                                    ['DT Wheather', parseFloat(valores[4])],
                                    ['Travel & Commute', parseFloat(valores[5])],
                                    ['DT Other', parseFloat(valores[6])],
                                    ['Training', parseFloat(valores[7])]
                                ]
                            }]
                        });
                    });
                });
                //parte que genera la tabla de los datos de horas por persona
                $.post("../../Reportes/controller/controllerReportePorPersona.php", {
                    id_conductor_asigandoa_proyecto: id_conductor_asignadoa_proyecto,
                    opcion3: 'reportetabla',
                    //                        opcion3:'graficline',
                    opcion2: 'reporte'
                }, function(tabla) {
                    $("#divTablaDatosPorPersona").html(tabla);
                    $(function() {
                        $('#tabladatosporpersona').footable();
                        //            
                        $('#change-page-size').change(function(e) {
                            e.preventDefault();
                            var pageSize = $(this).val();
                            $('.footable').data('page-size', pageSize);
                            $('.footable').trigger('footable_initialized');
                        });
                    });
                });
                //fin parte tabla

                // parte que genera la tabla del el total de horas 
                $.post("../../Reportes/controller/controllerReportePorPersona.php", {
                        id_conductor_asigandoa_proyecto: id_conductor_asignadoa_proyecto,
                        opcion3: 'reportetablaTotales',
                        //                        opcion3:'graficline',
                        opcion2: 'reporte'
                    }, function(tabla)

                    {
                        //                alert(tabla);

                        $("#divTotales").html(tabla);
                        $(function() {
                            $('#tabladatosporpersonatotales').footable();
                            //            
                            $('#change-page-size').change(function(e) {
                                e.preventDefault();
                                var pageSize = $(this).val();
                                $('.footable').data('page-size', pageSize);
                                $('.footable').trigger('footable_initialized');
                            });
                        });


                    });
                //fin parte tabla

            });

    });


}