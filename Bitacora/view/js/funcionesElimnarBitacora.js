/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function eliminarBitacora(id_bitacora){
    
    
    
     
    $(function() {
        $( "#ventanAlertas" ).html("Seguro de elimnar la bitacora??");
        $( "#ventanAlertas" ).attr('style', 'visible');
        $( "#ventanAlertas" ).dialog({
            modal: true,
            title:'Conductor',
            show:'explode',
            hide: 'explode',
            buttons: {
                Aceptar: function() {
                                    
                    $.post("../../Bitacora/controller/controllerEliminarBitacora.php",{
                        
                        id_bitacora:id_bitacora
                    },function(data){
                  
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
                                        $("#tabla_Admin_Bitacoras").trigger("reloadGrid"); 
                                        $( this ).dialog( "close" );                        
                                    }
                                }
                            });
                        });
                  
                    })
                                                            
                    $( this ).dialog( "close" );
                    $("#tabla_Admin_Bitacoras").trigger("reloadGrid");  
                 
                                                        
                }
            }
        });
    });
    
 
    
}