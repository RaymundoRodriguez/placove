
<FIELDSET style="margin-right: 15%"> 
    <LEGEND ACCESSKEY=I><H3 style="color: gray">FORMULARIO ALTA DE USUARIOS</h3></LEGEND>

         <FIELDSET > 
             <LEGEND ACCESSKEY=I style="color: gray">Datos Personales</LEGEND>
    <div style="float: left">
    <label for="txtnombre">Nombre:</label>
            <input type="text" id="txtnombre" name="txtnombre" class="ui-state-default ui-corner-bottom ui-corner-top"/>
            <div id="divnombre" style="font-size: small;color: red"></div>
            </div>
            <div style="float: left">
            <label for="txtap">Apellido Paterno:</label>
            <input type="text" id="txtap" name="txtam" class="ui-state-default ui-corner-bottom ui-corner-top"/>
            <div id="divap" style="font-size: small;color: red" ></div>
            </div>
            <label for="txtam">Apellido Materno:</label>
            <input type="text" id="txtam" name="txtam" class="ui-state-default ui-corner-bottom ui-corner-top" />
            <div id="divam" style="font-size: small;color: red"></div>
            <br/>
            <div style="float: left">
            <label for="txtcorreo">Correo:</label>
            <input type="text" id="txtcorreo" name="txtcorreo" class="ui-state-default ui-corner-bottom ui-corner-top"/>
            <div id="divcorreo" style="font-size: small;color: red"></div>
            </div>
           
         </FIELDSET>
    <br/> <FIELDSET > 
         <LEGEND ACCESSKEY=I style="color: gray">Datos Para Plataforma</LEGEND>
    <div style="float: left">
    <label for="txtusuario">Usuario:</label>
    <input type="text" id="txtusuario" name="txtusuario" class="ui-state-default ui-corner-bottom ui-corner-top"/>
            <div id="divusu" style="font-size: small;color: red" ></div>
        </div>
    <div style="float: left">
            <label for="txtpass">Password:</label>
            <input type="password" id="txtpass" name="txtpass" class="ui-state-default ui-corner-bottom ui-corner-top"/>
            <div id="divpass" style="font-size: small;color: red"></div>
        </div>
            <label for="txtverificar">Verificar Password:</label>
            <input type="password" id="txtverificar" name="txtverificar" class="ui-state-default ui-corner-bottom ui-corner-top"/>
            <div id="divpass2" style="font-size: small;color: red"></div>
        
            <br/>
        
            <label for="lsttipo">Tipo:</label>
            
                <select id="lsttipo" name="lsttipo">
                    <option value="2">Administrador</option>
                    <option value="1">General</option>
                </select>
            
            <label for="lstactivo">Activo:</label>
                <select id="lstactivo" name="lstactivo">
                    <option value="1">Si</option>
                    <option value="0">No</option>
                </select>
             </FIELDSET>
    <br/>
        <input  value="Registrar" id="btnaceptar" class="ui-state-default ui-corner-bottom ui-corner-top" type="button" style="width:120px;"/>
        <input  value="Limpiar Cajas" id="btnLimpiar" class="ui-state-default ui-corner-bottom ui-corner-top" type="button" style="width:120px;"/>
        <input  value="Dar de Baja" id="btnBaja" class="ui-state-default ui-corner-bottom ui-corner-top" type="button" style="width:120px;"/>
        <input  value="Guardar Cambios" id="btnModificar" class="ui-state-default ui-corner-bottom ui-corner-top" type="button" style="width:120px;"/>
        <div id="divresultado">
        </div>
        
        
        
 </FIELDSET>