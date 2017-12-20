


function funcionesBitacora(nombre, id_conductor_en_proyecto) {

    //alert(id_conductor_en_proyecto+"ddd"+nombre);
    var num = 1;
    var numero;
    var i;
    var camposCapturadostext = false;
    var camposLlenosSelect = false;
    var camposLlenosArea = false;
    //        $("#nombreBitacora").html("Bitacora de : "+nombre);

    abrirCerrarPanel(false, "Bitacora de: " + nombre);

    //$("#tabla_Admin_Proyectos").setGridWidth($("#tabla_Admin_Proyectos").width()/2, false);
    //  $("#tabla_Admin_Proyectos").trigger("reloadGrid");  
    $('#panellRight_1_1').load('../../Bitacora/view/viewCapturaBitacora.php', {}, function(data) {


        datePickerFuncion("#datepicker");


        $("#agregarActividad").bind({
            click: function() {

                for (i = 0.75; i <= 24.75; i++) {
                    i = i + 0.25 - 1;
                    numero += "<option value=" + i + ">" + i.toFixed(2) + "</option>";
                }


                num += 1;

                $("#frmActividades").append("<div id='nuevaActividad" + num + "'> <fieldset><legend>Datos Actividad " + num + "</legend> <table border='0' align='center' > <tr>  <TD>Fecha</TD>\n\
<td>Inicio</td> <td>Fin</td> <TD>Actividad</TD>  </tr> <TR></div>  <TD>  <p> <input type='text' id='datepicker" + num + "'></p>   </TD>              <TD> <SELECT name='inicio' id='hr_inicio_s" + num + "'  style=' width:100px'>      \n\
 <OPTION VALUE='00'> --Hora Inicio-- </OPTION>" + numero + " </SELECT> </TD> <TD> <SELECT name='fin' id='hr_fin_s" + num + "' style=' width:100px'> <OPTION VALUE='00'> --Hora Fin-- </OPTION>" + numero + " </SELECT> </TD><TD>\n\
<SELECT name='actividad' id='actividad_Bitacora" + num + "' > <OPTION VALUE='00'> --Actividad-- </OPTION> <OPTION VALUE='FDC Prep'>FDC Prep</OPTION> <OPTION VALUE='FDC'>FDC</OPTION> <OPTION VALUE='DT equipment'>DT equipment</OPTION>\n\
<OPTION VALUE='DT Wheather'>DT Wheather</OPTION><OPTION VALUE='Travel & Commute'>Travel & Commute</OPTION> <OPTION VALUE='DT Other'>DT Other</OPTION><OPTION VALUE='Training'>Training</OPTION>\n\
 </SELECT></TD> </TR></table><table align='center'>  <tr> <td>Comentario: <br><textarea id='comentarioBitacora" + num + "' name='comentarios' rows='1' cols='80' ></textarea></td> </tr></table>\n\
 </fieldset></div>");
                datePickerFuncion("#datepicker" + num);
            }

        });


        $("input:text").on({
            focusout: function() {

                quitarClaseTxtR($(this).attr('id'));
            },
            focusin: function() {

                agregarClaseTxtR($(this).attr('id'));
            }

        });

        $("select").on({
            blur: function() {

                quitarClaseTxtR($(this).attr('id'));

            },
            focus: function() {

                agregarClaseTxtR($(this).attr('id'));

            }

        });

        $("textarea").on({
            blur: function() {

                quitarClaseTxtR($(this).attr('id'));

            },
            focus: function() {

                agregarClaseTxtR($(this).attr('id'));

            }

        });
        $("#quitarActividad").bind({
            click: function() {

                $("#nuevaActividad" + num).remove();

                num -= 1;

                if (num > 1) {


                } else {

                    num = 1;

                }
            }

        });

        $("#btnGuardarBitacora").bind({
            click: function() {

                camposCapturadostext = verificarCamposCapturadosTextBitacora();
                camposLlenosSelect = verificarCamposCapturadosSelectBitacora();
                camposLlenosArea = verificarCamposCapturadosTextAreaBitacora();
                capturarDatosDinamicosBitacora();


            }

        });

        $("#btnCancelarBitacora").bind({
            click: function() {

                $("#panellRight_1_1").html("");

                //saber comoe sta el panel
                //                var isDisabled = $( "#panellRight_1" ).panel( "option", "collapsed" );


                abrirCerrarPanel(true, "Bitacora");

            }

        });

    });


}

