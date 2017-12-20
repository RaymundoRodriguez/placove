$(document).ready(function()
            { 
                cargarGrid();
	//***************Agregar Jerarquia en Administracion de Usuarios***************//
        $("#btnNuevoUsu").click(function()
                                   {
                                    $("#panelCenter_2_1").load("../../administracion/view/nuevo_usuario.php");
                                   });
         
});

function cargarGrid()
{
               $.ajax({
               url:"../../administracion/controller/controllerUsuarios.php",
               success: function(texto)
               {
                  
                   if(texto==false)
                       {
                           $( "#dialogPermisoUsuario" ).attr('style', 'visible');
                           $( "#contenidoDialogUsuario" ).html("No tienes Permiso De ver Usuarios");
                            $("#dialogPermisoUsuario").dialog({ 
                             draggable:true,
                             modal: true,
                             show: "blind",
                             hide: "explode",
                             buttons: {
                                "Aceptar": function() {
                                $(this).dialog("close");}
                                }     
                               });
                               $("#panelCenter_1_1").html("");
                       }
                       else
                       {  
                                 
                                   //grid usuarios
                                   $("#tabla_usuarios").jqGrid({
				    url: '../../administracion/controller/controllerUsuarios.php',
				    datatype: 'json',
				    colNames:['ID','Nombre','Apellido Paterno','Apellido Materno','usuario','Correo Electronico','activo', 'tipo'],
				    colModel : [
				            {display: 'ID', name : 'idusuario', width : 20, sortable : true, align: 'left'},
				            {display: 'Nombre', name : 'nombre', width : 100, sortable : true, align: 'left'},
				            {display: 'Apellido Paterno', name : 'ap_paterno', width : 100, sortable : true, align: 'left'},
				            {display: 'Apellido Materno', name : 'ap_materno', width : 100, sortable : true, align: 'left'},
                                            {display: 'Usuario', name : 'usuario', width : 100, sortable : true, align: 'left'},
				            {display: 'Correo Electronico', name : 'correo', width : 160, sortable : true, align: 'left'},
                                            {display: 'Activo', name : 'activo', width : 50, sortable : true, align: 'left'},
                                            {display: 'Tipo', name : 'tipo', width : 50, sortable : true, align: 'left'},
				            		 ],
				    searchitems : [
				            {display: 'ID', name : 'idusuario'},
				            {display: 'Nombre', name : 'nombre'},
				            {display: 'Apellido Paterno', name : 'ap_paterno'},
				            {display: 'Apellido Materno', name : 'ap_materno'},
				            {display: 'Usuario', name : 'usuario'},
				            {display: 'Correo Electronico', name : 'correo'},
				            {display: 'Activo', name : 'activo'},
                                            {display: 'Tipo', name : 'tipo'},
				    ],
				    rowNum:10, 
			           rowList:[10,20,30], 
			           pager: '#pager2', 
			           sortname: 'idusuario', 
			           viewrecords: true, 
			           sortorder: "desc", 
			           caption:"Usuarios UrNews",
                                   width:850,
			           
                                   onSelectRow: function(id) {
                                          var nombre=$('#tabla_usuarios').jqGrid('getCell',id,1);
                                          var idU=$('#tabla_usuarios').jqGrid('getCell',id,0);
                                                if($('#trash').find("span").length)
                                                {
                                                    
                                                }
                                                else
                                                {
                                                    $('#pager2_left').append("<div id='trash' class='ui-pg-div'>  <span id='eliminar' class='ui-icon ui-icon-trash'></span></div>");
                                                    $('#pager2_left').append("<div class='ui-pg-div'>  <span id='modify' class='ui-icon ui-icon-pencil'></span></div>");
                                                }
                                                    $('#eliminar').click(function(){
                                                                    $('#spEliminarUsu').html(nombre);
                                                                    $( "#dialogEliminarUsu" ).attr('style', 'visible');
                                                                    $("#dialogEliminarUsu").dialog({ 
                                                                     draggable:true,
                                                                     modal: true,
                                                                     buttons: {"Eliminar": function() {
                                                                        borrar_usu(idU);
                                                                        $(this).dialog("close");},
                                                                        "Cancelar": function() {
                                                                        $(this).dialog("close");}
                                                                        }
                                                                              
                                                                       });
                                                                        //$("#dialogEliminarUsu").dialog("open");
                                                                    });
                                                    $('#modify').click(function(){
                                                            $("#panelCenter_2_1").load("../../administracion/controller/controllerModificar.php",{id:idU},function(){
                                                               
                                                            });
                                                    });
                                                    cargarIndexBitacora();
                                    },
                                    gridComplete:function(){
                                        cargarIndexBitacora();
                                    }

                                }); 
                                }
               },
               error:function(xhr,err){
//           alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
//           alert("responseText: "+xhr.responseText);
          }
           });
//          alert('entra');                     
}

function cargarIndexBitacora()
{
    $('#divTarjetaPresentacion').load('../../bitacora/view/index_bitacora.php');
   
}

//
function activar(valor)
{ 
   $.ajax({
       url:'../../administracion/controller/controllerUpdateActivar.php?id_usuario='+valor+'&estado=1',     
   success: function(texto)
   {
       if(texto==1){cargar();}
   },
    error:function(xhr,err){
//           alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
//           alert("responseText: "+xhr.responseText);
          }
   
   });

}
//
//
function desactivar(valor)
{
   $.ajax({
       url:'../../administracion/controller/controllerUpdateActivar.php?id_usuario='+valor+'&estado=0',     
   success: function(texto)
   {
       if(texto==1){cargar();}
   },
    error:function(xhr,err){
//           alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
//           alert("responseText: "+xhr.responseText);
          }
   
   });
}
function borrar_usu(valor)
{
    $.ajax({
       url:'../../administracion/controller/controllerEliminarUsuario.php?id_usuario='+valor,     
   success: function(texto)
   {
       if(texto==1){cargar();}
   },
    error:function(xhr,err){
//           alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
//           alert("responseText: "+xhr.responseText);
          }
   
   }); 
}