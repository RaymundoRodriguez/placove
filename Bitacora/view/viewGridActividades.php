<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Conductores en Proyecto</title>
        <script>
            $(function() {
                $("#tabs").tabs();
            });
        </script>
    </head>
    <body>
        <div id="tabs">
            <ul>

                <li><a href="#ActividadesBitacora">Actividades Bitacora</a></li>
                <li ><a  href="#pager6" id="reportebitxdia">Reporte Bitacora</a></li>
                <li ><a  href="#imagenesbitacora" >Imagenes</a></li>
                <li ><a  href="#ComentariosSupervisor" >Comentarios Supervisor</a></li>

            </ul>
            <div id="ActividadesBitacora">
                <table id="tabla_Admin_Actividades" ></table>
                <div id="pager5" class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-draggable ui-resizable"></div><br>
            </div>
            <div id="pager6" >

            </div>

            <div id="imagenesbitacora" >

            </div>
            <div id="ComentariosSupervisor">
                <br /> <br /> 
                <fieldset style="border:1px solid black;width:60%; height: 250%;margin: 0 auto">
                    <legend>Comentarios del dia</legend>
                    <br /><br />
                    <textarea  id="muestra_comentarios_supervisor" value="" style="width:99%; height: 100px;"  >
                    </textarea>  
                    <br /><br /><br /><br />
                    
                </fieldset>    
            </div>


        </div>
        <br>
<!--        <table border="0">


            <tr>
                <td>
                    <label>FI:</label><input type="text" id="FI" class="ui-corner-bottom ui-corner-top"  /><br><br> </td>
                <td rowspan="2"><input type="image" src='/SeguimientoTrue/trunk/interfaz/view/images/buscar16.png' id="buscar_fechas"></td>

            </tr>
            <tr>

                <td>   <label>FF:</label><input type="text" id="FF" class="ui-corner-bottom ui-corner-top"   /><br><br></td>


            <tr>

        </table>-->







        <!--<div id="panel_admin_conductores"></div>-->
<!--        <input type="button" value="Agregar Bitacora" id="addBitacora" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px "/>
        <input type="button" value="Mod Bitacora" id="modBitacora" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px " />-->
    </body>
</html>