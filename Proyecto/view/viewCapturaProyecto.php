<!--
/* PLACOVE -> Agregar Proyecto
*/
/* Name: Irandis
*/
/* Date: 21/03/2014
*/
/* Description: Este archivo contiene la vista para dar de alta Proyectos en la base de datos.
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
        <form id="formproyecto" method="POST" enctype="multipart/fomr-data">
            <div id="formCapturaProyecto"  ali style="width: 95%; margin: 0 auto">
                <!--<fieldset class="ui-state-default ui-corner-bottom ui-corner-top">-->
                <div id="datosProyecto">
                    <fieldset style="width:960px; height: 190px;margin: 0 auto">
                        <legend>Captura datos del proyecto</legend>
                        <div style="width:90%; height: 50%;">
                            <div id="contenido"  >

                                <div id="fielconiz">

                                    <TABLE BORDER=0 style="border-spacing: 35px 12px;">
                                        <TR>
                                            <TD ><label> Nombre </label>
                                            </TD>
                                             <TD colspan="3">
                                                 <input type="text" size="69%" id="txtNombreProyecto"  name="Nombre" style="text-align: center" placeholder="Nombre del proyecto" class="ui-corner-bottom ui-corner-top "/>
                                            </TD>
                                        </TR>
                                        <TR>
                                            <TD WIDTH=100></TD>

                                            <TD WIDTH=100><label> Fecha inicial </label>
                                            </TD>
                                            <TD WIDTH=100><label> Fecha final</label>
                                            </TD>
                                            <TD WIDTH=100></TD>

                                        </TR>

                                        <TR>
                                            <TD WIDTH=100><label> Planeación</label>
                                            </TD>

                                            <TD WIDTH=100>
                                                <input type="text" size="12%" id="fe_inicio"  name="fecha_inicio" style="text-align: center" class="ui-corner-bottom ui-corner-top "/>
                                            </TD>

                                            <TD WIDTH=100>
                                                <input type="text" size="12%" id="fe_terminacion" name="fecha_terminacion" style="text-align: center"class="ui-corner-bottom ui-corner-top"/>
                                            </TD>
                                            <TD WIDTH=100></TD>

                                        </TR>
                                        <TR>
                                            <TD WIDTH=100><label> Real</label>
                                            </TD>

                                            <TD WIDTH=100>
                                                <input type="text" size="12%" id="fecha_inicio_real" name="fecha_inicio_real" style="text-align: center"class="ui-corner-bottom ui-corner-top"/>
                                            </TD>

                                            <TD WIDTH=100>
                                                <input type="text" size="12%" id="fecha_fin_real" name="fecha_fin_real" style="text-align: center"class="ui-corner-bottom ui-corner-top"/>
                                            </TD>
                                            <TD WIDTH=100></TD>

                                        </TR>
                                    </TABLE>
                                </div>

                            </div>
                            <div id="fielCond">

                                <div id="km_proyecto" >
                                    <label > Function class: </label>&nbsp;&nbsp;

                                    <div id="function_class">
                                        <?php
                                        $values = array("1", "2", "3", "4", "5");

                                        foreach ($values as $value) {
                                            echo "<br />  <input type='checkbox'  id='km_FC-" . $value . "' value='FC-" . $value . "' /> &nbsp;&nbsp; <input type='text' size='8%' name='FC-" . $value . "' id='" . $value . "' placeholder='0 KM' disabled='disabled' value='' />&nbsp;&nbsp FC-" . $value . "";
                                        }
                                        ?>
                                    </div>
                                </div></div>
                        </div>
                    </fieldset> </div>

                <br /><br /> 
                <fieldset style="width:650px; height: 171px;margin: 0 auto">
                    <legend>Asignar Estado y Delegaci&oacute;n</legend>

                    <div id="contenido" >

                        <table align="center">
                            <tr >
                                <td>
                <!--                    <span> estados</span>-->

                                    <select id="estadosPro" size="8" >

                                    </select>

                                </td>
                                <td>
                                    <input type="button" id="btn_derechoEst"  value =">>"/><br/>
                                    <input type="button" id="btn_izquierdoEst"  value ="<<"/>
                                </td>
                                <td>

                                    <select id="estados_asignados" size="8" class="s" >

                                    </select>

                                </td>
                                <!--<td></td>-->
                                <td>

                                    <select id="municipiosPro" size="8" >

                                    </select>

                                </td>
                                <td>
                                    <input type="button" id="btn_derechoMun"  value =">>"/><br/>
                                    <input type="button" id="btn_izquierdoMun"  value ="<<"/>
                                </td>
                                <td>

                                    <select id="municipios_asignados" size="8" >

                                    </select>



                                </td>
                            </tr>
                        </table>
                    </div>
                </fieldset>

<!--                <br>  <br> <input type="button" value="Guardar" id="btnGuardarProyecto" name="btnModificar" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px " />
                <input type="button" value="Guardar y Anexar Otro" id="anexarproyecto" name="anexar" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px " />
                &nbsp;&nbsp;<input type="button" value="Cancelar" id="btnCancelarProyecto" name="btnGuardar" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px " />-->
            </div>
        </form>
    </body>
</html>
