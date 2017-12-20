

           function ModificarConductoresProyecto (nombre,id_con_proyecto,id_proyecto,vehiculo_id_vehiculo,telefono_id_telefono,id_conductor,area_levantamiento,function_class,km_ruteador,km_lineales,tipo_cond,id_nokia,id_sim)                                                                                                                 
{

    $("#panelCenter_2_1" ).html("<br><div id='formAsignarConductor'   style='width: 55%; margin: 0 auto;' position:abosulte >  \n\
                        <fieldset>  <legend>Modificar datos del conductor "+nombre+"</legend><div id='contenido' align='center'><br><tr> <td><label> Vehiculos: </label>\n\
                        <select id='AddVehiculos' style='width: 296px; height: 21px; font-size: 12px'>  </select></td></tr><br><br> <tr> <td> <label>Telefonos:</label>\n\
                              <select id='AddTelefonos' style='width: 296px; height: 21px; font-size: 12px'>\n\
                              </select></td></tr><br><br>\n\
                                <tr><td> <label>Lugar Levantamiento:</label>\n\
                                <input type='text' size='34%' id='txtLugarLevantamiento' name='LugarLevantamiento' class='ui-corner-bottom ui-corner-top'/>\n\
                                </td></tr>\n\
                                <br><br><tr><td> <label>Kilometro ruteador:</label>\n\
                                <input type='text' size='6%' id='km_ruteador' name='kmruteador' class='ui-corner-bottom ui-corner-top'/> </td>\n\
                                &nbsp;<td> <label>Kilometro lineal:</label>\n\
                                <input type='text' size='7%' id='km_lineales' name='kmlineales' class='ui-corner-bottom ui-corner-top'/></td></tr><br><br>\n\
                                  <tr><td><label>Function class:</label>\n\
                              <select id='function_class' style='width: 270px; height: 21px; font-size: 12px'>\n\
                <option value="+function_class+" >"+function_class+"</option> \n\
                                     </select><br><br></td></tr>\n\
                                    <tr><td><label>Tipo Conductor:</label>\n\
                                    <select id='TipoConductor' style='width: 260px; height: 21px; font-size: 12px'>\n\
                                    <option value="+tipo_cond+">"+tipo_cond+"</option>\n\
                                    </select></td></tr> <br><br><br><tr><td><input type='button' value='Aceptar' id='btnGuardar' name='btnGuardar' class='ui-state-default ui-corner-bottom ui-corner-top' style='font-family: Georgia,'Times New Roman',times,serif; font-size: 14px ' ></td></tr>\n\
                        <tr><td><input type='button' value='Cancelar' id='btnCancelar' name='btnCancelar' class='ui-state-default ui-corner-bottom ui-corner-top' style='font-family: Georgia,'Times New Roman',times,serif; font-size: 14px ' ><br></td></tr>  </div></fieldset> ");             
    var objeto = [
        'FC-1', 'FC-2', 'FC-3', 'FC-4','FC-5'
    ];
    for (i = 0;i < objeto.length; i++) {
        if(objeto[i]==function_class)
            {   
            }
            else
                {$('#function_class').append('<option value="' + objeto[i] + '" >' + objeto[i] + '</option>');}
        }        
            var tipo = [
        'Comodin', 'Parcial','Completo'
    ];
    for (i = 0;i < tipo.length; i++) {
        if(tipo[i]==tipo_cond)
            {                
            }
            else
                {$('#TipoConductor').append('<option value="' + tipo[i] + '" >' + tipo[i] + '</option>');}
        }
    $("#btnGuardar").bind({ 
            click:function(){                            
                $.post('../../Proyecto/controller/controllerModificarConductoraProyecto.php',{
                    id_con_proyecto:id_con_proyecto,
                    telefono:telefono_id_telefono,
                    vehiculo:vehiculo_id_vehiculo,
                    tipo:tipo_cond,
                    proyecto_id_proyecto:id_proyecto,
                    vehiculo_id_vehiculo:$("#AddVehiculos").val(),
                    telefono_id_telefono:$("#AddTelefonos").val(),
                    lugar:$("#txtLugarLevantamiento").val(),
                    function_class:$('#function_class').val(),
                    km_ruteador:$("#km_ruteador").val(),
                    km_lineales:$("#km_lineales").val(),
                    //estatus:0,
                    tipo_conductor:$("#TipoConductor").val()
                    
//ActializarDatos(id_con_proyecto,id_conductor,telefono_id_telefono,vehiculo_id_vehiculo,area_levantamiento,tipo_cond);
                },function(data){
                    $(function() {
                        $( "#ventanAlertas" ).html(data);
                        $( "#ventanAlertas" ).attr('style', 'visible');
                        $( "#ventanAlertas" ).dialog({
                            modal: true,
                            title:'Conductor',
                            show:'explode',
                            hide: 'explode',
                            buttons: {
                                Aceptar: function() {
                                                                                
                                    $( this ).dialog( "close" );
                                    
                                    $("#tabla_Admin_ProyectosConductor").trigger("reloadGrid");                                                                                                                    
                                }
                                  
                            }
                        });
                    });
                    
                            
                });  
            }
            });
           
       
        $("#btnCancelar").bind({
    
            click:function(){
                $("#panelCenter_2_1").html("");
            }
    
        });
   // $('#AddConductores').append('<option disabled="disabled" value="' +id_conductor+'" >' + nombre+'</option>');                 
    $('#AddVehiculos').append('<option value="' + vehiculo_id_vehiculo+'" >'+ id_nokia+' </option>');
    $('#AddTelefonos').append('<option value="' + telefono_id_telefono+'" >' + id_sim+'</option>');
    $('#txtLugarLevantamiento').val(area_levantamiento);
    $('#km_ruteador').val(km_ruteador);
    $('#km_lineales').val(km_lineales);
    //$('#TipoConductor').append('<option value="' + tipo_cond+'" >' + tipo_cond+'</option>');
    addvehiculos();
                                                 

    
function addvehiculos()
{
    var i;
    var arreglo= new Array();
    $.post("../../Proyecto/controller/controllerInsertarConductoraProyecto.php", {
        vehiculos:'vehiculos'
    }, function(data) {
        arreglo = eval(data);
        for (i = 0;i < arreglo.length;i++) {
            $('#AddVehiculos').append('<option value="' + arreglo[i].id_vehiculo + '" >'+ arreglo[i].id_nokia+' </option>');
        }
    });
    addtelefonos();
}
function addtelefonos()
{
    var i;
    var arreglo1=new Array();
    $.post("../../Proyecto/controller/controllerInsertarConductoraProyecto.php", {
        telefono:'telefonos'
    }, function(data1) {
       
        arreglo1 = eval(data1);
        for (i = 0;i < arreglo1.length; i++) {
            $('#AddTelefonos').append('<option value="' + arreglo1[i].id_telefono + '" >' + arreglo1[i].identificador + '</option>');
        }
    });        
}
}
