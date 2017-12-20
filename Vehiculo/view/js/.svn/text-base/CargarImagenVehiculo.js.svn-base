/* PLACOVE: Vehiculo
 */
/* Name: Irandis
 */
/* Date: 21/03/2014
 */
/* Description: Este archivo contiene las funciones para guardar foto del vehiculo
 */

function verificarTipoImagenVehiculo(extension)
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

function enviarachivoporajaxVehiculo(file,num)
{
    //obtenemos la extensión del archiv0  
            
    var formData = new FormData();
    formData.append("files", file); 

    $.ajax({
        url: '../../Vehiculo/controller/ControllerSubirfoto.php',  
        type: 'POST',
        //datos del formulario
        data: formData,
        
        //necesario para subir archivos via ajax
        cache: false,
        contentType: false,
        processData: false,
        //mientras enviamos el archivo
        beforeSend: function(data){
           
        },
        //una vez finalizado correctamente
        success: function(data){
               
        },
        //si ha ocurrido un error
        error: function(data){

        }
    });
}

function verificarCamposTipoArchVehiculo(){
    
    var archivoscorrectos=true;
    $("#formCapturaVehiculo input:file ").each(function (index){
        
        var fileName = $(this).val();
        if(fileName!=""){
        var fileExtension1 = fileName.substring(fileName.lastIndexOf('.') + 1);
        var verificar1=verificarTipoImagenVehiculo(fileExtension1);
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

function cargarArchivosvehiculo()  {
    

{
        var file = $("#fotovehiculo")[0].files[0];
        enviarachivoporajaxVehiculo(file,1);        
        var file2 = $("#fotoplacas")[0].files[0];
        enviarachivoporajaxVehiculo(file2,2);

    
        return 1;    
    }

}