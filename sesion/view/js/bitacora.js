$(document).ready(function(){
 //Agregar Todos los click que llevan a los modulos
 //******************* ADMINISTRACION ********************//
    $("#enlaceadmin").click(function(){
        $.post('../../sesion/controller/bitacora.php?area=ADMINISTRACION DE USUARIOS',{},function(data){});
    });
 //******************* FORO ******************************//
 
 //******************* CORREO ****************************//
 
 //******************* AGENDA ****************************//
 
 //******************* RED CIUDADANA *********************//
 
 //******************* MODULO 1 **************************//
 
 //******************* MODULO 2 **************************//
 
 //******************* MODULO 3 **************************//
 
 //******************* REPORTES **************************//
 $("#enlaceReportes").click(function(){
        $.post('../../sesion/controller/bitacora.php?area=REPORTES GRAFICOS',{},function(data){});
 });
});

