/* PLACOVE: Proyecto
 */
/* Name: Irandis
 */
/* Date: 21/03/2014
 */
/* Description: Este archivo contiene las funciones para mostrar, modificar, guardar Proyectos.
 */
$(document).ready(inicioproyecto);

function inicioproyecto() {


    $("#id_arb_proyectos").bind({
        click: function() {
            $("#todosc").css("background-color", "#FFFFFF");
            $("#activoc").css("background-color", "#FFFFFF");
            $("#noactivoc").css("background-color", "#FFFFFF");
            $("#agregarcond").css("background-color", "#FFFFFF");
            $("#todosv").css("background-color", "#FFFFFF");
            $("#activov").css("background-color", "#FFFFFF");
            $("#noactivov").css("background-color", "#FFFFFF");
            $("#agregarvehi").css("background-color", "#FFFFFF");
            $("#todost").css("background-color", "#FFFFFF");
            $("#activot").css("background-color", "#FFFFFF");
            $("#noactivot").css("background-color", "#FFFFFF");
            $("#agregartel").css("background-color", "#FFFFFF");
            $("#bajat").css("background-color", "#FFFFFF");
            $('#panelLeft_2_1').html("");
            $('#panelCenter_2_1').html("");
            $("#titulo_pagina_3").val("Bitacoras");
            $("#todosp").css("background-color", "#FFFFFF");
            $("#activop").css("background-color", "#fbec88");
            $("#noactivop").css("background-color", "#FFFFFF");
            $("#agregarproy").css("background-color", "#FFFFFF");
            $("#bajav").css("background-color", "#FFFFFF");
            $("#reportes").css("background-color", "#FFFFFF");
        }
    });
    //mostrar proyectos activos
    $("#id_arb_proyectos_activos").bind({
        click: function() {
            $("#todosc").css("background-color", "#FFFFFF");
            $("#activoc").css("background-color", "#FFFFFF");
            $("#noactivoc").css("background-color", "#FFFFFF");
            $("#agregarcond").css("background-color", "#FFFFFF");
            $("#todosv").css("background-color", "#FFFFFF");
            $("#activov").css("background-color", "#FFFFFF");
            $("#noactivov").css("background-color", "#FFFFFF");
            $("#agregarvehi").css("background-color", "#FFFFFF");
            $("#todost").css("background-color", "#FFFFFF");
            $("#activot").css("background-color", "#FFFFFF");
            $("#noactivot").css("background-color", "#FFFFFF");
            $("#agregartel").css("background-color", "#FFFFFF");
            $("#todosp").css("background-color", "#FFFFFF");
            $("#activop").css("background-color", "#fbec88");
            $("#noactivop").css("background-color", "#FFFFFF");
            $("#agregarproy").css("background-color", "#FFFFFF");
            $("#bajat").css("background-color", "#FFFFFF");
            $("#bajav").css("background-color", "#FFFFFF");
            $("#reportes").css("background-color", "#FFFFFF");
            $('#panelLeft_2_1').html("");
            $('#panelCenter_2_1').html("");
            $("#titulo_pagina_3").val("Bitacoras");
            cargarProyectos(1);
        }
    });
    //mostrar proyectos concluidos
    $("#id_arb_proyectos_concluidos").bind({
        click: function() {
            $("#todosc").css("background-color", "#FFFFFF");
            $("#activoc").css("background-color", "#FFFFFF");
            $("#noactivoc").css("background-color", "#FFFFFF");
            $("#agregarcond").css("background-color", "#FFFFFF");
            $("#todosv").css("background-color", "#FFFFFF");
            $("#activov").css("background-color", "#FFFFFF");
            $("#noactivov").css("background-color", "#FFFFFF");
            $("#agregarvehi").css("background-color", "#FFFFFF");
            $("#todost").css("background-color", "#FFFFFF");
            $("#activot").css("background-color", "#FFFFFF");
            $("#noactivot").css("background-color", "#FFFFFF");
            $("#agregartel").css("background-color", "#FFFFFF");
            $("#todosp").css("background-color", "#FFFFFF");
            $("#activop").css("background-color", "#FFFFFF");
            $("#noactivop").css("background-color", "#fbec88");
            $("#agregarproy").css("background-color", "#FFFFFF");
            $("#bajat").css("background-color", "#FFFFFF");
            $("#bajav").css("background-color", "#FFFFFF");
            $("#reportes").css("background-color", "#FFFFFF");
            $('#panelLeft_2_1').html("");
            $('#panelCenter_2_1').html("");
            $("#titulo_pagina_3").val("Bitacoras");
            cargarProyectos(2);
        }
    });
    //mostrar todos los proyectos
    $("#id_arb_proyectos_todos").bind({
        click: function() {
            $("#todosc").css("background-color", "#FFFFFF");
            $("#activoc").css("background-color", "#FFFFFF");
            $("#noactivoc").css("background-color", "#FFFFFF");
            $("#agregarcond").css("background-color", "#FFFFFF");
            $("#todosv").css("background-color", "#FFFFFF");
            $("#activov").css("background-color", "#FFFFFF");
            $("#noactivov").css("background-color", "#FFFFFF");
            $("#agregarvehi").css("background-color", "#FFFFFF");
            $("#todost").css("background-color", "#FFFFFF");
            $("#activot").css("background-color", "#FFFFFF");
            $("#noactivot").css("background-color", "#FFFFFF");
            $("#agregartel").css("background-color", "#FFFFFF");
            $("#todosp").css("background-color", "#fbec88");
            $("#activop").css("background-color", "#FFFFFF");
            $("#noactivop").css("background-color", "#FFFFFF");
            $("#agregarproy").css("background-color", "#FFFFFF");
            $("#bajat").css("background-color", "#FFFFFF");
            $("#bajav").css("background-color", "#FFFFFF");
            $("#reportes").css("background-color", "#FFFFFF");
            $('#panelLeft_2_1').html("");
            $('#panelCenter_2_1').html("");
            $("#titulo_pagina_3").val("Bitacoras");
            cargarProyectos(3);
        }
    });
    //guardar proyectos
    $("#id_agregar_Proyecto").bind({
        click: function() {
            $("#todosc").css("background-color", "#FFFFFF");
            $("#activoc").css("background-color", "#FFFFFF");
            $("#noactivoc").css("background-color", "#FFFFFF");
            $("#agregarcond").css("background-color", "#FFFFFF");
            $("#todosv").css("background-color", "#FFFFFF");
            $("#activov").css("background-color", "#FFFFFF");
            $("#noactivov").css("background-color", "#FFFFFF");
            $("#agregarvehi").css("background-color", "#FFFFFF");
            $("#todost").css("background-color", "#FFFFFF");
            $("#activot").css("background-color", "#FFFFFF");
            $("#noactivot").css("background-color", "#FFFFFF");
            $("#agregartel").css("background-color", "#FFFFFF");
            $("#todosp").css("background-color", "#FFFFFF");
            $("#activop").css("background-color", "#FFFFFF");
            $("#noactivop").css("background-color", "#FFFFFF");
            $("#agregarproy").css("background-color", "#fbec88");
            $("#bajat").css("background-color", "#FFFFFF");
            $("#bajav").css("background-color", "#FFFFFF");
            $("#reportes").css("background-color", "#FFFFFF");
            $('#panelLeft_2_1').html("");
            $('#panelCenter_2_1').html("");
            $("#titulo_pagina_3").val("Bitacoras");
            agregarProyecto();
        }
    });

    // reportes del proyecto

    $("#reportes").bind({
        click: function() {
            $("#todosc").css("background-color", "#FFFFFF");
            $("#activoc").css("background-color", "#FFFFFF");
            $("#noactivoc").css("background-color", "#FFFFFF");
            $("#agregarcond").css("background-color", "#FFFFFF");
            $("#todosv").css("background-color", "#FFFFFF");
            $("#activov").css("background-color", "#FFFFFF");
            $("#noactivov").css("background-color", "#FFFFFF");
            $("#agregarvehi").css("background-color", "#FFFFFF");
            $("#todost").css("background-color", "#FFFFFF");
            $("#activot").css("background-color", "#FFFFFF");
            $("#noactivot").css("background-color", "#FFFFFF");
            $("#agregartel").css("background-color", "#FFFFFF");
            $("#todosp").css("background-color", "#FFFFFF");
            $("#activop").css("background-color", "#FFFFFF");
            $("#noactivop").css("background-color", "#FFFFFF");
            $("#agregarproy").css("background-color", "#FFFFFF");
            $("#bajat").css("background-color", "#FFFFFF");
            $("#bajav").css("background-color", "#FFFFFF");
            $("#reportes").css("background-color", "#fbec88");
            $("#reporteCentauro").css("background-color", "#FFFFFF");

            $('#panelLeft_2_1').html("");
            $('#panelCenter_2_1').html("");
            $("#titulo_pagina_3").val("Bitacoras");
            Proyectosreportes(3);
        }
    });

    $("#reporteCentauro").bind({
        click: function() {
            $("#todosc").css("background-color", "#FFFFFF");
            $("#activoc").css("background-color", "#FFFFFF");
            $("#noactivoc").css("background-color", "#FFFFFF");
            $("#agregarcond").css("background-color", "#FFFFFF");
            $("#todosv").css("background-color", "#FFFFFF");
            $("#activov").css("background-color", "#FFFFFF");
            $("#noactivov").css("background-color", "#FFFFFF");
            $("#agregarvehi").css("background-color", "#FFFFFF");
            $("#todost").css("background-color", "#FFFFFF");
            $("#activot").css("background-color", "#FFFFFF");
            $("#noactivot").css("background-color", "#FFFFFF");
            $("#agregartel").css("background-color", "#FFFFFF");
            $("#todosp").css("background-color", "#FFFFFF");
            $("#activop").css("background-color", "#FFFFFF");
            $("#noactivop").css("background-color", "#FFFFFF");
            $("#agregarproy").css("background-color", "#FFFFFF");
            $("#bajat").css("background-color", "#FFFFFF");
            $("#bajav").css("background-color", "#FFFFFF");
            $("#reportes").css("background-color", "#FFFFFF");
            $("#reporteCentauro").css("background-color", "#fbec88");

            $('#panelCenter_1_1').html("");
            $('#panelCenter_2_1').html("");
            $("#titulo_pagina_3").val("Bitacoras");
            MostrarReporteCentauro();
        }
    });

}


//function que carga grid de vehiculos

