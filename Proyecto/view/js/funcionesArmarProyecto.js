//<!--/* Program Assignment: funcionesArmarProyecto.js
//*/
///* Name: Carlos Hilario
//*/
///* Date: 26/03/2014.
//*/
///* Description: contiene los metetodo para asignar los conductores telefonos y vehiculos al proyecto
//*/-->
function armarproyecto(id_proyecto)
{
    $("#panelCenter_2_1").load("../../Proyecto/controller/controllerBuscarDatos.php",{
        id_proyecto:id_proyecto
    }, function() 

    {
        
    
              
            //                 $("#optionConductores").html(data);
                
            //        drag(id_proyecto);
              
            $(".divDragDrop").click(function()
            {
                vehiculosasignados(id_proyecto);
            });
     
            //        $.post("../../Proyecto/controller/controllerBuscarDatos.php", 
            //        {
            //            opcion:1
            //        }, function(data) {
            //
            //            $("#optionConductores").html(data);
            //        
            //
            //        });  
            //         
            //        
            //        $.post("../../Proyecto/controller/controllerBuscarDatos.php", 
            //        {
            //            opcion:2,
            //            id_proyecto:id_proyecto
            //        }, function(data) {
            //
            //            $("#optionConductoresAsignados").html(data);
            //        
            //
            //        }); 
            ///////////////inicia mover a diferentes paneles los valores y guarda los datos de los conductores ///////////   
            $("#btnderechacon").on({
                'click':function()
                {
                    $("#optionConductores option:selected").appendTo("#optionConductoresAsignados");  
                }
            });
            $("#btizquierdacon").on({
                'click':function()
                {
                    $("#optionConductoresAsignados option:selected").appendTo("#optionConductores");  
                }
            });

            $("#guardarConProyecto").on(
            {
                click:function()
                {
                    var parametroscon1="";
                    var listado = document.getElementById("optionConductoresAsignados");
                    var total = listado.length;
                    var parametroscon = "";
                    parametroscon1 += "[";
                    var contador=0;
                    for(var i = 0; i < total; i++) {
                        parametroscon = listado.options[i].value;
                        //                    if(i == total-1) {
                        //                        parametroscon1 +='{id_conductor:'+parametroscon+',id_proyecto:'+ id_proyecto + '}];';
                        //                        contador++;
                        //                    }
                        //                    else{

                        parametroscon1 +='{id_conductor:'+parametroscon+',id_proyecto:'+id_proyecto+'},';
                        contador++;
                    //                    }
                    }
                    if(total>0){
                        parametroscon1 = parametroscon1.substring(0, parametroscon1.length - 1);
                        parametroscon1 += "];";
                    }
                    else if(total==0){ parametroscon1=0;}
                    
//                    alert(parametroscon1+" contador"+contador); 
                    //                                     alert(contador);
                    $.post("../../Proyecto/controller/controllerArmarProyecto.php",{
                        contador:contador,
                        conductor:eval(parametroscon1),
                        id_proyecto:id_proyecto,
                        opcion:1
                    },function(data){
                        $(function() {
                            $("#ventanAlertas").html(data);
                            $("#ventanAlertas").attr('style', 'visible');
                            $("#ventanAlertas").dialog({
                                //tru para que no interactue con otro elementos minestas se encuentra la ventana
                                modal: false,
                                title: 'Proyecto',
                                show: 'explode',
                                hide: 'explode',
                                buttons: {
                                    Aceptar: function() {

                                        $(this).dialog("close");
                                    //                                    $("#tabla_Admin_Telefonos").trigger("reloadGrid");

                                    }
                                }
                            });
                        });
                    }
                    );
                //                    });
                }
            });
            
            ////////////////fin conductores
            
            ///////////////inicia mover a diferentes paneles los valores y guarda los datos de los telefonos///////////   
            $("#btnderechatel").on({
                'click':function()
                {
                    $("#optionTelefonos option:selected").appendTo("#optionTelefonosAsignados");  
                }
            });
            $("#btizquierdatel").on({
                'click':function()
                {
                    $("#optionTelefonosAsignados option:selected").appendTo("#optionTelefonos");  
                }
            });

            $("#guardarTelProyecto").on(
            {
                click:function()
                {
                    var parametrostel1="";
                    var listado = document.getElementById("optionTelefonosAsignados");
                    var total = listado.length;
                    var parametrostel = "";
                    parametrostel1 += "[";
                    var contador=0;
                    for(var i = 0; i < total; i++) {
                        parametrostel = listado.options[i].value;
//                        if(i == total-1) {
                            parametrostel1 +='{id_telefono:'+parametrostel+', id_proyecto:'+ id_proyecto + '},';
                            contador++;
//                        }
//                        else{
//                            parametrostel1 +='('+parametrostel+','+id_proyecto+'),';
//                            contador++;
//                        }
                    }
                    if(total>0){
                         parametrostel1 =  parametrostel1.substring(0,  parametrostel1.length - 1);
                         parametrostel1 += "];";
                    }
                    else if(total==0){ parametrostel1=0;}
                     
//                    alert( parametrostel1+" contador"+contador); 
                    //                                     alert(contador);
                    $.post("../../Proyecto/controller/controllerArmarProyecto.php",{
                        contador:contador,
                        telefono:eval(parametrostel1),
                        id_proyecto:id_proyecto,
                        opcion:2
                    },function(data){
                        $(function() {
                            $("#ventanAlertas").html(data);
                            $("#ventanAlertas").attr('style', 'visible');
                            $("#ventanAlertas").dialog({
                                //tru para que no interactue con otro elementos minestas se encuentra la ventana
                                modal: false,
                                title: 'Proyecto',
                                show: 'explode',
                                hide: 'explode',
                                buttons: {
                                    Aceptar: function() {

                                        $(this).dialog("close");
                                    //                                    $("#tabla_Admin_Telefonos").trigger("reloadGrid");

                                    }
                                }
                            });
                        });
                    }
                    );
                //                    });
                }
            });
            
            ////////////////fin telefonos
            
            ///////////////inicia mover a diferentes paneles los valores y guarda los datos de los vehiculos ///////////   
            $("#btnderechavehi").on({
                'click':function()
                {
                    $("#optionVehiculos option:selected").appendTo("#optionVehiculosAsignados");  
                }
            });
            $("#btizquierdavehi").on({
                'click':function()
                {
                    $("#optionVehiculosAsignados option:selected").appendTo("#optionVehiculos");  
                }
            });

            $("#guardarVehiProyecto").on(
            {
                click:function()
                {
var parametrosvehi1="";
                    var listado = document.getElementById("optionVehiculosAsignados");
                    var total = listado.length;
                    var parametrosvehi = "";
                    parametrosvehi1 += "[";
                    var contador=0;
                    for(var i = 0; i < total; i++) {
                        parametrosvehi = listado.options[i].value;
//                        if(i == total-1) {
//                            parametrosvehi1 +='('+parametrosvehi+','+ id_proyecto + ');';
//                            contador++;
//                        }
//                        else{
//                            parametrosvehi1 +='('+parametrosvehi+','+id_proyecto+'),';
//                            contador++;
//                        }
                    parametrosvehi1 +='{id_vehiculo: '+parametrosvehi+',id_proyecto: '+id_proyecto+'},';
                        contador++;
                    //                    }
                    }
                    if(total>0){
                        parametrosvehi1 = parametrosvehi1.substring(0, parametrosvehi1.length - 1);
                         parametrosvehi1 += "];";
                    }
                    else if(total==0){ parametrosvehi1=0;}
                  
//                    alert(parametrosvehi1+" contador"+contador);                                    
                    $.post("../../Proyecto/controller/controllerArmarProyecto.php",{
                        contador:contador,
                        vehiculo:eval(parametrosvehi1),
                        id_proyecto:id_proyecto,
                        opcion:3
                    },function(data){
                        $(function() {
                            $("#ventanAlertas").html(data);
                            $("#ventanAlertas").attr('style', 'visible');
                            $("#ventanAlertas").dialog({
                                //tru para que no interactue con otro elementos minestas se encuentra la ventana
                                modal: false,
                                title: 'Proyecto',
                                show: 'explode',
                                hide: 'explode',
                                buttons: {
                                    Aceptar: function() {

                                        $(this).dialog("close");
                                    //                                    $("#tabla_Admin_Telefonos").trigger("reloadGrid");

                                    }
                                }
                            });
                        });
                    }
                    );
                //                    });
                }
            });
            
        ////////////////fin vehiculos

        });  
}
function GuardarConductoresAsignados()
{
    
}
