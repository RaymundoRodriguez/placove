<?php

require '../model/modelAltaUsuario.php';
    $objdatos  =  new datosUsuario();
    
    $id= $_REQUEST['id_usuario'];

    $objdatos->setid($id);
  
    $update=$objdatos->eliminarUsuario();
    echo $update;

?>
