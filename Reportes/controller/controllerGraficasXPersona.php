<?php
session_start();
require_once '../model/modelReporteIndividual.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$objInsertar = new modelReporteIndividual();

$id_con_pro = $_REQUEST["id_con_proyecto"];
$opcion = $_REQUEST["opcion"];


//$kmLineales = $objInsertar->kmLinealesDelproyecto($id_con_pro);
$kmLineales=$_SESSION['kmlineales'];
//echo $kmLineales;

$arr = array(
    0 => array('FDC Prep', 0.0),
    1 => array('FDC', 0.0),
    2 => array('DT equipment', 0.0),
    3 => array('DT Wheather', 0.0),
    4 => array('Travel & Commute', 0.0),
    5 => array('DT Other', 0.0),
    6 => array('Training', 0.0)
);

$arr2 = array(
    0 => array('Horas diarias', 0.0),
    1 => array('Pct Avance', 0.0),
    2 => array('Pct Avance dia', 0.0),
    3 => array('KM/dia Aproc', 0.0),
    4 => array('KM/H colectados Aproc', 0.0),
    5 => array('FDC+T&C', 0.0),
    6 => array('KM Manejados', 0.0)
);

$cabecera = array(
    0 => array('FDC Prep', 0.0),
    1 => array('FDC', 0.0),
    2 => array('DT equipment', 0.0),
    3 => array('DT Wheather', 0.0),
    4 => array('Travel & Commute', 0.0),
    5 => array('DT Other', 0.0),
    6 => array('Training', 0.0),
    7 => array('Horas diarias', 0.0),
    8 => array('Pct Avance', 0.0),
    9 => array('Pct Avance dia', 0.0),
    10 => array('KM/dia Aprox', 0.0),
    11 => array('KM/HR colectados Aprox', 0.0),
    12 => array('FDC+T&C', 0.0),
    13 => array('KM Manejados', 0.0)
);

//kilometro lineales para sacar promedio



//
//if ($opcion == "suplente") {
//    $id_suplente = $_REQUEST['id_suplente'];
//
//    $fechaBitacora = $objInsertar->todasBitacoras($id_con_pro);
////$numBitacorasSuplente=  count($fechaBitacora);
//    include_once '../view/viewDatosIndividuales_1.php';
//} else {


//    $fechaBitacora = $objInsertar->todasBitacoras($id_con_pro);

$fechaBitacora=$_SESSION['todasbitacoras'];
    include_once '../view/viewDatosIndividuales_1.php';
//}
?>
