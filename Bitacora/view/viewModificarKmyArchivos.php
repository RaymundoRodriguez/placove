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
            <div id="formKilometrajes">
                <form name="upload" id="upload" action="" method="post" enctype="multipart/form-data">

                    <br/> <br /> <fieldset style="border:1px solid black;width:50%; height: 250%;margin: 0 auto">
                        <legend>Modificar kilómetros</legend>

                        <br /><br />  <table align="center" id="porcentaje">
                            <tr>
                                <td align="right">
                                    <input type="text" id="km_ruteador" value="0"  style="display: none" />  
                                </td>
                            </tr>

                            <tr>
                                <td align="right">
                                    <label>% de avance al final del día &nbsp;</label><input type="text" id="por_avance" />  
                                </td>
                                <td align="right">
                                    <input type="file" name="fileToUpload4"  id="archivo4" >
                                </td>
                            </tr>

                            <tr>
                                <td align="right">
                                    <label>KM inicial Odometro</label><input type="text" id="km_inicial" />  

                                </td>
                                <td align="right">
                                    <input type="file" name="fileToUpload1" id="archivo1" />
                                </td>
                            </tr>

                            <tr>
                                <td align="right">
                                    <label>KM Final Odometro</label><input type="text" id="km_final" /> 

                                </td>

                                <td align="right">
                                    <input type="file" name="fileToUpload2" id="archivo2" >
                                </td>
                            </tr>



                            <tr>
                                <td align="right">
                                    <label>Endomondo Ini.</label><input type="text" id="km_inicial_endo" />

                                </td>

                                <td align="right">
                                    <input type="file"  name="fileToUpload3" id="archivo3" >
                                </td>
                            </tr>


                            <tr>
                                <td align="right">
                                    <label>Endomondo Fin.</label><input type="text" id="km_final_endo" />

                                </td>

<!--                                <td align="right">
                                    <input type="file" name="fileToUpload4"  id="archivoa4" />
                                </td>-->
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
                        <br /><br /><div align="center">
                            <input type="button" value="Guardar" id="btnActualizarKm" name="btnGuardar" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px " />
    <!--                       <input type="submit" id="uploadFile" value="subir" />-->

                            <input type="button" value="Cancelar" id="btnCancelarKm" name="btnGuardar" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px " />
                        </div>

                    </fieldset>

                </form>

            </div>
        </div>


    </body>
</html>
