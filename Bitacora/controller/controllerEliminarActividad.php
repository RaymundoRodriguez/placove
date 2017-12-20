<?php

require_once '../model/modelBitacoras.php';

$objInsertar = new modelBitacoras();
$id_actividad = $_REQUEST['id_actividad'];
    
    $insert=$objInsertar->eliminarActividad($id_actividad);
    
    if($insert){
        
        echo "Actividad Eliminada";
        
    }else{
        
        
        echo "Actividad no eliminada";
        
    }

?>
