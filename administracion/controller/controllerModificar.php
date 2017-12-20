<?php

$id= $_REQUEST['id'];
require '../model/modelAltaUsuario.php';
    $objdatos  =  new datosUsuario();
    
    $objdatos->setid($id);
    $usuario=$objdatos->traerDatosUsuario($id);
    foreach ($usuario as $arrayModificar){
        $nombre= $arrayModificar['nombre'];
        $ap=$arrayModificar['ap_paterno'];
        $am=$arrayModificar['ap_materno'];
        $usuario=$arrayModificar['usuario'];
        $correo=$arrayModificar['correo'];
        $password=$arrayModificar['password'];
        //$sexo=$arrayModificar['sexo'];
        $activo=$arrayModificar['activo'];
        $jerarquia=$arrayModificar['jerarquia_id_jerarquia'];
    }
        //if($sexo=='m'){$sexom= 'Selected'; $sexof='';}else{$sexof= 'Selected';$sexom= '';}
    if($jerarquia=='1'){$jerarquia1= 'Selected'; $jerarquia2='';}else{$jerarquia2= 'Selected';$jerarquia1= '';}
    if($activo=='1'){$activo1= 'Selected'; $activo2='';}else{$activo2= 'Selected';$activo1= '';}
    
?>
<html>
    <head>
        <title>Modificar Usuarios</title>
        <script type="text/javascript" src="../../administracion/view/js/actualizar.js"></script>
    </head>
    <body>
        <input type="hidden" value="<?php echo $id ?>" id="id_usuSel" />
        <FIELDSET style="margin-right: 15%"> 
            <LEGEND ACCESSKEY=I><H3 style="color: gray">FORMULARIO ALTA DE USUARIOS</h3></LEGEND>

                 <FIELDSET > 
                     <LEGEND ACCESSKEY=I style="color: gray">Datos Personales</LEGEND>
            <div style="float: left">
            <label for="txtnombre">Nombre:</label>
            <input type="text" id="txtnombre" name="txtnombre" value="<?php echo $nombre ?>" class="ui-state-default ui-corner-bottom ui-corner-top"/>
                    <div id="divnombre" ></div>
                    </div>
                    <div style="float: left">
                    <label for="txtap">Apellido Paterno:</label>
                    <input type="text" id="txtap" name="txtam" value="<?php echo $ap ?>" class="ui-state-default ui-corner-bottom ui-corner-top"/>
                    <div id="divap"  ></div>
                    </div>
                    <label for="txtam">Apellido Materno:</label>
                    <input type="text" id="txtam" name="txtam" value="<?php echo $am ?>" class="ui-state-default ui-corner-bottom ui-corner-top" />
                    <div id="divam" ></div>
                    <br/>
                    <div style="float: left">
                    <label for="txtcorreo">Correo:</label>
                    <input type="text" id="txtcorreo" name="txtcorreo" value="<?php echo $correo ?>" class="ui-state-default ui-corner-bottom ui-corner-top" style="width: 200px"/>
                    <div id="divcorreo" ></div>
                    </div>
                   
                 </FIELDSET>
            <br/> <FIELDSET > 
                 <LEGEND ACCESSKEY=I style="color: gray">Datos Para Plataforma</LEGEND>
            <div style="float: left">
            <label for="txtusuario">Usuario:</label>
            <input type="text" id="txtusuario" value="<?php echo $usuario ?>" name="txtusuario" class="ui-state-default ui-corner-bottom ui-corner-top"/>
                    <div id="divusu" ></div>
                </div>
            <div style="float: left">
                    <label for="txtpass">Password Anterior:</label>
                    <input type="password" id="txtpass" name="txtpass" value="" class="ui-state-default ui-corner-bottom ui-corner-top"/>
                    <div id="divpass"></div>
                </div>
                 <label for="txtverificar">Nuevo Password:</label>
                 <input type="password" id="txtverificar" name="txtverificar" class="ui-state-default ui-corner-bottom ui-corner-top"/>
                 <div id="divpass2" style="font-size: small;color: red"></div>
                 <input type="hidden" id="oldpass" value="<?php echo $password ?>"

                    <br/>
                    <br/>


                    <label for="lsttipo">Tipo:</label>

                        <select id="lsttipo" name="lsttipo">
                            <option value="2" <?php echo $jerarquia1 ?> >Administrador</option>
                            <option value="1" <?php echo $jerarquia2 ?> >General</option>
                        </select>

                    <label for="lstactivo">Activo:</label>
                        <select id="lstactivo" name="lstactivo">
                            <option value="1" <?php echo $activo1 ?> >Si</option>
                            <option value="0" <?php echo $activo2 ?> >No</option>
                        </select>
                     </FIELDSET>
            <br/>
                <input  value="Guardar Cambios" id="btnModificar" class="ui-state-default ui-corner-bottom ui-corner-top" type="button" style="width:120px;"/>
                <div id="divresultado">
                </div>
                <div id="dialogValidarAc" title="Modificacion de Usuarios" style="visibility:hidden; display: none">
                        <p>Todos Los Campos Son Obligatorios</p>
                </div>
                <div id="dialogValidar" title="Modificacion de Usuarios" style="visibility:hidden; display: none">
                        <p>Usuario Modificado</p>
                </div>
                

         </FIELDSET>
    </body>

</html>
