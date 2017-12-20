/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function verificarTipoImagen(extension)
{
    switch(extension.toLowerCase())
    {
        case 'jpg': case 'gif': case 'png': case 'jpeg':
            return true;
            break;
        default:
            return false;
            break;
    }
}


function enviarachivoporajax(file,num)
{
    //var fileName = file.name;
    //obtenemos la extensión del archiv0  
          
       
    var formData = new FormData();
    formData.append("files", file); 
    //data.append('archivo',file);
    //alert(formData);
    
    
    $.ajax({
        url: '../../Bitacora/controller/ControllerSubirArchivo.php',  
        type: 'POST',
        // Form data
        //datos del formulario
        data: formData,
        
        //necesario para subir archivos via ajax
        cache: false,
        contentType: false,
        processData: false,
        //mientras enviamos el archivo
        beforeSend: function(data){
        //            alert(data);
        //            message = $("<span class='before'>Subiendo la imagen, por favor espere...</span>");
        //            showMessage(message)         
        },
        //una vez finalizado correctamente
        success: function(data){
            
            
            
        //            message = $("<span class='success'>La imagen ha subido correctamente.</span>");
        //            showMessage(message);
        // alert(data);
        //            if(isImage(fileExtension))
        //            {
        //                $(".showImage").html("<img src='files/"+data+"' />");
        //            }
        },
        //si ha ocurrido un error
        error: function(data){
           // alert("a ocurrido un error");
        //            message = $("<span class='error'>Ha ocurrido un error.</span>");
        //            showMessage(message);
        // alert(data);
        }
    });
}
    
           
           
            


function guardarnomarchivo()
{
    var file = $("#archivo1").val();
          // alert(file);
        var file2 = $("#archivo2").val();
       //alert(file2);
        var file3 = $("#archivo3").val();
       //alert(file3);
        var file4 = $("#archivo4").val();
        //alert(file4);
        var file5 = $("#archivo5").val();
        //alert(file5);
        var file6 = $("#archivo6").val();
            
    $.post('../../Bitacora/controller/controllerguardarnombrearchivos.php',{
        fileName:file,
        fileName2:file2,
        fileName3:file3,
        fileName4:file4,
        fileName5:file5,
        fileName6:file6
    }, function(data){
        
        $(function() {
            $( "#ventanAlertas" ).html(data);
            $( "#ventanAlertas" ).attr('style', 'visible');
            $( "#ventanAlertas" ).dialog({
                modal: true,
                title:'Bitacora',
                show:'explode',
                hide: 'explode',
                buttons: {
                    Aceptar: function() {
                                                  
                        $('#panelCenter_2_1').html("");          
                        $( this ).dialog( "close" );
                                            
                        $("#tabla_Admin_ProyectosConductor").trigger("reloadGrid");        
                        //$("#estadosMun"+id).remove();
               
                        $("#tabla_Admin_Bitacoras").trigger("reloadGrid");  
                                                        
                    }
                }
            });
        });
            
           
        }); 
}


function verificarCamposTipoArch(){
    
    var camposLlenos=true;
    $("#formCapturaBitacora input:file ").each(function (index){
        
        var fileName = $(this).val();
        //var fileName = file.name;
        if(fileName!=""){
        var fileExtension1 = fileName.substring(fileName.lastIndexOf('.') + 1);
        //alert(fileExtension1);
        var verificar1=verificarTipoImagen(fileExtension1);
       // alert(verificar1);
        }
        if(verificar1==false){
            
            camposLlenos=false;
            quitarClaseTxtV($(this).attr('id'));
            agregarClaseTxtR($(this).attr('id'));      
           
     
           
        }else{
            
            agregarClaseTxtV($(this).attr('id'));  
            
            
            
        }
        
        
    });
    
    
    if(camposLlenos){
        return 1;
    }else{
        return 0;
    }
    
    
}


function verificarCamposCapturadosTextKm(){
    
    var camposLlenos=true;
    $("#formCapturaBitacora input:text ").each(function (index){
        
     
        
        if($(this).val() == ""){
            
            camposLlenos=false;
            quitarClaseTxtV($(this).attr('id'));
            agregarClaseTxtR($(this).attr('id'));      
           
     
           
        }else{
            
            agregarClaseTxtV($(this).attr('id'));  
            
            
            
        }
        
        
    });
    
    
    if(camposLlenos){
        return 1;
    }else{
        return 0;
    }
    
    
}