function datePickerFuncion(campo) {

    $(function() {

        var dates = $(campo).datepicker({
            changeMonth: true,
            dateFormat: 'yy-mm-dd',
            showAnim: 'slideDown',
            changeMonth: true, //muestra una lista de los meses
                    changeYear: true, //muestra una lista de los años
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sabado'],
            dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sab'],
            dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
            weekHeader: 'Sm',
            onSelect: function(selectedDate) {
                var option = this.id == "fechaObs" ? "minDate" : "maxDate",
                        instance = $(this).data("datepicker"),
                        date = $.datepicker.parseDate(
                        instance.settings.dateFormat ||
                        $.datepicker._defaults.dateFormat,
                        selectedDate, instance.settings);
                dates.not(this).datepicker("option", option, date);
            },
            //            showOn: "both",
            //            buttonImage: "../../Bitacora/view/css/img/calendar2.gif",
            buttonImageOnly: true
        });
    });

}
function datePickerFuncion2() {



    $(function() {
        var dates = $("#FI, #FF").datepicker({
            changeMonth: true,
            changeMonth: true, //muestra una lista de los meses
                    changeYear: true, //muestra una lista de los años
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sabado'],
            dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sab'],
            dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
            weekHeader: 'Sm',
            dateFormat: 'yy-mm-dd',
            onSelect: function(selectedDate) {
                var option = this.id == "FI" ? "minDate" : "maxDate",
                        instance = $(this).data("datepicker"),
                        date = $.datepicker.parseDate(
                        instance.settings.dateFormat ||
                        $.datepicker._defaults.dateFormat,
                        selectedDate, instance.settings);
                dates.not(this).datepicker("option", option, date);
            },
            showOn: "button",
            buttonImage: "/Bitacora/view/css/img/calendar.gif",
            buttonImageOnly: true
        });
    });

}

function verificarCamposCapturadosTextBitacora() {

    var camposLlenos = true, com = 0;
    $("#formCapturaBitacora input:text ").each(function(index) {



        if ($(this).val() == "") {

            camposLlenos = false;
            quitarClaseTxtV($(this).attr('id'));
            agregarClaseTxtR($(this).attr('id'));



        } else {

            agregarClaseTxtV($(this).attr('id'));
            com = 1;
        }


    });




    if (com == 1) {
        return 1;
    } else {
        return 0;
    }


}

function verificarCamposCapturadosSelectBitacora() {

    var camposLlenos = true;
    $("#formCapturaBitacora select ").each(function(index) {


        if ($(this).val() == "00") {

            camposLlenos = false;
            quitarClaseTxtV($(this).attr('id'));
            agregarClaseTxtR($(this).attr('id'));



        } else {

            agregarClaseTxtV($(this).attr('id'));
        }


    });


    if (camposLlenos) {
        return 1;
    } else {
        return 0;
    }


}

function verificarCamposCapturadosTextAreaBitacora() {

    var camposLlenos = true;
    $("#formCapturaBitacora textarea ").each(function(index) {



        if ($(this).val() == "") {

            camposLlenos = false;
            quitarClaseTxtV($(this).attr('id'));
            agregarClaseTxtR($(this).attr('id'));



        } else {

            agregarClaseTxtV($(this).attr('id'));

        }


    });


    if (camposLlenos) {
        return 1;
    } else {
        return 0;
    }


}


function abrirCerrarPanel(abiertoOcerrado, titulo) {
    //cerrado true false abierto



    $('#panellRight_1').panel('destroy');

    $("#nombreBitacora").html(titulo);
    $('#panellRight_1').panel({
        collapseType: 'slide-right',
        width: '750px',
        //cerrado
        collapsed: abiertoOcerrado

    });






}



