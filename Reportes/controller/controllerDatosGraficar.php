<?php
require_once '../model/modelReporteIndividual.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$objInsertar = new modelReporteIndividual();

$id_con_pro = $_REQUEST["id_con_proyecto"];

$datosConductor=$objInsertar->apeLugasFecha($id_con_pro);
$datosActividades=$objInsertar->datosPorActividad($id_con_pro);
$datosKm=$objInsertar->datosKm($id_con_pro);

//echo $datosKm;
//
//$arreglo= array(array('FDC Prep','FDC','DT equipment','DT Wheather','Travel & Commute','DT Other','Training',null),
//    
//    
//    
//        array(0,0,0,0,0,0,0,0));



$arr=array(
    0 => array(null,0),
    1 => array('FDC Prep',0),
    2 => array('FDC',0),
    3 => array('DT equipment',0),
    4 => array('DT Wheather',0),
    5 => array('Travel & Commute',0),
    6 => array('DT Other',0),
    7 => array('Training',0.0)
    
    
);



if($datosKm){}else{$datosKm=0.0;}

foreach ($arr as $key => $value) {
    
    
    foreach ($datosActividades as $key2 => $value) {
        
        if($arr[$key][0] == $value['actividad']){
            
          $arr[$key][1] = $value['total_horas'];
            
        }
        
        
    }
    
}



echo json_encode($arr);
?>
