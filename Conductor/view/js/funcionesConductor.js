/* Program : funcionesConductor.js
 */
/* Name: Carlos Hilario
 */
/* Date: 13/03/2014.
 */
/* Description: contiene el todos los metodos para guadar actualizar y mostrar los datos del conductor
 */

$(document).ready(inicioConductor);


function inicioConductor() {



    console.log($('*').length);
    //muestra todos los conductores
    $("#id_arb_conduc_todos").bind({
        click: function() {


            $("#todosp").css("background-color", "#FFFFFF");
            $("#activop").css("background-color", "#FFFFFF");
            $("#noactivop").css("background-color", "#FFFFFF");
            $("#agregarproy").css("background-color", "#FFFFFF");
            $("#todosv").css("background-color", "#FFFFFF");
            $("#activov").css("background-color", "#FFFFFF");
            $("#noactivov").css("background-color", "#FFFFFF");
            $("#agregarvehi").css("background-color", "#FFFFFF");
            $("#todost").css("background-color", "#FFFFFF");
            $("#activot").css("background-color", "#FFFFFF");
            $("#noactivot").css("background-color", "#FFFFFF");
            $("#agregartel").css("background-color", "#FFFFFF");
            $("#todosc").css("background-color", "#FFFFFF");
            $("#reportes").css("background-color", "#FFFFFF");
            $('#panelLeft_2_1').html("");
            $('#panelCenter_2_1').html("");
            $("#titulo_pagina_3").val("Bitacoras");

            $("#todosc").css("background-color", "#fbec88");
            $("#activoc").css("background-color", "#FFFFFF");
            $("#noactivoc").css("background-color", "#FFFFFF");
            $("#agregarcond").css("background-color", "#FFFFFF");
            $("#bajav").css("background-color", "#FFFFFF");
            $("#bajat").css("background-color", "#FFFFFF");





            $("#bajac").css("background-color", "#FFFFFF");
            mostrarConductores(1);
            // $(window).bind('resize', function() {
            //        
            //        
            //    
            //    $("#tabla_Admin_Conductores").setGridWidth($("#panelCenter_1_1").width());
            //}).trigger('resize')
            //$("#panellRight_1").resize(function(){
            //alert($( "#panelCenter_1_1" ).width());
            //});


            //dos formas de ver si se esta mostrando el div o no
            //       alert(     $("#panellRight_1_1").css("display"));
            //          alert(     $("#panellRight_1_1").is(':visible'));
        }


    });
    //fin
    //muestra los conductores activos
    $("#id_arb_conduc_activos").bind({
        click: function() {
            $("#todosp").css("background-color", "#FFFFFF");
            $("#activop").css("background-color", "#FFFFFF");
            $("#noactivop").css("background-color", "#FFFFFF");
            $("#agregarproy").css("background-color", "#FFFFFF");
            $("#todosv").css("background-color", "#FFFFFF");
            $("#activov").css("background-color", "#FFFFFF");
            $("#noactivov").css("background-color", "#FFFFFF");
            $("#agregarvehi").css("background-color", "#FFFFFF");
            $("#todost").css("background-color", "#FFFFFF");
            $("#activot").css("background-color", "#FFFFFF");
            $("#noactivot").css("background-color", "#FFFFFF");
            $("#agregartel").css("background-color", "#FFFFFF");
            $("#todosc").css("background-color", "#FFFFFF");
            $("#todosc").css("background-color", "#FFFFFF");
            $("#activoc").css("background-color", "#fbec88");
            $("#noactivoc").css("background-color", "#FFFFFF");
            $("#agregarcond").css("background-color", "#FFFFFF");
            $("#bajav").css("background-color", "#FFFFFF");
            $("#bajat").css("background-color", "#FFFFFF");
            $("#bajac").css("background-color", "#FFFFFF");
            $("#reportes").css("background-color", "#FFFFFF");
            $('#panelLeft_2_1').html("");
            $('#panelCenter_2_1').html("");
            $("#titulo_pagina_3").val("Bitacoras");




            mostrarConductores(2);
        }


    });
    //fin
    //muestra los conductores no activos
    $("#id_arb_conduc_noactivos").bind({
        click: function() {

            $("#todosp").css("background-color", "#FFFFFF");
            $("#activop").css("background-color", "#FFFFFF");
            $("#noactivop").css("background-color", "#FFFFFF");
            $("#agregarproy").css("background-color", "#FFFFFF");
            $("#todosv").css("background-color", "#FFFFFF");
            $("#activov").css("background-color", "#FFFFFF");
            $("#noactivov").css("background-color", "#FFFFFF");
            $("#agregarvehi").css("background-color", "#FFFFFF");
            $("#todost").css("background-color", "#FFFFFF");
            $("#activot").css("background-color", "#FFFFFF");
            $("#noactivot").css("background-color", "#FFFFFF");
            $("#agregartel").css("background-color", "#FFFFFF");
            $("#todosc").css("background-color", "#FFFFFF");
            $("#todosc").css("background-color", "#FFFFFF");
            $("#activoc").css("background-color", "#FFFFFF");
            $("#noactivoc").css("background-color", "#fbec88");
            $("#agregarcond").css("background-color", "#FFFFFF");
            $("#bajav").css("background-color", "#FFFFFF");
            $("#bajat").css("background-color", "#FFFFFF");
            $("#bajac").css("background-color", "#FFFFFF");
            $("#reportes").css("background-color", "#FFFFFF");
            $('#panelLeft_2_1').html("");
            $('#panelCenter_2_1').html("");
            $("#panelCenter_2_1").val("Bitacoras");
            $("#panelCenter_2_1").trigger("close");
//            agrandarpanelcenter2_1(true);
            mostrarConductores(3);
        }


    });
    //fin
    $("#id_arb_agregar_conductor").bind({
        click: function() {
            $("#todosp").css("background-color", "#FFFFFF");
            $("#activop").css("background-color", "#FFFFFF");
            $("#noactivop").css("background-color", "#FFFFFF");
            $("#agregarproy").css("background-color", "#FFFFFF");
            $("#todosv").css("background-color", "#FFFFFF");
            $("#activov").css("background-color", "#FFFFFF");
            $("#noactivov").css("background-color", "#FFFFFF");
            $("#agregarvehi").css("background-color", "#FFFFFF");
            $("#todost").css("background-color", "#FFFFFF");
            $("#activot").css("background-color", "#FFFFFF");
            $("#noactivot").css("background-color", "#FFFFFF");
            $("#agregartel").css("background-color", "#FFFFFF");
            $("#todosc").css("background-color", "#FFFFFF");
            $("#todosc").css("background-color", "#FFFFFF");
            $("#activoc").css("background-color", "#FFFFFF");
            $("#noactivoc").css("background-color", "#FFFFFF");
            $("#agregarcond").css("background-color", "#fbec88");
            $("#bajav").css("background-color", "#FFFFFF");
            $("#bajat").css("background-color", "#FFFFFF");
            $("#bajac").css("background-color", "#FFFFFF");
            $("#reportes").css("background-color", "#FFFFFF");
            $('#panelLeft_2_1').html("");
            $("#titulo_pagina_3").val("Bitacoras");
            $("#panelCenter_2_1").css("height", "=800");
            agregarConductor()
        }


    });

    $("#id_arb_conduc_baja").bind({
        click: function() {
            $("#todosp").css("background-color", "#FFFFFF");
            $("#activop").css("background-color", "#FFFFFF");
            $("#noactivop").css("background-color", "#FFFFFF");
            $("#agregarproy").css("background-color", "#FFFFFF");
            $("#todosv").css("background-color", "#FFFFFF");
            $("#activov").css("background-color", "#FFFFFF");
            $("#noactivov").css("background-color", "#FFFFFF");
            $("#agregarvehi").css("background-color", "#FFFFFF");
            $("#todost").css("background-color", "#FFFFFF");
            $("#activot").css("background-color", "#FFFFFF");
            $("#noactivot").css("background-color", "#FFFFFF");
            $("#agregartel").css("background-color", "#FFFFFF");
            $("#todosc").css("background-color", "#FFFFFF");
            $("#todosc").css("background-color", "#FFFFFF");
            $("#activoc").css("background-color", "#FFFFFF");
            $("#noactivoc").css("background-color", "#FFFFFF");
            $("#agregarcond").css("background-color", "#FFFFFF");
            $("#bajav").css("background-color", "#FFFFFF");
            $("#bajat").css("background-color", "#FFFFFF");
            $("#bajac").css("background-color", "#fbec88");
            $("#reportes").css("background-color", "#FFFFFF");
            $('#panelLeft_2_1').html("");
            $("#titulo_pagina_3").val("Bitacoras");
            $("#panelCenter_2_1").css("height", "=800");
            mostrarConductores(4);
        }


    });



    //rowList: con este parámetro le especificamos al jqGrid, que de la opción de poder cambiar el numero de filas que va a mostrar, es decir que la persona pueda establecer el numero de filas que va a mostrar por en el grid.
    //height: con el parámetro height especificamos la altura del grid, pero si lo ponemos en "auto", el grid va a tener automáticamente la altura que tengan las filas que están internas del grid, y si las cambiamso automáticamente cambia la altura del grid.
}