function cargarGridBitacoras( id_delegacion,id_con_proyecto, id_conductor, id_proyecto, nombre, option, FI, FF) {
//alert(id_delegacion);
    //    alert("id del la relacion de todos "+id_con_proyecto+" -id del conductor "+id_conductor+" "+"- id del proyecto "+id_proyecto);

    var arreFecha = new Array();
    //    abrirCerrarPanel(false,"Bitacora: "+nombre);


    var id_bitacora;
    var conductor_id_relacion
    var F_captura;
    var F_bitacora;
    var seleccion = false;
 var id_fecha_bitacora;
 var height=$("#panelLeft_1_1").height();
 if (height==809){
 $("#panelLeft_1_1").css("height","-=500");
$("#panelLeft_2_1").css("height","+=514");}
    $('#panelLeft_2_1').load('../../Bitacora/view/viewGridBitacorasConductores.php', {}, function(data) {


        datePickerFuncion2();



        //busquedaFechas
        if (option == "fechaMes") {

            arreFecha = fecha();


        } else {

            arreFecha[0] = FF;
            arreFecha[1] = FI;



        }

        $("#addBitacora").bind({
            click: function() {
                inicioAddMod(id_con_proyecto, nombre, id_proyecto,id_delegacion);
            }

        })




        $("#titulo_pagina_3").val("Bitacoras: " + nombre);


        $("#buscar_fechas").bind({
            click: function() {

                buscarPorFechas(id_delegacion,$("#FI").val(), $("#FF").val(), id_con_proyecto, id_conductor, id_proyecto, nombre);
            }

        })


        $("#tabla_Admin_Bitacoras").jqGrid({
            url: '../../Bitacora/controller/controllerGridBitacoras.php',
            postData: {
                opcion: "listar",
                id_relacion: id_con_proyecto,
                FI: arreFecha[0],
                FF: arreFecha[1]
            },
            datatype: 'json',
            colNames: ['# Bitacora', 'id_bitacora', 'conductor_id_relacion', 'Fecha de captura', 'Fecha bitacora', 'Id_fecha_actividad'],
            colModel: [
                {
                    display: 'num',
                    name: 'num',
                    width: 30,
                    sortable: true



                },
                {
                    display: 'id_bitacora',
                    name: 'id_bitacora',
                    width: 10,
                    sortable: true,
                    hidden: true


                },
                {
                    display: 'conductor_id_relacion',
                    name: 'conductor_id_relacion',
                    width: 30,
                    sortable: true,
                    align: 'right',
                    hidden: true
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
                    display: 'fecha_captura',
                    name: 'fecha_captura',
                    width: 50,
                    sortable: true,
                    align: 'right',
                    hidden: true


                },
                {
                    display: 'fecha_real',
                    name: 'fecha_real',
                    width: 50,
                    sortable: true,
                    align: 'right'
                },
                {
                    display: 'Id_fecha_actividad',
                    name: 'Id_fecha_actividad',
                    width: 50,
                    sortable: true,
                    align: 'right',
                    hidden: true
                    
            },
            ],
            rowNum: 8,
            pager: '#pager4',
            sortname: 'fecha_bitacora',
            viewrecords: true,
            sortorder: "asc",
            //            emptyrecords: "No existen registros",
            height: 185,
            autowidth: true,
            //            scrollOffset:22,        
            onSelectRow: function(id) {

                seleccion = true;
                id_bitacora = $(this).jqGrid('getCell', id, 1);
                conductor_id_relacion = $(this).jqGrid('getCell', id, 2);
                F_captura = $(this).jqGrid('getCell', id, 3);

                F_bitacora = $(this).jqGrid('getCell', id, 4);
                id_fecha_bitacora = $(this).jqGrid('getCell', id, 5);

                gridactividades(id_bitacora, F_bitacora,id_fecha_bitacora);
                mostrarImagenesdeBitacora(id_bitacora);
                mostrarComentariosSupervisor(id_bitacora);
//                mostrarComentariosSupervisor(id_bitacora);
//                greficasbitacoraspordia(id_bitacora);
            }


        });
        /////comienza modificar KM y archivos
        $("#modificarKm").bind({
            click: function() {

                if (seleccion) {


                    seleccion = false;
                    modificarKm(id_bitacora);

                } else {


                    $(function() {
                        $("#ventanAlertas").html("Elija bitacora");
                        $("#ventanAlertas").attr('style', 'visible');
                        $("#ventanAlertas").dialog({
                            modal: true,
                            title: 'Conductor',
                            show: 'explode',
                            hide: 'explode',
                            buttons: {
                                Aceptar: function() {

                                    $(this).dialog("close");
                                    //                                    $("#tabla_Admin_Conductores").trigger("reloadGrid");  

                                }
                            }
                        });
                    });
                }


            }

        })

        $("#elimnarBitacora").bind({
            click: function() {




                if (seleccion) {


                    seleccion = false;
                    eliminarBitacora(id_bitacora);

                } else {


                    $(function() {
                        $("#ventanAlertas").html("Elija bitacora");
                        $("#ventanAlertas").attr('style', 'visible');
                        $("#ventanAlertas").dialog({
                            modal: true,
                            title: 'Conductor',
                            show: 'explode',
                            hide: 'explode',
                            buttons: {
                                Aceptar: function() {

                                    $(this).dialog("close");
                                    //                                    $("#tabla_Admin_Conductores").trigger("reloadGrid");  

                                }
                            }
                        });
                    });
                }


            }

        });
        
        $("#ComentariosSupervisor").on({
            click: function() {
                if (seleccion) {
                    seleccion = false;
                    AgregarComentariosSupervisorBitacora(id_bitacora);

                } else {
                    $(function() {
                        $("#ventanAlertas").html("Elija bitacora");
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
        
        $("#tabla_Admin_Bitacoras").jqGrid('navGrid', '#pager4', {
            edit: false,
            add: false,
            search: false,
            del: false,
            refresh: false,
            view: false
        });

        $("#tabla_Admin_Bitacoras").jqGrid('navButtonAdd', '#pager4', {
            caption: "<img src=/interfaz/view/images/Iconos_jqgrid/imagen.png width='23' height='23' />",
            buttonicon: "ui-icon-vacio",
            cursor: "pointer",
            title: "Mostrar Imagenes de Bitácora",
            //        id:"NuevoUsu",
            onClickButton: function() {

                if (seleccion) {


                    seleccion = false;
                    mostrarImagenesdeBitacora(id_bitacora);

                } else {


                    $(function() {
                        $("#ventanAlertas").html("Elija bitacora");
                        $("#ventanAlertas").attr('style', 'visible');
                        $("#ventanAlertas").dialog({
                            modal: true,
                            title: 'Conductor',
                            show: 'explode',
                            hide: 'explode',
                            buttons: {
                                Aceptar: function() {

                                    $(this).dialog("close");
                                    //                                    $("#tabla_Admin_Conductores").trigger("reloadGrid");  

                                }
                            }
                        });
                    });
                }




            }
        });

    });
}


function buscarPorFechas(id_delegacion,FF, FI, id_con_proyecto, id_conductor, id_proyecto, nombre) {

    if (FF != "" && FI != "") {

        $('#panelLeft_2_1').html("");
        cargarGridBitacoras(id_delegacion,id_con_proyecto, id_conductor, id_proyecto, nombre, "busquedaFechas", FI, FF);
    } else {
        $(function() {
            $("#ventanAlertas").html("Introduzca fechas");
            $("#ventanAlertas").attr('style', 'visible');
            $("#ventanAlertas").dialog({
                modal: true,
                title: 'Proyecto',
                show: 'explode',
                hide: 'explode',
                buttons: {
                    Aceptar: function() {
                        $("#FI").focus();
                        $(this).dialog("close");

                    }
                }
            });
        });


    }


}
function fecha() {
    var arrFecha = new Array();
    ;
    var mifecha = new Date();
    var diaMes = mifecha.getDate();
    var mes = mifecha.getMonth() + 1;
    var anio = mifecha.getFullYear();
    if (diaMes < 10) {
        diaMes = "0" + diaMes;
    }

    if (mes < 10) {
        mes = "0" + mes;
    }



    arrFecha[1] = anio + '-' + mes + '-' + diaMes;
    arrFecha[0] = anio + '-' + mes + '-' + "1";
    return arrFecha;


}


function redimencionarGrid(panel, grid, anchura) {

    $(window).bind('resize', function() {
        $(grid).setGridWidth(anchura);
    }).trigger('resize');

}


function redimencionarGridExplorador(panel, grid, anchura) {

    $(window).bind('resize', function() {
        $(grid).setGridWidth(anchura);
    }).trigger('resize');

}


function buscarPorFechasSuplente(FF, FI, id_con_proyecto, id_conductor, id_proyecto, nombre, id_suplente) {



    if (FF != "" && FI != "") {

        $('#panelLeft_2_1').html("");
        cargarGridBitacorasSuplente(id_con_proyecto, id_conductor, id_proyecto, nombre, "busquedaFechas", id_suplente, FI, FF);
    } else {
        $(function() {
            $("#ventanAlertas").html("Introduzca fechas");
            $("#ventanAlertas").attr('style', 'visible');
            $("#ventanAlertas").dialog({
                modal: true,
                title: 'Proyecto',
                show: 'explode',
                hide: 'explode',
                buttons: {
                    Aceptar: function() {
                        $("#FI").focus();
                        $(this).dialog("close");

                    }
                }
            });
        });


    }


}


