<!--
/* PLACOVE -> Agregar vehiculo
*/
/* Name: Irandis
*/
/* Date: 18/03/2014
*/
/* Description: Este archivo contiene la vista para modificar los datos de los vehiculos.
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
                                <input type="text" size="40%" id="txtcleNokia"  name="claveNokia" class="ui-corner-bottom ui-corner-top"/>

                            </td>


                        </tr>


                        <tr>    
                            <td><label> Tecnolog&iacute;a </label><br>
                                <input type="text" size="40%" id="txtTec"  name="tipoTec" class="ui-corner-bottom ui-corner-top"/>

                            </td>
                        </tr>
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

                                <label> Estatus:</label><br>


                                <select id="selectEstatusV" style="width: 215px; height: 21px; font-size: 12px">

                                    <option value="00">Selecciona estatus</option>
                                    <option value="1">Alta</option>
                                    <option value="2">Asignado</option>
                                    <option value="3">Trabajando</option>
                                    <option value="0">Baja</option>

                                </select>

                            </td>
                        </tr><br>

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

                        <tr></tr>
                        <tr>
                            <td><input type="button" value="Guardar" id="btnModificarVehiculo" name="btnGuardar" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px " />
                                <input type="button" value="Cancelar" id="btnCancelarVehiculo" name="btnGuardar" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px " /></td>
                        </tr>

                    </table>
                </fieldset>

            </div>

        </form>
    </body>
</html>