//function que carga grid de conductores

function mostrarConductores(valor) {

    var seleccion = false;
    var id_conductor;
    var nombre;
    var A_paterno;
    var A_materno;
    var calle;
    var num_est;
    var num_int;
    var colonia;
    var cod_postal;
    var calle1;
    var calle2;
    var referencia;
    var estado;
    var ciudad;
    var email1;
    var email2;
    var telf_particular;
    var telf_celular;
    var telf_referencia;
    var ref_telefono;
    var estatus;
    var foto;
    var acta;
    var ife;
    var licencia;
    var color;
    $("#panelCenter_2_1").html("");
    if ($("#panelCenter_1_1").height() != 300)

    {
        $("#panelCenter_1_1").css("height", "+=300");
        $("#panelCenter_2_1").css("height", "-=290");
    }


    $('#panelCenter_1_1').load('../../Conductor/view/viewGridConductores.php', {}, function(data) {

        //                      $.post("../../Conductor/controller/controllerConductores.php",{opcion:'mostrar'},function (data){
        //                          
        //                          
        //                          alert(data);
        //                      })
        if (valor == 1)
        {

            $("#titulocond").html("Todos los Conductores ");
        }
        if (valor == 2)
        {

            $("#titulocond").html("Conductores Activos");
        }
        if (valor == 3)
        {

            $("#titulocond").html("Conductores Inactivos");
        }


        $("#tabla_Admin_Conductores").jqGrid({
            url: '../../Conductor/controller/controllerConductores.php',
            postData: {
                opcion: "listar",
                opcion1: valor
            },
            datatype: 'json',
            colNames: ['id_conductor', 'Nombre', 'Apellido Paterno', 'Apellido Materno', 'Calle', 'Num. Est', 'Num. int', 'Colonia', 'Cod. postal', 'calle1', 'calle2', 'Referencia', 'Estado', 'Ciudad', 'Email 1', 'Email 2', 'Telefono particular', 'Telefono celular', 'Telefono referencia', 'Referencia del telefono', 'Estatus', 'foto', 'acta', 'ife', 'licencia', 'Estatus', 'color'],
            colModel: [
                {
                    display: 'id_conductor',
                    //nombre de la columna no se puede repetir
                    name: 'id_conductor',
                    //ancho de la columna
                    width: 10,
                    //si puede ser ordenable
                    sortable: true,
                    //oculta la columna
                    hidden: true


                },
                {
                    display: 'Nombre',
                    name: 'Nombre',
                    width: 30,
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
                    display: 'A_paterno',
                    name: 'A_paterno',
                    width: 30,
                    sortable: true,
                    align: 'right'


                },
                {
                    display: 'A_materno',
                    name: 'A_materno',
                    width: 30,
                    sortable: true,
                    align: 'right'
                },
                {
                    display: 'Calle',
                    name: 'Calle',
                    width: 30,
                    sortable: true,
                    align: 'right'
                            //                hidden:true

                },
                {
                    display: 'Num. Est',
                    name: 'Num. Est',
                    width: 50,
                    sortable: true,
                    align: 'right',
                    hidden: true

                },
                {
                    display: 'Num. int',
                    name: 'Num. int',
                    width: 20,
                    sortable: true,
                    align: 'right',
                    hidden: true

                },
                {
                    display: 'Colonia',
                    name: 'Colonia',
                    width: 40,
                    sortable: true,
                    align: 'right'
                            //                hidden:true
                },
                {
                    display: 'Cod. postal',
                    name: 'Cod. postal',
                    width: 20,
                    sortable: true,
                    align: 'right',
                    hidden: true
                },
                {
                    display: 'calle1',
                    name: 'calle1',
                    width: 20,
                    sortable: true,
                    align: 'right',
                    hidden: true
                },
                {
                    display: 'calle2',
                    name: 'calle2',
                    width: 20,
                    sortable: true,
                    align: 'right',
                    hidden: true
                },
                {
                    display: 'Referencia',
                    name: 'Referencia',
                    width: 20,
                    sortable: true,
                    align: 'right',
                    hidden: true
                },
                {
                    display: 'Estado',
                    name: 'Estado',
                    width: 20,
                    sortable: true,
                    align: 'right'
                            //                hidden:true
                },
                {
                    display: 'Ciudad',
                    name: 'Ciudad',
                    width: 20,
                    sortable: true,
                    align: 'right',
                    hidden: true
                },
                {
                    display: 'Email 1',
                    name: 'Email 1',
                    width: 40,
                    sortable: true,
                    align: 'right'
                            //                hidden:true
                },
                {
                    display: 'Email 2',
                    name: 'Email 2',
                    width: 20,
                    sortable: true,
                    align: 'right',
                    hidden: true
                },
                {
                    display: 'Telefono particular',
                    name: 'Telefono particular',
                    width: 20,
                    sortable: true,
                    align: 'right',
                    hidden: true
                },
                {
                    display: 'Telefono celulaar',
                    name: 'Telefono celular',
                    width: 20,
                    sortable: true,
                    align: 'right'
                            //                hidden:true
                }, {
                    display: 'Telefono referencia',
                    name: 'Telefono referencia',
                    width: 20,
                    sortable: true,
                    align: 'right',
                    hidden: true
                },
                {
                    display: 'Referencia del telefono',
                    name: 'Referencia del telefono',
                    width: 20,
                    sortable: true,
                    align: 'right',
                    hidden: true
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
                    display: 'foto',
                    name: 'foto',
                    width: 10,
                    sortable: true,
                    align: 'right',
                    hidden: true
                },
                {
                    display: 'acta',
                    name: 'acta',
                    width: 10,
                    sortable: true,
                    align: 'right',
                    hidden: true
                },
                {
                    display: 'ife',
                    name: 'ife',
                    width: 10,
                    sortable: true,
                    align: 'right',
                    hidden: true
                },
                {
                    display: 'licencia',
                    name: 'licencia',
                    width: 10,
                    sortable: true,
                    align: 'right',
                    hidden: true
                },
                {
                    display: 'ruta',
                    name: 'ruta',
                    width: 10,
                    sortable: true,
                    align: 'center'
                            //                hidden:true
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
            //numero de registros por pagina
            rowNum: 10,
            //donde aparecen los iconos
            pager: '#pager2',
            //la principal
            sortname: 'id_conductor',
            viewrecords: true,
            sortorder: "asc",
            emptyrecords: "No existen registros",
            autoheight: true,
            autowidth: true,
            scrollOffset: 22,
            height: 250,
            //alterna las filas con colores diferentes
            altRows: true,
            onSelectRow: function(id) {
                seleccion = true;

                id_conductor = $(this).jqGrid('getCell', id, 0);
                nombre = $(this).jqGrid('getCell', id, 1);
                A_paterno = $(this).jqGrid('getCell', id, 2);
                A_materno = $(this).jqGrid('getCell', id, 3);
                calle = $(this).jqGrid('getCell', id, 4);
                num_est = $(this).jqGrid('getCell', id, 5);
                num_int = $(this).jqGrid('getCell', id, 6);
                colonia = $(this).jqGrid('getCell', id, 7);
                cod_postal = $(this).jqGrid('getCell', id, 8);
                calle1 = $(this).jqGrid('getCell', id, 9);
                calle2 = $(this).jqGrid('getCell', id, 10);
                referencia = $(this).jqGrid('getCell', id, 11);
                estado = $(this).jqGrid('getCell', id, 12);
                ciudad = $(this).jqGrid('getCell', id, 13);
                email1 = $(this).jqGrid('getCell', id, 14);
                email2 = $(this).jqGrid('getCell', id, 15);

                telf_particular = $(this).jqGrid('getCell', id, 16);
                telf_celular = $(this).jqGrid('getCell', id, 17);
                telf_referencia = $(this).jqGrid('getCell', id, 18);
                ref_telefono = $(this).jqGrid('getCell', id, 19);
                estatus = $(this).jqGrid('getCell', id, 20);
                foto = $(this).jqGrid('getCell', id, 21);
                acta = $(this).jqGrid('getCell', id, 22);
                ife = $(this).jqGrid('getCell', id, 23);
                licencia = $(this).jqGrid('getCell', id, 24);
                color = $(this).jqGrid('getCell', id, 26);

                verinformacionconductores(id_conductor, nombre, A_paterno, A_materno, calle, num_est, num_int, colonia, cod_postal, calle1, calle2, referencia, estado, ciudad, email1, email2, telf_particular, telf_celular, telf_referencia, ref_telefono, estatus, foto, acta, ife, licencia, color);
                //-- fin datos modificar
                $("#panelCenter_2_1").html("");
            }


        });
        $("#tabla_Admin_Conductores").jqGrid('navGrid', '#pager2', {
            edit: false,
            add: false,
            search: false,
            del: false,
            refresh: false,
            view: false
        });

        //        $("#tabla_Admin_Conductores").jqGrid('navButtonAdd','#pager2',{
        //            caption:"<img src=/SeguimientoTrue/trunk/interfaz/view/images/Iconos_jqgrid/agregar2.png />", 
        //           
        //            buttonicon:"ui-icon-vacio", 
        //            cursor: "pointer",
        //            title:"Agregar Conductor",
        //            //        id:"NuevoUsu",
        //            onClickButton: function () {
        //                $("#panelCenter_2_1").html("");
        //                agregarConductor();
        //                
        //                
        //            } 
        //        });
        //-- inicio modificar dats conductor
        $("#tabla_Admin_Conductores").jqGrid('navButtonAdd', '#pager2', {
            caption: "<img src=/interfaz/view/images/Iconos_jqgrid/modificar.png />",
            buttonicon: "ui-icon-vacio",
            cursor: "pointer",
            title: "Modificar datos conductor",
            onClickButton: function() {



                if (seleccion) {
                    $("#panelCenter_2_1").html("");
                    modificarDatosConductor(id_conductor, nombre, A_paterno, A_materno, calle, num_est, num_int, colonia, cod_postal, calle1, calle2, referencia, estado, ciudad, email1, email2, telf_particular, telf_celular, telf_referencia, ref_telefono, estatus, foto, acta, ife, licencia, color);
                    seleccion = false;
                } else {

                    $(function() {
                        $("#ventanAlertas").html("Elija un conductor");
                        $("#ventanAlertas").attr('style', 'visible');
                        $("#ventanAlertas").dialog({
                            //tru para que no interactue con otro elementos minestas se encuentra la ventana
                            modal: false,
                            title: 'Conductor',
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
        //        $("#tabla_Admin_Conductores").jqGrid('navButtonAdd','#pager2',{
        //            caption:"<img src=/SeguimientoTrue/trunk/interfaz/view/images/Iconos_jqgrid/cambiar_estatus20.png />", 
        //            buttonicon:"ui-icon-vacio", 
        //            cursor: "pointer",
        //            title:"Cambio de estatus",
        //            onClickButton: function () {
        //                       
        //                       
        //                if(seleccion){
        //                    $("#panelCenter_2_1").html("");
        //                    cambioDeEstatusConductor(id_conductor,nombre,apellido,estatus);
        //                    seleccion=false;     
        //                }else{
        //                           
        //                    $(function() {
        //                        $( "#ventanAlertas" ).html("Elija un conductor");
        //                        $( "#ventanAlertas" ).attr('style', 'visible');
        //                        $( "#ventanAlertas" ).dialog({
        //                            //tru para que no interactue con otro elementos minestas se encuentra la ventana
        //                            modal: false,
        //                            title:'Conductor',
        //                            show: {
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
        //                            //minima altura
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
// fin funcion mostrar conductores
function agregarConductor() {

    var strColorSeleccionado
    var validaText;
    var validaSelect;
    var camposBien;
    $("#panelCenter_1_1").html("");
    if ($("#panelCenter_1_1").height() == 300)

    {
        $("#panelCenter_1_1").css("height", "-=300");
        $("#panelCenter_2_1").css("height", "+=290");
    }
    $("#panelCenter_2_1").load("../../Conductor/view/viewCapturaConductor.php", function(data) {
        $.post("../../Proyecto/controller/controllerMostrarEstados.php", {}, function(data) {
            $("#estadosCond").html(data);
            $("#estadosCond").bind({
                'change': function()
                {
                    var id_estado = $(this).val();

                    $.post("../../Proyecto/controller/controllerMostrarMunicipios.php", {
                        id_estado: id_estado
                    }, function(data) {

                        $("#municipiosCond").html(data);


                    });

                }
            });

        });

        //escuchamos el evento change del control
        document.getElementById('clrColor').addEventListener('change', function() {
            //obtenemos el color seleccionado por el usuario
            strColorSeleccionado = this.value;
            //seleccionamos la capa que vamos a cambiar de color
            var objCapa = document.getElementById('divColor');

            //le colocamos el nuevo color de fondo a la capa
            objCapa.style.backgroundColor = strColorSeleccionado;
            //mostramos el codigo del color seleccionado
            objCapa.innerHTML = strColorSeleccionado;
            $("#clrColor").val(strColorSeleccionado);
        });


        $("#txtTelefono").qtip(
                {
                    content: {
                        text: "Ejemplo: 477-1234567",
                        position: {
                            corner: {
                                tooltip: 'bottomLeft',
                                target: 'topRight'
                            }
                        }
                    },
                    style: {
                        name: 'cream',
                        tip: true
                    }
                });

        $("#txtCel").qtip(
                {
                    content: {
                        text: "Ejemplo: 477-1234567",
                        position: {
                            corner: {
                                tooltip: 'bottomLeft',
                                target: 'topRight'
                            }
                        }
                    },
                    style: {
                        name: 'cream',
                        tip: true
                    }




                });


        $("#txtEmail").qtip(
                {
                    content: {
                        text: "Ejemplo: simbiosys@simbiosys.com.mx",
                        position: {
                            corner: {
                                tooltip: 'bottomLeft',
                                target: 'topRight'
                            }
                        }
                    },
                    style: {
                        name: 'cream',
                        tip: true
                    }




                });

        $("input:text").bind({
            focusout: function() {

                quitarClaseTxtR($(this).attr('id'));



           },
            focusin: function() {

                agregarClaseTxtR($(this).attr('id'));

            }





        });

        $("#txtNombreconductor").focus();

        $("select").bind({
            blur: function() {

                quitarClaseTxtR($(this).attr('id'));

            },
            focus: function() {

                agregarClaseTxtR($(this).attr('id'));

            }

        });
        var i = 2;

        $("#direccionDinamico").on(
                {
                    click: function()
                    {
                        $("#direccionDinamico").hide();
                        $("#mostrar").append("<div id='mostrar1'><br><label>Direcci&oacuten:&nbsp" + i + "</label><input type='text' size='52%' id='txtDireccion' name='Direccion' class='ui-corner-bottom ui-corner-top'/><input type='button' id='quitardireccionDinamico1' value='--'/></div>");

                        $("#quitardireccionDinamico1").on(
                                {
                                    click: function()
                                    {
                                        $("#mostrar1").remove();
                                        $("#direccionDinamico").show();
                                    }
                                });
                    }
                });


        //inicioboton de agregar conductor 

        $("#btnGuardarConductor").bind({
            click: function() {


                validaText = verificarCamposCapturadosText();
                validaSelect = verificarCamposCapturadosSelect();

                //                if(validaText && validaSelect){

                camposBien = validarCampos();

                //                    if(camposBien){
                var camposArchCond = verificarCamposTipoArchConductor();
                if (camposArchCond)
                {
                    cargarArchivosConductor();

                    $.post("../../Conductor/controller/controllerAltaConductor.php", {
                        nombre: $("#txtNombreconductor").val(),
                        ApellidoPaterno: $("#ApellidoPaterno").val(),
                        ApellidoMaterno: $("#ApellidoMaterno").val(),
                        estatus: 1,
                        calle: $("#calle").val(),
                        num_ext: $("#num_ext").val(),
                        num_int: $("#num_int").val(),
                        colonia: $("#colonia").val(),
                        cod_postal: $("#cod_postal").val(),
                        calle1: $("#calle1").val(),
                        calle2: $("#calle2").val(),
                        referencia: $("#referencia").val(),
                        estadosCond: $("#estadosCond option:selected").text(),
                        municipiosCond: $("#municipiosCond option:selected").text(),
                        telf_particular: $("#telf_particular").val(),
                        telf_celular: $("#telf_celular").val(),
                        telf_referencia: $("#telf_referencia").val(),
                        referencia_telf: $("#referencia_telf").val(),
                        email1: $("#email1").val(),
                        email2: $("#email2").val(),
                        ArchFotoConductor: $("#ArchFotoConductor").val(),
                        ArchActa: $("#ArchActaConductor").val(),
                        ArchIFE: $("#ArchIFEConductor").val(),
                        ArchLicencia: $("#ArchLicenciaConductor").val(),
                        color: $("#clrColor").val()
                    }, function(data) {
                        //                                 var cerrar=cargarArchivosConductor(); 
                        //                                 alert(cerrar);
                        //                                 if(cerrar){
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
                                        $("#tabla_Admin_Conductores").trigger("reloadGrid");
                                        $('#panelCenter_2_1').html("");
                                    }
                                }
                            });
                        });
                        //                                 }
                    });
                } else {

                    $(function() {
                        $("#ventanAlertas").html("Tipo de Archivo No Valido");
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

                //                    }else{
                //                        $(function() {
                //                            $( "#ventanAlertas" ).html("Formatos no validos");
                //                            $( "#ventanAlertas" ).attr('style', 'visible');
                //                            $( "#ventanAlertas" ).dialog({
                //                                modal: true,
                //                                title:'Conductor',
                //                                show:'explode',
                //                                hide: 'explode',
                //                                buttons: {
                //                                    Aceptar: function() {
                //                                                            
                //                                        $( this ).dialog( "close" );
                //                                                                     
                //                                                        
                //                                    }
                //                                }
                //                            });
                //                        });
                //                    }
                //                    
                //                }else{
                //                    
                //                    $(function() {
                //                        $( "#ventanAlertas" ).html("Faltan campos por capturar");
                //                        $( "#ventanAlertas" ).attr('style', 'visible');
                //                        $( "#ventanAlertas" ).dialog({
                //                            modal: true,
                //                            title:'Conductor',
                //                            show:'explode',
                //                            hide: 'explode',
                //                            buttons: {
                //                                Aceptar: function() {
                //                                                            
                //                                    $( this ).dialog( "close" );
                //                                                                     
                //                                                        
                //                                }
                //                            }
                //                        });
                //                    });
                //                }
            }

        });

        //fin botn agregar conductor


        // inicia boton guardar y agregar otro
        $("#btnGuardarConductorOtro").bind({
            click: function() {


                validaText = verificarCamposCapturadosText();
                validaSelect = verificarCamposCapturadosSelect();

                //                if(validaText && validaSelect){

                camposBien = validarCampos();

                //                    if(camposBien){
                var camposArchCond = verificarCamposTipoArchConductor();
                if (camposArchCond)
                {
                    cargarArchivosConductor();

                    $.post("../../Conductor/controller/controllerAltaConductor.php", {
                        nombre: $("#txtNombreconductor").val(),
                        ApellidoPaterno: $("#ApellidoPaterno").val(),
                        ApellidoMaterno: $("#ApellidoMaterno").val(),
                        estatus: 1,
                        calle: $("#calle").val(),
                        num_ext: $("#num_ext").val(),
                        num_int: $("#num_int").val(),
                        colonia: $("#colonia").val(),
                        cod_postal: $("#cod_postal").val(),
                        calle1: $("#calle1").val(),
                        calle2: $("#calle2").val(),
                        referencia: $("#referencia").val(),
                        estadosCond: $("#estadosCond").val(),
                        municipiosCond: $("#municipiosCond").val(),
                        telf_particular: $("#telf_particular").val(),
                        telf_celular: $("#telf_celular").val(),
                        telf_referencia: $("#telf_referencia").val(),
                        referencia_telf: $("#referencia_telf").val(),
                        email1: $("#email1").val(),
                        email2: $("#email2").val(),
                        ArchFotoConductor: $("#ArchFotoConductor").val(),
                        ArchActa: $("#ArchActaConductor").val(),
                        ArchIFE: $("#ArchIFEConductor").val(),
                        ArchLicencia: $("#ArchLicenciaConductor").val(),
                        color: strColorSeleccionado

                    }, function(data) {
                        //                                 var cerrar=cargarArchivosConductor(); 
                        //                                 alert(cerrar);
                        //                                 if(cerrar){
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
                                        $("#tabla_Admin_Conductores").trigger("reloadGrid");
                                        $('#panelCenter_2_1').html("");
                                    }
                                }
                            });
                        });
                        //                                 }
                    });
                } else {

                    $(function() {
                        $("#ventanAlertas").html("Tipo de Archivo No Valido");
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

                //                    }else{
                //                        $(function() {
                //                            $( "#ventanAlertas" ).html("Formatos no validos");
                //                            $( "#ventanAlertas" ).attr('style', 'visible');
                //                            $( "#ventanAlertas" ).dialog({
                //                                modal: true,
                //                                title:'Conductor',
                //                                show:'explode',
                //                                hide: 'explode',
                //                                buttons: {
                //                                    Aceptar: function() {
                //                                                            
                //                                        $( this ).dialog( "close" );
                //                                                                     
                //                                                        
                //                                    }
                //                                }
                //                            });
                //                        });
                //                    }
                //                    
                //                }else{
                //                    
                //                    $(function() {
                //                        $( "#ventanAlertas" ).html("Faltan campos por capturar");
                //                        $( "#ventanAlertas" ).attr('style', 'visible');
                //                        $( "#ventanAlertas" ).dialog({
                //                            modal: true,
                //                            title:'Conductor',
                //                            show:'explode',
                //                            hide: 'explode',
                //                            buttons: {
                //                                Aceptar: function() {
                //                                                            
                //                                    $( this ).dialog( "close" );
                //                                                                     
                //                                                        
                //                                }
                //                            }
                //                        });
                //                    });
                //                }
            }

        });
        // fin boton guardar y agregar otro
        //inicio cancelar agregar conductor

        $("#btnCancelarConductor").bind({
            click: function() {

                $("#panelCenter_2_1").html("");
            }

        });

        //fin cancelar agregar conductor

    });

}
function llamaraotrafuncion()
{
    // alert(valor);
    //   if(valor==1)
    //       {

    agregarConductor();
    //       }
    //       else
    //           {}

}

function agregarClaseTxtR(txt) {

    $("#" + txt).addClass("estiloInputR");

}

function quitarClaseTxtR(txt) {

    $("#" + txt).removeClass("estiloInputR");
}

function agregarClaseTxtV(txt) {

    $("#" + txt).addClass("estiloInputV");

}

function quitarClaseTxtV(txt) {

    $("#" + txt).removeClass("estiloInputV");
}

function campoNecesario(campo) {

    $("#" + campo).val("");
    quitarClaseTxtV($("#" + campo).attr('id'));
    agregarClaseTxtR($("#" + campo).attr('id'));
    //    $("#"+campo).focus();

}

function verificarCamposCapturadosText() {

    var camposLlenos = true;
    $("#formCapturaConductor1 input:text ").each(function(index) {



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

function verificarCamposCapturadosSelect() {

    var camposLlenos = true;
    $("#formCapturaConductor1 select ").each(function(index) {



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

function validarCampos() {

    var valida;
    var camposBien = 2;

    $("#formCapturaConductor1 input:text ").each(function() {


        //validar telefono
        if ($(this).attr('name') == "tel") {

            valida = validarTel($(this).val());

            if (valida != "ok") {

                campoNecesario($(this).attr("id"));



            } else {

                camposBien -= 1;
            }

        }

        //validar cel
        //        if($(this).attr('name') == "cel"){
        //          
        //            valida=   validarTel($(this).val());
        //            if(valida != "ok"){
        //                        
        //                campoNecesario($(this).attr("id"));
        //
        //               
        //                    
        //            }else{
        //                
        //                camposBien -=1;
        //            }
        //        }

        //validar email
        if ($(this).attr('name') == "email") {

            valida = validarEmail($(this).val());

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


function cambioDeEstatusConductor(id_conductor, nombre, apellidos, estatus) {
    var cambio;
    var altaBaja;
    if (estatus == 1) {

        altaBaja = "baja"

    } else {
        altaBaja = "alta"
    }

    $(function() {
        $("#ventanAlertas").html("Seguro que quieres dar " + altaBaja + " al conductor <br>" + nombre + " " + apellidos + "??");
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

                    $.post("../../Conductor/controller/controllerEstatusConductor.php", {
                        id: id_conductor,
                        estatus: cambio
                    }, function(data) {


                        if (estatus == 1) {

                            data += nombre + " " + apellidos + " a sido dado de baja";

                        } else {

                            data += nombre + " " + apellidos + " a sido dado de alta";

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
                                        $("#tabla_Admin_Conductores").trigger("reloadGrid");

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

function  modificarDatosConductor(id_conductor, nombre, A_paterno, A_materno, calle, num_est, num_int, colonia, cod_postal, calle1, calle2, referencia, estado, ciudad, email1, email2, telf_particular, telf_celular, telf_referencia, ref_telefono, estatus, foto, acta, ife, licencia, color) {
    var ruta;

    var rutaArchivos = '../../Conductor/controller/ArchivosConductor/';
    var validaText;
    if (estatus == 1) {

        ruta = "<img src='/interfaz/view/images/Green Ball.png' />";
    } else {

        ruta = "<img src='/interfaz/view/images/Red Ball.png' />";

    }
    //    alert(id_conductor+" "+nombre+""+apellido+" "+direccion+" "+direccion2+" "+tel+""+cel+" "+email+" "+estatus);

    var strColorSeleccionado;
    var validaSelect;
    var camposBien;
    //    $("#panelCenter_1_1").html("");
    $("#panelCenter_2_1").load("../../Conductor/view/viewModificarConductor.php", function(data) {



        $("#estadosCond").bind({
            'click': function()
            {
                $.post("../../Proyecto/controller/controllerMostrarEstados.php", {}, function(data) {
                    
                    $("#estadosCond").html(data);
                    $("#estadosCond").bind({
                        'change': function()
                        {
                            var id_estado = $(this).val();
                                                        alert(id_estado);
                            $.post("../../Proyecto/controller/controllerMostrarMunicipios.php", {
                                id_estado: id_estado
                            }, function(data) {

                                $("#municipiosCond").html(data);


                            });
                        }
                    });

                });
            }
        });

        $("#labelEstatus").append(ruta);
        $("#txtNombreconductor").val(nombre);
        $("#ApellidoPaterno").val(A_paterno);
        $("#ApellidoMaterno").val(A_materno);

        $("#selectEstatus").val(estatus);

        $("#calle").val(calle);
        $("#num_ext").val(num_est);
        $("#num_int").val(num_int);
        $("#colonia").val(colonia);
        $("#cod_postal").val(cod_postal);
        $("#calle1").val(calle1);
        $("#calle2").val(calle2);
        $("#referencia").val(referencia);
        $("#estadosCond").append('<option >' + estado + '</option>');
        $("#municipiosCond").append('<option >' + ciudad + '</option>');
        $("#telf_particular").val(telf_particular);
        $("#telf_celular").val(telf_celular);
        $("#telf_referencia").val(telf_referencia);
        $("#referencia_telf").val(ref_telefono);
        $("#email1").val(email1);
        $("#email2").val(email2);
        $("#clrColor").val(color);


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

        });


        //       $("#imagenes").html('<br><div><img  id="kmi" src="'+rutaArchivos+foto+'" width="100" height="100" title="Foto"/></div>\n\
        //                <br><div><img id="kmf" src="//'+rutaArchivos+acta+'" width="50" height="50" title="Acta"/></div></div><br> \n\
        //               <br> <div ><img id="endoi" src="//'+rutaArchivos+ife+'" width="50" height="50" title="IFE"/></div><br>\n\
        //               <br> <div ><img id="endof" src="//'+rutaArchivos+licencia+'" width="50" height="50"  title="Licencia"/></div><br>\n\
        //');
        //       


        $("#txtTelefono").qtip(
                {
                    content: {
                        text: "Ejemplo: 477-1234567",
                        position: {
                            corner: {
                                tooltip: 'bottomLeft',
                                target: 'topRight'
                            }
                        }
                    },
                    style: {
                        name: 'cream',
                        tip: true
                    }


                });

        //        $("#txtCel").qtip(
        //        {
        //            content: {
        //                text:"Ejemplo: 477-1234567",
        //                                   
        //                position: {
        //                    corner: {
        //                        tooltip: 'bottomLeft', 
        //                        target: 'topRight'
        //                    }
        //                }
        //            },
        //            style: {
        //            
        //                name: 'cream',
        //                tip:true
        //            }
        //            
        //                                 
        //                         
        //        });


        $("#txtEmail").qtip(
                {
                    content: {
                        text: "Ejemplo: simbiosys@simbiosys.com.mx",
                        position: {
                            corner: {
                                tooltip: 'bottomLeft',
                                target: 'topRight'
                            }
                        }
                    },
                    style: {
                        name: 'cream',
                        tip: true
                    }




                });

        $("input:text").bind({
            focusout: function() {

                quitarClaseTxtR($(this).attr('id'));



           },
            focusin: function() {

                agregarClaseTxtR($(this).attr('id'));

            }





        });

        $("#txtNombreconductor").focus();



        //inicioboton de agregar conductor 

        $("#btnModificarConductor").bind({
            click: function() {


                var fotoconductorfoto = "";
                var fotoconductoracta = "";
                var fotoconductorife = "";
                var fotoconductorlicencia = "";
                var hayarchivosnuevos = false;
                validaText = verificarCamposCapturadosText();
                validaSelect = verificarCamposCapturadosSelect();

//            if(validaText && validaSelect){
//                    
//                   
//                camposBien = validarCampos();
//                   
//                if(camposBien){
                if ($("#ArchFotoConductor").val() != "")
                {
                    fotoconductorfoto = $("#ArchFotoConductor").val();
                    hayarchivosnuevos = true;
                }
                else if ($("#ArchFotoConductor").val() == "")
                {
                    fotoconductorfoto = foto;

                }
                if ($("#ArchActaConductor").val() != "")
                {
                    fotoconductoracta = $("#ArchActaConductor").val();
                    hayarchivosnuevos = true;
                }
                else if ($("#ArchActaConductor").val() == "")
                {
                    fotoconductoracta = acta;

                }
                if ($("#ArchIFEConductor").val() != "")
                {
                    fotoconductorife = $("#ArchIFEConductor").val();
                    hayarchivosnuevos = true;
                }
                else if ($("#ArchIFEConductor").val() == "")
                {
                    fotoconductorife = ife;

                }
                if ($("#ArchLicenciaConductor").val() != "")
                {
                    fotoconductorlicencia = $("#ArchLicenciaConductor").val();
                    hayarchivosnuevos = true;
                }
                else if ($("#ArchLicenciaConductor").val() == "")
                {
                    fotoconductorlicencia = licencia;

                }

                if (hayarchivosnuevos == true) {
                    var camposArchCond = verificarCamposTipoArchConductor();
                    if (camposArchCond)
                    {
                        cargarArchivosConductor();
                        $.post("../../Conductor/controller/controllerModificarConductor.php", {
                            id_conductor: id_conductor,
                            nombre: $("#txtNombreconductor").val(),
                            ApellidoPaterno: $("#ApellidoPaterno").val(),
                            ApellidoMaterno: $("#ApellidoMaterno").val(),
                            estatus: $("#selectEstatus").val(),
                            calle: $("#calle").val(),
                            num_ext: $("#num_ext").val(),
                            num_int: $("#num_int").val(),
                            colonia: $("#colonia").val(),
                            cod_postal: $("#cod_postal").val(),
                            calle1: $("#calle1").val(),
                            calle2: $("#calle2").val(),
                            referencia: $("#referencia").val(),
                            estadosCond: $("#estadosCond option:selected").text(),
                            municipiosCond: $("#municipiosCond option:selected").text(),
                            telf_particular: $("#telf_particular").val(),
                            telf_celular: $("#telf_celular").val(),
                            telf_referencia: $("#telf_referencia").val(),
                            referencia_telf: $("#referencia_telf").val(),
    email1: $("#email1").val(),
                            email2: $("#email2").val(),
                            ArchFotoConductor: fotoconductorfoto,
                            ArchActa: fotoconductoracta,
                            ArchIFE: fotoconductorife,
                            ArchLicencia: fotoconductorlicencia,
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
                                            $("#tabla_Admin_Conductores").trigger("reloadGrid");

                                        }
                                    }
                                });
                            });
                        });
                    }
                }
                if (hayarchivosnuevos == false) {
                    $.post("../../Conductor/controller/controllerModificarConductor.php", {
                        id_conductor: id_conductor,
                        nombre: $("#txtNombreconductor").val(),
                        ApellidoPaterno: $("#ApellidoPaterno").val(),
                        ApellidoMaterno: $("#ApellidoMaterno").val(),
                        estatus: $("#selectEstatus").val(),
                        calle: $("#calle").val(),
                        num_ext: $("#num_ext").val(),
                        num_int: $("#num_int").val(),
                        colonia: $("#colonia").val(),
                        cod_postal: $("#cod_postal").val(),
                        calle1: $("#calle1").val(),
                        calle2: $("#calle2").val(),
                        referencia: $("#referencia").val(),
                        estadosCond: $("#estadosCond option:selected").text(),
                        municipiosCond: $("#municipiosCond option:selected").text(),
                        telf_particular: $("#telf_particular").val(),
                        telf_celular: $("#telf_celular").val(),
                        telf_referencia: $("#telf_referencia").val(),
                        referencia_telf: $("#referencia_telf").val(),
                        email1: $("#email1").val(),
                        email2: $("#email2").val(),
                        ArchFotoConductor: fotoconductorfoto,
                        ArchActa: fotoconductoracta,
                        ArchIFE: fotoconductorife,
                        ArchLicencia: fotoconductorlicencia,
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
                                        $("#tabla_Admin_Conductores").trigger("reloadGrid");

                                    }
                                }
                            });
                        });
                    });
                }





//                }else{
//                    $(function() {
//                        $( "#ventanAlertas" ).html("Formatos no validos");
//                        $( "#ventanAlertas" ).attr('style', 'visible');
//                        $( "#ventanAlertas" ).dialog({
//                            modal: true,
//                            title:'Conductor',
//                            show:'explode',
//                            hide: 'explode',
//                            buttons: {
//                                Aceptar: function() {
//                                                            
//                                    $( this ).dialog( "close" );
//                                                                     
//                                                        
//                                }
//                            }
//                        });
//                    });
//                }
//            }else{
//                    
//                $(function() {
//                    $( "#ventanAlertas" ).html("Faltan campos por capturar");
//                    $( "#ventanAlertas" ).attr('style', 'visible');
//                    $( "#ventanAlertas" ).dialog({
//                        modal: true,
//                        title:'Conductor',
//                        show:'explode',
//                        hide: 'explode',
//                        buttons: {
//                            Aceptar: function() {
//                                                            
//                                $( this ).dialog( "close" );
//                                                                     
//                                                        
//                            }
//                        }
//                    });
//                });
//            }
            }

        });

        //fin botn agregar conductor


        //inicio cancelar agregar conductor

        $("#btnCancelarConductor").bind({
            click: function() {
                $("#panelCenter_2_1").html("");
            }

        });

        //fin cancelar agregar conductor

    });


}

function  verinformacionconductores(id_conductor, nombre, A_paterno, A_materno, calle, num_est, num_int, colonia, cod_postal, calle1, calle2, referencia, estado, ciudad, email1, email2, telf_particular, telf_celular, telf_referencia, ref_telefono, estatus, foto, acta, ife, licencia, color)


{
    var rutaArchivos = '../../Conductor/controller/ArchivosConductor/';
    $("#panelCenter_2_1").load('../../Conductor/view/viewInformacionConductor.php', {}, function(data) {

        $("#informacion").html('<br><br> <font face="Sans MS,arial,verdana" size=4><p>Nombre:' + nombre + ' ' + A_paterno + ' ' + A_materno + '</p> <br />\n\
                    <p>calle: ' + calle + '   Numero Exterior: ' + num_est + '  Numero Interior: ' + num_int + '</p><br />\n\
                    <p>Colonia: ' + colonia + '     Codigo Postal: ' + cod_postal + '</p><br />\n\
<p>Entre Calle: ' + calle1 + '   y Calle: ' + calle2 + '   Referencia: ' + referencia + '</p><br />\n\
<p>Estado: ' + estado + '       Ciudad: ' + ciudad + '</p><br />\n\
<p>Email 1: ' + email1 + '     Email 2: ' + email2 + '</p><br />\n\
<p>Tel. Particular: ' + telf_particular + '    Tel Celular: ' + telf_celular + '     Tel. Referencia: ' + telf_referencia + '    Referencia: ' + ref_telefono + '</p><br />\n\
');

        $("#fotoconductor").html('<br><img src=' + rutaArchivos + foto + '  width="125" height="140" title=' + nombre + ' ' + A_paterno + ' ' + A_materno + ' />');
        $("#otrosarchivos").html('<br><img src=' + rutaArchivos + acta + '  width="100" height="115" title="Acta del conductor" />' + '  <img src=' + rutaArchivos + ife + '  width="100" height="115" title="credencial de elector" />' + '   <img src=' + rutaArchivos + licencia + '  width="100" height="115" title="licencia de conducir"/>');
        $("#clrColor").val(color);
    });

}
    