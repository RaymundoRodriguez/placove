<!--
/* PLACOVE -> agregar km delegacion
*/
/* Name: Irandis
*/
/* Date: 28/03/2014
*/
/* Description: Este archivo contiene la vista para dar de alta los kilometros de cada delegacion.
*/

-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <!--<script type="text/javascript" src="../../utils/clsValidacionJS.js"></script>-->
        <style type="text/css">
            select {
                width:200px;
                height:100px;
            }
        </style>

    </head>
    <body><br>
        <form id="formproyecto">
            <div id="formCapturakmProyectod"   style="width: 75%; margin: 0 auto;" position:abosulte >
                <!--<fieldset class="ui-state-default ui-corner-bottom ui-corner-top">-->
                <fieldset style="border:1px solid white;width:75%; height: 250%;;margin: 0 auto">
                    <!--                    <legend align= "center">Agregar Kilometos lineales y rut</legend>-->

                    <div class="kmlineales">
                        <br /><br /> 
                        <fieldset style="width:100%; height: 40%;margin: 0 auto">
                            <legend align= "center">Agregar Kilómetros lineales</legend><br />


<!--                        <div id="municipios_asignadosP">Aguascalientes<input type="text" size="8%" id="km_FC-1" placeholder="KM"  /><br /><br /></div>
        <div id="municipios_asignadosP">Asientos<input type="text" size="8%" id="km_FC-1" placeholder="KM"  /><br /><br /></div>-->

                            <div id="kmAsignadosDelegacion"></div>
                            <div id="municipios_asignadoskm" size="8" >

                            </div>

                        </fieldset>
                    </div>
                    <div class="kmruteador">       <br /><br /> 
                        <fieldset style="width:100%; height: 40%;margin: 0 auto">
                            <legend align= "center">Agregar Kilómetros Ruteador</legend><br />


<!--                        <div id="municipios_asignadosP">Aguascalientes<input type="text" size="8%" id="km_FC-1" placeholder="KM"  /><br /><br /></div>
        <div id="municipios_asignadosP">Asientos<input type="text" size="8%" id="km_FC-1" placeholder="KM"  /><br /><br /></div>-->

                            <div id="kmrAsignadosDelegacion"></div>
                            <div id="municipios_asignadokmr" size="8" >

                            </div>

                        </fieldset>
                    </div>
                </fieldset>

                <div align= "center">
                    <br>  <br> <input type="button" value="Guardar" id="btnGuardarProyecto" name="btnModificar" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px " />
                    <input type="button" value="Guardar y Anexar Otro" id="anexarproyecto" name="anexar" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px " />
                    &nbsp;&nbsp;<input type="button" value="Cancelar" id="btnCancelarProyecto" name="btnGuardar" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px " />
                </div> 
            </div> 
        </form>
    </body>
</html>

