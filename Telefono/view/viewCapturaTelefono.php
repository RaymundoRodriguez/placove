<!--//* Program Assignment: viewCapturaTelefono.php
*/
/* Name: Carlos Hilario
*/
/* Date: 21/03/2014.
*/
/* Description: muestra el formulario donde se captura la informacion del telefono
*/-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!--<link type="text/css" href="../../interfaz/view/css/color.css" rel="stylesheet">-->
        <title></title>
        <!--<script type="text/javascript" src="../../utils/clsValidacionJS.js"></script>-->
    </head>
    <body><br>
        <form id="formVehiculo">
            <div id="formCapturaTelefono"   style="width: 50%; margin: 0 auto;" >
                <!--<fieldset class="ui-state-default ui-corner-bottom ui-corner-top">-->
                <fieldset>
                    <legend>Captura datos veh&iacute;culo</legend>


                    <table border="0" align="center">
                     <!--<table >-->
                        <tr>    
                            <td><label> Numero Telefonico: </label><br>
                                <input type="text" maxlength="10" size="40%" id="numeroTel"  name="numeroTelefonico" class="ui-corner-bottom ui-corner-top "/>

                            </td>


                        </tr>


                        <tr></tr>
                        <tr>    
                            <td><label> Correo: </label><br>
                                <input type="text" size="40%" id="correoTel"  name="correo" class="ui-corner-bottom ui-corner-top "/>

                            </td>


                        </tr>


                        <tr></tr>

                        <tr>

                            <td>
                                <label> Cuenta Endomondo: </label><br>
                                <input type="text" size="40%" id="EndomondoTel" name="cuenta_endo" class="ui-corner-bottom ui-corner-top"/>
                        </tr>
                        <tr></tr>

                        <tr>

                            <td>

                                <label> Identificador Simbiosys: </label><br>
                                <input type="text" size="40%" id="IdentificadorTel" name="id_Simbiosys" class="ui-corner-bottom ui-corner-top"/></td>

                        </tr>

                        <tr></tr>
                        <td>
                            <label>Foto Telefono: &nbsp;</label>  <br>
                            <input type="file" size="28%" id="fotoTelefono" name="fotoTelefono" class="ui-corner-bottom ui-corner-top">
                        </td>

<!--                        <tr>
<td>

<label> Estatus:</label><br>


<select id="selectEstatus" style="width: 215px; height: 21px; font-size: 12px">

 <option value="00">Selecciona estatus</option>
 <option value="1">Alta</option>
 <option value="0">Baja</option>

</select>

</td>
</tr>-->

                        <td>
                            <div id="divSelector" style="width: 120px; height: 80px;">
                                <label>- seleccione un color haciendo clic -</label>
                                <input type="color" id="clrColor" value="#ff006f">

                            </div>
                        </td>
                        <tr></tr>

                        <tr align="center">
                            <td><input type="button" value="Guardar" id="btnGuardarTelefono" name="btnGuardar" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px " />
                                <input type="button" value="Cancelar" id="btnCancelarTelefono" name="btnGuardar" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px " />
                                <input type="button" value="Guardar y Anexar Otro" id="btnGuardarTelefonoOtro" name="btnGAnexar" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px " /></td>
                        </tr>

                    </table>
                </fieldset>

            </div>

        </form>
    </body>
</html>
