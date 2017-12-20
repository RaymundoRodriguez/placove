/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function cambioDeEstatusProyecto(id_proyecto,estatusp){

    $(function() {
        $( "#ventanAlertas" ).html("Seguro que quieres terminar el proyecto?");
        $( "#ventanAlertas" ).attr('style', 'visible');
        $( "#ventanAlertas" ).dialog({
            modal: true,
            title:'Proyecto',
            show:'explode',
            hide: 'explode',
            buttons: {
                Aceptar: function() {
                    if( estatusp == 0){
                                                   
                        estatusp=1;
                                                            
                    }else{
                        estatusp=0;
                    }
                                               
                         
                                
                    $.post("../../Proyecto/controller/controllerTerminarProyecto.php",{
                        
                        id_proyecto:id_proyecto,
                        estatus_terminacion:estatusp,
                        opcion:"proyecto"
                     
                    },function(data){                               
                                     
                                     
                        if(estatusp == 0){
                                   
                            data+="El proyecto a terminado";
                                   
                        } else{
                                   
                            data+="No se puede terminar el proyecto";
                                   
                        }   
                             
                        $(function() {
                            $( "#ventanAlertas" ).html(data);
                            $( "#ventanAlertas" ).attr('style', 'visible');
                            $( "#ventanAlertas" ).dialog({
                                modal: true,
                                title:'Proyecto',
                                show:'explode',
                                hide: 'explode',
                                buttons: {
                                    Aceptar: function() {
                                                            
                                        $( this ).dialog( "close" );
                                        $("#tabla_Admin_Proyectos").trigger("reloadGrid");                           
                                                        
                                    }
                                }
                            });
                        });
                    });                       
                    $( this ).dialog( "close" );                                    
                },
                Cancelar: function() {
                            
                    $( this ).dialog( "close" );
                        
                        
                }
            }
        });
    });
    
}