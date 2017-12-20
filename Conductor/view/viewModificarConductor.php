



<!--
/* Program Assignment: viewCapturaConductor.php
*/
/* Name: Carlos Hilario
*/
/* Date: 13/03/2014.
*/
/* Description: contiene el formulario para capturar los datos del conductor
*/

-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!--<link type="text/css" href="../../interfaz/view/css/color.css" rel="stylesheet">-->
        <title></title>
       <script>
			
		</script>
    </head>
    <body><br>
        <form id="formConductor">
            <div id="formCapturaConductor"  style="width: 100%; margin: 0 auto;" >
                <!--<fieldset class="ui-state-default ui-corner-bottom ui-corner-top">-->
                <fieldset style="width:90%; height: 85%;margin: 0 auto">
                    <legend align= "center">Captura datos conductor</legend>

                    <div id="contenido" >
                        <div id='fielconiz' style="width: 100px" >

                        </div>                    
                        <div id="fielconiz">
                            <fieldset style="width:100%; height: 50%;" >
                                <legend align= "center">Captura datos conductor</legend>
                                <br><label> Nombre(s): </label>
                                <input type="text" size="20%" id="txtNombreconductor"  name="Nombre" class="ui-corner-bottom ui-corner-top "/>
                                <label>Apellido Paterno:&nbsp;</label>
                                <input type="text" size="20%" id="ApellidoPaterno" name="ApellidoPaterno" class="ui-corner-bottom ui-corner-top">
                                <br> <br> <label>Apellido Materno:&nbsp;</label>
                                <input type="text" size="20%" id="ApellidoMaterno" name="ApellidoMaterno" class="ui-corner-bottom ui-corner-top">

                                <br> <br>
                                <!--<label>Direcci&oacute;n:&nbsp;</label><br /><br />-->
                                <label>Calle&nbsp;</label><input type="text" size="29px" id="calle" name="calle" class="ui-corner-bottom ui-corner-top"/>
                                <label>Num. ext&nbsp;</label><input type="text" size="7px" id="num_ext" name="num_ext" class="ui-corner-bottom ui-corner-top"/>
                                <label>Num. int&nbsp;</label><input type="text" size="7px" id="num_int" name="num_int" class="ui-corner-bottom ui-corner-top"/>
                                <br><br> <label>Colonia&nbsp;</label><input type="text" size="43px" id="colonia" name="colonia" class="ui-corner-bottom ui-corner-top"/>
                                <label>C.P&nbsp;</label><input type="text" size="15px" id="cod_postal" name="cod_postal" class="ui-corner-bottom ui-corner-top"/>
                                <br><br><label>Entre calle&nbsp;</label><input type="text" size="26px" id="calle1" name="calle1" class="ui-corner-bottom ui-corner-top"/>
                                <label> y calle&nbsp;</label><input type="text" size="26px" id="calle2" name="calle2" class="ui-corner-bottom ui-corner-top"/>
                                <br><br><label>Referencia&nbsp;</label><input type="text" size="62px" id="referencia" name="referencia" class="ui-corner-bottom ui-corner-top"/>
                                <br><br><label>Estado&nbsp;</label><select id="estadosCond" style="width: 170px; height: 20px; font-size: 12px"  ></select>
                                <label>Ciudad&nbsp;</label> <select id="municipiosCond" style="width: 170px; height: 20px; font-size: 12px" ></select>

                                <br> <br> <label>Telf. particular:&nbsp;</label>
                                <input type="text" maxlength="10" size="20px" id="telf_particular" name="telf_particular" class="ui-corner-bottom ui-corner-top "/>
                                <label>Telf. celular:&nbsp;</label>
                                <input type="text" maxlength="10" size="20px" id="telf_celular" name="telf_celular" class="ui-corner-bottom ui-corner-top "/>
                                <br> <br> <label>Telf. referencia:&nbsp;</label>
                                <input type="text" maxlength="10" size="21px" id="telf_referencia" name="telf_referencia" class="ui-corner-bottom ui-corner-top "/>
                                <label>Referencia:&nbsp;</label>
                                <input type="text" maxlength="" size="20px" id="referencia_telf" name="referencia_telf" class="ui-corner-bottom ui-corner-top "/>
                                <br> <br> <label>Correo 1:&nbsp;</label>
                                <input type="text" size="24px" id="email1" name="email1" class="ui-corner-bottom ui-corner-top">     
                                <label>Correo 2:&nbsp;</label>
                                <input type="text" size="25px" id="email2" name="email2" class="ui-corner-bottom ui-corner-top">     
                                <div id="mostrar"></div>  

                                <br><br><label > &nbsp;Estatus:&nbsp;</label>

                                <select id="selectEstatus" style="width: 140px; height: 20px; font-size: 12px">
                                    <option value="00">Selecciona estatus</option>
                                    <option value="1">Alta</option>
                                    <option value="0">Baja</option>
                                    <option value="2">Asigando a Proyecto</option>
                                    <option value="3">Trabajando</option>

                                </select>
                            </fieldset >
                        </div>
                        <div id="fielCond">
                            <fieldset style="width:95%; height: 70%;" >
                                <legend align= "center">Captura Archivos Conductor</legend>
                                <br> <br> <label>Foto Conductor&nbsp;</label>
                                <input type="file" size="28%" id="ArchFotoConductor" name="ArchFotoConductor" class="ui-corner-bottom ui-corner-top">
                                <br> <br> <label>Acta Nacimiento: &nbsp;</label>
                                <input type="file" size="28%" id="ArchActaConductor" name="ArchActa" class="ui-corner-bottom ui-corner-top">
                                <br> <br> <label>IFE: &nbsp;</label>
                                <input type="file" size="28%" id="ArchIFEConductor" name="ArchIFE" class="ui-corner-bottom ui-corner-top">
                                <br> <br> <label>Licencia: &nbsp;</label>
                                <input type="file" size="28%" id="ArchLicenciaConductor" name="ArchLicencia" class="ui-corner-bottom ui-corner-top">

                                <br> <br><div id="divSelector">
                                    <p><strong>- seleccione un color haciendo clic -</strong></p>
                                    <input type="color" id="clrColor" value="">
                                    
                                </div><br>
                            </fieldset>
                        </div>
                        <!--                        <br><label > &nbsp;Estatus:&nbsp;</label>
                        
                                                <select id="selectEstatus" style="width: 140px; height: 20px; font-size: 12px">
                                                    <option value="00">Selecciona estatus</option>
                                                    <option value="1">Alta</option>
                                                    <option value="0">Baja</option>
                        
                                                </select>-->
                    </div>
                </fieldset>
                <br><br><div align= "center" style="margin: 0 auto">
                    <br> <br><br><input type="button" value="Modificar" id="btnModificarConductor" name="btnModificar" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px " />
                    <input type="button" value="Cancelar" id="btnCancelarConductor" name="btnGuardar" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: Georgia,'Times New Roman',times,serif; font-size: 12px " />

                </div>
            </div>
        </form>
    </body>
</html>
