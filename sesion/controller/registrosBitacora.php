<?php
require '../model/clsBitacora.php';
    $objdatos  =  new ClsBitacora();
    $id_usuario= $_REQUEST['id_usuario'];
    $objdatos->setid($id_usuario);
    $usuario=$objdatos->traerAccesosBitacora();
    echo $usuario;
?>
