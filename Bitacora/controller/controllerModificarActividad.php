<?php

require_once '../model/modelBitacoras.php';

$objInsertar = new modelBitacoras();
//error_reporting(0);
$opcion = $_REQUEST["opcion"];




if ($opcion == 'mostrar') {

    $hr_inicio = $_REQUEST["hr_inicio"];
    $hr_fin = $_REQUEST["hr_fin"];
    $actividad = $_REQUEST["actividad"];
    include_once '../../Bitacora/view/viewModificarActividad.php';
} else {

    $hr_inicio = $_REQUEST["hr_inicio"];
    $hr_fin = $_REQUEST["hr_fin"];
    $actividad = $_REQUEST["actividad"];
    $comentarios = $_REQUEST["comentarios"];
    $id_actividad = $_REQUEST['id_actividad'];
    
    $insert=$objInsertar->modificarActividad($id_actividad, $comentarios, $hr_inicio, $hr_fin, $actividad);
    
    if($insert){
        
        echo "Actividad modificada";
        
    }else{
        
        
        echo "Actividad no modificada";
        
    }
    
}
?>
