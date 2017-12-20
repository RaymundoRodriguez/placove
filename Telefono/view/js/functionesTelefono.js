/* Program Assignment: funcionesTelefonos.js
 */
/* Name: Carlos Hilario
 */
/* Date: 21/03/2014.
 */
/* Description: contiene todos los metodos para mostrar guardar y actualizar los datos de los telefonos
 */

$(document).ready(inicioVehiculo);


function inicioVehiculo() {



    $("#id_arb_agregar_telefono").bind({
        click: function() {
            $("#todosp").css("background-color", "#FFFFFF");
            $("#activop").css("background-color", "#FFFFFF");
            $("#noactivop").css("background-color", "#FFFFFF");
            $("#agregarproy").css("background-color", "#FFFFFF");

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
            $("#agregartel").css("background-color", "#fbec88");
            $("#bajac").css("background-color", "#FFFFFF");
            $("#bajav").css("background-color", "#FFFFFF");
            $("#bajat").css("background-color", "#FFFFFF");
            $("#reportes").css("background-color", "#FFFFFF");
            $('#panelLeft_2_1').html("");
            $('#panelCenter_2_1').html("");
            $("#titulo_pagina_3").val("Bitacoras");
            agregarTelefono();

        }


    });
    //muestra los telefonos activos

    $("#id_arb_tel_activos").bind({
        click: function() {
            $("#todosp").css("background-color", "#FFFFFF");
            $("#activop").css("background-color", "#FFFFFF");
            $("#noactivop").css("background-color", "#FFFFFF");
            $("#agregarproy").css("background-color", "#FFFFFF");
            $("#todosc").css("background-color", "#FFFFFF");
            $("#activoc").css("background-color", "#FFFFFF");
            $("#noactivoc").css("background-color", "#FFFFFF");
            $("#agregarcond").css("background-color", "#FFFFFF");
            $("#todosv").css("background-color", "#FFFFFF");
            $("#activov").css("background-color", "#FFFFFF");
            $("#noactivov").css("background-color", "#FFFFFF");
            $("#agregarvehi").css("background-color", "#FFFFFF");
            $("#todost").css("background-color", "#FFFFFF");
            $("#activot").css("background-color", "#fbec88");
            $("#noactivot").css("background-color", "#FFFFFF");
            $("#agregartel").css("background-color", "#FFFFFF");
            $("#bajac").css("background-color", "#FFFFFF");
            $("#bajav").css("background-color", "#FFFFFF");
            $("#bajat").css("background-color", "#FFFFFF");
            $("#reportes").css("background-color", "#FFFFFF");
            $('#panelLeft_2_1').html("");
            $('#panelCenter_2_1').html("");
            $("#titulo_pagina_3").val("Bitacoras");
            cargarTelefonos(1);

        }


    });
    //muestra los telefonos no activos
    $("#id_arb_tel_noactivos").bind({
        click: function() {
            $("#todosp").css("background-color", "#FFFFFF");
            $("#activop").css("background-color", "#FFFFFF");
            $("#noactivop").css("background-color", "#FFFFFF");
            $("#agregarproy").css("background-color", "#FFFFFF");
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
            $("#noactivot").css("background-color", "#fbec88");
            $("#agregartel").css("background-color", "#FFFFFF");
            $("#bajac").css("background-color", "#FFFFFF");
            $("#bajav").css("background-color", "#FFFFFF");
            $("#bajat").css("background-color", "#FFFFFF");
            $("#reportes").css("background-color", "#FFFFFF");
            $('#panelLeft_2_1').html("");
            $('#panelCenter_2_1').html("");
            $("#titulo_pagina_3").val("Bitacoras");
            cargarTelefonos(2);

        }

    });

    //muestra todos los telefono//

    $("#id_arb_tel_todos").bind({
        click: function() {
            $("#todosp").css("background-color", "#FFFFFF");
            $("#activop").css("background-color", "#FFFFFF");
            $("#noactivop").css("background-color", "#FFFFFF");
            $("#agregarproy").css("background-color", "#FFFFFF");
            $("#todosc").css("background-color", "#FFFFFF");
            $("#activoc").css("background-color", "#FFFFFF");
            $("#noactivoc").css("background-color", "#FFFFFF");
            $("#agregarcond").css("background-color", "#FFFFFF");
            $("#todosv").css("background-color", "#FFFFFF");
            $("#activov").css("background-color", "#FFFFFF");
            $("#noactivov").css("background-color", "#FFFFFF");
            $("#agregarvehi").css("background-color", "#FFFFFF");
            $("#todost").css("background-color", "#fbec88");
            $("#activot").css("background-color", "#FFFFFF");
            $("#noactivot").css("background-color", "#FFFFFF");
            $("#agregartel").css("background-color", "#FFFFFF");
            $("#bajac").css("background-color", "#FFFFFF");
            $("#bajav").css("background-color", "#FFFFFF");
            $("#bajat").css("background-color", "#FFFFFF");
            $("#reportes").css("background-color", "#FFFFFF");
            $('#panelLeft_2_1').html("");
            $('#panelCenter_2_1').html("");
            $("#titulo_pagina_3").val("Bitacoras");
            cargarTelefonos(3);

        }


    });
    //muestra los telefonos dados de baja
    $("#id_arb_tel_baja").bind({
        click: function() {
            $("#todosp").css("background-color", "#FFFFFF");
            $("#activop").css("background-color", "#FFFFFF");
            $("#noactivop").css("background-color", "#FFFFFF");
            $("#agregarproy").css("background-color", "#FFFFFF");
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
            $("#bajac").css("background-color", "#FFFFFF");
            $("#bajav").css("background-color", "#FFFFFF");
            $("#bajat").css("background-color", "#fbec88");
            $("#reportes").css("background-color", "#FFFFFF");
            $('#panelLeft_2_1').html("");
            $('#panelCenter_2_1').html("");
            $("#titulo_pagina_3").val("Bitacoras");
            cargarTelefonos(4);

        }

    });

}


