function asignarConductorSuplente(id_con_proyecto,estaus_proyecto){


    if(estaus_proyecto=="terminado")
    {
        $(function() {
            $( "#ventanAlertas" ).html("No se puede asignar comodin, conductor terminado");
            $( "#ventanAlertas" ).attr('style', 'visible');
            $( "#ventanAlertas" ).dialog({
                modal: true,
                title:'Termino de delegaci&oacute;n o municipio',
                //ancho que aparecera
                width:300,
                //altura en que aparecear
                height: 140,
                //maxima altura
                maxHeight: 180,
                //maxima anchura
                maxWidth: 400,
                //minima altura
                minHeight: 180,
                //minima anchura
                minWidth: 200,
                //para moverla
                show: {
                    effect: "explode", 
                    duration: 100
                },
                hide: {
                    effect: "slide", 
                    duration: 600
                },
                buttons: {
                    Aceptar: function() {                                                                                                   
                    
                        $( this ).dialog( "close" );                                    
                    }
               
                }
            });
        });   
    }
    else{



    
        $('#panelCenter_2_1').html("<br><div id='formAsignarConductor'   style='width: 50%; margin: 0 auto;' position:abosulte >  \n\
                        <fieldset>  <legend>Captura datos del comodin</legend>   <div id='contenido' align='center'> <tr><td><label> \n\
                    Conductores:&nbsp; </label><select id='AddConductores' style='width: 296px; height: 21px; font-size: 12px'> </select> \n\
                     </td></tr> <select id='TipoConductor' style='width: 280px; height: 21px; font-size: 12px'>\n\
                                    <option value='Comodin'>Comodin</option>\n\
                                    <option value='Parcial'>Parcial</option>\n\
                                    </select><br><br></td></tr> <tr><td><input type='button' value='Aceptar' id='btnGuardar' name='btnGuardar' class='ui-state-default ui-corner-bottom ui-corner-top' style='font-family: Georgia,'Times New Roman',times,serif; font-size: 12px ' ></td></tr>\n\
                               <tr><td><input type='button' value='Cancelar' id='btnCancelar' name='btnCancelar' class='ui-state-default ui-corner-bottom ui-corner-top' style='font-family: Georgia,'Times New Roman',times,serif; font-size: 12px ' ></td></tr></fieldset></div>");
                      
                     
        $("#btnGuardar").bind({
    
    
            click:function(){     
            
                //            alert($("#AddConductores").val());
                //            alert($("#TipoConductor").val());
                //            alert(id_con_proyecto)
                $.post("../../Proyecto/controller/controllerInsertarSuplente.php",{
                    con_pro:id_con_proyecto,              
                    conductor_id_conductor:$("#AddConductores").val(), 
                    tipo_conductor:$("#TipoConductor").val()
               
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
        $.post("../../Proyecto/controller/controllerInsertarConductoraProyecto.php", {
            conductor:'conductores'
        }, function(data) {
            var arreglo = new Array();
            arreglo = eval(data);
         
            for (i = 0;i < arreglo.length;i++) {
                $('#AddConductores').append('<option value="' + arreglo[i].id_conductor + '" >' + arreglo[i].nombre +' '+ arreglo[i].apellidos + '</option>');
            }
        
        });
    
        addvehiculos();                                                    
    }
}

function cargarGridBitacorasSuplente(id_con_proyecto,id_conductor,id_proyecto,nombre,option,id_suplente,FI,FF){
   
    //       alert("id del la relacion de todos "+id_con_proyecto+" -id del conductor "+id_conductor+" "+"- id del proyecto "+id_proyecto);


  
    var arreFecha= new Array();
    //    abrirCerrarPanel(false,"Bitacora: "+nombre);
   
    
    var id_bitacora;
    var conductor_id_relacion
    var F_captura;
    var F_bitacora;
    var  seleccion=false;  
    
    
    $('#panelLeft_2_1').load('../../Bitacora/view/viewGridBitacorasConductores.php',{},function(data){
        
        
        datePickerFuncion2();
        
       
      
        //busquedaFechas
        if(option == "fechaMes"){
          
            arreFecha=fecha();
        
          
        }else{
          
            arreFecha[0]=FF;
            arreFecha[1]=FI;
          
          
          
        }
      
        $("#addBitacora").bind({
        
        
            click:function(){
                
                //                alert("suplente");
                inicioAddModSuplentes(id_con_proyecto,nombre,id_proyecto,id_suplente);
            }
        
        })
        
         
        
       
        $("#titulo_pagina_3").val("Bitacoras: "+nombre);
        
        
        $("#buscar_fechas").bind({
        
        
            click:function(){
          
                buscarPorFechasSuplente($("#FI").val(),$("#FF").val(),id_con_proyecto,id_conductor,id_proyecto,nombre,id_suplente);
            }
        
        })
        
        
        $("#tabla_Admin_Bitacoras").jqGrid({
                     
            url: '../../Bitacora/controller/controllerGridBitacoras.php',
            postData:{
                opcion:"suplentes",
                id_relacion:id_con_proyecto,
                FI:arreFecha[0],
                FF:arreFecha[1],
                id_suplente:id_suplente                
            },
            datatype: 'json',
            colNames:['Num bitacora','id_bitacora','conductor_id_relacion','Fecha de captura','Fecha bitacora'],
            colModel : [
            {
                display: 'num', 
                name : 'num', 
                width : 10, 
                sortable : true
                
        
        
            },
            {
                display: 'id_bitacora', 
                name : 'id_bitacora', 
                width : 10, 
                sortable : true,
                hidden:true
        
        
            },
            {
                
                
                display: 'conductor_id_relacion', 
                name : 'conductor_id_relacion', 
                width : 30, 
                sortable : true, 
                align: 'right',
                hidden:true
                //            editable:true,
                //            edittype:'text',
                //            editoptions: {size:10, maxlength: 15}
                ,
                search:true, 
                stype:'text',
                searchrules:{
                    required:true
                }
            //            searchoptions: {
            //                sopt: ['eq', 'ne']
            //            }
        
        
            },
        
        
        
            {
                display: 'fecha_captura', 
                name : 'fecha_captura', 
                width : 50, 
                sortable : true,
                align: 'right',
                hidden:true
        
            },
        
            {
                display: 'fecha_real', 
                name : 'fecha_real', 
                width : 50, 
                sortable : true, 
                align: 'right'
            },
           
        
           
    
           
            ],
        
            rowNum:10,         
            pager: '#pager4', 
            sortname: 'fecha_bitacora', 
            viewrecords: true, 
            sortorder: "asc", 
            //            emptyrecords: "No existen registros",
            height:300,
            autowidth:true,
            //            scrollOffset:22,        
            onSelectRow: function(id) {
            
                seleccion=true;    
                id_bitacora=$(this).jqGrid('getCell',id,1);
                conductor_id_relacion=$(this).jqGrid('getCell',id,2);
                F_captura=$(this).jqGrid('getCell',id,3);
                
                F_bitacora=$(this).jqGrid('getCell',id,4);
             
             
           $.blockUI({ message: '<img src=/SeguimientoTrue/trunk/interfaz/view/images/d.gif />' }); 
                gridactividades(id_bitacora,F_bitacora);
                
            
        //            alert("dd");
        }
    
    
        });
    $("#modificarKm").bind({
        
        
        click:function(){                

            if(seleccion){
                 
                
                seleccion=false;  
                modificarKm(id_bitacora);
                 
            }else{
                 
                 
                $(function() {
                    $( "#ventanAlertas" ).html("Elija bitacora");
                    $( "#ventanAlertas" ).attr('style', 'visible');
                    $( "#ventanAlertas" ).dialog({
                        modal: true,
                        title:'Conductor',
                        show:'explode',
                        hide: 'explode',
                        buttons: {
                            Aceptar: function() {
                                                            
                                $( this ).dialog( "close" );
                            //                                    $("#tabla_Admin_Conductores").trigger("reloadGrid");  
                                                        
                            }
                        }
                    });
                });
            }
         
         
        }
        
    })
    $("#elimnarBitacora").bind({
        
        
        click:function(){
                
                
            
       
            if(seleccion){
                 
                
                seleccion=false;  
                eliminarBitacora(id_bitacora);
                 
            }else{
                 
                 
                $(function() {
                    $( "#ventanAlertas" ).html("Elija bitacora");
                    $( "#ventanAlertas" ).attr('style', 'visible');
                    $( "#ventanAlertas" ).dialog({
                        modal: true,
                        title:'Conductor',
                        show:'explode',
                        hide: 'explode',
                        buttons: {
                            Aceptar: function() {
                                                            
                                $( this ).dialog( "close" );
                            //                                    $("#tabla_Admin_Conductores").trigger("reloadGrid");  
                                                        
                            }
                        }
                    });
                });
            }
         
         
        }
        
    })
    $("#tabla_Admin_Bitacoras").jqGrid('navGrid','#pager4',{
        edit:false,
        add:false,
        search:false,
        del:false,
        refresh:false,
        view:false
    });
        
    $("#tabla_Admin_Bitacoras").jqGrid('navButtonAdd','#pager4',{
        caption:"<img src=/SeguimientoTrue/trunk/interfaz/view/images/Iconos_jqgrid/imagen.png width='23' height='23' />", 
        buttonicon:"ui-icon-vacio", 
        cursor: "pointer",
        title:"Mostrar Imagenes de Bitácora",
        //        id:"NuevoUsu",
        onClickButton: function () {
            
            if(seleccion){
                 
                
                seleccion=false;  
                mostrarImagenesdeBitacora(id_bitacora);
                 
            }else{
                 
                 
                $(function() {
                    $( "#ventanAlertas" ).html("Elija bitacora");
                    $( "#ventanAlertas" ).attr('style', 'visible');
                    $( "#ventanAlertas" ).dialog({
                        modal: true,
                        title:'Conductor',
                        show:'explode',
                        hide: 'explode',
                        buttons: {
                            Aceptar: function() {
                                                            
                                $( this ).dialog( "close" );
                            //                                    $("#tabla_Admin_Conductores").trigger("reloadGrid");  
                                                        
                            }
                        }
                    });
                });
            }
              
               
           
            
        } 
    });
        
    });
}

function terminarConductorProyecto(estaus_proyecto,id_con_proyecto,id_conductor,vehiculo_id_vehiculo, telefono_id_telefono)
{
    if(estaus_proyecto=="terminado")
    {
        $(function() {
            $( "#ventanAlertas" ).html("El conductor ya ha terminado su parte");
            $( "#ventanAlertas" ).attr('style', 'visible');
            $( "#ventanAlertas" ).dialog({
                modal: true,
                title:'Termino de delegaci&oacute;n o municipio',
                //ancho que aparecera
                width:300,
                //altura en que aparecear
                height: 140,
                //maxima altura
                maxHeight: 180,
                //maxima anchura
                maxWidth: 400,
                //minima altura
                minHeight: 180,
                //minima anchura
                minWidth: 200,
                //para moverla
                show: {
                    effect: "explode", 
                    duration: 100
                },
                hide: {
                    effect: "slide", 
                    duration: 600
                },
                buttons: {
                    Aceptar: function() {                                                                                                   
                    
                        $( this ).dialog( "close" );                                    
                    }
              
                }
            });
        });   
    }
    else{
        $(function() {
            $( "#ventanAlertas" ).html("El conductor termino su parte ?");
            $( "#ventanAlertas" ).attr('style', 'visible');
            $( "#ventanAlertas" ).dialog({
                modal: true,
                title:'Termino de delegaci&oacute;n o municipio',
                //ancho que aparecera
                width:300,
                //altura en que aparecear
                height: 140,
                //maxima altura
                maxHeight: 180,
                //maxima anchura
                maxWidth: 400,
                //minima altura
                minHeight: 180,
                //minima anchura
                minWidth: 200,
                //para moverla
                show: {
                    effect: "explode", 
                    duration: 100
                },
                hide: {
                    effect: "slide", 
                    duration: 600
                },
                buttons: {
                    Aceptar: function() {
                                                                                                   
                        $.post("../../Proyecto/controller/controllerTerminarProyecto.php",{
                            id_conductor:id_conductor,
                            id_vehiculo:vehiculo_id_vehiculo,
                            id_telefono:telefono_id_telefono,                     
                            id_con_proyecto:id_con_proyecto,
                            opcion:"conductor"
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
                        $( this ).dialog( "close" );                                    
                    },
                    Cancelar: function() {
                            
                        $( this ).dialog( "close" );
                        
                        
                    }
                }
            });
        });
     
    }
}


function terminarConductorProyectoSuplente(estaus_proyecto,id_con_proyecto,id_conductor,id_suplente)
{
    if(estaus_proyecto=="terminado")
    {
        $(function() {
            $( "#ventanAlertas" ).html("El conductor ya ha terminado su parte");
            $( "#ventanAlertas" ).attr('style', 'visible');
            $( "#ventanAlertas" ).dialog({
                modal: true,
                title:'Termino de delegaci&oacute;n o municipio',
                //ancho que aparecera
                width:300,
                //altura en que aparecear
                height: 140,
                //maxima altura
                maxHeight: 180,
                //maxima anchura
                maxWidth: 400,
                //minima altura
                minHeight: 180,
                //minima anchura
                minWidth: 200,
                //para moverla
                show: {
                    effect: "explode", 
                    duration: 100
                },
                hide: {
                    effect: "slide", 
                    duration: 600
                },
                buttons: {
                    Aceptar: function() {                                                                                                   
                    
                        $( this ).dialog( "close" );                                    
                    },
                    Cancelar: function() {
                            
                        $( this ).dialog( "close" );
                        
                        
                    }
                }
            });
        });   
    }
    else {
        $(function() {
            $( "#ventanAlertas" ).html("El conductor termino su parte ?");
            $( "#ventanAlertas" ).attr('style', 'visible');
            $( "#ventanAlertas" ).dialog({
                modal: true,
                title:'Termino de delegaci&oacute;n o municipio',
                //ancho que aparecera
                width:300,
                //altura en que aparecear
                height: 140,
                //maxima altura
                maxHeight: 180,
                //maxima anchura
                maxWidth: 400,
                //minima altura
                minHeight: 180,
                //minima anchura
                minWidth: 200,
                //para moverla
                show: {
                    effect: "explode", 
                    duration: 100
                },
                hide: {
                    effect: "slide", 
                    duration: 600
                },
                buttons: {
                    Aceptar: function() {
                                                                                                   
                        $.post("../../Proyecto/controller/controllerTerminarProyecto.php",{
                            id_conductor:id_conductor,
                            id_suplente:id_suplente,
                            id_con_proyecto:id_con_proyecto,
                            opcion:"suplente"
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
                        $( this ).dialog( "close" );                                    
                    },
                    Cancelar: function() {
                            
                        $( this ).dialog( "close" );
                        
                        
                    }
                }
            });
        });
     
    }
}
