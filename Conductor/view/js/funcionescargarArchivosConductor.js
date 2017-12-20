/* Program : funcionescargarArchivosConductor.js
*/
/* Name: Carlos Hilario
*/
/* Date: 18/03/2014.
*/
/* Description: contiene el todos los metodos par validar el tipo del archivo y subirlos al servidor
*/
function verificarTipoImagenCon(extension)
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


function enviarachivoporajaxCon(file,num)
{
    //var fileName = file.name;
    //obtenemos la extensión del archiv0  
          
       
    var formData = new FormData();
    formData.append("files", file); 
    //data.append('archivo',file);
    //alert(formData);
    
    
    $.ajax({
        url: '../../Conductor/controller/controllerArchivosConductor.php',  
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

function verificarCamposTipoArchConductor(){
    
    var archivoscorrectos=true;
    $("#fielCond input:file ").each(function (index){
        
        var fileName = $(this).val();
        //var fileName = file.name;
        if(fileName!=""){
        var fileExtension1 = fileName.substring(fileName.lastIndexOf('.') + 1);
        //alert(fileExtension1);
        var verificar1=verificarTipoImagenCon(fileExtension1);
       // alert(verificar1);
        }
        if(verificar1==false){
            
            archivoscorrectos=false;
            quitarClaseTxtV($(this).attr('id'));
            agregarClaseTxtR($(this).attr('id'));      
           
     
           
        }else{
            
            agregarClaseTxtV($(this).attr('id'));  
            
            
            
        }
        
        
    });
    
    
    if(archivoscorrectos){
        return 1;
    }else{
        return 0;
    }
    
    
}



function cargarArchivosConductor()  {
    

{
        var file = $("#ArchFotoConductor")[0].files[0];
        //var fileName = file.name;        
        enviarachivoporajaxCon(file,1);        
        var file2 = $("#ArchActaConductor")[0].files[0];
        //var fileName2 = file.name;
        enviarachivoporajaxCon(file2,2);
        var file3 = $("#ArchIFEConductor")[0].files[0];
        //var fileName3 = file.name;
        enviarachivoporajaxCon(file3,3);
        var file4 = $("#ArchLicenciaConductor")[0].files[0];
        //var fileName4 = file.name;
        enviarachivoporajaxCon(file4,4);


    
        return 1;    
    }
    
   
    
    


}
        
