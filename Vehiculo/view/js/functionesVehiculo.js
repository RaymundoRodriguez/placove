/* PLACOVE: Vehiculo
 */
/* Name: Irandis
 */
/* Date: 14/03/2014
 */
/* Description: Este archivo contiene las funciones para mostrar, modificar, guardar vehiculos.
 */

$(document).ready(inicioVehiculo);


function inicioVehiculo() {
            

    $("#id_arb_vehi").bind({
        click: function() {
            $('#panelLeft_2_1').trigger("reloadGrid");
            $('#panelCenter_2_1').trigger("reloadGrid");
            $("#titulo_pagina_3").val("Bitacoras");

        }


    });
    $("#id_agregar_vehiculo").bind({
        click: function() {
            $("#todosc").css("background-color", "#FFFFFF");
            $("#activoc").css("background-color", "#FFFFFF");
            $("#noactivoc").css("background-color", "#FFFFFF");
            $("#agregarcond").css("background-color", "#FFFFFF");
            $("#todost").css("background-color", "#FFFFFF");
            $("#activot").css("background-color", "#FFFFFF");
            $("#noactivot").css("background-color", "#FFFFFF");
            $("#agregartel").css("background-color", "#FFFFFF");
            $("#todosp").css("background-color", "#FFFFFF");
            $("#activop").css("background-color", "#FFFFFF");
            $("#noactivop").css("background-color", "#FFFFFF");
            $("#agregarproy").css("background-color", "#FFFFFF");
            $("#todosv").css("background-color", "#FFFFFF");
            $("#activov").css("background-color", "#FFFFFF");
            $("#noactivov").css("background-color", "#FFFFFF");
            $("#agregarvehi").css("background-color", "#fbec88");
             $("#bajat").css("background-color", "#FFFFFF");
            $("#bajac").css("background-color", "#FFFFFF");
            $("#bajav").css("background-color", "#FFFFFF");
            $("#reportes").css("background-color", "#FFFFFF");
            $('#panelLeft_2_1').html("");
            $('#panelCenter_2_1').html("");
            $("#titulo_pagina_3").val("Bitacoras");
            agregarVehiculo();

        }

    });

    //manda a llamar a la funcion cargar vehiculos para mostrar todos
    $("#id_arb_vehiculos_todos").bind({
        click: function() {
            $("#todosc").css("background-color", "#FFFFFF");
            $("#activoc").css("background-color", "#FFFFFF");
            $("#noactivoc").css("background-color", "#FFFFFF");
            $("#agregarcond").css("background-color", "#FFFFFF");
            $("#todost").css("background-color", "#FFFFFF");
            $("#activot").css("background-color", "#FFFFFF");
            $("#noactivot").css("background-color", "#FFFFFF");
            $("#agregartel").css("background-color", "#FFFFFF");
            $("#todosp").css("background-color", "#FFFFFF");
            $("#activop").css("background-color", "#FFFFFF");
            $("#noactivop").css("background-color", "#FFFFFF");
            $("#agregarproy").css("background-color", "#FFFFFF");
            $("#todosv").css("background-color", "#fbec88");
            $("#activov").css("background-color", "#FFFFFF");
            $("#noactivov").css("background-color", "#FFFFFF");
            $("#agregarvehi").css("background-color", "#FFFFFF");
             $("#bajat").css("background-color", "#FFFFFF");
            $("#bajac").css("background-color", "#FFFFFF");
            $("#bajav").css("background-color", "#FFFFFF");
            $("#reportes").css("background-color", "#FFFFFF");
            $('#panelLeft_2_1').html("");
            $('#panelCenter_2_1').html("");
            $("#titulo_pagina_3").val("Bitacoras");
            cargarVehiculos(1);

        }


    });
    //manda a llamar a la funcion para mostrar los vehiculos activos

    $("#id_arb_vehiculos_activos").bind({
        click: function() {
            $("#todosc").css("background-color", "#FFFFFF");
            $("#activoc").css("background-color", "#FFFFFF");
            $("#noactivoc").css("background-color", "#FFFFFF");
            $("#agregarcond").css("background-color", "#FFFFFF");
            $("#todost").css("background-color", "#FFFFFF");
            $("#activot").css("background-color", "#FFFFFF");
            $("#noactivot").css("background-color", "#FFFFFF");
            $("#agregartel").css("background-color", "#FFFFFF");
            $("#todosp").css("background-color", "#FFFFFF");
            $("#activop").css("background-color", "#FFFFFF");
            $("#noactivop").css("background-color", "#FFFFFF");
            $("#agregarproy").css("background-color", "#FFFFFF");
            $("#todosv").css("background-color", "#FFFFFF");
            $("#activov").css("background-color", "#fbec88");
            $("#noactivov").css("background-color", "#FFFFFF");
            $("#agregarvehi").css("background-color", "#FFFFFF");
             $("#bajat").css("background-color", "#FFFFFF");
            $("#bajac").css("background-color", "#FFFFFF");
            $("#bajav").css("background-color", "#FFFFFF");
            $("#reportes").css("background-color", "#FFFFFF");
            $('#panelLeft_2_1').html("");
            $('#panelCenter_2_1').html("");
            $("#titulo_pagina_3").val("Bitacoras");
            cargarVehiculos(2);
        }
    });
    //manda a llamar a la funcion para mostrar los vehiculos no activos

    $("#id_arb_vehiculos_noactivos").bind({
        click: function() {
            $("#todosc").css("background-color", "#FFFFFF");
            $("#activoc").css("background-color", "#FFFFFF");
            $("#noactivoc").css("background-color", "#FFFFFF");
            $("#agregarcond").css("background-color", "#FFFFFF");
            $("#todost").css("background-color", "#FFFFFF");
            $("#activot").css("background-color", "#FFFFFF");
            $("#noactivot").css("background-color", "#FFFFFF");
            $("#agregartel").css("background-color", "#FFFFFF");
            $("#todosp").css("background-color", "#FFFFFF");
            $("#activop").css("background-color", "#FFFFFF");
            $("#noactivop").css("background-color", "#FFFFFF");
            $("#agregarproy").css("background-color", "#FFFFFF");
            $("#todosv").css("background-color", "#FFFFFF");
            $("#activov").css("background-color", "#FFFFFF");
            $("#noactivov").css("background-color", "#fbec88");
            $("#agregarvehi").css("background-color", "#FFFFFF");
        
            $("#bajat").css("background-color", "#FFFFFF");
            $("#bajac").css("background-color", "#FFFFFF");
            $("#bajav").css("background-color", "#FFFFFF");
            $("#reportes").css("background-color", "#FFFFFF");
            $('#panelLeft_2_1').html("");
            $('#panelCenter_2_1').html("");
            $("#titulo_pagina_3").val("Bitacoras");
            cargarVehiculos(3);
        }
    });
     $("#id_arb_vehiculos_baja").bind({
        click: function() {
            $("#todosc").css("background-color", "#FFFFFF");
            $("#activoc").css("background-color", "#FFFFFF");
            $("#noactivoc").css("background-color", "#FFFFFF");
            $("#agregarcond").css("background-color", "#FFFFFF");
            $("#todost").css("background-color", "#FFFFFF");
            $("#activot").css("background-color", "#FFFFFF");
            $("#noactivot").css("background-color", "#FFFFFF");
            $("#agregartel").css("background-color", "#FFFFFF");
            $("#todosp").css("background-color", "#FFFFFF");
            $("#activop").css("background-color", "#FFFFFF");
            $("#noactivop").css("background-color", "#FFFFFF");
            $("#agregarproy").css("background-color", "#FFFFFF");
            $("#todosv").css("background-color", "#FFFFFF");
            $("#activov").css("background-color", "#FFFFFF");
            $("#noactivov").css("background-color", "#FFFFFF");
            $("#agregarvehi").css("background-color", "#FFFFFF");
             $("#bajat").css("background-color", "#FFFFFF");
            $("#bajac").css("background-color", "#FFFFFF");
            $("#bajav").css("background-color", "#fbec88");
            $("#reportes").css("background-color", "#FFFFFF");
            
            $('#panelLeft_2_1').html("");
            $('#panelCenter_2_1').html("");
            $("#titulo_pagina_3").val("Bitacoras");
            cargarVehiculos(4);
        }
    });
    
}


