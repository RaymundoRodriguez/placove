<?php

//
////error_reporting(0);
//require_once '../model/modelReporteIndividual.php';
///*
// * To change this template, choose Tools | Templates
// * and open the template in the editor.
// */
//
//$objInsertar = new modelReporteIndividual();
////
////
////    $id_proyecto = $_REQUEST["id_proyecto"];
////    $datossuplente = $objInsertar->datosReportesuplente($id_proyecto);
////    echo json_encode($datossuplente);
////
//$id_con_pro = $_REQUEST["id_con_proyecto"];
//
//    $fechaBitacora = $objInsertar->todasBitacoras($id_con_pro);
//    if ($fechaBitacora == null) {
//        echo 1;
//    } else {
//        echo 2;
//    }


$fecha=  date("Y-m-d");
$NombreArchivo='Reporte-'.$fecha.'.xls';
header("Content-type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: filename=$NombreArchivo");
header("Pragma: no-cache");
header("Expires: 0");

echo $_POST['datos_a_enviar'];
    
?>
