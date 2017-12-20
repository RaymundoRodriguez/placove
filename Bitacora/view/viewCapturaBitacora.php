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
                                            <!--<OPTION VALUE='0'>0</OPTION>-->


                                            <?php
                                            for ($i = 0; $i <= 24; $i++) {
                                                $k = 0;
                                                for ($j = 0; $j <= 59; $j++) {
                                                    if ($i < 10) {
                                                        if ($j < 10) {
                                                            (float) $k = "0" . $i . ".0" . $j;
                                                        } else {
                                                            (float) $k = "0" . $i . "." . $j;
                                                        }
                                                    } else {

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

                <div id="formKilometrajes">
                    <form name="upload" id="upload" action="" method="post" enctype="multipart/form-data">

                        <fieldset>
                            <legend>Kilimetraje</legend>
                            <table>
                                <tr>
                                    <td align="right">
                                        <input type="text" id="km_ruteador" value="0" style="display: none" />  
                                    </td>
                                </tr>
                                <tr>

                                    <td align="right">
                                        <label>% de avance al final del día </label><input type="text" id="por_avance" placeholder="12">  
                                    </td>
                                    <td align="right">
                                        <input type="file" name="fileToUpload4"  id="archivo4" >
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">
                                        <label>KM inicial Odometro</label><input type="text" id="km_inicial" placeholder="23654">  

                                    </td>

                                    <td align="right">
                                        <input type="file" name="fileToUpload1" id="archivo1" />
                                    </td>
                                </tr>

                                <tr>
                                    <td align="right">
                                        <label>KM Final Odometro</label><input type="text" id="km_final" placeholder="23789"> 

                                    </td>

                                    <td align="right">
                                        <input type="file" name="fileToUpload2" id="archivo2" >
                                    </td>
                                </tr>



                                <tr>
                                    <td align="right">
                                        <label>Endomondo Ini.</label><input type="text" id="km_inicial_endo" placeholder="0">

                                    </td>

                                    <td align="right">
                                        <input type="file"  name="fileToUpload3" id="archivo3" >
                                    </td>
                                </tr>


                                <tr>
                                    <td align="right">
                                        <label>Endomondo Fin.</label><input type="text" id="km_final_endo" placeholder="0">

                                    </td>


                                </tr>
                                <tr>
                                    <td align="left">
                                        <label>Bitacora .</label>

                                    </td>

                                    <td align="right">
                                        <input type="file" name="fileToUpload5" id="archivo5" >
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">
                                        <label>Gasolina  $</label><input type="text" id="gasolina" placeholder="750">

                                    </td>
                                    <td align="right">
                                        <input type="file" name="fileToUpload6" id="archivo6" >
                                    </td>
                                </tr>

                            </table>
                        </fieldset>

                        <br> <div align="center">
                            <input type="button" value="Guardar" id="btnGuardarBitacora" name="btnGuardar" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px " />
    <!--                       <input type="submit" id="uploadFile" value="subir" />-->

                            <input type="button" value="Cancelar" id="btnCancelarBitacora" name="btnGuardar" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px " />
                        </div>

                    </form>
                </div>

            </fieldset>
        </div>


    </body>
</html>
