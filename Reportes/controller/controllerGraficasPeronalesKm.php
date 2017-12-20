<?php
session_start();
//error_reporting(0);
require_once '../model/modelReporteIndividual.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$objInsertar = new modelReporteIndividual();

$id_con_pro = $_REQUEST["id_con_proyecto"];
$opcion = $_REQUEST["opcion"];
$kmLineales = $objInsertar->kmLinealesDelproyecto($id_con_pro);
$_SESSION['kmlineales']=$kmLineales;


//if ($opcion == "suplente") {
//    $id_suplente = $_REQUEST['id_suplente'];
//
//    $fechaBitacora = $objInsertar->todasBitacoras($id_con_pro);
//
//    include_once '../view/viewGraficasPeronalesKm_1.php';
//} else {


    $fechaBitacora = $objInsertar->todasBitacoras($id_con_pro);
$_SESSION['todasbitacoras']=$fechaBitacora;

   $fechasconcero=$objInsertar->fechasconcero($id_con_pro);
$_SESSION["fechasconcero"] = $fechasconcero;
    include_once '../view/viewGraficasPeronalesKm_1.php';

?>