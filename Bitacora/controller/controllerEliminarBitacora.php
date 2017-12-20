<?php

require_once '../model/modelBitacoras.php';

$objInsertar = new modelBitacoras();
$id_bitacora = $_REQUEST['id_bitacora'];
    
    $insert=$objInsertar->eliminarBitacora($id_bitacora);
    
    if($insert){
        
        echo "Bitacora Eliminada";
        
    }else{
        
        
        echo "Bitacora no eliminada";
        
    }

?>