<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Conductores en Proyecto</title>
    </head>
    <body><br>
        <table border="0">


            <tr>
                <td>
                    <label>FI:&nbsp;</label><input type="text" id="FI" class="ui-corner-bottom ui-corner-top"  /><br><br> </td>
                <td rowspan="2"><input type="image" src='/interfaz/view/images/buscar16.png' id="buscar_fechas"></td>

            </tr>
            <tr>

                <td>   <label>FF:&nbsp;</label><input type="text" id="FF" class="ui-corner-bottom ui-corner-top"   /><br><br></td>


            <tr>

        </table>


        <table id="tabla_Admin_Bitacoras" ></table>
        <div id="pager4" class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-draggable ui-resizable"></div><br>
        <!--<div id="panel_admin_conductores"></div>-->
      <center>  <input type="button" value="Agregar Bitacora" id="addBitacora" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px "/></center>
      <br> <center><input type="button" value="Modificar Km" id="modificarKm" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px " /></center>
      <br><center><input type="button" value="Eliminar Bitacora" id="elimnarBitacora" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px " /></center>
      <br><center><input type="button" value="Comentarios" id="ComentariosSupervisor" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px " /></center>
    </body>
</html>

