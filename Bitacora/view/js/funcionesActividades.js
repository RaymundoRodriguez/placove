/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function gridactividades(id_bitacora, fecha_Cap, id_fecha_bitacora) {
    var seleccion = false;
    var id_actividad;
    //    var id_fecha_actividad;
    var fecha, hr_inicio, hr_fin, actividad, comentarios;
    //    alert(fecha_Cap)
    $('#panelCenter_2_1').load('../../Bitacora/view/viewGridActividades.php', {}, function(data) {




        $("#tabla_Admin_Actividades").jqGrid({
            url: '../../Bitacora/controller/controllerGridActividades.php',
            postData: {
                opcion: "listar",
                id_bitacora: id_bitacora
            },
            datatype: 'json',
            colNames: ['id_actividad', 'Fecha', 'Hr. Inicio', 'Hr. Fin', 'Hr Inicio Here', 'Hr Fin Here', 'Actividad', 'Comentarios', 'bitacora_id_bitacora'],
            colModel: [{
                    display: 'id_actividad',
                    name: 'id_actividad',
                    width: 10,
                    sortable: true,
                    hidden: true


                },
                {
                    display: 'Fecha',
                    name: 'Fecha',
                    width: 15,
                    sortable: true,
                    align: 'right'

                },
                {
                    display: 'Hr_Inicio',
                    name: 'Hr_Inicio',
                    width: 15,
                    sortable: true,
                    align: 'right'


                },
                {
                    display: 'Hr_Fin',
                    name: 'Hr_Fin',
                    width: 15,
                    sortable: true,
                    align: 'right'
                },
                {
                    display: 'Hr_Inicio_Here',
                    name: 'Hr_Fin',
                    width: 20,
                    sortable: true,
                    align: 'right'
                },
                {
                    display: 'Hr_Fin_Here',
                    name: 'Hr_Fin',
                    width: 20,
                    sortable: true,
                    align: 'right'
                },
                {
                    display: 'Actividad',
                    name: 'Actividad',
                    width: 40,
                    sortable: true,
                    align: 'right'
                },
                {
                    display: 'Comentarios',
                    name: 'Comentarios',
                    width: 100,
                    sortable: true,
                    align: 'right'
                },
                {
                    display: 'bitacora_id_bitacora',
                    name: 'bitacora_id_bitacora',
                    width: 10,
                    sortable: true,
                    align: 'right',
                    hidden: true
                },
                //                     {
                //                    display: 'id_fecha_actividad',
                //                    name: 'id_fecha_actividad',
                //                    width: 10,
                //                    sortable: true,
                //                    align: 'right',
                //                    hidden: true
                //                },
            ],
            rowNum: 100,
            pager: '#pager5',
            sortname: 'id_actividad',
            viewrecords: true,
            sortorder: "asc",
            //             emptyrecords: "No existen registros",
            autoheight: true,
            autowidth: true,
            height: 250,
            //            scrollOffset:22,        
            onSelectRow: function(id) {
                seleccion = true;

                id_actividad = $(this).jqGrid('getCell', id, 0);
                fecha = $(this).jqGrid('getCell', id, 1);
                hr_inicio = $(this).jqGrid('getCell', id, 2);
                hr_fin = $(this).jqGrid('getCell', id, 3);
                actividad = $(this).jqGrid('getCell', id, 6);
                comentarios = $(this).jqGrid('getCell', id, 7);
                //                id_fecha_actividad=$(this).jqGrid('getCell', id, 6);
                //                conductor_id_relacion=$(this).jqGrid('getCell',id,1);
                //                F_captura=$(this).jqGrid('getCell',id,2);
                //                
                //                F_bitacora=$(this).jqGrid('getCell',id,8);

                //            gridactividades(id_bitacora,conductor_id_relacion);


            }


        });

        $("#reportebitxdia").on({
            click: function() {
                greficasbitacoraspordia(id_bitacora);
            }
        })



        $("#tabla_Admin_Actividades").jqGrid('navGrid', '#pager5', {
            edit: false,
            add: false,
            search: false,
            del: false,
            refresh: false,
            view: false
        });
        $("#tabla_Admin_Actividades").jqGrid('navButtonAdd', '#pager5', {
            caption: "<img src=/interfaz/view/images/Iconos_jqgrid/add.png width='20' height='20' />",
            buttonicon: "ui-icon-vacio",
            cursor: "pointer",
            title: "Agregar actividad a bitacora",
            //        id:"NuevoUsu",
            onClickButton: function() {



                agregarActividadesenBitacora(id_bitacora, fecha_Cap, id_fecha_bitacora);


            }
        });

        $("#tabla_Admin_Actividades").jqGrid('navButtonAdd', '#pager5', {
            caption: "<img src=/interfaz/view/images/Iconos_jqgrid/Editt.png width='21' height='21' />",
            buttonicon: "ui-icon-vacio",
            cursor: "pointer",
            title: "Modificar actividad a bitacora",
            //        id:"NuevoUsu",
            onClickButton: function() {


                if (seleccion) {


                    seleccion = false;
                    modificarActividad(id_actividad, fecha_Cap, id_bitacora, hr_inicio, hr_fin, actividad, comentarios);
                    //alert(id_actividad);

                } else {


                    $(function() {
                        $("#ventanAlertas").html("Elija actividad");
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

        $("#tabla_Admin_Actividades").jqGrid('navButtonAdd', '#pager5', {
            caption: "<img src=/interfaz/view/images/Iconos_jqgrid/delete1.png width='23' height='23' />",
            buttonicon: "ui-icon-vacio",
            cursor: "pointer",
            title: "Eliminar actividad a bitacora",
            //        id:"NuevoUsu",
            onClickButton: function() {


                if (seleccion) {


                    seleccion = false;


                    $(function() {
                        $("#ventanAlertas").html("Seguro de elimnar la actividad??");
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
                                    eliminarActividad(id_actividad, id_bitacora, fecha_Cap);

                                }
                            }
                        });
                    });




                } else {


                    $(function() {
                        $("#ventanAlertas").html("Elija actividad");
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

//agregar actividades 

function agregarActividadesenBitacora(id_bitacora, fecha, id_fecha_bitacora) {

    $("#titulo_bitacora").html("Bitacora del: " + fecha);


    //alert(id_conductor_en_proyecto+"ddd"+nombre);
    var num = 1;
    var numero;
    var i;
    var camposCapturadostext = 0;
    var camposLlenosSelect = 0;
    var camposLlenosArea = 0;
    var camposLlenosKm = 0;
    var hora_fin = 0;






    $('#panelCenter_2_1').load('../../Bitacora/view/viewCapturaActividades.php', {}, function(data) {

        $("#titulo_bitacora").html("Bitacora del: " + fecha);
        //        datePickerFuncion("#datepicker");


        $("#datepicker").attr('disabled', true);
        $("#datepicker").val(fecha);

        $("#hr_inicio_s").bind({
            change: function() {
                $("#hr_fin_s").attr("disabled", false);
                $('#hr_fin_s').empty();
                // $('#hr_fin_s').append($('<option></option>').attr('value', "00" ).text( "0.00"));
                var valor = ($(this).val());
                var minutos = valor.substring(3, 5);
                var valor2 = parseInt(minutos);


                if (valor === 0)

                {
                    $('#hr_fin_s').append('<OPTION VALUE="0">0</OPTION>');
                }
                valor = parseInt(valor);
                var minuto_mayor_a_cero = false;
                for (i = valor; i <= 24; i++) {
                    var k = 0;

                    if (i < 10) {
                        i = "0" + i;
                    }
                    if (valor2 > 0 && minuto_mayor_a_cero === false) {
                        //                    alert(valor2);
                        for (var j = valor2 + 1; j <= 59; j++) {

                            if (j < 10) {
                                k = (i + ".0" + j);
                                $('#hr_fin_s').append($('<option></option>').attr('value', k).text((k)));


                            } else {
                                k = (i + "." + j);
                                $('#hr_fin_s').append($('<option></option>').attr('value', k).text((k)));

                            }
                        }
                        minuto_mayor_a_cero = true;
                    } else {

                        for (var j = 0; j <= 59; j++) {

                            if (j < 10) {
                                k = (i + ".0" + j);
                                $('#hr_fin_s').append($('<option></option>').attr('value', k).text((k)));


                            } else {
                                k = (i + "." + j);
                                $('#hr_fin_s').append($('<option></option>').attr('value', k).text((k)));

                            }
                        }

                    }



                }

            }

        });

        $("#agregarActividad").bind({
            click: function() {

                //                for (i = 5.75; i <= 24.75; i++) {
                //                    i = i + 0.25 - 1;
                //                    numero += "<option value=" + i + ">" + i.toFixed(2) + "</option>";
                //                }
                num += 1;
                if (num == 2) {
                    hora_fin = $('#hr_fin_s').val();
                } else if (num > 2) {
                    var jj = num - 1;
                    hora_fin = $('#hr_fin_s' + jj).val();
                }
                var hora_finC = (hora_fin) + 0.01;
                $("#frmActividades").append("<div id='nuevaActividad" + num + "'> <fieldset id='actividades'><legend>Datos Actividad " + num + "</legend> <table border='0' align='center' >\n\
<TR><TD align='center'> Inicio<br /> <SELECT class='horaInicio' name='" + num + "' id='hr_inicio_s" + num + "'  style=' width:100px'>      \n\
 <OPTION VALUE=" + (hora_fin) + "> " + (hora_fin) + " </OPTION>" + numero + " </SELECT> </TD> <TD  align='center'>Fin <br />\n\
 <SELECT  name='fin' id='hr_fin_s" + num + "' style=' width:100px'> <OPTION VALUE=" + hora_finC + "> " + hora_finC + "</OPTION>" + numero + " </SELECT> </TD><TD align='center'>\n\
Actividad <br /><SELECT name='actividad' id='actividad_Bitacora" + num + "' style=' width:139px' > <OPTION VALUE='00'> --Actividad-- </OPTION> <OPTION VALUE='FDC Prep'>FDC Prep</OPTION> <OPTION VALUE='FDC'>FDC</OPTION> <OPTION VALUE='DT equipment'>DT equipment</OPTION>\n\
<OPTION VALUE='DT Wheather'>DT Wheather</OPTION><OPTION VALUE='Travel & Commute'>Travel & Commute</OPTION> <OPTION VALUE='DT Other'>DT Other</OPTION><OPTION VALUE='Training'>Training</OPTION>\n\
 </SELECT></TD> <td><textarea id='comentarioBitacora" + num + "' name='comentarios' rows='1' cols='40' placeholder='Comentario'></textarea></td>  </TR></table>\n\
 </fieldset></div>");
                datePickerFuncion("#datepicker" + num);

                var valor = ($("#hr_fin_s" + num).val());
                $('#hr_fin_s' + num).empty();

                var minutos = valor.substring(3, 5);
                var valor2 = parseInt(minutos);
                valor = parseInt(valor);

                var minuto_mayor_a_cero = false;
                for (i = valor; i <= 24; i++) {
                    var k = 0;
                    if (i < 10) {
                        i = "0" + i;
                    }
                    if (valor2 > 0 && minuto_mayor_a_cero === false) {
                        //                    alert(valor2);
                        for (var j = valor2 + 1; j <= 59; j++) {

                            if (j < 10) {
                                k = (i + ".0" + j);
                                //                                                        alert(k);
                                $('#hr_fin_s' + num).append($('<option></option>').attr('value', k).text((k)));


                            } else {
                                k = (i + "." + j);
                                //                                                        alert(k);
                                $('#hr_fin_s' + num).append($('<option></option>').attr('value', k).text((k)));

                            }
                        }
                        minuto_mayor_a_cero = true;
                    } else {
                        //                        alert(valor2);
                        for (var j = 0; j <= 59; j++) {

                            if (j < 10) {
                                k = (i + ".0" + j);
                                //                                                        alert(k);
                                $('#hr_fin_s' + num).append($('<option></option>').attr('value', k).text((k)));


                            } else {
                                k = (i + "." + j);
                                //                                                        alert(k);
                                $('#hr_fin_s' + num).append($('<option></option>').attr('value', k).text((k)));

                            }
                        }

                    }
                }

                //                for (i = valor; i <= 24.00; i = i + .25) {
                //
                //                    $('#hr_fin_s' + num).append($('<option></option>').attr('value', i).text(parseFloat(i).toFixed(2)));
                //
                //                        }
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



                if (num > 1) {
                    $("#nuevaActividad" + num).remove();

                    num -= 1;

                } else {

                    num = 1;

                }
            }

        });

        $("#btnGuardarActividad").bind({
            click: function() {

                camposCapturadostext = verificarCamposCapturadosTextBitacora();
                camposLlenosSelect = verificarCamposCapturadosSelectBitacora();
                //                camposLlenosArea=verificarCamposCapturadosTextAreaBitacora();
                //                camposLlenosKm=verificarCamposCapturadosTextKmBitacora();

                //alert("campors de fecha" +camposCapturadostext);
                //alert("campos de km" +camposLlenosKm);
                //                alert(camposLlenosSelect);
                //                                alert(id_fecha_bitacora);
                if (camposCapturadostext == 1 && camposLlenosSelect == 1)

                {
                    if (id_fecha_bitacora != "") {
                        capturaActividadesBitacora(id_bitacora, fecha, id_fecha_bitacora);

                    } else
                        $(function() {
                            $("#ventanAlertas").html("Selecciona una Bitacora");
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
                } else {
                    $(function() {
                        $("#ventanAlertas").html("Rellena todos los campos");
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

        });

        $("#btnCancelarActividad").on({
            click: function() {


                $('#panelCenter_2_1').html("");
                gridactividades(id_bitacora, fecha);

            }

        });

    });


}


function capturaActividadesBitacora(id_bitacora, fecha, id_fecha_bitacora) {


    //     var fecha=$("#datepicker").val();
    // alert(fecha);
    var idDiv = new Array();

    var valoresSelect = new Array();

    var json = "["
    var contador = 1;
    $("#frmActividades div ").each(function(index) {
        idDiv[index] = $(this).attr("id");
        //        alert(idDiv[index]);

        json += '{"fecha":' + '"' + $("#" + idDiv[index] + " input:text").val() + '",';
        //        alert(json);
        contador = 1;
        $("#" + idDiv[index] + " select ").each(function(ind) {
            valoresSelect[ind] = $(this).val();
            json += '"actividad' + contador + '":' + '"' + valoresSelect[ind] + '",';
            //            alert(valoresSelect[ind+0]);
            //            alert(valoresSelect[ind+1]);
            //            alert(valoresSelect[ind+2]);
            //            alert(json);
            contador++;

        });
        json += '"comentario":' + '"' + $("#" + idDiv[index] + " textarea ").val() + '"},';

    });
    //json += '"id_con_proyecto":'+'"'+id_con_proyecto+'"},';
    json = json.substring(0, json.length - 1);

    json += "];";
    //alert(json);
    // alert(json);

    //   m=eval(json)

    //  alert( m[0].fecha);

    $.post("../../Bitacora/controller/controllerGuardarActividades.php", {
        id_bitacora: id_bitacora,
        datos_dinamicos: eval(json),
        id_fecha_bitacora: id_fecha_bitacora
    }, function(data1) {

        $(function() {
            $("#ventanAlertas").html(data1);
            $("#ventanAlertas").attr('style', 'visible');
            $("#ventanAlertas").dialog({
                modal: true,
                title: 'Bitacora',
                show: 'explode',
                hide: 'explode',
                buttons: {
                    Aceptar: function() {

                        $('#panelCenter_2_1').html("");
                        $(this).dialog("close");


                        //$("#estadosMun"+id).remove();

                        //                        $("#tabla_Admin_Actividades").trigger("reloadGrid");  
                        gridactividades(id_bitacora, fecha);
                    }
                }
            });
        });
    });

}


function modificarActividad(id_actividad, fecha_Cap, id_bitacora, hr_inicio, hr_fin, actividad, comentarios) {
    //   alert(id_actividad);

    var camposLlenosSelect, i;
    $('#panelCenter_2_1').load('../../Bitacora/controller/controllerModificarActividad.php', {
        opcion: 'mostrar',
        hr_inicio: hr_inicio,
        hr_fin: hr_fin,
        actividad: actividad



    }, function(data) {
        $("#hr_inicio_s").val(hr_inicio);
        $("#hr_fin_s").val(hr_fin);
        $("#hr_inicio_s").bind({
            change: function() {
                $("#hr_fin_s").attr("disabled", false);
                $('#hr_fin_s').empty();
                // $('#hr_fin_s').append($('<option></option>').attr('value', "00" ).text( "0.00"));
                var valor = ($(this).val());
                var minutos = valor.substring(3, 5);
                var valor2 = parseInt(minutos);


                if (valor === 0)

                {
                    $('#hr_fin_s').append('<OPTION VALUE="0">0</OPTION>');
                }
                valor = parseInt(valor);
                var minuto_mayor_a_cero = false;
                for (i = valor; i <= 24; i++) {
                    var k = 0;

                    if (i < 10) {
                        i = "0" + i;
                    }
                    if (valor2 > 0 && minuto_mayor_a_cero === false) {
                        //                    alert(valor2);
                        for (var j = valor2 + 1; j <= 59; j++) {

                            if (j < 10) {
                                k = (i + ".0" + j);
                                $('#hr_fin_s').append($('<option></option>').attr('value', k).text((k)));


                            } else {
                                k = (i + "." + j);
                                $('#hr_fin_s').append($('<option></option>').attr('value', k).text((k)));

                            }
                        }
                        minuto_mayor_a_cero = true;
                    } else {

                        for (var j = 0; j <= 59; j++) {

                            if (j < 10) {
                                k = (i + ".0" + j);
                                $('#hr_fin_s').append($('<option></option>').attr('value', k).text((k)));


                            } else {
                                k = (i + "." + j);
                                $('#hr_fin_s').append($('<option></option>').attr('value', k).text((k)));

                            }
                        }

                    }



                }

            }

        });
        //        alert(data);
        $("#titulo_bitacora").html("Bitacora del: " + fecha_Cap);
        //        datePickerFuncion("#datepicker");


        $("#datepicker").attr('disabled', true);
        $("#datepicker").val(fecha_Cap);
        //       datePickerFuncion("#datepicker");
        $("#comentarioBitacora").val(comentarios);


        $("#btnModificarActividad").bind({
            click: function() {


                camposLlenosSelect = verificarCamposCapturadosSelectBitacora();

                if (camposLlenosSelect) {



                    $.post("../../Bitacora/controller/controllerModificarActividad.php", {
                        opcion: 'guardar',
                        hr_inicio: $("#hr_inicio_s").val(),
                        hr_fin: $("#hr_fin_s").val(),
                        actividad: $("#actividad_Bitacora").val(),
                        comentarios: $("#comentarioBitacora").val(),
                        id_actividad: id_actividad
                    }, function(data) {

                        $(function() {
                            $("#ventanAlertas").html(data);
                            $("#ventanAlertas").attr('style', 'visible');
                            $("#ventanAlertas").dialog({
                                modal: true,
                                title: 'Bitacora',
                                show: 'explode',
                                hide: 'explode',
                                buttons: {
                                    Aceptar: function() {

                                        $('#panelCenter_2_1').html("");
                                        gridactividades(id_bitacora, fecha_Cap);
                                        $(this).dialog("close");
                                    }
                                }
                            });
                        });

                    })

                } else {
                    $(function() {
                        $("#ventanAlertas").html("Rellena todos los campos");
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

        });


        $("#btnCancelarMActividad").bind({
            click: function() {


                $('#panelCenter_2_1').html("");
                gridactividades(id_bitacora, fecha_Cap);

            }

        });
    });
}

function eliminarActividad(id_actividad, id_bitacora, fecha_Cap) {

    $.post("../../Bitacora/controller/controllerEliminarActividad.php", {
        id_actividad: id_actividad
    }, function(data) {

        $(function() {
            $("#ventanAlertas").html(data);
            $("#ventanAlertas").attr('style', 'visible');
            $("#ventanAlertas").dialog({
                modal: true,
                title: 'Bitacora',
                show: 'explode',
                hide: 'explode',
                buttons: {
                    Aceptar: function() {

                        //                        $('#panelCenter_2_1').html("");  
                        $("#tabla_Admin_Actividades").trigger("reloadGrid");
                        $(this).dialog("close");
                    }
                }
            });
        });

    })

}


function modificarKm(id_bitacora) {
    var arreglo = new Array();
    var arreglo1 = new Array();
    $('#panelCenter_2_1').load('../../Bitacora/view/viewModificarKmyArchivos.php', {}, function(data) {});

    //    $.post('../../Bitacora/controller/controllerMostrarImagenes.php',{
    //        opcion:0,
    //        id_bitacora:id_bitacora
    //    },function(data){
    //         
    //        var arreglo1 = eval(data);
    //                for (var i = 0;i < arreglo1.length; i++) {
    //                    alert(arreglo1[i].ruta_km_inicial);
    //                    $("#archivoa1").value(arreglo1[i].ruta_km_inicial);
    //                    $("#archivoa2").val(arreglo1[i].ruta_km_final);
    //                   $("##archivoa3").val(arreglo1[i].ruta_progreso_inicial);
    //                    $("#archivoa4").val(arreglo1[i].ruta_progreso_final);
    //                    $("#archivoa5").val(arreglo1[i].ruta_bitacora);
    //     
    //                }
    //    });

    $.post('../../Bitacora/controller/controllerModificarKmyAch.php', {
        id_bitacora: id_bitacora,
        opcion: 1
    }, function(data) {

        var arreglo = eval(data);
        var ruta_km_inicial = "",
            ruta_km_final = "",
            ruta_progreso_inicial = "",
            ruta_progreso_final = "",
            ruta_bitacora = "",
            ruta_gasolina = "";
        for (var i = 0; i < arreglo.length; i++) {
            $("#por_avance").val(arreglo[i].porcentaje_avance);
            $("#km_inicial").val(arreglo[i].km_inicial);
            $("#km_final").val(arreglo[i].km_final);
            $("#km_inicial_endo").val(arreglo[i].km_inicial_endomondo);
            $("#km_final_endo").val(arreglo[i].km_final_endomondo);
            $("#gasolina").val(arreglo[i].consumo_gasolina);
            $("#km_ruteador").val(arreglo[i].km_ruteador);
            ruta_km_inicial = arreglo[i].ruta_km_inicial;
            ruta_km_final = arreglo[i].ruta_km_final;
            ruta_progreso_inicial = arreglo[i].ruta_progreso_inicial;
            ruta_progreso_final = arreglo[i].ruta_progreso_final;
            ruta_bitacora = arreglo[i].ruta_bitacora;
            ruta_gasolina = arreglo[i].ruta_gasolina;

        }



        $("#btnActualizarKm").bind({
            click: function() {


                var camposLlenosKm = verificarCamposCapturadosTextKm();
                if (camposLlenosKm == 1)

                {
                    if (validarporcentaje()) {
                        var por_avance = ($("#por_avance").val());
                    }

                    if (validarCamposKm()) {
                        if (verificarCamposTipoArch()) {
                            var validar = cargarArchivos();

                            if (validar != 0) {
                                var file = $("#archivo1").val();
                                // alert(file);
                                var file2 = $("#archivo2").val();
                                //alert(file2);
                                var file3 = $("#archivo3").val();
                                //alert(file3);
                                var file4 = $("#archivo4").val();
                                //alert(file4);
                                var file5 = $("#archivo5").val();
                                var file6 = $("#archivo6").val();

                                if (file === "") { file = ruta_km_inicial; }
                                if (file2 === "") { file2 = ruta_km_final; }
                                if (file3 === "") { file3 = ruta_progreso_inicial; }
                                if (file4 === "") { file4 = ruta_progreso_final; }
                                if (file5 === "") { file5 = ruta_bitacora; }
                                if (file6 === "") { file6 = ruta_bitacora; }

                                $.post('../../Bitacora/controller/controllerModificarKmyAch.php', {
                                    km_inicial: ($("#km_inicial").val()),
                                    km_final: ($("#km_final").val()),
                                    km_inicial_endo: ($("#km_inicial_endo").val()),
                                    km_final_endo: ($("#km_final_endo").val()),
                                    km_ruteador: ($("#km_ruteador").val()),
                                    gasolina: $("#gasolina").val(),
                                    por_avance: por_avance,
                                    opcion: 2,
                                    id_bitacora: id_bitacora,
                                    fileName: file,
                                    fileName2: file2,
                                    fileName3: file3,
                                    fileName4: file4,
                                    fileName5: file5,
                                    fileName6: file6

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
                                                    $('#panelCenter_2_1').html("");
                                                    $("#tabla_Admin_Bitacoras").trigger("reloadGrid");
                                                    $(this).dialog("close");

                                                }
                                            }
                                        });
                                    });

                                });

                            }
                        } else {

                            $(function() {
                                $("#ventanAlertas").html("Tpo de archivo no valido");
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
                            //return 0;      

                        }


                    } else {
                        $(function() {
                            $("#ventanAlertas").html("Tipo de dato no valido");
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

                } else {
                    $(function() {
                        $("#ventanAlertas").html("Rellena todos los campos");
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

        });

        $("#btnCancelarKm").bind({
            click: function() {



                $('#panelCenter_2_1').html("");
                //                $("#tabla_Admin_Bitacoras").trigger("reloadGrid");

            }

        });

    });





}

function mostrarImagenesdeBitacora(id_bitacora, fecha_Cap) {
    var arreglo = new Array();
    var km_inicial, km_final, endomondo_inicial, endomondo_final, bitacora, gasolina;
    $.post("../../Bitacora/controller/controllerMostrarImagenes.php", {
        id_bitacora: id_bitacora,
        opcion: 'imagenes'
    }, function(data) {

        // alert(data);
        var arreglo = eval(data);
        for (var i = 0; i < arreglo.length; i++) {
            km_inicial = arreglo[i].ruta_km_inicial;
            km_final = arreglo[i].ruta_km_final;
            endomondo_inicial = arreglo[i].ruta_progreso_inicial;
            endomondo_final = arreglo[i].ruta_progreso_final;
            bitacora = arreglo[i].ruta_bitacora;
            gasolina = arreglo[i].ruta_gasolina;
            // $('#AddTelefonos').append('<option value="' + arreglo1[i].id_telefono + '" >' + arreglo1[i].identificador + '</option>');

            //           $("#panelCenter_2_1").html('<img src="../../Bitacora/controller/upload/'+arreglo[i].ruta_km_final+'" width="200" height="200"><br>');
            //           $("#panelCenter_2_1").html('<img src="../../Bitacora/controller/upload/'+arreglo[i].ruta_progreso_inicial+'" width="200" height="80"><br>');
            //           $("#panelCenter_2_1").html('<img src="../../Bitacora/controller/upload/'+arreglo[i].ruta_progreso_final+'" width="200" height="200"><br>');
            //           $("#panelCenter_2_1").html('<img src="../../Bitacora/controller/upload/'+arreglo[i].ruta_bitacora+'" width="200" height="200"><br>');
        }


        mostrarimg(km_inicial, km_final, endomondo_inicial, endomondo_final, bitacora, gasolina);
        //        mostrarimagenTicketGasolinay(gasolina);
        //        mostrarComentariosSupervisor(id_bitacora)
    });




}


function mostrarimg(km_inicial, km_final, endomondo_inicial, endomondo_final, bitacora, gasolina) {
    $("#imagenesbitacora").html('<br><div id="km_inicia" ><img  id="kmi" src="../../Bitacora/controller/upload/' + km_inicial + '" width="200" height="200" title="Kilometraje Odometro Inicial"/></div><br>\n\
                <br><div id="km_fina"><img id="kmf" src="../../Bitacora/controller/upload/' + km_final + '" width="200" height="200" title="Kilometraje Odometro Final"/></div></div><br> \n\
                <br> <div id="endo_inicial"><img id="endoi" src="../../Bitacora/controller/upload/' + endomondo_inicial + '" width="200" height="200" title="Kilometraje Endomondo"/></div><br>\n\
                <br> <div id="endo_final"><img id="endof" src="../../Bitacora/controller/upload/' + endomondo_final + '" width="200" height="200" title="Porcentaje Ruteador"/></div><br>\n\
                <br><div id="bitacora"><img id="bita" src="../../Bitacora/controller/upload/' + bitacora + '" width="200" height="200" title="Bitacora"/></div><br>\n\
    <br><div id="gasolina"><img id="gaso" src="../../Bitacora/controller/upload/' + gasolina + '" width="200" height="200" title="Ticket Gasolina"/></div><br>\n\
');
    // repetir(km_inicial,km_final,endomondo_inicial,endomondo_final,bitacora);
    //   $("#km_inicial").clu.slideToggle();
    $("#kmi").dblclick(function() {
        //        alert("hh");
        $("#imagenesbitacora").html('<br><div id="km_inicia" class="km_ini" ><img  id="kmi" src="../../Bitacora/controller/upload/' + km_inicial + '"></div><br>');
        $("#kmi").dblclick(function() {
            //            alert("hh");
            mostrarimg(km_inicial, km_final, endomondo_inicial, endomondo_final, bitacora, gasolina);

        });
    });

    $("#kmf").dblclick(function() {
        //        alert("hh");
        $("#imagenesbitacora").html('<br><div id="km_inicia" class="km_ini" ><img  id="kmf" src="../../Bitacora/controller/upload/' + km_final + '"></div><br>');
        $("#kmf").dblclick(function() {
            //            alert("hh");
            mostrarimg(km_inicial, km_final, endomondo_inicial, endomondo_final, bitacora, gasolina);

        });
    });
    $("#endoi").dblclick(function() {
        //        alert("hh");
        $("#imagenesbitacora").html('<br><div id="km_inicia" class="km_ini" ><img  id="endoi" src="../../Bitacora/controller/upload/' + endomondo_inicial + '"></div><br>');
        $("#endoi").dblclick(function() {
            //            alert("hh");
            mostrarimg(km_inicial, km_final, endomondo_inicial, endomondo_final, bitacora, gasolina);

        });
    });
    $("#endof").dblclick(function() {
        //        alert("hh");
        $("#imagenesbitacora").html('<br><div id="km_inicia" class="km_ini" ><img  id="endof" src="../../Bitacora/controller/upload/' + endomondo_final + '"></div><br>');
        $("#endof").dblclick(function() {
            //            alert("hh");
            mostrarimg(km_inicial, km_final, endomondo_inicial, endomondo_final, bitacora, gasolina);

        });
    });
    $("#bita").dblclick(function() {
        //        alert("hh");
        $("#imagenesbitacora").html('<br><div id="km_inicia" class="km_ini" ><img  id="bita" src="../../Bitacora/controller/upload/' + bitacora + '"></div><br>');
        $("#bita").dblclick(function() {
            //            alert("hh");
            mostrarimg(km_inicial, km_final, endomondo_inicial, endomondo_final, bitacora, gasolina);

        });
    });
    $("#gaso").dblclick(function() {
        //        alert("hh");
        $("#imagenesbitacora").html('<br><div id="km_inicia" class="km_ini" ><img  id="gaso" src="../../Bitacora/controller/upload/' + gasolina + '"></div><br>');
        $("#gaso").dblclick(function() {
            //            alert("hh");
            mostrarimg(km_inicial, km_final, endomondo_inicial, endomondo_final, bitacora, gasolina);

        });
    });

    //    $("#km_inicial").bind({
    //        click:function(){
    //            alert("2ksdjhfkasd");
    //            $("#panelCenter_2_1").html('<img src="../../Bitacora/controller/upload/'+km_inicial+'" ><br>').slideToggle();
    //        }
    //    });
    //        
    //    $("#kmi").bind({
    //        dblclick:function(){
    //            alert("marica");
    //            mostrarimg(km_inicial,km_final,endomondo_inicial,endomondo_final,bitacora);  
    //        // $("#panelCenter_2_1").html('<img src="../../Bitacora/controller/upload/'+km_inicial+'" ><br>').show();
    //        }
    //    });

    //$("#km_inicial")Zoom()(
    //    {
    //    // alert("NHHH");
    //    });

    // $("#km_inicial").zoom();
}

function mostrarComentariosSupervisor(id_bitacora) {
    $.post("../../Bitacora/controller/controllerMostrarImagenes.php", {
        id_bitacora: id_bitacora,
        opcion: 'comentarios'
    }, function(data) {
        $("#muestra_comentarios_supervisor").val(data);
    });
}