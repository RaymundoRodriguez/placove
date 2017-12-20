<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>

    </head>
    <body><br>
    <center> <h2> <label id="titulo_bitacora" ></label></h2></center>
    <div id="formCapturaBitacora"  >
        <fieldset>
            <legend>Bitacora</legend>
            <div id="frmActividades">
                <div id="nuevaActividad1">
                    <fieldset id="actividades">
                        <legend>Datos Actividad 1</legend>
                        <table border="0" align="right"  >
                            <TR>

                                <TD  align="center">Fecha<br />
                                    <p> <input type="text" id="datepicker" style='text-align: center'></p>

                                    <!--<div id="datepicker"></div>-->

                                </TD>

                                <TD align="center">Inicio<br /> <SELECT name='inicio'id="hr_inicio_s" style=' width:100px' >
                                        <OPTION VALUE='00'> --Hora Inicio-- </OPTION>
                                        <OPTION VALUE='0'>0</OPTION>
                                        <?php
                                         for ($i = 0; $i <= 24; $i++) {
                                                $k = 0;
                                                for ($j = 0; $j <= 59; $j++) {
                                                    if ($i < 10) {
                                                        if ($j < 10) {
                                                            (float) $k = "0".$i . ".0" . $j;
                                                        } else {
                                                            (float) $k = "0".$i . "." . $j;
                                                        }

                                                    }
                                                    else{
                                                       
                                                        if ($j < 10) {
                                                            (float) $k = $i . ".0" . $j;
                                                        } else {
                                                            (float) $k = $i . "." . $j;
                                                        }

                                                    
                                                    }
                                                    echo "<option value=" . $k . ">" . $k . "</option>";
                                                }
                                            }
                                        ?>



                                    </SELECT>
                                </TD>
                                <TD align="center">Fin <br />
                                    <SELECT name='fin' id="hr_fin_s" style='width:100px; '>
                                        <OPTION VALUE='00'> --Hora Fin-- </OPTION>
                                        <OPTION VALUE='0'>0</OPTION>

                                        <?php
//                                        for ($i = 0.75; $i <= 24.75; $i++) {
//                                            $i = $i + 0.25 - 1;
//                                            echo "<option value=" . $i . ">" . number_format($i, 2) . "
//                                            </option>";
//                                        }
                                        ?>

                                    </SELECT>
                                </TD>
                                <TD align="center">Actividad <br />
                                    <SELECT name='actividad' id="actividad_Bitacora" style=' width:135px' >
                                        <OPTION VALUE='00'> --Actividad-- </OPTION>
                                        <OPTION VALUE='FDC Prep'>FDC_Prep</OPTION>
                                        <OPTION VALUE='FDC'>FDC</OPTION>
                                        <OPTION VALUE='DT equipment'>DT_equipment</OPTION>
                                        <OPTION VALUE='DT Wheather'>DT_Wheather</OPTION>
                                        <OPTION VALUE='Travel & Commute'>Travel_&_Commute</OPTION>
                                        <OPTION VALUE='DT Other'>DT_Other</OPTION>
                                        <OPTION VALUE='Training'>Training</OPTION>


                                    </SELECT>
                                </TD>
                                <td>
                                    <textarea name='comentarios' id="comentarioBitacora" rows='1' cols='40' placeholder="Comentario" ></textarea></td>

                                <td align="right" style="width: 305px">
                                    <input type="button" value="+" id="agregarActividad" />
                                    <input type="button" value="-" id="quitarActividad" />
                                </td>
                            </TR>

                        </table>

<!--                            <table align='center'>
<tr>


</tr>


</table>-->
                    </fieldset>
                </div>
            </div>

            <br /><br /><div id="formKilometrajes" align='center'>




                <input type="button" value="Guardar" id="btnGuardarActividad" name="btnGuardar" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px " />
                <input type="button" value="Cancelar" id="btnCancelarActividad" name="btnGuardar" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px " />


            </div>

        </fieldset>
    </div>


</body>
</html>
