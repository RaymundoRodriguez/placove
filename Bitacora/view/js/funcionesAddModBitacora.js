/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */




function inicioAddMod(id_con_proyecto, nombre, id_conductor_en_proyecto, id_delegacion) {
//  alert(id_delegacion);
    //alert(id_conductor_en_proyecto+"ddd"+nombre);
    var num = 1;
    var numero;
    var i;
    var camposCapturadostext = 0;
    var camposLlenosSelect = 0;
    var camposLlenosArea = 0;
    var camposLlenosKm = 0;
    var hora_fin = 0;

    //        $("#nombreBitacora").html("Bitacora de : "+nombre);

    //abrirCerrarPanel(false,"Bitacora de: "+nombre);

    //$("#tabla_Admin_Proyectos").setGridWidth($("#tabla_Admin_Proyectos").width()/2, false);
    //  $("#tabla_Admin_Proyectos").trigger("reloadGrid");  
    $('#panelCenter_2_1').load('../../Bitacora/view/viewCapturaBitacora.php', {}, function(data) {

        $("#hr_fin_s").attr("disabled", true);
        datePickerFuncion("#datepicker");



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
                    if (valor2 > 0 && minuto_mayor_a_cero === false)
                    {
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
                    }
                    else {

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
                num += 1;
//                for (i = 5.75; i <= 24.75; i++) {
//                    i = i + 0.25 - 1;
//                    numero += "<option value=" + i + ">" + i.toFixed(2) + "</option>";
//                }



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
                    if (valor2 > 0 && minuto_mayor_a_cero === false)
                    {
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
                    }
                    else {
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
//                }
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
//                                    num -= 1;

                    $("#nuevaActividad" + num).remove();
                    num -= 1;


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
                camposLlenosKm = verificarCamposCapturadosTextKmBitacora();

                if (camposCapturadostext == 1 && camposLlenosSelect == 1 && camposLlenosArea == 1 && camposLlenosKm == 1)

                {
                    if (validarCamposKm())
                    {
                        //if(verificarCamposCapturadosfileKm())
//                        {
                        if (verificarCamposTipoArch())
                        {
                            var validar = cargarArchivos();

                            if (validar != 0)
                            {
                                var captura = capturarDatosDinamicosBitacora(id_con_proyecto, id_delegacion);
//                                    if(captura)
//                                    {
////                                        var kilometros=guardarKm();
//                                        
////                                        alert(kilometros);
////                                        if(kilometros){
////                                        guardarnomarchivo();
////                                    
////                                
////                            }
//                                    }
                            }

                        }


                        else
                        {

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

//                        }
//                        else
//                        {
//                            $(function() {
//                                $( "#ventanAlertas" ).html("Carga todos los archivos");
//                                $( "#ventanAlertas" ).attr('style', 'visible');
//                                $( "#ventanAlertas" ).dialog({
//                                    modal: true,
//                                    title:'Proyecto',
//                                    show:'explode',
//                                    hide: 'explode',
//                                    buttons: {
//                                        Aceptar: function() {
//                                            $("#FI").focus();
//                                            $( this ).dialog( "close" );
//                                                        
//                                        }
//                                    }
//                                });
//                            });
//                        //return 0;
//                        }

                    }

                    else {
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

                }
                else {
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

        $("#btnCancelarBitacora").bind({
            click: function() {


                $('#panelCenter_2_1').html("");

            }

        });

    });


}

function capturarDatosDinamicosBitacora(id_con_proyecto, id_delegacion)
{
//    alert(id_delegacion);
//    alert("bitacora");


    var file = $("#archivo1").val();
    // alert(file);
    var file2 = $("#archivo2").val();
    //alert(file2);
    var file3 = $("#archivo3").val();
    //alert(file3);
    var file4 = $("#archivo4").val();
    //alert(file4);
    var file5 = $("#archivo5").val();
    //alert(file4);
    var file6 = $("#archivo6").val();


//    alert("km");
    var km_inicial = $("#km_inicial").val();
    var km_final = $("#km_final").val();
    var endo_inicial = $("#km_inicial_endo").val();
    var endo_final = $("#km_final_endo").val();
    var fecha = $("#datepicker").val();
    var por_avance = $("#por_avance").val();
    var km_ruteador = $("#km_ruteador").val();
    var gasolina_consumida = $("#gasolina").val();
    // alert(fecha);
    var idDiv = new Array();

    var valoresSelect = new Array();

    var json = "["
    var contador = 1;
    $("#frmActividades div ").each(function(index) {
        idDiv[index] = $(this).attr("id");
        //        alert(idDiv[index]);

        json += '{"fecha":' + fecha + ',';
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
    //    alert(json);

    //   m=eval(json)

    //  alert( m[0].fecha);

    $.post("../../Bitacora/controller/controllerGuardarBitacora.php", {
        id_con_proyecto: id_con_proyecto,
        fecha: fecha,
        datos_dinamicos: eval(json),
        km_inicial: km_inicial,
        km_final: km_final,
        endo_inicial: endo_inicial,
        endo_final: endo_final,
        fileName: file,
        fileName2: file2,
        fileName3: file3,
        fileName4: file4,
        fileName5: file5,
        fileName6: file6,
        por_avance: por_avance,
        km_ruteador: km_ruteador,
        id_delegacion: id_delegacion,
        consumo_gasolina:gasolina_consumida

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

                        $("#tabla_Admin_ProyectosConductor").trigger("reloadGrid");
                        //$("#estadosMun"+id).remove();

                        $("#tabla_Admin_Bitacoras").trigger("reloadGrid");

                    }
                }
            });
        });

    });
    return true;
}
function verificarCamposCapturadosTextKmBitacora() {

    var km = 0;

    $("#formKilometrajes input:text ").each(function(index) {



        if ($(this).val() == "") {

            km = 0;
            quitarClaseTxtV($(this).attr('id'));
            agregarClaseTxtR($(this).attr('id'));



        } else {

            agregarClaseTxtV($(this).attr('id'));
            km = 1;
        }


    });

    if (km == 1) {
        return 1;
    } else {
        return 0;
    }


}




//suplente

function inicioAddModSuplentes(id_con_proyecto, nombre, id_conductor_en_proyecto, id_suplente) {

    //alert(id_conductor_en_proyecto+" "+nombre+" "+ id_suplente);
    var num = 1;
    var numero;
    var i;
    var camposCapturadostext = 0;
    var camposLlenosSelect = 0;
    var camposLlenosArea = 0;
    var camposLlenosKm = 0;
    //        $("#nombreBitacora").html("Bitacora de : "+nombre);

    //abrirCerrarPanel(false,"Bitacora de: "+nombre);

    //$("#tabla_Admin_Proyectos").setGridWidth($("#tabla_Admin_Proyectos").width()/2, false);
    //  $("#tabla_Admin_Proyectos").trigger("reloadGrid");  
    $('#panelCenter_2_1').load('../../Bitacora/view/viewCapturaBitacora.php', {}, function(data) {

        $("#hr_fin_s").attr("disabled", true);
        datePickerFuncion("#datepicker");



        $("#hr_inicio_s").bind({
            change: function() {
                $("#hr_fin_s").attr("disabled", false);
                $('#hr_fin_s').empty();
                // $('#hr_fin_s').append($('<option></option>').attr('value', "00" ).text( "0.00"));
                var valor = parseFloat($(this).val());

                valor += .25;

                for (i = valor; i <= 24.00; i = i + .25) {

                    $('#hr_fin_s').append($('<option></option>').attr('value', i).text(parseFloat(i).toFixed(2)));

                }

            }

        });



        $("#agregarActividad").bind({
            click: function() {

                for (i = 0.75; i <= 24.75; i++) {
                    i = i + 0.25 - 1;
                    numero += "<option value=" + i + ">" + i.toFixed(2) + "</option>";
                }


                num += 1;

                $("#frmActividades").append("<div id='nuevaActividad" + num + "'> <fieldset><legend>Datos Actividad " + num + "</legend> <table border='0' align='center' >\n\
<td>Inicio</td> <td>Fin</td> <TD>Actividad</TD>  </tr> <TR></div>                <TD> <SELECT class='horaInicio' name='" + num + "' id='hr_inicio_s" + num + "'  style=' width:100px'>      \n\
 <OPTION VALUE='00'> --Hora Inicio-- </OPTION>" + numero + " </SELECT> </TD> <TD> <SELECT  disabled name='fin' id='hr_fin_s" + num + "' style=' width:100px'> <OPTION VALUE='00'> --Hora Fin-- </OPTION>" + numero + " </SELECT> </TD><TD>\n\
<SELECT name='actividad' id='actividad_Bitacora" + num + "' > <OPTION VALUE='00'> --Actividad-- </OPTION> <OPTION VALUE='FDC Prep'>FDC Prep</OPTION> <OPTION VALUE='FDC'>FDC</OPTION> <OPTION VALUE='DT equipment'>DT equipment</OPTION>\n\
<OPTION VALUE='DT Wheather'>DT Wheather</OPTION><OPTION VALUE='Travel & Commute'>Travel & Commute</OPTION> <OPTION VALUE='DT Other'>DT Other</OPTION><OPTION VALUE='Training'>Training</OPTION>\n\
 </SELECT></TD> </TR></table><table align='center'>  <tr> <td>Comentario: <br><textarea id='comentarioBitacora" + num + "' name='comentarios' rows='1' cols='80' ></textarea></td> </tr></table>\n\
 </fieldset></div>");
                datePickerFuncion("#datepicker" + num);
            }

        });

        $(".horaInicio").on({
            change: function() {


                var num1 = $(this).attr('name');

                $("#hr_fin_s" + num1).attr("disabled", false);
                $('#hr_fin_s' + num1).empty();
                // $('#hr_fin_s').append($('<option></option>').attr('value', "00" ).text( "0.00"));
                var valor = parseFloat($(this).val());

                valor += .25;

                for (i = valor; i <= 24.00; i = i + .25) {

                    $('#hr_fin_s' + num1).append($('<option></option>').attr('value', i).text(parseFloat(i).toFixed(2)));

                }

            }


        })
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
                camposLlenosKm = verificarCamposCapturadosTextKmBitacora();

                //alert("campors de fecha" +camposCapturadostext);
                //alert("campos de km" +camposLlenosKm);
                //                alert(camposLlenosSelect);
                //                alert(camposLlenosArea);

                if (camposCapturadostext == 1 && camposLlenosSelect == 1 && camposLlenosArea == 1 && camposLlenosKm == 1)

                {
                    if (validarCamposKm())
                    {
//                        if(verificarCamposCapturadosfileKm())
//                        {
                        if (verificarCamposTipoArch())
                        {
                            var validar = cargarArchivos();

                            if (validar != 0)
                            {
                                var captura = capturarDatosDinamicosBitacoraSuplentes(id_con_proyecto, id_suplente);
//                                    if(captura)
//                                    {
////                                        var kilometros=guardarKm();
//                                        
////                                        alert(kilometros);
////                                        if(kilometros){
////                                        guardarnomarchivo();
////                                    
////                                
////                            }
//                                    }
                            }

                        }


                        else
                        {

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

                        // }
//                        else
//                        {
//                            $(function() {
//                                $( "#ventanAlertas" ).html("Carga todos los archivos");
//                                $( "#ventanAlertas" ).attr('style', 'visible');
//                                $( "#ventanAlertas" ).dialog({
//                                    modal: true,
//                                    title:'Proyecto',
//                                    show:'explode',
//                                    hide: 'explode',
//                                    buttons: {
//                                        Aceptar: function() {
//                                            $("#FI").focus();
//                                            $( this ).dialog( "close" );
//                                                        
//                                        }
//                                    }
//                                });
//                            });
//                        //return 0;
//                        }

                    }

                    else {
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

                }
                else {
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

        $("#btnCancelarBitacora").bind({
            click: function() {


                $('#panelCenter_2_1').html("");

            }

        });

    });


}


function capturarDatosDinamicosBitacoraSuplentes(id_con_proyecto, id_suplente, id_delegacion)
{
    // alert("suplente");


    var file = $("#archivo1").val();
    // alert(file);
    var file2 = $("#archivo2").val();
    //alert(file2);
    var file3 = $("#archivo3").val();
    //alert(file3);
    var file4 = $("#archivo4").val();
    //alert(file4);
    var file5 = $("#archivo5").val();


//    alert("km");
    var km_inicial = $("#km_inicial").val();
    var km_final = $("#km_final").val();
    var endo_inicial = $("#km_inicial_endo").val();
    var endo_final = $("#km_final_endo").val();
    var fecha = $("#datepicker").val();
    var por_avance = $("#por_avance").val();
    // alert(fecha);
    var idDiv = new Array();

    var valoresSelect = new Array();

    var json = "["
    var contador = 1;
    $("#frmActividades div ").each(function(index) {
        idDiv[index] = $(this).attr("id");
        //        alert(idDiv[index]);

        json += '{"fecha":' + fecha + ',';
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
    //    alert(json);

    //   m=eval(json)

    //  alert( m[0].fecha);

    $.post("../../Bitacora/controller/controllerGuardarBitacora.php", {
        id_con_proyecto: id_con_proyecto,
        fecha: fecha,
        datos_dinamicos: eval(json),
        km_inicial: km_inicial,
        km_final: km_final,
        endo_inicial: endo_inicial,
        endo_final: endo_final,
        fileName: file,
        fileName2: file2,
        fileName3: file3,
        fileName4: file4,
        fileName5: file5,
        opcion: 'suplente',
        id_suplente: id_suplente,
        por_avance: por_avance
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

                        $("#tabla_Admin_ProyectosConductor").trigger("reloadGrid");
                        //$("#estadosMun"+id).remove();

                        $("#tabla_Admin_Bitacoras").trigger("reloadGrid");

                    }
                }
            });
        });

    });
    return true;
}


function AgregarComentariosSupervisorBitacora(id_bitacora)
{
    $('#panelCenter_2_1').load("../../Bitacora/view/viewCapturaComentariosSupervisor.php", function(data)
    {
        $("#btnCancelarComentariosSupervisor").click(function() {

            gridactividades(id_bitacora, 0, 0);
        });
        $("#btnGuardarComentariosSupervisor").click(function() {
             var comentarios_supervisor=$("#comentarios_supervisor").val();   
            $.post("../../Bitacora/controller/controllerModificarKmyAch.php",{
            opcion:3,
            id_bitacora:id_bitacora,
            comentarios_supervisor:comentarios_supervisor
        },
            function(data){
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
                        $(this).dialog("close");
                        $('#panelCenter_2_1').html("");
                       

                    }
                }
            });
        });
            });
        });
    });


}