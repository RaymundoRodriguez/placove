/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function MostrarReporteCentauro() {

    $("#panelCenter_1_1").html("");
    if ($("#panelCenter_1_1").height() == 300)

    {
        $("#panelCenter_1_1").css("height", "-=300");
        $("#panelCenter_2_1").css("height", "+=290");
    }

    $("#panelCenter_2_1").load("../../Reportes/view/viewReporteCentauro.php", function() {
        $("#generarReporteCentauro").on({
            'click': function()
            {
               
                var hecho = cargarArchivosc();

                if (hecho)
                {
                } else {
                    $(function() {
                        $("#ventanAlertas").html("tipo de archivo incorrecto se requiere .cvs");
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

    });
}

function verificarTipoCVS(extension)
{
    switch (extension.toLowerCase())
    {
        case 'csv':
            return true;
            break;
        default:
            return false;
            break;
    }
}

function verificarCamposTipoArchCentauro(filereportecentauro1) {

    var archivoscorrectos = false;
    var filereportecentauro="";
    var fileExtensioncen="";
////    $("#fielCond input:file ").each(function (index){
////        
    filereportecentauro = String(filereportecentauro1);
//        //var fileName = file.name;
//        if(fileName!=""){
     fileExtensioncen = filereportecentauro.substring(filereportecentauro.lastIndexOf('.') + 1);
    //alert(fileExtension1);
    var verificar1 = verificarTipoCVS(fileExtensioncen);
    // alert(verificar1);
//        }
    if (verificar1 === false) {

        archivoscorrectos = false;
        quitarClaseTxtV($(this).attr('id'));
        agregarClaseTxtR($(this).attr('id'));



    } else if(verificar1 === true){
        archivoscorrectos = true;
        agregarClaseTxtV($(this).attr('id'));



    }


//    });


    if (archivoscorrectos) {

        return 1;
    } else {
        return 0;
    }


}

function enviarachivocporajax(file, fileName)
{
    var formData = new FormData();

    formData.append("files", file);

    $.ajax({
        url: '../../Reportes/controller/controllerReporteCentauro.php',
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        //mientras enviamos el archivo
        beforeSend: function(data) {

        },
        //una vez finalizado correctamente
        success: function(data) {
            $("#reportecentauro").load("../../Reportes/controller/controllerReporteCentauro.php",
                    {
                        opcion: 2,
                        fileName:fileName
                    }, function(data) {

            });
        },
        //si ha ocurrido un error
        error: function(data) {

        }
    });
}

function cargarArchivosc() {

    var file = $("#Reportecentauro")[0].files[0];
   var fileName = $("#Reportecentauro").val();
    var good = verificarCamposTipoArchCentauro(fileName);
    if (good)
    {
        enviarachivocporajax(file, fileName);
        return true;
    }
    else {
        return false;
    }

}


