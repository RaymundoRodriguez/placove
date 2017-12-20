<!--
/* PLACOVE -> Agregar Proyecto
*/
/* Name: Irandis
*/
/* Date: 21/03/2014
*/
/* Description: Este archivo contiene la vista para dar de modificar Proyectos en la base de datos.
*/
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>

        <script>
            $(function() {
                $("#tabs").tabs();


            });
        </script>

        <style type="text/css">
            select {
                width:200px;
                height:100px;
            }
        </style>
    </head>
    <body>
        <div id="tabs">
            <ul>

                <li><a href="#divModificarDelegacion">Modificar proyecto</a></li>

                <li><a href="#divModificarKMDelegacionkm"  id="ModificarKMDelegacionkm">Modificar kilómetros delegación</a></li>

            </ul>
            <div id="divModificarDelegacion">
                <form id="formproyecto" >
                    <div id="formModificarProyecto"   style="width: 95%; margin: 0 auto;" position:abosulte >
                        <!--<fieldset class="ui-state-default ui-corner-bottom ui-corner-top">-->

                        <div id="datosProyecto">
                            <fieldset style="width:960px; height: 222px;margin: 0 auto">
                                <legend>Modificar datos del proyecto</legend>
                                <div style="width:90%; height: 67%;">

                                    <div id="contenido" >

                                        <div id="fielconiz">

                                            <TABLE BORDER=0 style="border-spacing: 35px 12px;">
                                                <TR>
                                                    <TD ><label> Nombre </label>
                                                    </TD>
                                                    <TD colspan="3">
                                                        <input type="text" size="66%" id="txtNombreProyecto"  name="Nombre" style="text-align: center" class="ui-corner-bottom ui-corner-top "/>
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
                                                        <input type="text" size="12%" id="fe_terminacion" name="fecha_terminacion" style="text-align: center" class="ui-corner-bottom ui-corner-top"/>
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
                                                <TR>
                                                    <TD WIDTH=100><label> Esatus</label>
                                                    </TD>

                                                    <TD WIDTH=100>
                                                        <select id="estatusp" style="width: 120px; height: 21px; font-size: 12px">

                                                            <option value="00">Selecciona estatus</option>
                                                            <option value="1">Alta</option>
                                                            <option value="0">Baja</option>

                                                        </select> </TD>
                                                </TR>
                                            </TABLE>

                                             </div>
                                        <div id="fielCond">
                                            <div id="km_proyecto">
                                                <label> Modificar Function Class </label>

                                                <div id="Modfunction_class">

<!--                                                    <br> <input type='checkbox' id="km_FC-1" name="" value="1"/> &nbsp;&nbsp;<input type="text" size="8%" name="FC-1" id="fc1" placeholder="KM" value="" disabled="disabled"/> &nbsp;&nbsp; FC-1  
                                                    <br> <input type='checkbox' id="km_FC-2" name="" value="1"/> &nbsp;&nbsp;<input type="text" size="8%" name="FC-2" id="fc2" placeholder="KM" value="" disabled="disabled"/> &nbsp;&nbsp; FC-2 
                                                    <br> <input type='checkbox' id="km_FC-3" name="" value="1"/> &nbsp;&nbsp;<input type="text" size="8%" name="FC-3" id="fc3" placeholder="KM" value="" disabled="disabled"/> &nbsp;&nbsp; FC-3 
                                                    <br> <input type='checkbox' id="km_FC-4" name="" value="1"/> &nbsp;&nbsp;<input type="text" size="8%" name="FC-4" id="fc4" placeholder="KM" value=""  disabled="disabled"/> &nbsp;&nbsp; FC-4
                                                    <br> <input type='checkbox' id="km_FC-5" name="" value="1"/> &nbsp;&nbsp;<input type="text" size="8%" name="FC-5" id="fc5" placeholder="KM" value="" disabled="disabled"/> &nbsp;&nbsp; FC-5 -->

                                                </div>

                                                <div id="mostrarfunction_class"></div>
                                            </div></div>


                                    </div>
                                </div>

                            </fieldset>
                        </div>

                        <br /><br /> 
                        <fieldset style="width:650px; height: 171px;margin: 0 auto">
                            <legend>Asignar Estado y Delegaci&oacute;n</legend>

                            <div id="contenido"  >

                                <table>
                                    <tr>
                                        <td>
                                           <!--<span> estados</span>-->

                                            <select id="modificarEstados" size="8" >

                                            </select>

                                        </td>
                                        <td>
                                            <input type="button" id="btn_derechoEst"  value =">>"/><br/>
                                            <input type="button" id="btn_izquierdoEst"  value ="<<"/>
                                        </td>
                                        <td>

                                            <select id="estados_asignadosModificados" size="5" >

                                            </select>

                                        </td>
                                        <td></td>
                                        <td>

                                            <select id="municipiosPro" size="8" >

                                            </select>

                                        </td>
                                        <td>
                                            <input type="button" id="btn_derechoMun"  value =">>"/><br/>
                                            <input type="button" id="btn_izquierdoMun"  value ="<<"/>
                                        </td>
                                        <td>

                                            <select id="municipios_asignadosMod" size="8" >

                                            </select>

                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </fieldset>

                    </div>
                </form>

                <div align= "center">
                    <br>  <br> <input type="button" value="Guardar" id="btnModificarProyecto" name="btnModificar" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px " />
                    &nbsp;&nbsp;<input type="button" value="Cancelar" id="btnCancelarProyecto" name="btnGuardar" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px " />
                </div>
            </div>
            <!--Div para modificar los kilometros lineales y del ruteador de la delegación -->
            <div id="divModificarKMDelegacionkm" >

                <div id="modkm"  style="width: 95%;height: 50%; margin: 0 auto;" >

                    <fieldset style="border:1px solid white;width:75%; height: 250%;margin: 0 auto">      
                        <br/> <div class="kmlineales">
                            <br/><br/> 
                            <fieldset style="width:100%; height: 70%;margin: 0 auto">
                                <legend align= "center" style="font-weight:bold;">Modificar Kilómetros lineales</legend>

                                <div id="kimoletrosDelegacion" >

                                </div>
                            </fieldset>
                        </div>

                        <div class="kmruteador">  
                            <br/> <br/>     
                            <fieldset style="width:100%; height: 70%;margin: 0 auto">
                                <legend align= "center" style="font-weight:bold;">Modificar Kilómetros Ruteador</legend>

                                <div id="kmrAsignadosDelegacionmod"></div>


                            </fieldset>
                        </div>
                    </fieldset>

                </div>
                <div align= "center">
                    <br>  <br> <input type="button" value="Guardar" id="btnModificarProyectokm" name="btnModificar" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px " />
                    &nbsp;&nbsp;<input type="button" value="Cancelar" id="btnCancelarProyectokm" name="btnGuardar" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px " />
                </div>


            </div>
        </div>
    </body>
</html>
