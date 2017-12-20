<?php

require_once '../model/modelReporteIndividual.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$objInsertar = new modelReporteIndividual();

$id_con_pro = $_REQUEST["id_con_proyecto"];
$opcion = $_REQUEST["opcion"];




//if ($opcion == "suplente") {
//    $id_suplente = $_REQUEST['id_suplente'];
//
//    $fechaBitacora = $objInsertar->fechasBitacorasProyectoSuplente($id_con_pro, $id_suplente);
//
//    include_once '../view/viewGraficasPersonales.php';
//} else {


    $fechaBitacora = $objInsertar->fechasBitacorasProyecto($id_con_pro);


    include_once '../view/viewGraficasPersonales.php';
//}
?>