function cargarProyectos(opcion1) {

    var seleccion = false;
    var id_proyecto;
    var nombre;
    var fe_inicio;
    var fe_terminacion;
    var estatusp;
    var fecha_inicio_real;
    var fecha_fin_real;
    //    var estatus;
    if ($("#panelCenter_1_1").height() != 300)

    {
        $("#panelCenter_1_1").css("height", "+=300");
        $("#panelCenter_2_1").css("height", "-=290");
    }
    $('#panelCenter_1_1').load('../../Proyecto/view/viewGridProyectos.php', {}, function(data) {


        //                               $.post("../../Proyecto/controller/controllerProyectos.php",{opcion:'mostrar'},function (data){
        //                                  
        //                                  
        //                                  alert(data);
        //                              })

        $("#tabla_Admin_Proyectos").jqGrid({
            url: '../../Proyecto/controller/controllerProyectos.php',
            postData: {
                opcion: "listar",
                opcion1: opcion1
            },
            datatype: 'json',
            height: 250,
            colNames: ['id_proyecto', 'Nombre', 'Fecha inicial', 'Fecha estimada de terminacion', 'fecha_inicio_real', 'fecha_fin_real', 'estatus_terminacion', "Estatus"],
            colModel: [
                {
                    display: 'id_proyecto',
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
                            //            editable:true,
                            //            edittype:'text',
                            //            editoptions: {size:10, maxlength: 15}
                    ,
                    search: true,
                    stype: 'text',
                    searchrules: {
                        required: true
                    }
                    //            searchoptions: {
                    //                sopt: ['eq', 'ne']
                    //            }


                },
                {
                    display: 'fe_inicio',
                    name: 'fe_inicio',
                    width: 30,
                    sortable: true,
                    align: 'right'
                            //  hidden:true
                },
                {
                    display: 'fe_terminacion',
                    name: 'fe_terminacion',
                    width: 30,
                    sortable: true,
                    align: 'right'
                            //  hidden:true
                },
                {
                    display: 'fecha_inicio_real',
                    name: 'fecha_inicio_real',
                    hidden: true,
                    width: 10,
                    sortable: true,
                    align: 'right'
                },
                {
                    display: 'fecha_fin_real',
                    name: 'fecha_fin_real',
                    hidden: true,
                    width: 10,
                    sortable: true,
                    align: 'right'
                },
                {
                    display: 'estatus_terminacion',
                    name: 'estatus_terminacion',
                    hidden: true,
                    width: 10,
                    sortable: true,
                    align: 'right'
                },
                {
                    display: 'Estatus',
                    name: 'Estatus',
                    width: 10,
                    sortable: true,
                    align: 'right'
                }
            ],
            rowNum: 10,
            pager: '#pager2',
            sortname: 'id_proyecto',
            viewrecords: true,
            sortorder: "asc",
            emptyrecords: "No existen registros",
            autoheight: true,
            autowidth: true,
            scrollOffset: 22,
            onSelectRow: function(id) {
                seleccion = true;

                id_proyecto = $(this).jqGrid('getCell', id, 0);
                nombre = $(this).jqGrid('getCell', id, 1);
                fe_inicio = $(this).jqGrid('getCell', id, 2);
                fe_terminacion = $(this).jqGrid('getCell', id, 3);
                fecha_inicio_real = $(this).jqGrid('getCell', id, 4);
                fecha_fin_real = $(this).jqGrid('getCell', id, 5);
                estatusp = $(this).jqGrid('getCell', id, 6);
//                $("#panelCenter_2_1").html("");
                $('#panelLeft_2_1').html("");
                $('#titulo_pagina_3').val("");
                armarproyecto(id_proyecto);
                $('#titulo_pagina_2').val(nombre);
            }


        });
        $("#tabla_Admin_Proyectos").jqGrid('navGrid', '#pager2', {
            edit: false,
            add: false,
            search: false,
            del: false,
            refresh: false,
            view: false
        });
        //
        //        $("#tabla_Admin_Proyectos").jqGrid('navButtonAdd', '#pager2', {
        //            caption: "<img src=/SeguimientoTrue/trunk/interfaz/view/images/Iconos_jqgrid/Agregarproyecto.png width='20' height='20' />",
        //            buttonicon: "ui-icon-vacio",
        //            cursor: "pointer",
        //            title: "Agregar Proyecto",
        //            //        id:"NuevoUsu",
        //            onClickButton: function() {
        //                $("#panelCenter_2_1").html("");
        //                agregarProyecto();
        //            }
        //        });
        //-- inicio modificar dats conductor
        $("#tabla_Admin_Proyectos").jqGrid('navButtonAdd', '#pager2', {
            caption: "<img src=/interfaz/view/images/Iconos_jqgrid/book_edit.png width='20' height='20' />",
            buttonicon: "ui-icon-vacio",
            cursor: "pointer",
            title: "Modificar datos Proyecto",
            onClickButton: function() {
                //                if (estatus_terminacion == 1) {
                //                    $(function() {
                //                        $("#ventanAlertas").html("El proyecto no se puede modificar");
                //                        $("#ventanAlertas").attr('style', 'visible');
                //                        $("#ventanAlertas").dialog({
                //                            modal: true,
                //                            title: 'Proyecto',
                //                            show: 'explode',
                //                            hide: 'explode',
                //                            buttons: {
                //                                Aceptar: function() {
                //
                //                                    $(this).dialog("close");
                //
                //                                }
                //                            }
                //                        });
                //                    });
                //
                //                } else
                if (seleccion) {
//                    $("#panelCenter_2_1").html("");
//                    $("#panelCenter_1_1").html("");
//                    $("#panelLeft_2_1").html("");
                    $('#panelLeft_2_1').html("");
                    $('#titulo_pagina_3').val("");
                    modificarDatosProyecto(id_proyecto, nombre, fe_inicio, fe_terminacion, fecha_inicio_real, fecha_fin_real, estatusp);
                    //seleccion = false;
                } else {

                    $(function() {
                        $("#ventanAlertas").html("Elija un Proyecto");
                        $("#ventanAlertas").attr('style', 'visible');
                        $("#ventanAlertas").dialog({
                            //tru para que no interactue con otro elementos minestas se encuentra la ventana
                            modal: false,
                            title: 'Proyecto',
                            show: 'explode',
                            hide: 'explode',
                            buttons: {
                                Aceptar: function() {

                                    $(this).dialog("close");
                                    $("#tabla_Admin_Telefonos").trigger("reloadGrid");

                                }
                            }
                        });
                    });

                }
            }
        });


        //-- fin modificar datos conductor
        //-- inicio cambio de estatus conducto        
        $("#tabla_Admin_Proyectos").jqGrid('navButtonAdd', '#pager2', {
            caption: "<img src=/interfaz/view/images/Iconos_jqgrid/condu.png width='20' height='20'/>",
            buttonicon: "ui-icon-vacio",
            title: "Conductores en proyecto",
            onClickButton: function() {


                if (seleccion) {
                    //                    $("#panelCenter_2_1").html("");
                    //                    cambioDeEstatusTelefono(id_telefono, numero, estatus);

                    //alert("hola");

                    $('#panelCenter_1_1').html("");
                    $('#panelLeft_2_1').html("");
                    $('#titulo_pagina_3').val("");
                    $('#panelCenter_1_1').load('../../Proyecto/view/viewGridConductoresProyecto.php', {}, function(data) {


                        codnuctoresProyecto(data, id_proyecto, nombre);

                    });
                    // seleccion = false;
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
                                    $("#tabla_Admin_Telefonos").trigger("reloadGrid");

                                }
                            }
                        });
                    });

                }


            }
        });


        //mostrar reportes del proyecto
        $("#tabla_Admin_Proyectos").jqGrid('navButtonAdd', '#pager2', {
            caption: "<img src=/interfaz/view/images/Iconos_jqgrid/Chart_Bar_Files.png width='18' height='20'/>",
            buttonicon: "ui-icon-vacio",
            cursor: "pointer",
            title: "Mostrar reporte del proyecto",
            //        id:"NuevoUsu",
            onClickButton: function() {
                if (seleccion) {
                    $('#panelLeft_2_1').html("");
                    $('#titulo_pagina_3').val("");
                    MostrarReporte(id_proyecto);

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
                                    $("#tabla_Admin_Telefonos").trigger("reloadGrid");

                                }
                            }
                        });
                    });

                }

            }
        });
        //fin mostrar reporte
        //-- Fin cambio de estatus Proyecto  
        $("#tabla_Admin_Proyectos").jqGrid('navButtonAdd', '#pager2', {
            caption: "<img src=/interfaz/view/images/Iconos_jqgrid/terminarp.png />",
            buttonicon: "ui-icon-vacio",
            cursor: "pointer",
            title: "Terminar Proyecto",
            //        id:"NuevoUsu",
            onClickButton: function() {


                if (seleccion && estatusp == 1) {
                    $('#panelLeft_2_1').html("");
                    $('#titulo_pagina_3').val("");
                    cambioDeEstatusProyecto(id_proyecto, estatusp);
                    seleccion = false;
                } else if (estatusp == 0) {
                    $(function() {
                        $("#ventanAlertas").html("El proyecto ya esta terminado");
                        $("#ventanAlertas").attr('style', 'visible');
                        $("#ventanAlertas").dialog({
                            modal: true,
                            title: 'Proyecto terminado',
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
                    $(function() {
                        $("#ventanAlertas").html("Elija un proyecto");
                        $("#ventanAlertas").attr('style', 'visible');
                        $("#ventanAlertas").dialog({
                            //tru para que no interactue con otro elementos minestas se encuentra la ventana
                            modal: false,
                            title: 'Proyecto',
                            show: 'explode',
                            hide: 'explode',
                            buttons: {
                                Aceptar: function() {

                                    $(this).dialog("close");
                                    $("#tabla_Admin_Proyectos").trigger("reloadGrid");

                                }
                            }
                        });
                    });

                }


            }

        }
        );

        //            
        //            $("#tabla_Admin_Proyectos").jqGrid('navButtonAdd', '#pager2', {
        //            caption: "<img src=/SeguimientoTrue/trunk/interfaz/view/images/Iconos_jqgrid/reporte.png width='20' height='20' />",
        //            buttonicon: "ui-icon-vacio",
        //            cursor: "pointer",
        //            title: "conductores en Proyecto",
        //            //        id:"NuevoUsu",
        //            onClickButton: function() {
        //                 $('#panelCenter_1_1').html("");
        //                    $('#panelCenter_1_1').load('../../Proyecto/view/viewGridConductoresProyecto.php', {}, function(data) {
        //
        //
        //                        funcionconductoresenproyecto(data,nombre,id_proyecto);
        //
        //                    });
        //
        //                
        //            }
        //        });


    });

}
// fin funcion mostrar vehiculos





function agregarProyecto() {

    //    var num = 0;
    var validaText;
    //    var validaSelect;
    var camposBien;
    var strColorSeleccionado;
    $("#panelCenter_1_1").html("");
    if ($("#panelCenter_1_1").height() == 300)

    {
        $("#panelCenter_1_1").css("height", "-=300");
        $("#panelCenter_2_1").css("height", "+=290");
    }
    $("#panelCenter_2_1").load("../../Proyecto/view/viewPanelesAgregarkmydelegacion.php", function() {

        $("#divTablaCapturaProyecto").load("../../Proyecto/view/viewCapturaProyecto.php", function(data) {

            //            $("#divTablaCapturaProyecto").html(data);
            //            agregarEstadosMunicipios();
            $.post("../../Proyecto/controller/controllerMostrarEstados.php", {}, function(data) {
                $("#estadosPro").html(data);
                $("#btn_derechoEst").on({
                    'click': function()
                    {
                        $("#estadosPro option:selected").appendTo("#estados_asignados");
                        agregarDelegacion();
                    }
                });
                $("#btn_izquierdoEst").on({
                    'click': function()
                    {
                        $("#estados_asignados option:selected").appendTo("#estadosPro");
                        var seleccion = $("#estadosPro option:selected").val();
                        $("#municipiosPro").find("option[id=" + seleccion + "]").remove();
                        $("#municipios_asignados").find("option[id=" + seleccion + "]").remove();
                        $("#municipios_asignadoskm").find("option[id=" + seleccion + "]").remove();
                    }
                });
            });

//            $.datepicker.setDefaults($.datepicker.regional["Es"]);
//            $("#fe_inicio").datepicker({
//                dateFormat: 'yy-mm-dd',
//                firstDay: 1
//            });
            datePickerFuncion("#fe_inicio");

            $("#fe_terminacion").datepicker({
                dateFormat: 'yy-mm-dd',
                firstDay: 1
            });

            $("#fecha_inicio_real").datepicker({
                dateFormat: 'yy-mm-dd',
                firstDay: 1
            });
            $("#fecha_fin_real").datepicker({
                dateFormat: 'yy-mm-dd',
                firstDay: 1
            });

            $('#km_FC-1').on({
                click: function() {
                    if ($("#km_FC-1").is(':checked')) {
                        $("#1").removeAttr("disabled");
                    } else {
                        $("#1").attr("disabled", true);
                        $("#1").val("");
                    }
                }
            });

            $('#km_FC-2').on({
                click: function() {
                    if ($("#km_FC-2").is(':checked')) {
                        $("#2").removeAttr("disabled");

                    } else {
                        $("#2").attr("disabled", true);
                        $("#2").val("");
                    }
                }
            });

            $('#km_FC-3').on({
                click: function() {
                    if ($("#km_FC-3").is(':checked')) {
                        $("#3").removeAttr("disabled");
                    } else {
                        $("#3").attr("disabled", true);
                        $("#3").val("");
                    }
                }
            });

            $('#km_FC-4').on({
                click: function() {
                    if ($("#km_FC-4").is(':checked')) {
                        $("#4").removeAttr("disabled");
                    } else {
                        $("#4").attr("disabled", true);
                        $("#4").val("");
                    }
                }
            });
            $('#km_FC-5').on({
                click: function() {
                    if ($("#km_FC-5").is(':checked')) {
                        $("#5").removeAttr("disabled");
                    } else {
                        $("#5").attr("disabled", true);
                        $("#5").val("");
                    }
                }
            });
            $("#txtNombreProyecto").focus();

            $("select").bind({
                blur: function() {

                    quitarClaseTxtR($(this).attr('id'));

                },
                focus: function() {

                    agregarClaseTxtR($(this).attr('id'));

                }

            });

        });



        $("#divTablaKm_Lineales").load("../../Proyecto/view/viewAgregarKm_lineales.php", function(data) {




            $("#delegacionkm").on({
                click: function()
                {


                    var selectMunicipios = document.getElementById("municipios_asignados");

                    var totalmun = selectMunicipios.length;

                    var parametrosmun = "";
                    var parametrosmun1 = "";
                    var parametrosmunkmr = "";
                    var ColoresDelegacion = "";
                    //                var contMunicipios = 0;
                    var idmunicipio = "";
                    var idestado = "";
                    for (var j = 0; j < totalmun; j++)
                    {
                        parametrosmun = selectMunicipios.options[j].text;
                        //                    alert(parametrosm);
                        idmunicipio = selectMunicipios.options[j].value;
                        idestado = selectMunicipios.options[j].id;
                        parametrosmun1 += parametrosmun + '<input type="text" id="' + idmunicipio + '"   name="' + idestado + '" value="0" style="border: 1px dotted graytext;padding: 3px;margin: 3px 0 3px 0;background :#eee;" /> <input type="color" id="clrColordel" value="#ff006f" /><br>';
                        parametrosmunkmr += parametrosmun + '<input type="text" id="' + idmunicipio + '"   name="' + idestado + '" value="0" style="border: 1px dotted graytext;padding: 3px;margin: 3px 0 3px 0;background :#eee;" /> <br>';
                        ColoresDelegacion += '';
                    }

                    $("#kmAsignadosDelegacion").html(parametrosmun1);
                    $("#kmrAsignadosDelegacion").html(parametrosmunkmr);
//                    $("#ColoresDelegacion").html(ColoresDelegacion);
                }


            });

//            document.getElementById('clrColordel').addEventListener('change', function() {
//                //obtenemos el color seleccionado por el usuario
//                strColorSeleccionado = this.value;
//                //seleccionamos la capa que vamos a cambiar de color
////				var objCapa=document.getElementById('divColor');
//
//                //le colocamos el nuevo color de fondo a la capa
////				objCapa.style.backgroundColor=strColorSeleccionado;
////				//mostramos el codigo del color seleccionado
////				objCapa.innerHTML=strColorSeleccionado;
//                $("#clrColordel").val(strColorSeleccionado);
//            });

            $("#btnGuardarProyecto").bind({
                click: function() {

                    //Array para guardar los colores de cada delegacion
                    var coloresdelegacion = "";
                    var color = 1;
//                    coloresdelegacion="[";
                    var col = "";
                    var arraycolor = new Array();
                    $("#kmAsignadosDelegacion input").each(function(index) {
                        if (color % 2 == 0) {
//                            col=String($(this).val());
//                            col = col.substring(1);
//                            alert(col);
//                            arraycolor[color]=($(this).val());
                            coloresdelegacion = $(this).val();
//                        alert($(this).val());
                            arraycolor.push(coloresdelegacion);
                        }
                        color++;
                    });
//                    coloresdelegacion = coloresdelegacion.substring(0, coloresdelegacion.length - 1);
//                    coloresdelegacion += "];";
//                    alert(coloresdelegacion);
                    if (color === 1) {
                        arraycolor = "";

                    }
//var colors=JSON.stringify(arraycolor);

                    //json kilometros delegacion
                    var contMunicipioskm = 0;
                    var kmDelegacion = "";
                    kmDelegacion += "[";
                    $("#kmAsignadosDelegacion input:text").each(function(index) {
                        kmDelegacion += '{idDelegacion:' + $(this).attr("id") + ',kmDelegacion:' + $(this).val() + '},';
                        contMunicipioskm++;
                    });
                    kmDelegacion = kmDelegacion.substring(0, kmDelegacion.length - 1);
                    kmDelegacion += "];";
                    if (contMunicipioskm === 0) {
                        kmDelegacion = "";

                    }
                    //json kilometros del ruteador delegacion
                    var contMunicipioskmr = 0;
                    var kmrDelegacion = "";
                    kmrDelegacion += "[";
                    $("#kmrAsignadosDelegacion input:text").each(function(index) {
                        kmrDelegacion += '{idDelegacion:' + $(this).attr("id") + ',kmrDelegacion:' + $(this).val() + '},';
                        contMunicipioskmr++;
                    });
                    kmrDelegacion = kmrDelegacion.substring(0, kmrDelegacion.length - 1);
                    kmrDelegacion += "];";
                    if (contMunicipioskmr === 0) {
                        kmrDelegacion = "";

                    }

                    //json function class
                    var valoresFunction = "";
                    var contFunction = 0;
                    valoresFunction += "[";
                    $("#function_class input:text").each(function(index) {
                        var id = $(this).attr("id");

                        if ($(this).val() != "") {
                            valoresFunction += '{km:' + $(this).val() + ', functionclass:' + id + '},';
                            contFunction++;
                        }
                        else if ($(this).val() == "") {
                            valoresFunction += '{km:' + 0 + ', functionclass:' + id + '},';
                            contFunction++;
                        }
                    });
                    valoresFunction = valoresFunction.substring(0, valoresFunction.length - 1);
                    valoresFunction += "];";
                    if (contFunction === 0) {
                        valoresFunction = "";

                    }
                    //                    alert((valoresFunction));

                    //crear json estados
                    var selectEstados = document.getElementById("estados_asignados");

                    var total = selectEstados.length;
                    var parametros = "";
                    var parametros1 = "";
                    parametros1 += "[";
                    var contEstados = 0;
                    for (var i = 0; i < total; i++)
                    {
                        parametros = selectEstados.options[i].value;
                        parametros1 += '{idEstado:' + parametros + '},';
                        contEstados++;
                    }
                    parametros1 = parametros1.substring(0, parametros1.length - 1);
                    parametros1 += "];";
                    if (contEstados === 0) {
                        parametros1 = "";

                    }
                    //                    alert(parametros1);
                    //crear json municipios
                    var selectMunicipios = document.getElementById("municipios_asignados");

                    var totalmun = selectMunicipios.length;
                    var parametrosm = "";
                    var parametrosm1 = "";
                    var contMunicipios = 0;
                    parametrosm1 += "[";
                    var idestado = "";
                    for (var j = 0; j < totalmun; j++)
                    {
                        parametrosm = selectMunicipios.options[j].value;
                        idestado = selectMunicipios.options[j].id;
                        parametrosm1 += '{idMunicipios:' + parametrosm + ',idestado:' + idestado + '},';
                        contMunicipios++;
                    }

                    parametrosm1 = parametrosm1.substring(0, parametrosm1.length - 1);
                    parametrosm1 += "];";
                    if (contMunicipios === 0) {
                        parametrosm1 = "";
                    }
                    validaText = verificarCamposProyectoText();
                    //crear json function class


                    //                validaSelect = verificarCamposCapturadosSelectProyecto();

                    if (validaText) {


//                        camposBien = validarCamposProyecto();
//
//                        if (camposBien) {
                        //                        var json=   datosEstadosDinamicos();
                        $.post("../../Proyecto/controller/controllerAltaProyecto.php", {
                            nombre: $("#txtNombreProyecto").val(),
                            fe_inicio: $("#fe_inicio").val(),
                            fe_terminacion: $("#fe_terminacion").val(),
                            valoresFunction: eval(valoresFunction),
                            parametros1: eval(parametros1),
                            parametrosm1: eval(parametrosm1),
                            coloresdelegacion: eval(arraycolor),
                            contFunction: contFunction,
                            contEstados: contEstados,
                            contMunicipios: contMunicipios,
                            contMunicipioskm: contMunicipioskm,
                            kmDelegacion: eval(kmDelegacion),
                            kmrDelegacion: eval(kmrDelegacion),
                            fecha_inicio_real: $("#fecha_inicio_real").val(),
                            fecha_fin_real: $("#fecha_fin_real").val()

                        },
                        function(data) {

                            $(function() {
                                $("#ventanAlertas").html(data);
                                $("#ventanAlertas").attr('style', 'visible');
                                $("#ventanAlertas").dialog({
                                    modal: true,
                                    title: 'Proyecto',
                                    show: 'explode',
                                    hide: 'explode',
                                    buttons: {
                                        Aceptar: function() {

                                            $(this).dialog("close");
                                            $('#panelCenter_2_1').html("");
                                            $("#tabla_Admin_Proyectos").trigger("reloadGrid");

                                        }
                                    }
                                });
                            });
                        });


//                        } else {
//                            $(function() {
//                                $("#ventanAlertas").html("Formatos no validos");
//                                $("#ventanAlertas").attr('style', 'visible');
//                                $("#ventanAlertas").dialog({
//                                    modal: true,
//                                    title: 'Proyecto',
//                                    show: 'explode',
//                                    hide: 'explode',
//                                    buttons: {
//                                        Aceptar: function() {
//
//                                            $(this).dialog("close");
//
//
//                                        }
//                                    }
//                                });
//                            });
//                        }
                    } else {

                        $(function() {
                            $("#ventanAlertas").html("Faltan campos por capturar");
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
                    }
                }

            });


            //fin botn agregar conductor

            //inicio boton anexar otro proyecto
            $("#anexarproyecto").bind({
                click: function() {

                    //json para guardar los colores de cada delegacion
                    var coloresdelegacion = "";
                    var color = 1;
                    coloresdelegacion = "[";
                    $("#kmAsignadosDelegacion input").each(function(index) {
                        if (color % 2 == 0) {
                            coloresdelegacion += '{colordelegacion:' + $(this).val() + '},';
//                            alert($(this).val());
                        }
                        color++;
                    });
                    coloresdelegacion = coloresdelegacion.substring(0, coloresdelegacion.length - 1);
                    coloresdelegacion += "];";
                    if (color === 1) {
                        coloresdelegacion = "";

                    }



                    //json kilometros delegacion
                    var contMunicipioskm = 0;
                    var kmDelegacion = "";
                    kmDelegacion += "[";
                    $("#kmAsignadosDelegacion input:text").each(function(index) {
                        kmDelegacion += '{idDelegacion:' + $(this).attr("id") + ',kmDelegacion:' + $(this).val() + '},';
                        contMunicipioskm++;
                    });
                    kmDelegacion = kmDelegacion.substring(0, kmDelegacion.length - 1);
                    kmDelegacion += "];";
                    if (contMunicipioskm === 0) {
                        kmDelegacion = "";

                    }
//                    alert(kmDelegacion);
                    //json function class
                    var valoresFunction = "";
                    var contFunction = 0;
                    valoresFunction += "[";
                    $("#function_class input:text").each(function(index) {
                        var id = $(this).attr("id");

                        if ($(this).val() != "") {
                            valoresFunction += '{km:' + $(this).val() + ', functionclass:' + id + '},';
                            contFunction++;
                        }
                    });
                    valoresFunction = valoresFunction.substring(0, valoresFunction.length - 1);
                    valoresFunction += "];";
                    if (contFunction === 0) {
                        valoresFunction = "";

                    }
                    //                    alert((valoresFunction));

                    //crear json estados
                    var selectEstados = document.getElementById("estados_asignados");

                    var total = selectEstados.length;
                    var parametros = "";
                    var parametros1 = "";
                    parametros1 += "[";
                    var contEstados = 0;
                    for (var i = 0; i < total; i++)
                    {
                        parametros = selectEstados.options[i].value;
                        parametros1 += '{idEstado:' + parametros + '},';
                        contEstados++;
                    }
                    parametros1 = parametros1.substring(0, parametros1.length - 1);
                    parametros1 += "];";
                    if (contEstados === 0) {
                        parametros1 = "";

                    }
                    //                    alert(parametros1);
                    //crear json municipios
                    var selectMunicipios = document.getElementById("municipios_asignados");

                    var totalmun = selectMunicipios.length;
                    var parametrosm = "";
                    var parametrosm1 = "";
                    var contMunicipios = 0;
                    parametrosm1 += "[";
                    var idestado = "";
                    for (var j = 0; j < totalmun; j++)
                    {
                        parametrosm = selectMunicipios.options[j].value;
                        idestado = selectMunicipios.options[j].id;
                        parametrosm1 += '{idMunicipios:' + parametrosm + ',idestado:' + idestado + '},';
                        contMunicipios++;
                    }

                    parametrosm1 = parametrosm1.substring(0, parametrosm1.length - 1);
                    parametrosm1 += "];";
                    if (contMunicipios === 0) {
                        parametrosm1 = "";
                    }
                    validaText = verificarCamposProyectoText();
                    //crear json function class


                    //                validaSelect = verificarCamposCapturadosSelectProyecto();

                    if (validaText) {


                        camposBien = validarCamposProyecto();

                        if (camposBien) {
                            //                        var json=   datosEstadosDinamicos();
                            $.post("../../Proyecto/controller/controllerAltaProyecto.php", {
                                nombre: $("#txtNombreProyecto").val(),
                                fe_inicio: $("#fe_inicio").val(),
                                fe_terminacion: $("#fe_terminacion").val(),
                                valoresFunction: eval(valoresFunction),
                                parametros1: eval(parametros1),
                                parametrosm1: eval(parametrosm1),
                                coloresdelegacion: eval(coloresdelegacion),
                                contFunction: contFunction,
                                contEstados: contEstados,
                                contMunicipios: contMunicipios,
                                contMunicipioskm: contMunicipioskm,
                                kmDelegacion: eval(kmDelegacion)
                            },
                            function(data) {

                                $(function() {
                                    $("#ventanAlertas").html(data);
                                    $("#ventanAlertas").attr('style', 'visible');
                                    $("#ventanAlertas").dialog({
                                        modal: true,
                                        title: 'Proyecto',
                                        show: 'explode',
                                        hide: 'explode',
                                        buttons: {
                                            Aceptar: function() {

                                                $(this).dialog("close");
                                                $('#panelCenter_2_1').html("");
                                                agregarotroProyecto();

                                            }
                                        }
                                    });
                                });
                            });


                        } else {
                            $(function() {
                                $("#ventanAlertas").html("Formatos no validos");
                                $("#ventanAlertas").attr('style', 'visible');
                                $("#ventanAlertas").dialog({
                                    modal: true,
                                    title: 'Proyecto',
                                    show: 'explode',
                                    hide: 'explode',
                                    buttons: {
                                        Aceptar: function() {

                                            $(this).dialog("close");


                                        }
                                    }
                                });
                            });
                        }
                    } else {

                        $(function() {
                            $("#ventanAlertas").html("Faltan campos por capturar");
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
                    }
                }


            });

            //inicio cancelar agregar conductor
            $("#btnCancelarProyecto").bind({
                click: function() {

                    $("#panelCenter_2_1").html("");
                }

            });


        });

    });


}
//funcion para agregar estados y municipios al proyecto
//function agregarEstadosMunicipios() {
//
//    //fin cancelar agregar conductor
//
//    $("#btn_derechoEst").on({
//        'click': function()
//        {
//            $("#estadosPro option:selected").appendTo("#estados_asignados");
//            agregarDelegacion();
//        }
//    });
//    $("#btn_izquierdoEst").on({
//        'click': function()
//        {
//            var id=document.getElementById("id");
//            $("#estados_asignados option:selected").appendTo("#estadosPro");
////            $("#estadosPro option:selected").remove("#municipiosPro");
//            $("#estadosPro option:selected").remove("#municipiosPro");
//        }
//    });
//
//}
function agregarDelegacion() {
    $(".s").bind({
        'click': function()
        {
            var id_estado = $(this).val();
            $.post("../../Proyecto/controller/controllerMostrarMunicipios.php", {
                id_estado: id_estado
            }, function(data) {

                $("#municipiosPro").html(data);
                $("#btn_derechoMun").on({
                    'click': function()
                    {
                        //                        $("#municipiosPro option:selected").clone().appendTo("#municipios_asignadoskm");
                        $("#municipiosPro option:selected").appendTo("#municipios_asignados");


                    }
                });
                $("#btn_izquierdoMun").on({
                    'click': function()
                    {
                        $("#municipios_asignados option:selected").appendTo("#municipiosPro");
                        $("#municipiosPro option:selected").remove("#municipios_asignadoskm");
                    }
                });

            });
        }
    });
}


//funcion para agregar otro proyecto
function agregarotroProyecto()
{
    agregarProyecto();

}
function verificarCamposProyectoText() {

    var camposLlenos = true;
    $("#datosProyecto input:text ").each(function(index) {
        $("#formCapturakmProyectod input:text ").each(function(index) {


            if ($(this).val() == "") {

                camposLlenos = false;
                quitarClaseTxtV($(this).attr('id'));
                agregarClaseTxtR($(this).attr('id'));



            } else {

                agregarClaseTxtV($(this).attr('id'));

            }


        });



    });

    if (camposLlenos) {
        return true;
    } else {
        return false;
    }


}

function verificarCamposCapturadosSelectProyecto() {

    var camposLlenos = true;
    $("#datosProyecto select ").each(function(index) {



        if ($(this).val() == "00") {

            camposLlenos = false;
            agregarClaseTxtR($(this).attr('id'));



        } else {

            agregarClaseTxtV($(this).attr('id'));
        }


    });


    if (camposLlenos) {
        return true;
    } else {
        return false;
    }


}


function validarCamposProyecto() {

    var valida;
    //poner numero de cmapos que son
    var camposBien = $("#datosProyecto input:text ").size();
//    alert(camposBien);
    $("#datosProyecto input:text ").each(function() {



        if ($(this).attr('name') == "Nombre") {

            valida = validarLetrasEsp($(this).val());

            if (valida != "ok") {

                campoNecesario($(this).attr("id"));

            } else {

                camposBien -= 1;
            }

        }

        //validar fecha_inicio

        if ($(this).attr('name') == "fecha_inicio") {


            camposBien -= 1;

        }
        if ($(this).attr('name') == "fecha_terminacion") {


            camposBien -= 1;

        }
        //

//        if (/municipio/.test($(this).attr('name'))) {
//
//            valida = validarNumerosLetrasEspyComa($(this).val());
//
//
//            if (valida != "ok") {
//                campoNecesario($(this).attr("id"));
//            } else {
//
//                camposBien -= 1;
//            }
//        }


    });

    if (camposBien == 0) {
        return true;
    } else {
        return false
    }
}


function modificarDatosProyecto(id_proyecto, nombre, fe_inicio, fe_terminacion, fecha_inicio_real, fecha_fin_real, estatusp) {


    var validaText;
    var camposBien;
    var arrayfunctionclass = new Array();
//$("#panelCenter_1_1").html("");
    $("#panelCenter_2_1").load("../../Proyecto/view/viewModificarProyecto.php", {
        id: id_proyecto
    }, function(data) {
        mostrarEstadosAsignados(id_proyecto);
        mostrarMunicipiosAsignados(id_proyecto);
        var array = new Array();
        $.post("../../Proyecto/controller/controllerMostrarFunctionClass.php", {id_proyecto: id_proyecto}, function(data) {

            $("#Modfunction_class").html(data);
//            arrayfunctionclass = eval(data);
////            alert(arrayfunctionclass[1]['km_lineales']);
//            $("#fc1").val(arrayfunctionclass[0]['km_lineales']);
//            $("#fc2").val(arrayfunctionclass[1]['km_lineales']);
//            $("#fc3").val(arrayfunctionclass[2]['km_lineales']);
//            $("#fc4").val(arrayfunctionclass[3]['km_lineales']);
//            $("#fc5").val(arrayfunctionclass[4]['km_lineales']);
            $('#km_FC-1').on({
                click: function() {
                    if ($("#km_FC-1").is(':checked')) {
                        $("#fc1").removeAttr("disabled");

                    } else {
                        $("#fc1").attr("disabled", true);
                        $("#fc1").val("");
                    }
                }
            });

            $('#km_FC-2').on({
                click: function() {
                    if ($("#km_FC-2").is(':checked')) {
                        $("#fc2").removeAttr("disabled");

                    } else {
                        $("#fc2").attr("disabled", true);
                        $("#fc2").val("");
                    }
                }
            });

            $('#km_FC-3').on({
                click: function() {
                    if ($("#km_FC-3").is(':checked')) {
                        $("#fc3").removeAttr("disabled");
                    } else {
                        $("#fc3").attr("disabled", true);
                        $("#fc3").val("");
                    }
                }
            });

            $('#km_FC-4').on({
                click: function() {
                    if ($("#km_FC-4").is(':checked')) {
                        $("#fc4").removeAttr("disabled");
                    } else {
                        $("#fc4").attr("disabled", true);
                        $("#fc4").val("");
                    }
                }
            });
            $('#km_FC-5').on({
                click: function() {
                    if ($("#km_FC-5").is(':checked')) {
                        $("#fc5").removeAttr("disabled");
                    } else {
                        $("#fc5").attr("disabled", true);
                        $("#fc5").val("");
                    }
                }
            });

        });
//        mostrarFunctionClass(id_proyecto);
        //lineas nuevas agregadas
        $.datepicker.setDefaults($.datepicker.regional["es"]);

        $("#fe_inicio").datepicker({
            dateFormat: 'yy-mm-dd',
            firstDay: 1
        });
        $("#fe_terminacion").datepicker({
            dateFormat: 'yy-mm-dd',
            firstDay: 1
        });

        $("#fecha_inicio_real").datepicker({
            dateFormat: 'yy-mm-dd',
            firstDay: 1
        });
        $("#fecha_fin_real").datepicker({
            dateFormat: 'yy-mm-dd',
            firstDay: 1
        });


        $("#txtNombreProyecto").val(nombre);
        $("#fe_inicio").val(fe_inicio);
        $("#fe_terminacion").val(fe_terminacion);
        $("#estatusp").val(estatusp);
        $("#fecha_inicio_real").val(fecha_inicio_real);
        $("#fecha_fin_real").val(fecha_fin_real);

        $("input:text").bind({
            focusout: function() {

                quitarClaseTxtR($(this).attr('id'));



            },
            focusin: function() {

                agregarClaseTxtR($(this).attr('id'));

            }

        });

        $("#txtNombreProyecto").focus();

        //$("#divModificarKMDelegacion").load("../../Proyecto/view/viewAgregarKm_lineales.php", function(data) {

        $("#ModificarKMDelegacionkm").on({
            click: function()
            {


//                var selectMunicipios = document.getElementById("municipios_asignadosMod");
//
//                var totalmun = selectMunicipios.length;
//                var identificador_delegacion="";
//                var id_delegacion="";
//                var parametrosmun = "";
//                var parametrosmun1 = "";
//                 var idestado = "";
////                var iddelegacion = "";
//                var kilometros = "";
//                for (var j = 0; j < totalmun; j++)
//                {
//                    parametrosmun = selectMunicipios.options[j].text;
//                    //                    alert(parametrosm);
//                    kilometros= selectMunicipios.options[j].getAttribute("km");
//                     identificador_delegacion= selectMunicipios.options[j].value;
//                     id_delegacion= selectMunicipios.options[j].getAttribute("id_delegacion");
//                    idestado = selectMunicipios.options[j].id;
////                    if(!isDefined (kilometros)) {  
////                        kilometros=0;
////                    }
//                    parametrosmun1 += parametrosmun + '<input type="text" id_delegacion="'+id_delegacion+'"  id="' + identificador_delegacion + '"   name="'+idestado+'"    value="' + kilometros + '" /> <br>';
//                }
//
                $.post("../../Proyecto/controller/controllerbuscarkilometrosdelegacion.php", {
                    id_proyecto: id_proyecto,
                    opcion: 1
                }, function(data) {
                    var modificarkmLineales = "";
                    var modificarkm_ruteador = "";
                    var color_delegacion = "";
                    $.each(eval(data), function(index, value) {
                        if (value.color_delegacion == '')
                        {
                            color_delegacion = '#ff006f';
                        }
                        if (value.color_delegacion != '')
                        {
                            color_delegacion = value.color_delegacion;
                        }
                        modificarkmLineales += value.nombre + ' <input id="' + value.id_delegacion + '" value="' + value.km_lineales + '" style="border: 1px dotted graytext;padding: 3px;margin: 3px 0 3px 0;background :#eee;" ><input type="color" id="clrColordel" value="' + color_delegacion + '" ><br>';
                        modificarkm_ruteador += value.nombre + '<input id="' + value.id_delegacion + '" value="' + value.km_ruteador + '" style="border: 1px dotted graytext;padding: 3px;margin: 3px 0 3px 0;background :#eee;" ><br>';

//                    var ronda = data[index].ronda;
//                    var jugadores = data[index].jugadores;
//                    $("#resultados").append('<h2>Ronda '+ronda+'</h2>');
//                    $.each(jugadores, function(_index){  
//                        $("#resultados").append('<p>Jugador ' + jugadores[_index].nombre + ' - Puntos ' + jugadores[_index].puntos + '</p>');
//                    })
                    });
//      alert(modificarkmLineales);

                    $("#kimoletrosDelegacion").html(modificarkmLineales);
                    $("#kmrAsignadosDelegacionmod").html(modificarkm_ruteador);

                    $("#btnModificarProyectokm").on({
                        click: function()
                        {

                            //Array para guardar los colores de cada delegacion
                            var coloresdelegacion = "";
                            var color = 1;
                            var col = "";
                            var arraycolor = new Array();
                            $("#kimoletrosDelegacion input").each(function(index) {
                                if (color % 2 == 0) {

                                    coloresdelegacion = $(this).val();
                                    arraycolor.push(coloresdelegacion);
                                }
                                color++;
                            });

                            if (color === 1) {
                                arraycolor = "";

                            }

                            var contMunicipioskm = 0;
                            var kmDelegacion = "";
                            kmDelegacion += "[";
                            $("#kimoletrosDelegacion input:text").each(function(index) {
                                kmDelegacion += '{id_delegacion:' + $(this).attr("id") + ', kmDelegacion:' + $(this).val() + '},';

//                                                kmDelegacion += '{idDelegacion:' + $(this).attr("id") + ',kmDelegacion:' + $(this).val() + '},';

                                contMunicipioskm++;
                            });
                            kmDelegacion = kmDelegacion.substring(0, kmDelegacion.length - 1);
                            kmDelegacion += "];";
                            if (contMunicipioskm === 0) {
                                kmDelegacion = "";

                            }
///////// actualizar km_ruteador 
                            var contMunicipioskmr = 0;
                            var km_ruteadorDelegacion = "";
                            km_ruteadorDelegacion += "[";
                            $("#kmrAsignadosDelegacionmod input:text").each(function(index) {
                                km_ruteadorDelegacion += '{id_delegacion:' + $(this).attr("id") + ', kmrDelegacion:' + $(this).val() + '},';

                                contMunicipioskmr++;

                            });
                            km_ruteadorDelegacion = km_ruteadorDelegacion.substring(0, km_ruteadorDelegacion.length - 1);
                            km_ruteadorDelegacion += "];";
                            if (contMunicipioskmr === 0) {
                                km_ruteadorDelegacion = "";

                            }
                            $.post("../../Proyecto/controller/controllerbuscarkilometrosdelegacion.php", {
                                id_proyecto: id_proyecto,
                                opcion: 2,
                                kmDelegacion: eval(kmDelegacion),
                                km_ruteadorDelegacion: eval(km_ruteadorDelegacion),
                                color_delegacion: eval(arraycolor),
                            }, function(data) {
                                $(function() {
                                    $("#ventanAlertas").html(data);
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

                            });
                        }
                    })
                    $("#btnCancelarProyectokm").bind({
                        click: function() {
                            $("#panelCenter_2_1").html("");
                        }
                    });
                });




            }
            //            });
        });

        //inicioboton de agregar conductor 

        $("#btnModificarProyecto").on({
            click: function() {
                //json function class

                var valoresFunction = "";
                var contFunction = 0;
                valoresFunction += "[";
                $("#Modfunction_class input:text").each(function(index) {
                    var id = $(this).attr("name");

//                    var id = $(this).attr("id");

                    if ($(this).val() != "") {
                        valoresFunction += '{"km":"' + $(this).val() + '", "functionclass":"' + id + '", "id_function_class":"' + $(this).attr("id_function_class") + '"},';
                        contFunction++;
                    }
                    else if ($(this).val() == "") {
                        valoresFunction += '{"km":"' + 0 + '", "functionclass":"' + id + '"},';
                        contFunction++;
                    }
                });
                valoresFunction = valoresFunction.substring(0, valoresFunction.length - 1);
                valoresFunction += "];";
                if (contFunction === 0) {
                    valoresFunction = "";

                }

                // json estados asignados al proyecto
                var selectEstados = document.getElementById("estados_asignadosModificados");
                var total = selectEstados.length;
                var parametros = "";
                var contEstados = 0;
                var idestados = "";
                var parametrosE1 = "";
                parametrosE1 = "[";
                for (var i = 0; i < total; i++)
                {
                    parametros = selectEstados.options[i].value;
                    idestados = selectEstados.options[i].id;

                    parametrosE1 += '{"identificador_estados":"' + parametros + '", "id_estados":"' + idestados + '", "id_proyecto":"' + id_proyecto + '"},';
                    contEstados++;
                }
                parametrosE1 = parametrosE1.substring(0, parametrosE1.length - 1);
                parametrosE1 += "];";
                if (contEstados === 0) {
                    parametrosE1 = "";

                }

                //modificar municipios
                var selectMunicipios = document.getElementById("municipios_asignadosMod");
                var totalmun = selectMunicipios.length;
                var parametrosm = "";
                var id_delegacion = "";
                var parametrosM1 = "";
                parametrosM1 += "[";
                var idestado = "";
                var contMunicipios = 0;
                for (var j = 0; j < totalmun; j++)
                {
                    parametrosm = selectMunicipios.options[j].value;
                    idestado = selectMunicipios.options[j].id;
                    id_delegacion = selectMunicipios.options[j].getAttribute("id_delegacion");
                    parametrosM1 += '{"id_municipio":"' + parametrosm + '", "id_estado":"' + idestado + '", "id_delegacion":"' + id_delegacion + '", "id_proyecto":"' + id_proyecto + '"},';
                    contMunicipios++;
//                    alert(idestado);
                }

                parametrosM1 = parametrosM1.substring(0, parametrosM1.length - 1);
                parametrosM1 += "];";
                if (contMunicipios == 0) {
                    parametrosM1 = 0;

                }






//                var contMunicipioskm = 0;
//                var kmDelegacion = "";
//                kmDelegacion += "[";
//                $("#kimoletrosDelegacion input:text").each(function(index) {
//                    kmDelegacion += '{id_delegacion:' + $(this).attr("id_delegacion") + ',idDelegacion:' + $(this).attr("id") + ', kmDelegacion:' + $(this).val() + '},';
//
////                                                kmDelegacion += '{idDelegacion:' + $(this).attr("id") + ',kmDelegacion:' + $(this).val() + '},';
//
//                    contMunicipioskm++;
//                });
//                kmDelegacion = kmDelegacion.substring(0, kmDelegacion.length - 1);
//                kmDelegacion += "];";
//                if (contMunicipioskm === 0) {
//                    kmDelegacion = "";
//
//                }
////                    
//alert(kmDelegacion);
                validaText = verificarCamposProyectoText();
                //                validaSelect = verificarCamposCapturadosSelectProyecto();
                //                alert(validaSelect+" -- "+validaText);

                if (validaText) {


//                    camposBien = validarCamposProyecto();
//
//                    if (camposBien) {
                    //
                    //                        var json = datosEstadosDinamicos2();
                    //                        var json2 = datosEstadosDinamicosNuevos();

                    //                        alert(json +"modificar")
                    //                        alert(json2 +"insertar")

                    $.post("../../Proyecto/controller/controllerModificarProyecto.php", {
                        id_proyecto: id_proyecto,
                        nombre: $("#txtNombreProyecto").val(),
                        fe_inicio: $("#fe_inicio").val(),
                        fe_terminacion: $("#fe_terminacion").val(),
                        estatusp: $("#estatusp").val(),
                        fecha_inicio_real: $("#fecha_inicio_real").val(),
                        fecha_fin_real: $("#fecha_fin_real").val(),
                        contFunction: contFunction,
                        contEstados: contEstados,
                        contMunicipios: contMunicipios,
                        parametrosE1: eval(parametrosE1),
                        parametrosM1: eval(parametrosM1),
                        valoresFunction: eval(valoresFunction)

//                            kmDelegacion: eval(kmDelegacion),

                    }, function(data) {


                        $(function() {
                            $("#ventanAlertas").html(data);
                            $("#ventanAlertas").attr('style', 'visible');
                            $("#ventanAlertas").dialog({
                                modal: true,
                                title: 'Proyecto',
                                show: 'explode',
                                hide: 'explode',
                                buttons: {
                                    Aceptar: function() {

                                        $(this).dialog("close");
                                        $("#tabla_Admin_Proyectos").trigger("reloadGrid");

                                    }
                                }
                            });
                        });
                    });


//                    } else {
//                        $(function() {
//                            $("#ventanAlertas").html("Formatos no validos");
//                            $("#ventanAlertas").attr('style', 'visible');
//                            $("#ventanAlertas").dialog({
//                                modal: true,
//                                title: 'Conductor',
//                                show: 'explode',
//                                hide: 'explode',
//                                buttons: {
//                                    Aceptar: function() {
//
//                                        $(this).dialog("close");
//
//
//                                    }
//                                }
//                            });
//                        });
//                    }
                } else {

                    $(function() {
                        $("#ventanAlertas").html("Faltan campos por capturar");
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
                }
            }

        });

        //fin botn agregar conductor


        //inicio cancelar agregar conductor

        $("#btnCancelarProyecto").bind({
            click: function() {
                $("#panelCenter_2_1").html("");
            }
        });

        //fin cancelar agregar conductor

    });
}
//funcion para modificar estados y municipios al proyecto
function mostrarEstadosAsignados(id_proyecto) {

    $.post("../../Proyecto/controller/controllerMostrarEstados.php", {}, function(data) {

        $("#modificarEstados").html(data);
    });

    $.post("../../Proyecto/controller/controllerMostrarEstadosAsignados.php", {
        id_proyecto: id_proyecto
    },
    function(data) {
        $("#estados_asignadosModificados").html(data);

        $("#btn_derechoEst").on({
            'click': function()
            {
                $("#modificarEstados option:selected").appendTo("#estados_asignadosModificados");
                mostrarMunicipiosAsignados(id_proyecto);
            }
        });
        $("#btn_izquierdoEst").on({
            'click': function()
            {
                $("#estados_asignadosModificados option:selected").appendTo("#modificarEstados");
                var estadosmod = $("#modificarEstados option:selected").val();
                $("#municipiosPro").find("option[id=" + estadosmod + "]").remove();
                $("#municipios_asignadosMod").find("option[id=" + estadosmod + "]").remove();
//                        $("#municipios_asignadoskm").find("option[id="+ estadosmod+"]").remove();
            }
        });
    });

}
function mostrarMunicipiosAsignados(id_proyecto) {
    $("#estados_asignadosModificados").on({
        click: function()
        {
            var id_estado = $(this).val();
            //
            $.post("../../Proyecto/controller/controllerMostrarMunicipios.php", {
                id_estado: id_estado
            }, function(data) {
                $("#municipiosPro").html(data);

            });
        }
    });
    $.post("../../Proyecto/controller/controllerMostrarMunicipiosAsignados.php", {
        id_proyecto: id_proyecto
    }, function(data) {

        $("#btn_derechoMun").on({
            'click': function()
            {
                $("#municipiosPro option:selected").appendTo("#municipios_asignadosMod");

            }
        });
        $("#btn_izquierdoMun").on({
            'click': function()
            {
                $("#municipios_asignadosMod option:selected").appendTo("#municipiosPro");
            }
        });

        $("#municipios_asignadosMod").html(data);
        $("#btn_derechoMun").on({
            'click': function()
            {
                $("#municipiosPro option:selected").appendTo("#municipios_asignadosMod");
            }
        });
        $("#btn_izquierdoMun").on({
            'click': function()
            {
                //                            alert("mariquita");
                $("#municipios_asignadosMod option:selected").appendTo("#municipiosPro");
            }
        });

    });
}

function mostrarFunctionClass(id_proyecto) {

    $.post("../../Proyecto/controller/controllerMostrarFunctionClass.php", {
        id_proyecto: id_proyecto
    }, function(data) {

        $("#mostrarfunction_class").html(data);
        //        alert(data);
    });


}
//igual que la siguiente soloq ue por tiempo le agreue 2
function datosEstadosDinamicos() {


    var valoresText = new Array();
    var valoresSelect = new Array();

    var json = "["

    $("#estadosDiv input:text").each(function(index) {

        valoresText[index] = $(this).val();


    });

    $("#estadosDiv select").each(function(index) {

        valoresSelect[index] = $(this).val();


    });


    var i;
    for (i = 0; i < valoresSelect.length; i++) {





        //             json +="{'estado':'"+valoresSelect[i]+"','municipio':'"+valoresText[i]+"'},";
        json += '{"estado":"' + valoresSelect[i] + '","municipio":"' + valoresText[i] + '"},';
    }

    json = json.substring(0, json.length - 1);

    // alert ¡hola mundo
    json += "];";


    return json;

}
//se puede hacer igual que la pasada poniendo el mismo id de div en la vista
function datosEstadosDinamicos2() {


    var valoresText = new Array();
    var valoresSelect = new Array();
    var caloresOcultos = new Array();

    var json = "["

    $("#estadosDivDinamico input:text").each(function(index) {

        valoresText[index] = $(this).val();


    });

    $("#estadosDivDinamico select").each(function(index) {

        valoresSelect[index] = $(this).val();


    });

    $("#estadosDivDinamico input:hidden").each(function(index) {

        caloresOcultos[index] = $(this).val();


    });


    var i;
    for (i = 0; i < valoresSelect.length; i++) {





        //             json +="{'estado':'"+valoresSelect[i]+"','municipio':'"+valoresText[i]+"'},";
        json += '{"estado":"' + valoresSelect[i] + '","municipio":"' + valoresText[i] + '","idProyectoHas":"' + caloresOcultos[i] + '"},';
    }

    json = json.substring(0, json.length - 1);

    // alert ¡hola mundo
    json += "];";


    return json;

}


function datosEstadosDinamicosNuevos() {


    var valoresText = new Array();
    var valoresSelect = new Array();

    var json = "["

    $("#pruebaHidden input:text").each(function(index) {

        valoresText[index] = $(this).val();


    });

    $("#pruebaHidden select").each(function(index) {

        valoresSelect[index] = $(this).val();


    });


    var i;
    for (i = 0; i < valoresSelect.length; i++) {





        //             json +="{'estado':'"+valoresSelect[i]+"','municipio':'"+valoresText[i]+"'},";
        json += '{"estado":"' + valoresSelect[i] + '","municipio":"' + valoresText[i] + '"},';
    }




    if (json == "[") {


    } else {

        json = json.substring(0, json.length - 1);

    }


    // alert ¡hola mundo
    json += "];";


    return json;

}

// funcion para los condcutores en el proyecto elegido
function codnuctoresProyecto(data, id_proyecto, nombrep) {
    var id_conductor;
    var nombre;
    var municipio;
    var estatus;
    var estatusr;
    var mydata;
    var id_conductor_Asignado_aproyecto;
    var id_con_proyecto;
    //    var area_levantamiento, conductor_id_conductor, vehiculo_id_vehiculo, telefono_id_telefono, id_con_proyecto;
    //    var estaus_proyecto;
    var seleccion;
    var id_delegacion;
    //    var km_ruteador;
    //    var km_lineales;
    //    var id_suplente;

    $("#titulo_proyecto").html("Proyecto: " + nombrep);

    $("#atras_proyectos").on({
        click: function() {
            $('#panelCenter_1_1').html("");
            $('#panelLeft_2_1').html("");
            cargarProyectos(1);
        }
    })
//   $("#panelCenter_1_1").css("height","-=30");

//        $.post('../../Proyecto/controller/controllerConductoresProyecto.php',
//        {
//            opcion: "listar",
//            id_proyecto: id_proyecto
//        },function(data)
//        {
//            mydata=eval(data);
//            alert(mydata);
//        });


    var listconductores;

    var listdelegaciones;

    $.post('../../Proyecto/controller/controllerMostrarListaConductoresYDelegaciones.php',
            {id_proyecto: id_proyecto, opcion: 1}, function(data1) {
        listconductores = data1;
        $.post('../../Proyecto/controller/controllerMostrarListaConductoresYDelegaciones.php',
                {id_proyecto: id_proyecto, opcion: 2}, function(data2) {
            listdelegaciones = data2;

            $("#tabla_Admin_ProyectosConductor").jqGrid({
                url: '../../Proyecto/controller/controllerConductoresProyecto.php',
                postData: {
                    opcion: "listar",
                    id_proyecto: id_proyecto
                },
//        datatype: "local",
//	data: mydata,
                datatype: 'json',
                height: 200,
                colNames: ['id_conductor', 'Nombre', 'Municipio', 'Estatus', 'En campo', 'id_conductor_Asignado_aproyecto', 'id_conductor_in_proyecto', 'id_delegacion'],
                colModel: [
                    {
                        display: 'id_conductor',
                        name: 'id_conductor',
                        width: 10,
                        sortable: true,
                        hidden: true


                    },
                    {
                        display: 'Nombre',
                        name: 'Nombre',
                        width: 15,
                        sortable: true,
                        align: 'right',
                        search: true,
//                stype: 'text',
//                index:'Nombre', 

                        stype: 'select',
//                searchrules: {
//                    required: true
//                },
                        searchoptions: {value: listconductores}

                    },
                    {
                        display: 'Municipio',
                        name: 'Municipio',
                        width: 10,
                        sortable: true,
                        align: 'right',
                        stype: "select",
                        searchoptions: {value: listdelegaciones}

                    },
                    {
                        display: 'Estatus',
                        name: 'Estatus',
                        width: 10,
                        sortable: true,
                        align: 'right',
                        hidden: true
                    },
                    {
                        display: 'Estatusr',
                        name: 'Estatusr',
                        width: 10,
                        sortable: true,
                        align: 'right',
                        stype: 'select',
                        searchoptions: {value: '1:Todos; 2:Activo; 3:Terminado'}
                    },
                    {
                        display: 'id_conductor_Asignado_aproyecto',
                        name: 'id_conductor_Asignado_aproyecto',
                        width: 15,
                        sortable: true,
                        align: 'right',
                        hidden: true

                                //  hidden:true
                    },
                    {
                        display: 'id_conductor_in_proyecto',
                        name: 'id_conductor_in_proyecto',
                        width: 15,
                        sortable: true,
                        align: 'right',
                        hidden: true

                                //  hidden:true
                    },
                    {
                        display: 'id_delegacion',
                        name: 'id_delegacion',
                        width: 15,
                        sortable: true,
                        align: 'right',
                        hidden: true

                                //  hidden:true
                    }
                    //            }
                ],
                rowNum: 7,
                //donde aparecen los iconos
                pager: '#pager3',
                //la principal
                sortname: 'id_conductor',
                viewrecords: true,
                sortorder: "asc",
                emptyrecords: "No existen registros",
                autoheight: true,
                autowidth: true,
                scrollOffset: 22,
                //alterna las filas con colores diferentes


                onSelectRow: function(id) {
                    seleccion = true;



                    $('#panelLeft_2_1').html("");

                    $('#panelCenter_2_1').html("");
                    id_conductor = $(this).jqGrid('getCell', id, 0);
                    nombre = $(this).jqGrid('getCell', id, 1);
                    municipio = $(this).jqGrid('getCell', id, 2);

                    estatus = $(this).jqGrid('getCell', id, 3);

                    id_conductor_Asignado_aproyecto = $(this).jqGrid('getCell', id, 5);
                    id_con_proyecto = $(this).jqGrid('getCell', id, 6);
                    id_delegacion = $(this).jqGrid('getCell', id, 7);

                    $('#panelCenter_2_1').html("");
                    cargarGridBitacoras(id_delegacion, id_con_proyecto, id_conductor, id_proyecto, nombre, "fechaMes");
                }


            })
            $("#tabla_Admin_ProyectosConductor").jqGrid('navGrid', '#pager3',
                    {view: false, del: false, refresh: false, add: false, edit: false, search: false},
            {}, //opciones edit
                    {}, //opciones add
                    {}, //opciones del
                    {multipleSearch: false, closeAfterSearch: true, closeOnEscape: true}//opciones search
            ).jqGrid("filterToolbar");
////                for(var i=0;i<=mydata.length;i++)
//				$("#tabla_Admin_ProyectosConductor").jqGrid('addRowData',i+1,mydata[i]);
//			$("#tabla_Admin_ProyectosConductor").trigger("reloadGrid");

//    $("#tabla_Admin_ProyectosConductor").jqGrid('navGrid', '#pager3', {
//        edit: false,
//        add: false,
//        search: false,
//        del: false,
//        refresh: false,
//        view: false
//    });


            //    $("#tabla_Admin_ProyectosConductor").jqGrid('navButtonAdd', '#pager3', {
            //        caption: "<img src=/SeguimientoTrue/trunk/interfaz/view/images/Iconos_jqgrid/add_conductor.png width='21' height='21'/>",
            //        buttonicon: "ui-icon-vacio",
            //        cursor: "pointer",
            //        title: "Asignar Conductor a proyecto",
            //        //        id:"NuevoUsu",
            //        onClickButton: function() {
            //            $('#panelLeft_2_1').html("");
            //            $("#titulo_pagina_3").val("Bitacoras");
            //            //               $("#tabla_Admin_ProyectosConductor").trigger("reloadGrid");  
            //            asignarConductorAProyecto(id_proyecto);
            //        }
            //    });



            //-- inicio modificar dats conductor en el proyecto
            //    $("#tabla_Admin_ProyectosConductor").jqGrid('navButtonAdd', '#pager3', {
            //        caption: "<img src=/SeguimientoTrue/trunk/interfaz/view/images/Iconos_jqgrid/editar_con.png width='21' height='21'/>",
            //        buttonicon: "ui-icon-vacio",
            //        cursor: "pointer",
            //        title: "Modificar datos Conductor en Proyecto",
            //        onClickButton: function() {
            //
            //            if (seleccion) {
            //
            //
            //                if (id_suplente) {
            //
            //
            //                    $(function() {
            //                        $("#ventanAlertas").html("El suplente no puede ser modificado");
            //                        $("#ventanAlertas").attr('style', 'visible');
            //                        $("#ventanAlertas").dialog({
            //                            modal: true,
            //                            title: 'Conductor',
            //                            show: 'explode',
            //                            hide: 'explode',
            //                            buttons: {
            //                                Aceptar: function() {
            //
            //                                    $(this).dialog("close");
            //
            //
            //                                }
            //                            }
            //                        });
            //                    });
            //                    $('#panelCenter_2_1').html("");
            //                } else {
            //
            //
            //                    $('#panelLeft_2_1').html("");
            //                    $("#titulo_pagina_3").val("Bitacoras");
            //                    ModificarConductoresProyecto(nombre, id_con_proyecto, id_proyecto, vehiculo_id_vehiculo, telefono_id_telefono, id_conductor, area_levantamiento, function_class, km_ruteador, km_lineales, tipo_cond, id_nokia, id_sim);
            //
            //                    //modificarDatosProyecto(id_proyecto,nombre,tiempo_estimado,num_conductores,num_vehiculos);
            //
            //                }
            //
            //                seleccion = false;
            //            } else {
            //
            //                $(function() {
            //                    $("#ventanAlertas").html("Elija un conductor");
            //                    $("#ventanAlertas").attr('style', 'visible');
            //                    $("#ventanAlertas").dialog({
            //                        //tru para que no interactue con otro elementos minestas se encuentra la ventana
            //                        modal: false,
            //                        title: 'Conductor',
            //                        show: 'explode',
            //                        hide: 'explode',
            //                        buttons: {
            //                            Aceptar: function() {
            //
            //                                $(this).dialog("close");
            //
            //
            //                            }
            //                        }
            //                    });
            //                });
            //
            //            }
            //        }
            //    });

            /*   $("#tabla_Admin_ProyectosConductor").jqGrid('navButtonAdd', '#pager3', {
             //  caption: "<img src=/interfaz/view/images/Iconos_jqgrid/bitacorac.png width='21' height='21' />",
             buttonicon: "ui-icon-vacio",
             cursor: "pointer",
             title: "Bitacoras conductor",
             //        id:"NuevoUsu",
             onClickButton: function() {
             
             if (seleccion) {
             //
             //                if (id_suplente) {
             //
             //
             //                    cargarGridBitacorasSuplente(id_con_proyecto, id_conductor, id_proyecto, nombre, "fechaMes", id_suplente);
             //                    $('#panelCenter_2_1').html("");
             //                } else {
             //alert(id_delegacion);
             $('#panelCenter_2_1').html("");
             cargarGridBitacoras(id_delegacion, id_con_proyecto, id_conductor, id_proyecto, nombre, "fechaMes");
             
             //                }
             
             
             //seleccion = false;
             } else {
             
             $(function() {
             $("#ventanAlertas").html("Elija un conductor");
             $("#ventanAlertas").attr('style', 'visible');
             $("#ventanAlertas").dialog({
             //tru para que no interactue con otro elementos minestas se encuentra la ventana
             modal: false,
             title: 'Conductor',
             show: 'explode',
             hide: 'explode',
             buttons: {
             Aceptar: function() {
             
             $(this).dialog("close");
             $("#tabla_Admin_Conductores").trigger("reloadGrid");
             
             }
             }
             });
             });
             
             }
             
             }
             });
             */
            $("#tabla_Admin_ProyectosConductor").jqGrid('navButtonAdd', '#pager3', {
                caption: "<img src=/interfaz/view/images/Iconos_jqgrid/reporte.png />",
                buttonicon: "ui-icon-vacio",
                cursor: "pointer",
                title: "Reporte individual",
                onClickButton: function() {

                    if (seleccion) {


                        //                if (id_suplente) {
                        //
                        //                    reporteIndividualSuplente(id_con_proyecto, id_suplente);
                        //                    //                      $('#panelCenter_2_1').html("");
                        //                } else {
                        $('#panelLeft_2_1').html("");
                        $('#titulo_pagina_3').val("");
                        reporteIndividual(id_con_proyecto, id_delegacion);
                        //                }

                        //seleccion = false;
                    } else {

                        $(function() {
                            $("#ventanAlertas").html("Elija un conductor");
                            $("#ventanAlertas").attr('style', 'visible');
                            $("#ventanAlertas").dialog({
                                //tru para que no interactue con otro elementos minestas se encuentra la ventana
                                modal: false,
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

                    }
                }
            });


        });
    });
// inicio comodin
//    $("#tabla_Admin_ProyectosConductor").jqGrid('navButtonAdd', '#pager3', {
//        caption: "<img src=/SeguimientoTrue/trunk/interfaz/view/images/Iconos_jqgrid/sup_proyecto.png />",
//        buttonicon: "ui-icon-vacio",
//        title: "Asignar Conductor a proyecto",
//        //        id:"NuevoUsu",
//        onClickButton: function() {
//            $('#panelLeft_2_1').html("");
//            $("#titulo_pagina_3").val("Bitacoras");
//            //               $("#tabla_Admin_ProyectosConductor").trigger("reloadGrid");  
//
//            if (id_suplente) {
//
//                //                alert("termino suplente se cambia tabla de suplente y conductor disponibilidad");
//                terminarConductorProyectoSuplente(estaus_proyecto, id_con_proyecto, id_conductor, id_suplente);
//            } else {
//
//                terminarConductorProyecto(estaus_proyecto, id_con_proyecto, id_conductor, vehiculo_id_vehiculo, telefono_id_telefono);
//
//            }
//
//
//        }
//    });
// fin 


}
//
//function asignarConductorAProyecto(id_proyecto) {
//
//    $('#panelCenter_2_1').html("<br><div id='formAsignarConductor'   style='width: 50%; margin: 0 auto;' position:abosulte >  \n\
//                        <fieldset>  <legend>Captura datos del proyecto</legend>   <div id='contenido' align='center'> <tr><td><label> \n\
//                    Conductores:&nbsp; </label><select id='AddConductores' style='width: 296px; height: 21px; font-size: 12px'> </select> \n\
//                     </td></tr><br><br><tr> <td><label> Vehiculos:&nbsp; </label><select id='AddVehiculos' style='width: 312px; height: 21px; font-size: 12px'>  </select></td></tr><br><br> <tr> <td> <label>Telefonos:&nbsp;&nbsp;</label>\n\
//                                <select id='AddTelefonos' style='width: 310px; height: 21px; font-size: 12px'>\n\
//                                </select></td></tr><br><br>\n\
//                        <tr><td> <label>Lugar Levantamiento:&nbsp;</label>\n\
//                                <input type='text' size='36%' id='txtLugarLevantamiento' name='LugarLevantamiento' class='ui-corner-bottom ui-corner-top'/>\n\
//                            </td></tr><br><br><tr><td> <label>Kilometro ruteador:</label>\n\
//                                <input type='text' size='8%' id='km_ruteador' name='kmruteador' class='ui-corner-bottom ui-corner-top'/> </td>\n\
//                                &nbsp;<td> <label>Kilometro lineal:</label>\n\
//                                <input type='text' size='8%' id='km_lineales' value=0 name='kmlineales' class='ui-corner-bottom ui-corner-top'/></td></tr><br><br><tr><td><label>Function class:</label>\n\
//                                <select id='function_class' style='width: 280px; height: 21px; font-size: 12px'>\n\
//                                    <option value='FC-1'>FC-1</option>\n\
//                                    <option value='FC-2'>FC-2</option>\n\
//                                    <option value='FC-3'>FC-3</option>\n\
//                                    <option value='FC-4'>FC-4</option>\n\
//                                    <option value='FC-5'>FC-5</option>\n\
//                                </select><br><br></td></tr>\n\
//                        <tr><td><label>Tipo Conductor:</label>\n\
//                                <select id='TipoConductor' style='width: 280px; height: 21px; font-size: 12px'>\n\
//                                   <option value='Completo'>Completo</option>\n\
//                                       <option value='Parcial'>Parcial</option>\n\
//                                                                    </select><br><br></td></tr> <tr><td><input type='button' value='Aceptar' id='btnGuardar' name='btnGuardar' class='ui-state-default ui-corner-bottom ui-corner-top' style='font-family: Georgia,'Times New Roman',times,serif; font-size: 12px ' ></td></tr>\n\
//                               <tr><td><input type='button' value='Cancelar' id='btnCancelar' name='btnCancelar' class='ui-state-default ui-corner-bottom ui-corner-top' style='font-family: Georgia,'Times New Roman',times,serif; font-size: 12px ' ></td></tr></fieldset></div>");
//
//
//
//
//    $("#btnGuardar").bind({
//        click: function() {
//            $.post("../../Proyecto/controller/controllerInsertarConductoraProyecto.php", {
//                proyecto_id_proyecto: id_proyecto,
//                vehiculo_id_vehiculo: $("#AddVehiculos").val(),
//                telefono_id_telefono: $("#AddTelefonos").val(),
//                conductor_id_conductor: $("#AddConductores").val(),
//                lugar: $("#txtLugarLevantamiento").val(),
//                km_ruteador: $("#km_ruteador").val(),
//                km_lineales: $("#km_lineales").val(),
//                estatus: 0,
//                function_class: $("#function_class").val(),
//                tipo_conductor: $("#TipoConductor").val(),
//                insertar: "insertar"
//            }, function(data) {
//
//                $(function() {
//                    $("#ventanAlertas").html(data);
//                    $("#ventanAlertas").attr('style', 'visible');
//                    $("#ventanAlertas").dialog({
//                        modal: true,
//                        title: 'Conductor',
//                        show: 'explode',
//                        hide: 'explode',
//                        buttons: {
//                            Aceptar: function() {
//
//                                $(this).dialog("close");
//                                $("#tabla_Admin_ProyectosConductor").trigger("reloadGrid");
//                            }
//                        }
//                    });
//                });
//
//
//            });
//
//
//
//        }
//
//    });
//    $("#btnCancelar").bind({
//        click: function() {
//            $("#panelCenter_2_1").html("");
//        }
//
//    });
//    $.post("../../Proyecto/controller/controllerInsertarConductoraProyecto.php", {
//        conductor: 'conductores'
//    }, function(data) {
//        var arreglo = new Array();
//        arreglo = eval(data);
//
//        for (i = 0; i < arreglo.length; i++) {
//            $('#AddConductores').append('<option value="' + arreglo[i].id_conductor + '" >' + arreglo[i].nombre + ' ' + arreglo[i].apellidos + '</option>');
//        }
//
//    });
//
//    addvehiculos();
//}


//function addvehiculos()
//{
//    var i;
//    var arreglo = new Array();
//    $.post("../../Proyecto/controller/controllerInsertarConductoraProyecto.php", {
//        vehiculos: 'vehiculos'
//    }, function(data) {
//        arreglo = eval(data);
//        for (i = 0; i < arreglo.length; i++) {
//            $('#AddVehiculos').append('<option value="' + arreglo[i].id_vehiculo + '" >' + arreglo[i].id_nokia + ' </option>');
//        }
//    });
//    addtelefonos();
//}
//function addtelefonos()
//{
//    var i;
//    var arreglo1 = new Array();
//    $.post("../../Proyecto/controller/controllerInsertarConductoraProyecto.php", {
//        telefono: 'telefonos'
//    }, function(data1) {
//
//        arreglo1 = eval(data1);
//        for (i = 0; i < arreglo1.length; i++) {
//            $('#AddTelefonos').append('<option value="' + arreglo1[i].id_telefono + '" >' + arreglo1[i].identificador + '</option>');
//        }
//    });
//}
function mostrarfunctionclass(id_proyecto)
{

}

function myAccentRemovement(s) {
    // the s parameter is always string
    s = s.replace(/[àáâãäå]/gi, 'a');
    s = s.replace(/[èéêë]/gi, 'e');
    s = s.replace(/[ìíîï]/gi, 'i');
    s = s.replace(/[òóôõöø]/gi, 'o');
    s = s.replace(/[ùúûü]/gi, 'u');
    s = s.replace(/[ýÿ]/gi, 'y');
    s = s.replace(/æ/gi, 'ae');
    s = s.replace(/œ/gi, 'oe');
    s = s.replace(/ç/gi, 'c');
    s = s.replace(/š/gi, 's');
    s = s.replace(/ñ/gi, 'n');
    s = s.replace(/ž/gi, 'z');
    return s;
}


//function cambiarcolor(){
//    alert("marica");
//    
//    $("#kmAsignadosDelegacion").each(function(index) {
//                        alert($(this).val());
//                    });
//}


function Proyectosreportes(opcion1) {
    if ($("#panelCenter_2_1").height() == 300)

    {
        $("#panelCenter_2_1").css("height", "-=300");
        $("#panelCenter_1_1").css("height", "+=290");
    }
    var seleccion = false;
    var id_proyecto;
    var nombre;
    var fe_inicio;
    var fe_terminacion;
    var estatusp;
    var fecha_inicio_real;
    var fecha_fin_real;
    //    var estatus;
    if ($("#panelCenter_1_1").height() !== 300)

    {
        $("#panelCenter_1_1").css("height", "+=300");
        $("#panelCenter_2_1").css("height", "-=290");
    }
    $('#panelCenter_1_1').load('../../Proyecto/view/viewGridProyectos.php', {}, function(data) {


        //                               $.post("../../Proyecto/controller/controllerProyectos.php",{opcion:'mostrar'},function (data){
        //                                  
        //                                  
        //                                  alert(data);
        //                              })

        $("#tabla_Admin_Proyectos").jqGrid({
            url: '../../Proyecto/controller/controllerProyectos.php',
            postData: {
                opcion: "listar",
                opcion1: opcion1
            },
            datatype: 'json',
            height: 250,
            colNames: ['id_proyecto', 'Nombre', 'Fecha inicial', 'Fecha estimada de terminacion', 'fecha_inicio_real', 'fecha_fin_real', 'estatus_terminacion', "Estatus"],
            colModel: [
                {
                    display: 'id_proyecto',
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
                            //            editable:true,
                            //            edittype:'text',
                            //            editoptions: {size:10, maxlength: 15}
                    ,
                    search: true,
                    stype: 'text',
                    searchrules: {
                        required: true
                    }
                    //            searchoptions: {
                    //                sopt: ['eq', 'ne']
                    //            }


                },
                {
                    display: 'fe_inicio',
                    name: 'fe_inicio',
                    width: 30,
                    sortable: true,
                    align: 'right'
                            //  hidden:true
                },
                {
                    display: 'fe_terminacion',
                    name: 'fe_terminacion',
                    width: 30,
                    sortable: true,
                    align: 'right'
                            //  hidden:true
                },
                {
                    display: 'fecha_inicio_real',
                    name: 'fecha_inicio_real',
                    hidden: true,
                    width: 10,
                    sortable: true,
                    align: 'right'
                },
                {
                    display: 'fecha_fin_real',
                    name: 'fecha_fin_real',
                    hidden: true,
                    width: 10,
                    sortable: true,
                    align: 'right'
                },
                {
                    display: 'estatus_terminacion',
                    name: 'estatus_terminacion',
                    hidden: true,
                    width: 10,
                    sortable: true,
                    align: 'right'
                },
                {
                    display: 'Estatus',
                    name: 'Estatus',
                    width: 10,
                    sortable: true,
                    align: 'right'
                }
            ],
            rowNum: 10,
            pager: '#pager2',
            sortname: 'id_proyecto',
            viewrecords: true,
            sortorder: "asc",
            emptyrecords: "No existen registros",
            autoheight: true,
            autowidth: true,
            scrollOffset: 22,
            onSelectRow: function(id) {
                seleccion = true;

                id_proyecto = $(this).jqGrid('getCell', id, 0);
                nombre = $(this).jqGrid('getCell', id, 1);
                fe_inicio = $(this).jqGrid('getCell', id, 2);
                fe_terminacion = $(this).jqGrid('getCell', id, 3);
                fecha_inicio_real = $(this).jqGrid('getCell', id, 4);
                fecha_fin_real = $(this).jqGrid('getCell', id, 5);
                estatusp = $(this).jqGrid('getCell', id, 6);
                $("#panelCenter_2_1").html("");
                $('#panelLeft_2_1').html("");
                $('#titulo_pagina_3').val("");
//                armarproyecto(id_proyecto);
                $('#titulo_pagina_2').val(nombre);

                MostrarReporte(id_proyecto);
            }


        });
        $("#tabla_Admin_Proyectos").jqGrid('navGrid', '#pager2', {
            edit: false,
            add: false,
            search: false,
            del: false,
            refresh: false,
            view: false
        });


//mostrar reporte conductor
        $("#tabla_Admin_Proyectos").jqGrid('navButtonAdd', '#pager2', {
            caption: "<img src=/interfaz/view/images/Iconos_jqgrid/conduc.jpg width='18' height='20'/>",
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
                                    $("#tabla_Admin_Telefonos").trigger("reloadGrid");

                                }
                            }
                        });
                    });

                }

            }
        });
        //fin mostrar reporte


        //mostrar reportes del Conductor
        $("#tabla_Admin_Proyectos").jqGrid('navButtonAdd', '#pager2', {
            caption: "<img src=/interfaz/view/images/Iconos_jqgrid/mapadelegaciones.png width='18' height='22'/>",
            buttonicon: "ui-icon-vacio",
            cursor: "pointer",
            title: "Mostrar delegación",
            //        id:"NuevoUsu",
            onClickButton: function() {
                if (seleccion) {
                    $('#panelLeft_2_1').html("");
                    $('#titulo_pagina_3').val("");
                    MostrarDelegacionReporte(id_proyecto);

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
                                    $("#tabla_Admin_Telefonos").trigger("reloadGrid");

                                }
                            }
                        });
                    });

                }

            }
        });


    });



}

function listadeconductores(id_proyecto)
{
    var listaconductores = '';
    $.post('../../Proyecto/controller/controllerMostrarListaConductoresYDelegaciones.php',
            {id_proyecto: id_proyecto, opcion: 1}, function(data1) {
//  alert(data1);
        listaconductores = "'" + data1 + "'";
        retornarresultado(listaconductores, 2);
    });

}

function listadedelegaciones(id_proyecto)
{
    var listadelegaciones = '';
    $.post('../../Proyecto/controller/controllerMostrarListaConductoresYDelegaciones.php',
            {id_proyecto: id_proyecto, opcion: 2}, function(data2) {
        listadelegaciones = "'" + data2 + "'";
        return listadelegaciones;
    });
}

function retornarresultado(resultado, valor)
{
    if (resultado !== 0)
    {
        var resultado1;


        if (valor === 2)
        {
            resultado1 = resultado;

        }
        else if (valor === 1)
        {
            alert(resultado1);
            return resultado1;
        }
    }
}