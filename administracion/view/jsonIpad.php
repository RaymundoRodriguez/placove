<?php
require '../model/modelAltaUsuario.php';                     
                        $objdatos  =  new datosUsuario();
                        $usuarios=$objdatos->traerUsuarioPjGrid();
                        echo json_encode($usuarios);
              
?>