//function que carga grid de vehiculos

function cargarTelefonos(opcion1) {

    var seleccion = false;
    var id_telefono;
    var numero;
    var correo;
    var id_simbiosys;
    var cuenta_endomondo;
    var estatus;
    var fotoTelefono;
    var color;
    $("#panelCenter_2_1").html("");
    if ($("#panelCenter_1_1").height() != 300)

    {
        $("#panelCenter_1_1").css("height", "+=300");
        $("#panelCenter_2_1").css("height", "-=290");
    }
    $('#panelCenter_1_1').load('../../Telefono/view/viewGridTelefonos.php', {}, function(data) {

        if (opcion1 == 1)
        {

            $("#titletelefonos").html("Telefonos Activos");
        }
        if (opcion1 == 2)
        {

            $("#titletelefonos").html("Telefonos No Activos");
        }
        if (opcion1 == 3)
        {

            $("#titletelefonos").html("Todos los Telefonos");
        }


        $("#tabla_Admin_Telefonos").jqGrid({
            url: '../../Telefono/controller/controllerTelefonos.php',
            postData: {
                opcion: "listar",
                opcion1: opcion1
            },
            datatype: 'json',
            height: 250,
            colNames: ['id_telefono', 'Numero', 'Correo', 'Cuenta Endomondo', 'Identificador Simbiosys', 'Estatus', 'foto Telefono', 'Estatus', 'color'],
            colModel: [
                {
                    display: 'id_telefono',
                    name: 'id_telefono',
                    width: 10,
                    sortable: true,
                    hidden: true


                },
                {
                    display: 'Numero',
                    name: 'Numero',
                    width: 10,
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
                    display: 'Correo',
                    name: 'Correo',
                    width: 30,
                    sortable: true,
                    align: 'right'


                },
                {
                    display: 'cuenta_endomondo',
                    name: 'cuenta_endomondo',
                    width: 30,
                    sortable: true,
                    align: 'right'
                },
                {
                    display: 'id_simbiosys',
                    name: 'id_simbiosys',
                    width: 30,
                    sortable: true,
                    align: 'right'
                    //  hidden:true
            },
                {
                    display: 'Estatus',
                    name: 'Estatus',
                    hidden: true,
                    width: 10,
                    sortable: true,
                    align: 'right'
                },
                {
                    display: 'fotoTelefono',
                    name: 'fotoTelefono',
                    width: 10,
                    sortable: true,
                    align: 'right',
                    hidden: true
                },
                {
                    display: 'Estatus',
                    name: 'Estatus',
                    width: 10,
                    sortable: true,
                    align: 'center'
//                hidden: true
                },
                {
                    display: 'color',
                    name: 'color',
                    width: 10,
                    sortable: true,
                    align: 'right',
                hidden: true
                }
            ],
            rowNum: 10,
            pager: '#pager2',
            sortname: 'id_telefono',
            viewrecords: true,
            sortorder: "asc",
            emptyrecords: "No existen registros",
            autoheight: true,
            autowidth: true,
            scrollOffset: 22,
            onSelectRow: function(id) {
                seleccion = true;






                id_telefono = $(this).jqGrid('getCell', id, 0);
                numero = $(this).jqGrid('getCell', id, 1);
                correo = $(this).jqGrid('getCell', id, 2);
                cuenta_endomondo = $(this).jqGrid('getCell', id, 3);
                id_simbiosys = $(this).jqGrid('getCell', id, 4);
                estatus = $(this).jqGrid('getCell', id, 5);
                fotoTelefono = $(this).jqGrid('getCell', id, 6);
                color = $(this).jqGrid('getCell', id, 8);
                // -- inicio datos a modificar

//alert(color);alert(fotoTelefono);
                verinformaciontelefono(id_telefono, numero, correo, cuenta_endomondo, id_simbiosys, estatus, fotoTelefono,color);


                //-- fin datos modificar
                $("#panelCenter_2_1").html("");
            }


        });
        $("#tabla_Admin_Telefonos").jqGrid('navGrid', '#pager2', {
            edit: false,
            add: false,
            search: false,
            del: false,
            refresh: false,
            view: false
        });

//        $("#tabla_Admin_Telefonos").jqGrid('navButtonAdd','#pager2',{
//            caption:"<img src=/SeguimientoTrue/trunk/interfaz/view/images/Iconos_jqgrid/phoneAdd.png />",
//            buttonicon:"ui-icon-vacio",
//            cursor: "pointer",
//            title:"Agregar Telefono",
//            //        id:"NuevoUsu",
//            onClickButton: function () {
//                $("#panelCenter_2_1").html("");
//                agregarTelefono();
//            } 
//        });
        //-- inicio modificar dats conductor
        $("#tabla_Admin_Telefonos").jqGrid('navButtonAdd', '#pager2', {
            caption: "<img src=/interfaz/view/images/Iconos_jqgrid/phoneMod.png />",
            buttonicon: "ui-icon-vacio",
            cursor: "pointer",
            title: "Modificar datos Telefono",
            onClickButton: function() {



                if (seleccion) {
                    $("#panelCenter_2_1").html("");
                    modificarDatosTelefono(id_telefono, numero, correo, cuenta_endomondo, id_simbiosys, estatus, fotoTelefono,color);
                    seleccion = false;
                } else {

                    $(function() {
                        $("#ventanAlertas").html("Elija un tel&eacute;fono");
                        $("#ventanAlertas").attr('style', 'visible');
                        $("#ventanAlertas").dialog({
                            //tru para que no interactue con otro elementos minestas se encuentra la ventana
                            modal: false,
                            title: 'Tel&eacute;fono',
                            show: {
                                effect: "shake",
                                duration: 100
                            },
                            // ocultar con efecto y tiemepo
                            hide: {
                                effect: "slide",
                                duration: 600
                            },
                            //ancho que aparecera
                            width: 200,
                            //altura en que aparecear
                            height: 140,
                            //maxima altura
                            maxHeight: 180,
                            //maxima anchura
                            maxWidth: 400,
                            //minima altura
                            minHeight: 180,
                            //minima anchura
                            minWidth: 200,
                            //para moverla
                            draggable: true,
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

        //-- fin modificar datos conductor
        //-- inicio cambio de estatus conductor        
//        $("#tabla_Admin_Telefonos").jqGrid('navButtonAdd','#pager2',{
//           caption:"<img src=/SeguimientoTrue/trunk/interfaz/view/images/Iconos_jqgrid/phonedownUp.png />",
//            buttonicon:"ui-icon-vacio", 
//            cursor: "pointer",
//            title:"Cambio de estatus",
//            onClickButton: function () {
//                       
//                       
//                if(seleccion){
//                    $("#panelCenter_2_1").html("");
//                    cambioDeEstatusTelefono(id_telefono, numero, estatus);
//                    seleccion=false;     
//                }else{
//                           
//                    $(function() {
//                       $( "#ventanAlertas" ).html("Elija un tel&eacute;fono");
//                        $( "#ventanAlertas" ).attr('style', 'visible');
//                        $( "#ventanAlertas" ).dialog({
//                            //tru para que no interactue con otro elementos minestas se encuentra la ventana
//                            modal: false,
//                            title:'Tel&eacute;fono',
//                             show: {
//                                effect: "shake", 
//                                duration: 100
//                            },
//                            // ocultar con efecto y tiemepo
//                            hide: {
//                                effect: "slide", 
//                                duration: 600
//                            },
//                            //ancho que aparecera
//                            width:200,
//                            //altura en que aparecear
//                            height: 140,
//                            //maxima altura
//                            maxHeight: 180,
//                            //maxima anchura
//                            maxWidth: 400,
//                             //minima altura
//                            minHeight: 180,
//                            //minima anchura
//                            minWidth: 200,
//                            //para moverla
//                            draggable: true,
//                          
//                          
//                            buttons: {
//                                Aceptar: function() {
//                                                            
//                                    $( this ).dialog( "close" );
//                                    $("#tabla_Admin_Conductores").trigger("reloadGrid");  
//                                                        
//                                }
//                            }
//                        });
//                    });
//                           
//                }
//                      
//                       
//            } 
//        });
        //-- Fin cambio de estatus conductor   

    });

}
// fin funcion mostrar vehiculos



function agregarTelefono() {


    var validaText;
    var validaSelect;
    var camposBien;
    var strColorSeleccionado;
    $("#panelCenter_1_1").html("");
    if ($("#panelCenter_1_1").height() == 300)

    {
        $("#panelCenter_1_1").css("height", "-=300");
        $("#panelCenter_2_1").css("height", "+=290");
    }
    $("#panelCenter_2_1").load("../../Telefono/view/viewCapturaTelefono.php", function(data) {

        //escuchamos el evento change del control
        document.getElementById('clrColor').addEventListener('change', function() {
            //obtenemos el color seleccionado por el usuario
            strColorSeleccionado = this.value;
            //seleccionamos la capa que vamos a cambiar de color
            var objCapa = document.getElementById('divColor');

            //le colocamos el nuevo color de fondo a la capa
//				objCapa.style.backgroundColor=strColorSeleccionado;
//				//mostramos el codigo del color seleccionado
//				objCapa.innerHTML=strColorSeleccionado;
$("#clrColor").val(strColorSeleccionado);

        });

        $("input:text").bind({
            focusout: function() {

                quitarClaseTxtR($(this).attr('id'));



           },
            focusin: function() {

                agregarClaseTxtR($(this).attr('id'));

            }





        });

        $("#txtcleNokia").focus();

        $("select").bind({
            blur: function() {

                quitarClaseTxtR($(this).attr('id'));

            },
            focus: function() {

                agregarClaseTxtR($(this).attr('id'));

            }

        });

        //inicioboton de agregar conductor 

        $("#btnGuardarTelefono").bind({
            click: function() {


                validaText = verificarCamposTelefonoText();


                if (validaText) {


                    camposBien = validarCamposTelefono();

                    if (camposBien) {
                        var validaTipoImg = verificarCamposTipoArchTel();
                        if (validaTipoImg) {

                            cargarArchivosTel();
//                        alert($("#IdentificadorTel").val());
                            $.post("../../Telefono/controller/controllerAltaTelefono.php", {
                                numero: $("#numeroTel").val(),
                                correo: $("#correoTel").val(),
                                cuenta: $("#EndomondoTel").val(),
                                identificador: $("#IdentificadorTel").val(),
                                estatus: 1,
                                fototelefono: $("#fotoTelefono").val(),
                                color: $("#clrColor").val()

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
                                                $("#panelCenter_2_1").html("");
                                                $("#tabla_Admin_Telefonos").trigger("reloadGrid");

                                            }
                                        }
                                    });
                                });
                            });
                        } else {
                            $(function() {
                                $("#ventanAlertas").html("Tipo de Archivo No valido");
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

                    } else {
                        $(function() {
                            $("#ventanAlertas").html("Formatos no validos");
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
//boton guardar y añadir otro telefono
        $("#btnGuardarTelefonoOtro").bind({
            click: function() {


                validaText = verificarCamposTelefonoText();


                if (validaText) {


                    camposBien = validarCamposTelefono();

                    if (camposBien) {
                        var validaTipoImg = verificarCamposTipoArchTel();
                        if (validaTipoImg) {

                            cargarArchivosTel();
//                        alert($("#IdentificadorTel").val());
                            $.post("../../Telefono/controller/controllerAltaTelefono.php", {
                                numero: $("#numeroTel").val(),
                                correo: $("#correoTel").val(),
                                cuenta: $("#EndomondoTel").val(),
                                identificador: $("#IdentificadorTel").val(),
                                estatus: 1,
                                fototelefono: $("#fotoTelefono").val(),
                                color: strColorSeleccionado

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
//                                            $("#panelCenter_2_1").html("");
//                                            $("#tabla_Admin_Telefonos").trigger("reloadGrid");  
                                                agregarTelefono()
                                            }
                                        }
                                    });
                                });
                            });
                        } else {
                            $(function() {
                                $("#ventanAlertas").html("Tipo de Archivo No valido");
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

                    } else {
                        $(function() {
                            $("#ventanAlertas").html("Formatos no validos");
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
        //fin

        //inicio cancelar agregar conductor

        $("#btnCancelarTelefono").bind({
            click: function() {
                $("#panelCenter_2_1").html("");
            }

        });

        //fin cancelar agregar conductor

    });

}

function verificarCamposTelefonoText() {

    var camposLlenos = true;
    $("#formCapturaTelefono input:text ").each(function(index) {



        if ($(this).val() == "") {

            camposLlenos = false;
            quitarClaseTxtV($(this).attr('id'));
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

function verificarCamposCapturadosSelectTelefono() {

    var camposLlenos = true;
    $("#formCapturaTelefono select ").each(function(index) {



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


function validarCamposTelefono() {

    var valida;
    //poner numero de cmapos que son
    var camposBien = 3;

    $("#formCapturaTelefono input:text ").each(function() {



        if ($(this).attr('name') == "numeroTelefonico") {

            valida = validarTel($(this).val());

            if (valida != "ok") {

                campoNecesario($(this).attr("id"));



            } else {

                camposBien -= 1;
            }

        }

        //validar cel
        if ($(this).attr('name') == "correo") {

            valida = validarEmail($(this).val());

            if (valida != "ok") {

                campoNecesario($(this).attr("id"));



            } else {

                camposBien -= 1;
            }
        }

        //validar email
        if ($(this).attr('name') == "id_Simbiosys") {

            valida = validarNumerosLetrasGuiones($(this).val());


            if (valida != "ok") {
                campoNecesario($(this).attr("id"));



            } else {

                camposBien -= 1;
            }
        }


    });

    if (camposBien == 0) {
        return true;
    } else {
        return false
    }
}


function modificarDatosTelefono(id_telefono, numero, correo, cuenta_endomondo, id_simbiosys, estatus, fotoTelefono,color) {
//    var ruta;
    var validaText;
//    if(estatus == 1){
//            
//        ruta="<img src='/SeguimientoTrue/trunk/interfaz/view/images/Green Ball.png' />";
//    }else{
//            
//        ruta=  "<img src='/SeguimientoTrue/trunk/interfaz/view/images/Red Ball.png' />";
//            
//    }
    //    alert(id_conductor+" "+nombre+""+apellido+" "+direccion+" "+direccion2+" "+tel+""+cel+" "+email+" "+estatus);


    var validaSelect;
    var camposBien;
    var strColorSeleccionado;
    var nuevocolor;
    if (estatus == 1)
    {
        var estatuss = "Alta";
    }
    if (estatus == 0)
    {
        estatuss = "Baja";
    }
//     $("#panelCenter_1_1").html("");
    $("#panelCenter_2_1").load("../../Telefono/view/viewModificarTelefono.php", function(data) {



        $("#numeroTel").val(numero);
        $("#correoTel").val(correo);
        $("#EndomondoTel").val(cuenta_endomondo);
        $("#IdentificadorTel").val(id_simbiosys);
//        $("#fotoTelefono").val(fotoTelefono);
        $("#selectEstatus").val(estatus);
        $("#clrColor").val(color);  



        $("input:text").bind({
            focusout: function() {

                quitarClaseTxtR($(this).attr('id'));



           },
            focusin: function() {

                agregarClaseTxtR($(this).attr('id'));

            }





        });

        $("#numeroTel").focus();
var cambiodecolor=false;        //escuchamos el evento change del control
        document.getElementById('clrColor').addEventListener('change', function() {
            //obtenemos el color seleccionado por el usuario
            strColorSeleccionado = this.value;
            //seleccionamos la capa que vamos a cambiar de color
            var objCapa = document.getElementById('divColor');

            //le colocamos el nuevo color de fondo a la capa
//				objCapa.style.backgroundColor=strColorSeleccionado;
//				//mostramos el codigo del color seleccionado
//				objCapa.innerHTML=strColorSeleccionado;
$("#clrColor").val(strColorSeleccionado);
//alert(strColorSeleccionado);
cambiodecolor=true;
 $("#clrColor").val(strColorSeleccionado); 
        });
//if(cambiodecolor==true)
//{nuevocolor=strColorSeleccionado;
//    alert(strColorSeleccionado);}
//else if(cambiodecolor==false)
//{nuevocolor=color;}
//        //inicioboton de agregar conductor 
//alert(nuevocolor);
        $("#btnModificarVehiculo").bind({
            click: function() {
                var fototelefonomodificar = "";
                var hayarchivosnuevos = false;

//alert($("#clrColor").val());
                validaText = verificarCamposTelefonoText();
                validaSelect = verificarCamposCapturadosSelectTelefono();
                //                alert(validaSelect+" -- "+validaText);
                if (validaText && validaSelect) {


                    camposBien = validarCamposTelefono();

                    if (camposBien) {
                        if ($("#fotoTelefono").val() != "")
                        {
                            fototelefonomodificar = $("#fotoTelefono").val();
                            hayarchivosnuevos = true;
                        }
                        else if ($("#fotoTelefono").val() == "")
                        {
                            fototelefonomodificar = fotoTelefono;

                        }

                        if (hayarchivosnuevos === true) {
                            var validaTipoImg = verificarCamposTipoArchTel();
                            if (validaTipoImg) {

                                cargarArchivosTel();

                                $.post("../../Telefono/controller/controllerModificarTelefono.php", {
                                    id_telefono: id_telefono,
                                    numero: $("#numeroTel").val(),
                                    correo: $("#correoTel").val(),
                                    cuenta: $("#EndomondoTel").val(),
                                    identificador: $("#IdentificadorTel").val(),
                                    estatus: $("#selectEstatus").val(),
                                    fototelefono: fototelefonomodificar,
                                    color: $("#clrColor").val()


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
                                                    $("#tabla_Admin_Telefonos").trigger("reloadGrid");

                                                }
                                            }
                                        });
                                    });
                                });

                            }

else{
                                $(function() {
                                    $("#ventanAlertas").html('tipo de archivo no valido');
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
                        if (hayarchivosnuevos == false) {

                            $.post("../../Telefono/controller/controllerModificarTelefono.php", {
                                id_telefono: id_telefono,
                                numero: $("#numeroTel").val(),
                                correo: $("#correoTel").val(),
                                cuenta: $("#EndomondoTel").val(),
                                identificador: $("#IdentificadorTel").val(),
                                estatus: $("#selectEstatus").val(),
                                fototelefono: fototelefonomodificar,
                                color: $("#clrColor").val()


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
                                                $("#tabla_Admin_Telefonos").trigger("reloadGrid");

                                            }
                                        }
                                    });
                                });
                            });

                        }
                    } else {
                        $(function() {
                            $("#ventanAlertas").html("Formatos no validos");
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

        $("#btnCancelarVehiculo").bind({
            click: function() {
                $("#panelCenter_2_1").html("");
            }

        });

        //fin cancelar agregar conductor

    });
}


function cambioDeEstatusTelefono(id_telefono, numero, estatus) {
    var cambio;
    var altaBaja;
    if (estatus == 1) {

        altaBaja = "baja"

    } else {
        altaBaja = "alta"
    }

    $(function() {
        $("#ventanAlertas").html("Seguro que quieres dar " + altaBaja + " al telefono con numero <br>" + numero + "??");
        $("#ventanAlertas").attr('style', 'visible');
        $("#ventanAlertas").dialog({
            modal: true,
            title: 'Conductor',
            show: 'explode',
            hide: 'explode',
            buttons: {
                Aceptar: function() {

                    if (estatus == 1) {

                        cambio = 0;

                    } else {
                        cambio = 1
                    }

                    $.post("../../Telefono/controller/controllerEstatusTelefono.php", {
                        id: id_telefono,
                        estatus: cambio
                    }, function(data) {


                        if (estatus == 1) {

                            data += numero + " a sido dado de baja";

                        } else {

                            data += numero + " a sido dado de alta";

                        }

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
                                        $("#tabla_Admin_Telefonos").trigger("reloadGrid");

                                    }
                                }
                            });
                        });
                    });
                    $(this).dialog("close");
                },
                Cancelar: function() {

                    $(this).dialog("close");


                }
            }
        });
    });

}



function verinformaciontelefono(id_telefono, numero, correo, cuenta_endomondo, id_simbiosys, estatus, fotoTelefono,color)

{

    var rutaArchivos = '../../Telefono/controller/FotoTelefono/';
    $("#panelCenter_2_1").load('../../Telefono/view/viewInformacionTelefono.php', {}, function(data) {

        $("#informaciontelefono1").html('<br><br> <font face="Sans MS,arial,verdana" size=4><p>Numero: ' + numero + '</p><br /> \n\
                    <p>Email: ' + correo + '</p><br />\n\
                    <p>Endomondo: ' + cuenta_endomondo + '</p><br />\n\
                    <p>Id_Simbiosys: ' + id_simbiosys + '</p></font> ');

        $("#fototelefono").html('<br><img src=' + rutaArchivos + fotoTelefono + '  width="120" height="120" title=' + numero + ' />');
$("#clrColor").val(color);  
    });

}