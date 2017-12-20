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
    <center> <h2> <label id="titulo_bitacora_Acti" ></label></h2></center>
    <div id="formCapturaBitacora"  >
        <fieldset>
            <legend>Bitacora</legend>

            <div id="frmActividades">
                <div id="nuevaActividad1">
                    <fieldset style="border:1px solid black;width:55%; height: 250%;margin: 0 auto">
                        <legend>Modificar Datos Actividad </legend>
                        <table border="0" align="center" >
                                             <!--<table >-->
                            <br /> <tr>    
                                <TD>Fecha</TD>
                                <td>Inicio</td>
                                <td>Fin</td>
                                <TD>Actividad</TD>
                            </tr>

                            <TR>

                                <TD>
                                    <p> <input type="text" id="datepicker"></p>

                                    <!--<div id="datepicker"></div>-->

                                </TD>

                                <TD> <SELECT name='inicio'id="hr_inicio_s"  style=' width:100px'>
                                        <OPTION VALUE='00'> --Hora Inicio-- </OPTION>
                                        <OPTION VALUE='0'>0</OPTION>


                                        <?php
//                                        for ($i = 5.75; $i <= 24.75; $i++) {
//                                            $i = $i + 0.25 - 1;
//
//                                            if ($hr_inicio == $i) {
//
//                                                echo "<option selected value=" . $i . ">" . number_format($i, 2) . "
//                                            </option>";
//                                            } else {
//
//                                                echo "<option value=" . $i . ">" . number_format($i, 2) . "
//                                            </option>";
//                                            }
//                                        }
                                        for ($i = 0; $i <= 24; $i++) {
                                                $k = 0;
                                                for ($j = 0; $j <= 59; $j++) {
                                                    if ($i < 10) {
                                                        if ($j < 10) {
                                                            (float) $k = $i . ".0" . $j;
                                                        } else {
                                                            (float) $k = $i . "." . $j;
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
                                <TD>
                                    <SELECT name='fin' id="hr_fin_s"  style=' width:100px'>
                                        <OPTION VALUE='00'> --Hora Fin-- </OPTION>
                                        <!--<OPTION VALUE='0'>0</OPTION>-->

                                        <?php
//                                        for ($i = 5.75; $i <= 24.75; $i++) {
//                                            $i = $i + 0.25 - 1;
//                                            if ($hr_fin == $i) {
//
//                                                echo "<option selected value=" . $i . ">" . number_format($i, 2) . "
//                                            </option>";
//                                            } else {
//
//                                                echo "<option value=" . $i . ">" . number_format($i, 2) . "
//                                            </option>";
//                                            }
//                                        }
                                         for ($i = 0; $i <= 24; $i++) {
                                                $k = 0;
                                                for ($j = 0; $j <= 59; $j++) {
                                                    if ($i < 10) {
                                                        if ($j < 10) {
                                                            (float) $k = $i . ".0" . $j;
                                                        } else {
                                                            (float) $k = $i . "." . $j;
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
                                <TD>
                                    <SELECT name='actividad' id="actividad_Bitacora" >
                                        <!--                                         <OPTION VALUE='00'> --Actividad-- </OPTION>
                                                                                <OPTION VALUE='FDC Prep'>FDC Prep</OPTION>
                                                                                <OPTION VALUE='FDC'>FDC</OPTION>
                                                                                <OPTION VALUE='DT equipment'>DT equipment</OPTION>
                                                                                <OPTION VALUE='DT Wheather'>DT Wheather</OPTION>
                                                                                <OPTION VALUE='Travel & Commute'>Travel & Commute</OPTION>
                                                                                <OPTION VALUE='DT Other'>DT Other</OPTION>
                                                                                <OPTION VALUE='Training'>Training</OPTION>-->
                                        <?php
                                        $arreglo = array("--Actividad--", "FDC Prep", "FDC", "DT equipment", "DT Wheather", "Travel & Commute", "DT Other", "Training");
                                        $arreglo2 = array();
                                        for ($i = 0; $i < count($arreglo); $i++) {

                                            if ($i == 0) {

                                                echo "<option value= 00>" . $arreglo[$i] . "</option>";
                                            } else {

                                                if ($arreglo[$i] == $actividad) {

                                                    echo "<option selected value= '" . $arreglo[$i] . "'>" . $arreglo[$i] . "</option>";
                                                } else {


                                                    echo "<option value= '" . $arreglo[$i] . "'>" . $arreglo[$i] . "</option>";
                                                }
                                            }
                                        }
                                        ?>



                                    </SELECT>
                                </TD>
                            </TR>
                        </table>
                        <table align='center'>
                            <tr>

                                <td>Comentario: <br>
                                    <textarea name='comentarios' id="comentarioBitacora" rows='1' cols='80' ></textarea></td>
                            </tr>


                        </table>
                    </fieldset>
                </div>
            </div>
            <br /><br />
            <div id="formKilometrajes" align="center">




                <input type="button" value="Modificar" id="btnModificarActividad" name="btnGuardar" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px " />
                <input type="button" value="Cancelar" id="btnCancelarMActividad" name="btnGuardar" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px " />


            </div>

        </fieldset>
    </div>


</body>
</html>
