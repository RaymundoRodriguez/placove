<?php

require_once '../model/modelConductoresProyectos.php';
///estos son datos sin modificar//
$objActualizar = new modelConductoresProyectos();

$vehiculo_id_vehiculo = $_REQUEST['vehiculo'];
$telefono_id_telefono = $_REQUEST['telefono'];
$tipo_conductor = $_REQUEST['tipo'];
$id_con_proyecto = $_REQUEST['id_con_proyecto'];

//estos son datos capturados de los select option
$vehiculo = $_REQUEST["vehiculo_id_vehiculo"];
$telefono = $_REQUEST["telefono_id_telefono"];
$lugar = $_REQUEST["lugar"];
//$estatus = $_REQUEST["estatus"];
$tipo = $_REQUEST["tipo_conductor"];
$funtion_class=$_REQUEST['function_class'];
$km_ruteado=$_REQUEST["km_ruteador"];
$km_lineale=$_REQUEST["km_lineales"];
//if ($vehiculo == $vehiculo_id_vehiculo && $telefono == $telefono_id_telefono && $lugar == $area_levantamiento && $tipo == $tipo_conductor) {
//    echo "Se guardó correctamente";
//} else if ($vehiculo == $vehiculo_id_vehiculo && $telefono != $telefono_id_telefono) {
//    $resultado = $objActualizar->cambiarDisponibilidadTelefono($id_con_proyecto, $telefono, $lugar, $tipo, $telefono_id_telefono);
//    if ($resultado == 1) {
//        echo "Se guardó correctamente";
//    } else {
//        echo "No se guardó correctamente";
//    }
//} else if ($vehiculo != $vehiculo_id_vehiculo && $telefono == $telefono_id_telefono) {
//    $resultado = $objActualizar->cambiarDisponibilidadVehiculo($id_con_proyecto, $vehiculo, $lugar, $tipo, $vehiculo_id_vehiculo);
//    if ($resultado == 1) {
//        echo "Se guardó correctamente";
//    } else {
//        echo "No se guardó correctamente";
//    }
//} else 
//    if ($vehiculo != $vehiculo_id_vehiculo && $telefono != $telefono_id_telefono) {
   
$resultado = $objActualizar->cambiarDisponibilidadDos($id_con_proyecto, $telefono, $vehiculo, $lugar, $tipo, $vehiculo_id_vehiculo, $telefono_id_telefono,$funtion_class,$km_ruteado,$km_lineale);
    if ($resultado == 1) {
        echo "Los datos fueron modificados correctamente";
    } else {
        echo "No se guardó correctamente";
//    }
}
?>