//function que carga grid de vehiculos

function cargarVehiculos(opcion1) {

    var seleccion = false;
    var id_vehiculo;
    var id_nokia;
    var tarLlave;
    var tarGas;
    var tecnologia;
    var estatus;
    var marca;
    var modelo;
    var fotoplacas;
    var fotovehiculo;
    var identificador;
    $("#panelCenter_2_1").html("");
    if( $("#panelCenter_1_1").height()!=300)
        
        {
    $("#panelCenter_1_1").css("height","+=300");
    $("#panelCenter_2_1").css("height","-=290");
}
    $('#panelCenter_1_1').load('../../Vehiculo/view/viewGridVehiculos.php', {}, function(data) {





        $("#tabla_Admin_Vehiculos").jqGrid({
            url: '../../Vehiculo/controller/controllerVehiculos.php',
            postData: {
                opcion: "listar",
                opcion1: opcion1
            },
            datatype: 'json',
            height:250,
            colNames: ['id_vehiculo', 'id_nokia', 'Tarjeta llave', 'Tarjeta gasolina', 'Tecnologia', 'Marca', 'Modelo', 'Foto vehiculo', 'Placas', 'EstatusNum','Identificador Simbiosys', 'Estatus'],
            colModel: [
                {
                    display: 'id_vehiculo',
                    name: 'id_vehiculo',
                    width: 10,
                    sortable: true,
                    hidden: true


                },
                {
                    display: 'id_nokia',
                    name: 'id_nokia',
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
                    display: 'tarjeta_llave',
                    name: 'tarjeta_llave',
                    width: 30,
                    sortable: true,
                    align: 'right'


                },
                {
                    display: 'tarjeta_gasolina',
                    name: 'tarjeta_gasolina',
                    width: 30,
                    sortable: true,
                    align: 'right'
                },
                {
                    display: 'Tecnologia',
                    name: 'Tecnologia',
                    width: 25,
                    sortable: true,
                    align: 'right'
                            //  hidden:true
                },
                {
                    display: 'Marca',
                    name: 'Marca',
                    hidden: true,
                    width: 10,
                    sortable: true,
                    align: 'right'
                },
                {
                    display: 'Modelo',
                    name: 'Modelo',
                    hidden: true,
                    width: 10,
                    sortable: true,
                    align: 'right'
                },
                {display: 'foto_vehiculo',
                    name: 'foto_vehiculo',
                    hidden: true,
                    width: 10,
                    sortable: true,
                    align: 'right'
                },
                {display: 'Placas',
                    name: 'Placas',
                    hidden: true,
                    width: 10,
                    sortable: true,
                    align: 'right'
                },
                {
                    display: 'EstatusNum',
                    name: 'EstatusNum',
                    hidden: true,
                    width: 10,
                    sortable: true,
                    align: 'right'
                },
                       {
                    display: 'Identificador Simbiosys',
                    name: 'Identificador Simbiosys',
                    width: 13,
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
//            rowNum: 100,
//            pager: '#pager2',
//            sortname: 'id_vehiculo',
//            viewrecords: true,
//            sortorder: "asc",
//            emptyrecords: "No existen registros",
//            autoheight: true,
//            autowidth: true,
//            scrollOffset: 22,
            rowNum: 10,
//            rowList:[15,30],
            pager: '#pager2',
            sortname: 'id_vehiculo',
            viewrecords: true,
            sortorder: "asc",
            emptyrecords: "No existen registros",
            autoheight: true,
            autowidth: true,
            onSelectRow: function(id) {
                seleccion = true;

                id_vehiculo = $(this).jqGrid('getCell', id, 0);
                id_nokia = $(this).jqGrid('getCell', id, 1);
                tarLlave = $(this).jqGrid('getCell', id, 2);
                tarGas = $(this).jqGrid('getCell', id, 3);
                tecnologia = $(this).jqGrid('getCell', id, 4);
                marca = $(this).jqGrid('getCell', id, 5);
                modelo = $(this).jqGrid('getCell', id, 6);
                fotovehiculo = $(this).jqGrid('getCell', id, 7);
                fotoplacas = $(this).jqGrid('getCell', id, 8);
                estatus = $(this).jqGrid('getCell', id, 9);
                identificador= $(this).jqGrid('getCell', id, 10);
                verinformacionvehiculo(id_vehiculo, id_nokia, tarLlave, tarGas, tecnologia, marca, modelo, fotovehiculo, fotoplacas, estatus,identificador);

//                $("#panelCenter_2_1").html("");
            }


        });
        $("#tabla_Admin_Vehiculos").jqGrid('navGrid', '#pager2', {
            edit: false,
            add: false,
            search: false,
            del: false,
            refresh: false,
            view: false
        });

//
//        $("#tabla_Admin_Vehiculos").jqGrid('navButtonAdd', '#pager2', {
//            caption: "<img src=/SeguimientoTrue1/trunk/interfaz/view/images/Iconos_jqgrid/vw-beetle-iconAdd.png />",
//            buttonicon: "ui-icon-vacio",
//            cursor: "pointer",
//            title: "Agregar Vehiculo",
//            //        id:"NuevoUsu",
//            onClickButton: function() {
//                $("#panelCenter_2_1").html("");
//                agregarVehiculo();
//            }
//        });
        //-- inicio modificar dats conductor
        $("#tabla_Admin_Vehiculos").jqGrid('navButtonAdd', '#pager2', {
            caption: "<img src=/interfaz/view/images/Iconos_jqgrid/vw-beetle-iconMod.png />",
            buttonicon: "ui-icon-vacio",
            cursor: "pointer",
            title: "Modificar datos Vehiculo",
            onClickButton: function() {



                if (seleccion) {
//                    $("#panelCenter_2_1").html("");
                    modificarDatosVehiculo(id_vehiculo, id_nokia, tarLlave, tarGas, tecnologia, marca, modelo, fotovehiculo, fotoplacas, estatus,identificador);
                    seleccion = false;
                } else {

                    $(function() {
                        $("#ventanAlertas").html("Elija un vehiculo");
                        $("#ventanAlertas").attr('style', 'visible');
                        $("#ventanAlertas").dialog({
                            modal: true,
                            title: 'Vehiculo',
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

        //-- fin modificar datos conductor
        //-- inicio cambio de estatus conductor        
//        $("#tabla_Admin_Vehiculos").jqGrid('navButtonAdd', '#pager2', {
//            caption: "<img src=/SeguimientoTrue/trunk/interfaz/view/images/Iconos_jqgrid/vw-beetle-iconAlta.png />",
//            buttonicon: "ui-icon-vacio",
//            cursor: "pointer",
//            title: "Cambio de estatus",
//            onClickButton: function() {
//
//
//                if (seleccion) {
//                    $("#panelCenter_2_1").html("");
//                    cambioDeEstatusVehiculo(id_vehiculo, id_nokia, estatus);
//                    seleccion = false;
//                } else {
//
//                    $(function() {
//                        $("#ventanAlertas").html("Elija un vehiculo");
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



function agregarVehiculo() {


    var validaText;
    var validaSelect;
    var camposBien;
        $("#panelCenter_1_1").html("");
    if( $("#panelCenter_1_1").height()==300)
        
        {
    $("#panelCenter_1_1").css("height","-=300");
    $("#panelCenter_2_1").css("height","+=290");
}
    $("#panelCenter_2_1").load("../../Vehiculo/view/viewCapturaVehiculo.php", function(data) {



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

        $("#btnGuardarVehiculo").bind({
            click: function() {


                validaText = verificarCamposVehiculoText();
                validaSelect = verificarCamposCapturadosSelectVehiculo();

                if (validaText && validaSelect) {


                    camposBien = validarCamposVehiculo();

                    if (camposBien) {

                        var cargarArchivos = verificarCamposTipoArchVehiculo();
                        if (cargarArchivos) {

                            cargarArchivosvehiculo();
                            $.post("../../Vehiculo/controller/controllerAltaVehiculo.php", {
                                clvNokia: $("#txtcleNokia").val(),
                                tarLlave: $("#txttarlleve").val(),
                                tarGas: $("#txtTarGas").val(),
                                tecnologia: $("#txtTec").val(),
                                marca: $("#marca").val(),
                                modelo: $("#modelo").val(),
                                fotoplacas: $("#fotoplacas").val(),
                                fotovehiculo: $("#fotovehiculo").val(),
                                identificador:$("#identificador").val()

                            }, function(data) {


                                $(function() {
                                    $("#ventanAlertas").html(data);
                                    $("#ventanAlertas").attr('style', 'visible');
                                    $("#ventanAlertas").dialog({
                                        modal: true,
                                        title: 'Vehiculo',
                                        show: 'explode',
                                        hide: 'explode',
                                        buttons: {
                                            Aceptar: function() {
                                                $("#tabla_Admin_Vehiculos").trigger("reloadGrid");
                                                $('#panelCenter_2_1').html("");
                                                $(this).dialog("close");

                                            }
                                        }
                                    });
                                });
                            });
                        } else {
                            $(function() {
                                $("#ventanAlertas").html("Tipo de archivo no valido");
                                $("#ventanAlertas").attr('style', 'visible');
                                $("#ventanAlertas").dialog({
                                    modal: true,
                                    title: 'Vehiculo',
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
                                title: 'Vehiculo',
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
            }

        });

        //fin botn agregar conductor

        $("#anexarvehiculo").bind({
            click: function() {


                validaText = verificarCamposVehiculoText();
                validaSelect = verificarCamposCapturadosSelectVehiculo();

                if (validaText && validaSelect) {


                    camposBien = validarCamposVehiculo();

                    if (camposBien) {

                        var cargarArchivos = verificarCamposTipoArchVehiculo();
                        if (cargarArchivos) {

                            cargarArchivosvehiculo();
                            $.post("../../Vehiculo/controller/controllerAltaVehiculo.php", {
                                clvNokia: $("#txtcleNokia").val(),
                                tarLlave: $("#txttarlleve").val(),
                                tarGas: $("#txtTarGas").val(),
                                tecnologia: $("#txtTec").val(),
                                marca: $("#marca").val(),
                                modelo: $("#modelo").val(),
                                fotoplacas: $("#fotoplacas").val(),
                                fotovehiculo: $("#fotovehiculo").val()

                            }, function(data) {


                                $(function() {
                                    $("#ventanAlertas").html(data);
                                    $("#ventanAlertas").attr('style', 'visible');
                                    $("#ventanAlertas").dialog({
                                        modal: true,
                                        title: 'Vehiculo',
                                        show: 'explode',
                                        hide: 'explode',
                                        buttons: {
                                            Aceptar: function() {
                                                $('#panelCenter_2_1').html("");
                                                $(this).dialog("close");
                                                agregarotrovehiculo()
                                            }
                                        }
                                    });
                                });
                            });
                        } else {
                            $(function() {
                                $("#ventanAlertas").html("Tipo de archivo no valido");
                                $("#ventanAlertas").attr('style', 'visible');
                                $("#ventanAlertas").dialog({
                                    modal: true,
                                    title: 'Vehiculo',
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
                                title: 'Vehiculo',
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
            }

        });
        //inicio cancelar agregar conductor

        $("#btnCancelarVehiculo").bind({
            click: function() {
                $("#panelCenter_2_1").html("");
            }

        });

        //fin cancelar agregar conductor

    });

}
//funcion para agregar otro vehiculo
function agregarotrovehiculo()
{
    agregarVehiculo();

}

function verificarCamposVehiculoText() {

    var camposLlenos = true;
    $("#formCapturaVehiculo input:text ").each(function(index) {



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

function verificarCamposCapturadosSelectVehiculo() {

    var camposLlenos = true;
    $("#formCapturaVehiculo select ").each(function(index) {



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


function validarCamposVehiculo() {

    var valida;
    var camposBien = 3;

    $("#formCapturaVehiculo input:text ").each(function() {



        if ($(this).attr('name') == "claveNokia") {

            valida = validarNumerosLetras($(this).val());

            if (valida != "ok") {

                campoNecesario($(this).attr("id"));



            } else {

                camposBien -= 1;
            }

        }

        //validar cel
        if ($(this).attr('name') == "tarjLlave") {

            valida = validarNumerosLetrasGuiones($(this).val());

            if (valida != "ok") {

                campoNecesario($(this).attr("id"));



            } else {

                camposBien -= 1;
            }
        }

        //validar email
        if ($(this).attr('name') == "tarGas") {

            valida = validarNumeros($(this).val());


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


function modificarDatosVehiculo(id_vehiculo, id_nokia, tarLlave, tarGas, tecnologia, marca, modelo, fotovehiculo, fotoplacas, estatus,identificador) {
    var ruta;
    var validaText;
    if (estatus == 1) {

        ruta = "<img src='/interfaz/view/images/Green Ball.png'/>";
    } else {

        ruta = "<img src='/interfaz/view/images/Red Ball.png'/>";

    }
    //    alert(id_conductor+" "+nombre+""+apellido+" "+direccion+" "+direccion2+" "+tel+""+cel+" "+email+" "+estatus);


    var validaSelect;
    var camposBien;
// $("#panelCenter_1_1").html("");
    $("#panelCenter_2_1").load("../../Vehiculo/view/viewModificarVehiculo.php", function(data) {
        $("#labelEstatus").append(ruta);
        $("#txtcleNokia").val(id_nokia);
        $("#txtTec").val(tecnologia);
        $("#txttarlleve").val(tarLlave);
        $("#txtTarGas").val(tarGas);
        $("#marca").val(marca);
        $("#modelo").val(modelo);
        $("#selectEstatusV").val(estatus);
        $("#identificador").val(identificador);
//$("#fotovehiculo").val(fotovehiculo);
//$("#fotoplacas").val(fotoplacas);


        $("input:text").bind({
            focusout: function() {

                quitarClaseTxtR($(this).attr('id'));



            },
            focusin: function() {

                agregarClaseTxtR($(this).attr('id'));

            }





        });

        $("#txtcleNokia").focus();
        //inicioboton de agregar conductor 

        $("#btnModificarVehiculo").bind({
            click: function() {
                var fotovehiculomodificar = "";
                var fotoplacasmodificar = "";
                var hayarchivosnuevos = false;
                validaText = verificarCamposVehiculoText();
                validaSelect = verificarCamposCapturadosSelectVehiculo();
//                                alert($("#fotovehiculo").val()+" -- "+$("#fotoplacas").val());
                if (validaText && validaSelect) {


                    camposBien = validarCamposVehiculo();

                    if (camposBien) {
                        if ($("#fotovehiculo").val() != "")
                        {
                            fotovehiculomodificar = $("#fotovehiculo").val();
                            hayarchivosnuevos = true;
                        }
                        else if ($("#fotovehiculo").val() == "")
                        {
                            fotovehiculomodificar = fotovehiculo;

                        }
                        if ($("#fotoplacas").val() != "")
                        {
                            fotoplacasmodificar = $("#fotoplacas").val();
                            hayarchivosnuevos = true;
                        }
                        else if ($("#fotoplacas").val() == "")
                        {
                            fotoplacasmodificar = fotoplacas;

                        }
                        if (hayarchivosnuevos == true) {
                            var cargarArchivos = verificarCamposTipoArchVehiculo();
                            if (cargarArchivos) {

                                cargarArchivosvehiculo();
                            }
                        }
                        if (hayarchivosnuevos == false) {
                        }
                        $.post("../../Vehiculo/controller/controllerModificarVehiculo.php", {
                            id_vehiculo: id_vehiculo,
                            clvNokia: $("#txtcleNokia").val(),
                            tarLlave: $("#txttarlleve").val(),
                            tarGas: $("#txtTarGas").val(),
                            tecnologia: $("#txtTec").val(),
                            marca: $("#marca").val(),
                            modelo: $("#modelo").val(),
                            fotoplacas: fotoplacasmodificar,
                            fotovehiculo: fotovehiculomodificar,
                            estatus: $("#selectEstatusV").val(),
                            identificador:$("#identificador").val()

                        }, function(data) {


                            $(function() {
                                $("#ventanAlertas").html(data);
                                $("#ventanAlertas").attr('style', 'visible');
                                $("#ventanAlertas").dialog({
                                    modal: true,
                                    title: 'Vehiculo',
                                    show: 'explode',
                                    hide: 'explode',
                                    buttons: {
                                        Aceptar: function() {

                                            $("#tabla_Admin_Vehiculos").trigger("reloadGrid");
                                            $('#panelCenter_2_1').html("");
                                            $(this).dialog("close");

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
                                title: 'Vehiculo',
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
                            title: 'Vehiculo',
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


function cambioDeEstatusVehiculo(id_vehiculo, id_nokia, estatus) {
    var cambio;
    var altaBaja;
    if (estatus == 1) {

        altaBaja = "baja"

    } else {
        altaBaja = "alta"
    }

    $(function() {
        $("#ventanAlertas").html("Seguro que quieres dar " + altaBaja + " al vehiculo <br>" + id_nokia + "??");
        $("#ventanAlertas").attr('style', 'visible');
        $("#ventanAlertas").dialog({
            modal: true,
            title: 'Vehiculo',
            show: 'explode',
            hide: 'explode',
            buttons: {
                Aceptar: function() {

                    if (estatus == 1) {

                        cambio = 0;

                    } else {
                        cambio = 1
                    }

                    $.post("../../Vehiculo/controller/controllerEstatusVehiculo.php", {
                        id: id_vehiculo,
                        estatus: cambio
                    }, function(data) {


                        if (estatus == 1) {

                            data += id_nokia + " a sido dado de baja";

                        } else {

                            data += id_nokia + " a sido dado de alta";

                        }

                        $(function() {
                            $("#ventanAlertas").html(data);
                            $("#ventanAlertas").attr('style', 'visible');
                            $("#ventanAlertas").dialog({
                                modal: true,
                                title: 'Vehiculo',
                                show: 'explode',
                                hide: 'explode',
                                buttons: {
                                    Aceptar: function() {

                                        $(this).dialog("close");
                                        $("#tabla_Admin_Vehiculos").trigger("reloadGrid");

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
function verinformacionvehiculo(id_vehiculo, id_nokia, tarLlave, tarGas, tecnologia, marca, modelo, fotovehiculo, fotoplacas, estatus)

{

    var rutaArchivos = '../../Vehiculo/controller/Imagen/';
    $("#panelCenter_2_1").load('../../Vehiculo/view/viewInformacionVehiculo.php', {}, function(data) {

        $("#informacionvehiculo1").html(' <font face="Sans MS,arial,verdana" size=4><p>Numero: ' + id_nokia + '</p>\n\
                    <p>Id Nokia: ' + id_nokia + '</p>\n\
                    <p>Tarjeta Iave: ' + tarLlave + '</p>\n\
                    <p>Tecnologia: ' + tecnologia + '</p> \n\
                    <p>Placa: ' + marca + '</p>                \n\
                    <p>Modelo: ' + modelo + '</p>\n\
                    <p>Targeta Gas: ' + tarGas + '</p></font> ');

        $("#fotovehiculo").html('<br><img src=' + rutaArchivos + fotovehiculo + '  width="150" height="150" title=' + id_nokia + ' />');

        $("#otrosarchivosvehiculo").html('<br><img src=' + rutaArchivos + fotoplacas + '  width="100" height="70" title=' + id_nokia + ' />');


    });

}