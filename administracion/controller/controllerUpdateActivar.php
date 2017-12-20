<?php
require '../model/modelAltaUsuario.php';
    $objdatos  =  new datosUsuario();
    
    $id= $_REQUEST['id_usuario'];
    $activo= $_REQUEST['estado'];

    $objdatos->setid($id);
    $objdatos->setactivo($activo);

    $update=$objdatos->actualizarUsuario();
    echo $update;


?>
