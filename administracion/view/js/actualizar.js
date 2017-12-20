$(document).ready(function()
            { 

///tips llenado
    $('#txtnombre').qtip({
   content: {
      text: 'Nombre del Usuario sin número ni caracteres especiales'
   },
   show: {
      target: $('#txtnombre')
     }
    });            
  //  
    $('#txtap').qtip({
   content: {
      text: 'Apellido Paterno sin número ni caracteres especiales'
   },
   show: {
      target: $('#txtap')
     }
    });
    //
      $('#txtam').qtip({
   content: {
      text: 'Apellido Materno sin número ni caracteres especiales'
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
    $('#txtpass').qtip({
   content: {
      text: 'Debe de coinsidir con tu password anterior'
   },
   show: {
      target: $('#txtpass')
     }
    });
     //
     $('#txtverificar').qtip({
   content: {
      text: 'Entre 8 y 20 caracteres, por lo menos un digito\n y un alfanumérico, y no puede contener caracteres espaciales'
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
    ////ACTUALIZAR
    $("#btnModificar").click(function(){
        actualizar();
    });
    
});
function actualizar()
{
     var nombre= $('#txtnombre').val(),
     apellidop=$('#txtap').val(),
     apellidom=$('#txtam').val(),
     usuario=$('#txtusuario').val(),
     correo= $('#txtcorreo').val(),
     tipo=$('#lsttipo').val(),
     sexo=$('#lstsexo').val(),
     activo=$('#lstactivo').val(),
     pass1=$('#txtpass').val(),
     pass2=$('#txtverificar').val(),
     bien1=true,//todos los campos obligatorios
     bien2=true,//Nombre
     bien3=true,//Apellido Paterno
     bien4=true,//Apellido Materno
     bien5=true,//Usuario
     bien6=true,//Password
     bien7=true,//Verificar Password
     bien8=true,//Correo
     numeros="0123456789{}[]/*-+'=¡!#$%&()";
    
 if(nombre==""||apellidop==""||apellidom==""||usuario==""||correo==""||pass1==""||pass2=="")
 {
    $(function() {
                                $( "#dialogValidarAc" ).attr('style', 'visible');
                                $( "#dialogValidarAc" ).dialog();
                            });
     bien1=false;
 }else{   
 /////// VALIDAR NOMBRE
   for(i=0; i<nombre.length; i++){
      if (numeros.indexOf(nombre.charAt(i),0)!=-1){
         bien2=false;
         document.getElementById('divnombre').innerHTML='<IMG SRC="../../administracion/view/images/wrong.png">';
         document.getElementById('txtnombre').focus();
         
         break;
      }
      else
          {
              document.getElementById('divnombre').innerHTML='<IMG SRC="../../administracion/view/images/check.gif" ALT="Correcto">';
              bien2=true;
          }
   }
/////// VALIDAR APELLIDO PATERNO   
   for(i=0; i<apellidop.length; i++){
      if (numeros.indexOf(apellidop.charAt(i),0)!=-1){
         document.getElementById('divap').innerHTML='<IMG SRC="../../administracion/view/images/wrong.png">';
         document.getElementById('txtap').focus();
         bien3=false;
         break;
      }
      else
          {
              document.getElementById('divap').innerHTML='<IMG SRC="../../administracion/view/images/check.gif" ALT="Correcto">';
              bien3=true;
          }
   }
    
    /////// VALIDAR APELLIDO MATERNO   
   for(i=0; i<apellidom.length; i++){
      if (numeros.indexOf(apellidom.charAt(i),0)!=-1){
         document.getElementById('divam').innerHTML='<IMG SRC="../../administracion/view/images/wrong.png">';
         document.getElementById('txtam').focus();
         bien4=false;
         break;
      }
      else
          {
              document.getElementById('divam').innerHTML='<IMG SRC="../../administracion/view/images/check.gif" ALT="Correcto">';
              bien4=true;
          }
   }
   
   
   /////// VALIDAR USUARIO
var expUsu="{}[]/*-+-+'=¡!#$%&().";   
   for(i=0; i<usuario.length; i++){
      if (expUsu.indexOf(usuario.charAt(i),0)!=-1){
         document.getElementById('divusu').innerHTML='<IMG SRC="../../administracion/view/images/wrong.png">';
         document.getElementById('txtusuario').focus();
         bien5=false;
         break;
      }
      else
          {
              document.getElementById('divusu').innerHTML='<IMG SRC="../../administracion/view/images/check.gif" ALT="Correcto">';
              bien5=true;
          }
   }
   
   
   //////// VALIDAR PASSWORD
   
   if (/(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{8,20})$/.test(pass2)){
    bien7=true;
              document.getElementById('divpass2').innerHTML='<IMG SRC="../../administracion/view/images/check.gif" ALT="Correcto">';
  } else {
      bien7=false;
   document.getElementById('divpass2').innerHTML='<IMG SRC="../../administracion/view/images/wrong.png">';
         document.getElementById('txtpass').focus();
  }
  ////VALIDAR QUE LOS DOS PASWWORD SEAN IGUALES
  var oldpass=$('#oldpass').val();
  $.ajax({
           url: "../../administracion/controller/controllerVerificarPass.php?oldpass="+oldpass+"&newpass="+pass1,
           success:function(texto)
           {
               if(texto=='si')
               {
                   bien6=true;
                    document.getElementById('divpass').innerHTML='<IMG SRC="../../administracion/view/images/check.gif" ALT="Correcto">';
               }
               else
               {
                   bien6=false;
                    document.getElementById('divpass').innerHTML='<IMG SRC="../../administracion/view/images/wrong.png">';
               }
           }
            });

   //////// VALIDAR CORREO
   if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(correo)){
    bien8=true;
              document.getElementById('divcorreo').innerHTML=correo+'<IMG SRC="../../administracion/view/images/check.gif" ALT="Correcto">';
  } else {
      bien8=false;
   document.getElementById('divcorreo').innerHTML='<IMG SRC="../../administracion/view/images/wrong.png"> ';
         document.getElementById('txtcorreo').focus();
  }
   }//cierra el else
   
   if(bien1&&bien2&&bien3&&bien4&&bien5&&bien6&&bien7&&bien8)
   {
        var id=$("#id_usuSel").val();                                                                            
$.ajax({
            
           url: "../../administracion/controller/controllerGuardarMUsuario.php?id_Usu="+id+"&nombre="+nombre+"&ap="+apellidop+"&am="+apellidom+"&usu="+usuario+"&cont="+pass2+"&correo="+correo+"&activo="+activo+"&tipo="+tipo+"&sexo="+sexo,
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
                                            $('#txtnombre').val("");
                                            $('#txtap').val("");
                                            $('#txtam').val("");
                                            $('#txtusuario').val("");
                                            $('#txtpass').val("");
                                            $('#txtverificar').val("");
                                            $('#txtcorreo').val("");
                                            $('#divnombre').html("");
                                            $('#divap').html("");
                                            $('#divam').html("");
                                            $('#divusu').html("");
                                            $('#divpass').html("");
                                            $('#divpass2').html("");
                                            $('#divcorreo').html("");
           }
            });   
   }
}