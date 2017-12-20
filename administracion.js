$(document).ready(function(){
										    $('#txtnombre').qtip({
										        content: {
										           text: 'Nombre del Usuario sin numero ni caracteres especiales'
										        },
										        show: {
										        	target: $('#txtnombre')
										          }
										         });   
           
                                              //  
                                                $('#txtap').qtip({
                                               content: {
                                                  text: 'Apellido Paterno sin numero ni caracteres especiales'
                                               },
                                               show: {
                                                  target: $('#txtap')
                                                 }
                                                });
                                                //
                                                  $('#txtam').qtip({
                                               content: {
                                                  text: 'Apellido Materno sin numero ni caracteres especiales'
                                               },
                                               show: {
                                                  target: $('#txtam')
                                                 }
                                                });
                                                //
                                                  $('#txtusuario').qtip({
                                               content: {
                                                  text: 'Usuario sin caracteres especiales'
                                               },
                                               show: {
                                                  target: $('#txtusuario')
                                                 }
                                                });
                                                //
                                                  $('#txtpass2').qtip({
                                               content: {
                                                  text: 'Entre 8 y 20 caracteres, por lo menos un digito\n y un alfanumerico, y no puede contener caracteres espaciales'
                                               },
                                               show: {
                                                  target: $('#txtpass2')
                                                 }
                                                });
                                                //
                                                $('#txtverificar').qtip({
                                               content: {
                                                  text: 'Verificar el password anterior'
                                               },
                                               show: {
                                                  target: $('#txtverificar')
                                                 }
                                                });
                                                //
                                                  $('#txtcorreo').qtip({
                                               content: {
                                                  text: 'Ejemplo@mail.com'
                                               },
                                               show: {
                                                  target: $('#txtcorreo')
                                                 }
                                                });
                                                  
                                                  $('#btnLimpiar').click(function(){limpiar()});
                                                  $('#btnaceptar').click(function(){
                                                	  
                                                	  verificarInsert()
                                                	  
                                                	  alert("Usuario registrado");	
                                                	  
                                                	  window.location.replace("index.html");

                                                  
                                                  });
                                                

});
//////onblour//////////////


///**************************/////////////////////////******************///////////////
//////*********************EVENTO ONCLICK***********************///////////
   

