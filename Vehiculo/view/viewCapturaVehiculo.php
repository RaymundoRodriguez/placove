<!--
/* PLACOVE -> Agregar vehiculo
*/
/* Name: Irandis
*/
/* Date: 14/03/2014
*/
/* Description: Este archivo contiene la vista para dar de alta vehiculos en la base de datos.
*/

-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <!--<script type="text/javascript" src="../../utils/clsValidacionJS.js"></script>-->
    </head>
    <body><br>
        <form id="formVehiculo">
            <div id="formCapturaVehiculo"   style="width: 60%; margin: 0 auto;" >
                <!--<fieldset class="ui-state-default ui-corner-bottom ui-corner-top">-->
                <fieldset>
                    <legend>Captura datos veh&iacute;culo</legend>


                    <table border="0" align="center">
                     <!--<table >-->
                        <tr>    
                            <td><label> Clave Nokia: </label><br>
                                <input type="text" size="40%" id="txtcleNokia"  name="claveNokia" class="ui-corner-bottom ui-corner-top "/>

                            </td>


                        </tr>


                        <tr></tr>

                        <tr>    
                            <td><label> Tecnolog&iacute;a </label><br>
                                <input type="text" size="40%" id="txtTec"  name="tipoTec" class="ui-corner-bottom ui-corner-top "/>

                            </td>


                        </tr>


                        <tr></tr>

                        <tr>

                            <td>
                                <label> Tarjeta llave: </label><br>
                                <input type="text" size="40%" id="txttarlleve" name="tarjLlave" class="ui-corner-bottom ui-corner-top"/>
                        </tr>
                        <tr>
                            <td>

                                <label> Tarjeta gasolina: </label><br>
                                <input type="text" size="40%" id="txtTarGas" name="tarGas" class="ui-corner-bottom ui-corner-top"/></td>
                        </tr>                      
                        <tr>
                            <td>

                                <label> Placa: </label><br>
                                <input type="text" size="40%" id="marca" name="marca" class="ui-corner-bottom ui-corner-top"/></td>
                        </tr>
                        <tr>
                            <td>

                                <label> Modelo: </label><br>
                                <input type="text" size="40%" id="modelo" name="modelo" class="ui-corner-bottom ui-corner-top"/></td>
                        </tr>
                             <tr>
                            <td>

                                <label> Identificador Simbiosys: </label><br>
                                <input type="text" size="40%" id="identificador" name="identificador" class="ui-corner-bottom ui-corner-top"/></td>
                        </tr>
                            <tr>
                                <td>

                                    <label> Imagen del vehiculo: </label> 
                                    <input type="file" size="40%" id="fotovehiculo" name="fotovehiculo" class="ui-corner-bottom ui-corner-top"/></td>
                            </tr>
                            <tr>
                                <td>

                                    <label> Imagen placas: </label>
                                    <input type="file" size="40%" id="fotoplacas" name="fotoplacas" class="ui-corner-bottom ui-corner-top"/></td>
                            </tr>
                        
                        <br>
                        <tr align="center">
                            <td>
                                <input type="button" value="Guardar" id="btnGuardarVehiculo" name="btnGuardar" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px " />
                                <input type="button" value="Guardar y Anexar Otro" id="anexarvehiculo" name="anexar" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px " />
                                <input type="button" value="Cancelar" id="btnCancelarVehiculo" name="btnGuardar" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px " /></td>
                        </tr>

                    </table>
                </fieldset>
            </div>
        </form>
    </body>
</html>