function validarpor(){
var validap=$("#porcentaje").val();

   var  validapor=validarporcentaje(validap);
if(validapor != "ok"){
            quitarClaseTxtV($(this).attr('por_avance'));
            agregarClaseTxtR($(this).attr('por_avance'));   
}else{         
            agregarClaseTxtV($(this).attr('por_avance'));        
        }
}
function validarCamposKm()
{
    
    var camposLlenos=true, valida;
    $("#kilometraje input:text ").each(function (index){
        
        valida=   validarNumeros($(this).val());
        if(valida != "ok"){
            
            camposLlenos=false;
            quitarClaseTxtV($(this).attr('id'));
            agregarClaseTxtR($(this).attr('id'));      
           
     
           
        }else{
            
            agregarClaseTxtV($(this).attr('id'));  
            
            
            
        }
        
        
    });
    
    
    if(camposLlenos){
        return true;
    } else{
        return false;
    }
    
 }


function verificarCamposCapturadosfileKm(){
    
    var camposLlenos=true;
    $("#formCapturaBitacora input:file ").each(function (index){
        
     
        
        if($(this).val() == ""){
            
            camposLlenos=false;
            quitarClaseTxtV($(this).attr('id'));
            agregarClaseTxtR($(this).attr('id'));      
           
     
           
        }else{
            
            agregarClaseTxtV($(this).attr('id'));  
        //            var filee = $(this).val();
        //            alert(filee);
        }
        
        
    });
    
    
    if(camposLlenos){
        return true;
    }else{
        return false;
    }
    
    
}

function guardarKm()
{
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
    var km_inicial= $("#km_inicial").val();
    var km_final=$("#km_final").val();
    var endo_inicial=$("#km_inicial_endo").val();
    var endo_final=$("#km_final_endo").val();
    
    $.post("../../Bitacora/controller/controllerGuardarKm.php", {
        km_inicial:km_inicial,
        km_final:km_final,
        endo_inicial:endo_inicial,
        endo_final:endo_final,
        fileName:file,
        fileName2:file2,
        fileName3:file3,
        fileName4:file4,
        fileName5:file5
       
    }, function(data1) {
        //alert(data1);
       
 $(function() {
            $( "#ventanAlertas" ).html(data1);
            $( "#ventanAlertas" ).attr('style', 'visible');
            $( "#ventanAlertas" ).dialog({
                modal: true,
                title:'Bitacora',
                show:'explode',
                hide: 'explode',
                buttons: {
                    Aceptar: function() {
                                                  
                        $('#panelCenter_2_1').html("");          
                        $( this ).dialog( "close" );
                                            
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


function cargarArchivos()  {
    
     
//alert("corrrecto");
        
//if(validarTodaslasImagenesdeTipo())
{
        var file = $("#archivo1")[0].files[0];
        //var fileName = file.name;        
        enviarachivoporajax(file,1);        
        var file2 = $("#archivo2")[0].files[0];
        //var fileName2 = file.name;
        enviarachivoporajax(file2,2);
        var file3 = $("#archivo3")[0].files[0];
        //var fileName3 = file.name;
        enviarachivoporajax(file3,3);
        var file4 = $("#archivo4")[0].files[0];
        //var fileName4 = file.name;
        enviarachivoporajax(file4,4);
        var file5 = $("#archivo5")[0].files[0];
        //var fileName5 = file.name;
        enviarachivoporajax(file5,5);
        
        var file6 = $("#archivo6")[0].files[0];
        //var fileName5 = file.name;
        enviarachivoporajax(file6,6);
        /// metodo que guarda el nombre de los archivos en la base de datos    
        //guardarnomarchivo();
        //    var file4 = $("#archivo2")[0].files[0];
        //    var file5 = $("#archivo2")[0].files[0];
        //obtenemos el nombre del archivo
        //    var fileName = file.name;
        //    var nombre2=file2.name;
        //    //obtenemos la extensión del archivo
        //    var fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
        //    //obtenemos el tamaño del archivo
        //    var fileSize = file.size;
        //    //obtenemos el tipo de archivo image/png ejemplo
        //    var fileType = file.type;
        //mensaje con la información del archivo
        //showMessage("<span class='info'>Archivo para subir: "+fileName+", peso total: "+fileSize+" bytes.</span>");
    
        return 1;    
    }
    
   
    
    


}
        
