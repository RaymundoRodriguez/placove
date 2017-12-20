/* Program : funcionescargarArchivosTelefono.js
*/
/* Name: Carlos Hilario
*/
/* Date: 25/03/2014.
*/
/* Description: contiene los metodos para validar y enviar por ajax el archivo al servidor
*/
function verificarTipoImagenTel(extension)
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


function enviarachivoporajaxTel(file,num)
{
    //var fileName = file.name;
    //obtenemos la extensión del archiv0  
          
       
    var formData = new FormData();
    formData.append("files", file); 
    //data.append('archivo',file);
    //alert(formData);
    
    
    $.ajax({
        url: '../../Telefono/controller/controllerFotoTelefono.php',  
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

function verificarCamposTipoArchTel(){
    
    var archivoscorrectos=true;
    $("#formCapturaTelefono input:file ").each(function (index){
        
        var fileName = $(this).val();
        //var fileName = file.name;
        if(fileName!=""){
        var fileExtension1 = fileName.substring(fileName.lastIndexOf('.') + 1);
        //alert(fileExtension1);
        var verificar1=verificarTipoImagenTel(fileExtension1);
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



function cargarArchivosTel()  {
    

{
        var file = $("#fotoTelefono")[0].files[0];
        //var fileName = file.name;        
        enviarachivoporajaxTel(file,1);        

        return 1;    
    }
    
   
    
    


}
        
