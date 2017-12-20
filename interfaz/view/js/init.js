/**
 * Document with all the javascript code outside modules
 */

$(document).ready(function() {
    /*
     * Configuracion de los paneles principales
     */

//    $(".file").css("backgroundColor", "#F2F5F7");
//    $("#aa").css("backgroundColor", "#F2F5F7");
//    $(".folder").css("backgroundColor", "#F6F8F9");
//    $(".browser").css("backgroundColor", "#F2F5F7");

    $('#panellRight_1').panel({
        collapseType: 'slide-right',
        width: '750px',
        collapsed: true,
        //se abre
        unfold: function() {

            //1399 cerrado
            //            alert( $("#panelCenter_1_1").width()-750);

            redimencionarGrid("#panelCenter_1_1", "#tabla_Admin_Conductores", 673);
            redimencionarGrid("#panelCenter_1_1", "#tabla_Admin_Proyectos", 673);
            redimencionarGrid("#panelCenter_1_1", "#tabla_Admin_Vehiculos", 673);
            redimencionarGrid("#panelCenter_1_1", "#tabla_Admin_Telefonos", 673);
            redimencionarGrid("#panelCenter_1_1", "#tabla_Admin_ProyectosConductor", 673);
            redimencionarGrid("#panelCenter_1_1", "#tabla_Admin_Actividades", 673);
        },
        //        //se cierra
        fold: function() {
            //601 abierto 
            redimencionarGrid("#panelCenter_1_1", "#tabla_Admin_Conductores", 1397);
            redimencionarGrid("#panelCenter_1_1", "#tabla_Admin_Proyectos", 1397);
            redimencionarGrid("#panelCenter_1_1", "#tabla_Admin_Vehiculos", 1397);
            redimencionarGrid("#panelCenter_1_1", "#tabla_Admin_Telefonos", 1397);
            redimencionarGrid("#panelCenter_1_1", "#tabla_Admin_ProyectosConductor", 1397);
            redimencionarGrid("#panelCenter_1_1", "#tabla_Admin_Actividades", 1397);
            //            redimencionarGrid("#panellRight_1_1", "#tabla_Admin_Conductores");

        }


    });
    $('#panelLeft_1').panel({
        collapsible: false,
        width: '226px'
//        height:'809px'
    });


    $('#panelLeft_2').panel({
        collapsible: false,
        width: '226px'

    });
    $('#panelRight_1').panel({
        collapsible: false,
        vHeight: '237px',
        width: '200px'
    });
    $('#panelRight_2').panel({
        collapseSpeed: 800,
        vHeight: '160px',
        width: '200px'
    });
    $('#panelCenter_1').panel({
        collapseSpeed: 800
    });
    $('#panelCenter_2').panel({
        //fold: function() { alert(' "fold" callback executed '); },
        //unfold: function() { alert(' "unfold" callback executed '); },
        controls: $('#cntrl').html(),
        collapseSpeed: 800,
        collapsible: false
    });
    /*
     * Configuracion del treeView
     */
    $("#browser").treeview();
    /*
     * Borramos contenido del panel 2 cuando cambia el panel 1
     * ? Descolapsar panel 2 cuando se agregue algo
     */
    $('#panelCenter_1_1').bind('DOMNodeInserted', function(event) {
        if (event.type === 'DOMNodeInserted') {
            $('#panelCenter_2_1').html("");
            $('#divTarjetaPresentacion').html("");
            var titulo = $('#panelCenter_1_1').find("title").html();
            $('#titulo_pagina_1').val(titulo);
            $('#titulo_pagina_2').val("");
        }
    });
//    $('#panelCenter_2_1').bind('DOMNodeInserted', function(event) {
//        if (event.type === 'DOMNodeInserted') {
//            var titulo=$('#panelCenter_2_1').find("title").html();
//            $('#titulo_pagina_2').val(titulo);
//                
//        }
//    });
    $('.ui-icon').click(function()

    {
        if ($('#panelCenter_2_1').height() == 815)
        {
            $('#panelCenter_2_1').css('height', '515px');
        } else {
            $('#panelCenter_2_1').css('height', '815px');
        }
    });

});

function agrandarpanelcenter2_1(abiertoOcerrado)
//
{
//    alert(abiertoOcerrado);
//    if($('#panelCenter_2_1').height()==815)
//        {$('#panelCenter_2_1').css('height','515px');
//            return true;
//        }
//$('#panelCenter_2_1').panel('destroy');
//
////    $("#nombreBitacora").html(titulo);
//    $('#panelCenter_2_1').panel({
////        collapseType: 'slide-right',
//        height: '750px',
//        //cerrado
//        collapsed: abiertoOcerrado
//        })
//if( $("#panelCenter_1_1").height()!=300)
//        
//    {
//        $("#panelCenter_1_1").css("height","+=300");
//        $("#panelCenter_2_1").css("height","-=290");
//    }
//    if ($('#panelCenter_2_1').height() == 815)
//    {alert(abiertoOcerrado);
//        $('#panelCenter_2_1').css('height', '515px');
//    } else if ($('#panelCenter_2_1').height() == 515){
//        $('#panelCenter_2_1').css('height', '815px');
//    }
}