function limpiar()
        {
//            alert("limpiar");
            document.getElementById('txtnombre').value="";
            document.getElementById('txtap').value="";
            document.getElementById('txtam').value="";
            document.getElementById('txtusuario').value="";
            document.getElementById('txtpass').value="";
            document.getElementById('txtverificar').value="";
            document.getElementById('txtcorreo').value="";
            
            document.getElementById('divnombre').innerHTML="";
            document.getElementById('divap').innerHTML="";
            document.getElementById('divam').innerHTML="";
            document.getElementById('divusu').innerHTML="";
            document.getElementById('divpass').innerHTML="";
            document.getElementById('divpass2').innerHTML="";
            document.getElementById('divcorreo').innerHTML="";
        }
        
        
        
        
        
 function verificarInsert()
{
    var nombre= document.getElementById('txtnombre').value;
    
    
     var apellidop=document.getElementById('txtap').value;
     
     var apellidom=document.getElementById('txtam').value;
     
     var usuario=document.getElementById('txtusuario').value;
     
     var correo= document.getElementById('txtcorreo').value;
     
     var tipo=1;
     var sexo=document.getElementById('lstsexo').value;
     var activo=1;
     var pass1=document.getElementById('txtpass2').value;
    
    
    
    var pass2=document.getElementById('txtverificar').value;
    
    
    
    var bien1=true;//	 los campos obligatorios
    var bien2=true;//Nombre
    var bien3=true;//Apellido Paterno
    var bien4=true;//Apellido Materno
    var bien5=true;//Usuario
    var bien6=true;//Password
    var bien7=true;//Verificar Password
    var bien8=true;//Correo
    var numeros="0123456789{}[]/*-+'=¡!#$%&()";
    
 if(nombre==""||apellidop==""||apellidom==""||usuario==""||correo==""||pass1==""||pass2=="")
 {
   /* $(function() {
                                $( "#dialogValidar" ).attr('style', 'visible');
                                $( "#dialogValidar" ).dialog({ 
                             draggable:true,
                             modal: true,
                             show: "blind",
                             hide: "explode",
                             buttons: {
                                "Aceptar": function() {
                                $(this).dialog("close");}
                                }     
                               });
                            });
     bien1=false;*/
	 
	 
 }else{   
 /////// VALIDAR NOMBRE
   for(i=0; i<nombre.length; i++){
      if (numeros.indexOf(nombre.charAt(i),0)!=-1){
         bien2=false;
         document.getElementById('divnombre').innerHTML='<IMG SRC="administracion/view/images/wrong.png">';
         document.getElementById('txtnombre').focus();
         
         break;
      }
      else
          {
              document.getElementById('divnombre').innerHTML='<IMG SRC="administracion/view/images/check.gif" ALT="Correcto">';
              bien2=true;
          }
   }
/////// VALIDAR APELLIDO PATERNO   
   for(i=0; i<apellidop.length; i++){
      if (numeros.indexOf(apellidop.charAt(i),0)!=-1){
         document.getElementById('divap').innerHTML='<IMG SRC="administracion/view/images/wrong.png">';
         document.getElementById('txtap').focus();
         bien3=false;
         break;
      }
      else
          {
              document.getElementById('divap').innerHTML='<IMG SRC="administracion/view/images/Check.gif" ALT="Correcto">';
              bien3=true;
          }
   }
    
    /////// VALIDAR APELLIDO MATERNO   
   for(i=0; i<apellidom.length; i++){
      if (numeros.indexOf(apellidom.charAt(i),0)!=-1){
         document.getElementById('divam').innerHTML='<IMG SRC="administracion/view/images/wrong.png">';
         document.getElementById('txtam').focus();
         bien4=false;
         break;
      }
      else
          {
              document.getElementById('divam').innerHTML='<IMG SRC="administracion/view/images/check.gif" ALT="Correcto">';
              bien4=true;
          }
   }
   
   
   /////// VALIDAR USUARIO
var expUsu="{}[]/*-+-+'=¡!#$%&().";   
   for(i=0; i<usuario.length; i++){
      if (expUsu.indexOf(usuario.charAt(i),0)!=-1){
         document.getElementById('divusu').innerHTML='<IMG SRC="administracion/view/images/wrong.png">';
         document.getElementById('txtusuario').focus();
         bien5=false;
         break;
      }
      else
          {
              document.getElementById('divusu').innerHTML='<IMG SRC="administracion/view/images/check.gif" ALT="Correcto">';
              bien5=true;
          }
   }
   
   
   //////// VALIDAR PASSWORD
   
   if (/(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{8,20})$/.test(pass1)){
    bien6=true;
              document.getElementById('divpass').innerHTML='<IMG SRC="administracion/view/images/check.gif" ALT="Correcto">';
  } else {
      bien6=false;
   document.getElementById('divpass').innerHTML='<IMG SRC="administracion/view/images/wrong.png">';
         document.getElementById('txtpass').focus();
  }
   
   
   ////VALIDAR QUE LOS DOS PASWWORD SEAN IGUALES
   if(pass1==pass2)
   {
       bien7=true;
        document.getElementById('divpass2').innerHTML='<IMG SRC="administracion/view/images/check.gif" ALT="Correcto">';
   }
   else
   {
       bien7=false;
        document.getElementById('divpass2').innerHTML='<IMG SRC="administracion/view/images/wrong.png">';
   }
   
   
   //////// VALIDAR CORREO
   if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(correo)){
    bien8=true;
              document.getElementById('divcorreo').innerHTML=correo+'<IMG SRC="administracion/view/images/check.gif" ALT="Correcto">';
  } else {
      bien8=false;
   document.getElementById('divcorreo').innerHTML='<IMG SRC="administracion/view/images/wrong.png"> ';
         document.getElementById('txtcorreo').focus();
  }
   
   
   
   }//cierra el else
   
   if(bien1&&bien2&&bien3&&bien4&&bien5&&bien6&&bien7&&bien8)
   {
       $.ajax({
           url: "administracion/controller/controllerAltaUsuario.php?nombre="+nombre+"&ap="+apellidop+"&am="+apellidom+"&usu="+usuario+"&cont="+pass1+"&correo="+correo+"&activo="+activo+"&tipo="+tipo+"&sexo="+sexo,
           success:function(texto)
           {
               $(function() {
                                $( "#dialogValidar" ).attr('style', 'visible');
                                $( "#dialogValidar" ).dialog({ 
                             draggable:true,
                             modal: true,
                             show: "blind",
                             hide: "explode",
                             buttons: {
                                "Aceptar": function() {
                                $(this).dialog("close");}
                                }     
                               });
                            });
//               alert('Usuario '+usuario+' dado de alta');
                                            document.getElementById('txtnombre').value="";
                                            document.getElementById('txtap').value="";
                                            document.getElementById('txtam').value="";
                                            document.getElementById('txtusuario').value="";
                                            document.getElementById('txtpass').value="";
                                            document.getElementById('txtverificar').value="";
                                            document.getElementById('txtcorreo').value="";
                                            document.getElementById('divnombre').innerHTML="";
                                            document.getElementById('divap').innerHTML="";
                                            document.getElementById('divam').innerHTML="";
                                            document.getElementById('divusu').innerHTML="";
                                            document.getElementById('divpass').innerHTML="";
                                            document.getElementById('divpass2').innerHTML="";
                                            document.getElementById('divcorreo').innerHTML="";
                                            document.getElementById('divresultado').innerHTML=texto;
           }
            });   
   }
    
}


function verificarExistUsu()
{

   var validausu=document.getElementById('txtusuario').value;
   var prueboRequest = new Request({
   method: 'get', 
   url: 'administracion/controller/controllerVerificarUsuario.php?usuario='+validausu,

   onRequest: function() {
                            
                         }, 
   onSuccess: function(texto, xmlrespuesta)
                                   {
                                      if(texto=="existe")
                                       {
                                       }
                                       else
                                       { 
                                                
                                       }
                                   },
   onFailure: function(){
//       alert('Fallo');
   }
}).send();   
}
