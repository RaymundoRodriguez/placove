<?php

require_once '../model/modelDragDrop.php';
$objbuscar = new modelDragAndDrop();
$id_vehiculo = $_REQUEST['id_vehiculo'];
$id_conductor = $_REQUEST['id_conductor'];
$fecha_inicio = $_REQUEST['fecha_inicio'];
$fecha_fin = $_REQUEST['fecha_fin'];
$identificadorcon = $_REQUEST['identificador'];
$opcion = $_REQUEST['opcion'];
if ($opcion == 'conductor') {
    $conductoresasignados = $objbuscar->GuardarConductoresATrabajarYfechas($id_vehiculo, $id_conductor, $fecha_inicio, $fecha_fin, $identificadorcon);
}
if ($opcion == 'telefono') {
    $telefonosasignados = $objbuscar->GuardarTelefonosATrabajarYfechas($id_conductor, $id_vehiculo, $fecha_inicio, $fecha_fin, $identificadorcon);
}
if ($opcion == 'municipio') {
    $municipiosasignados = $objbuscar->GuardarMunicipiosATrabajarYfechas( $id_vehiculo,$id_conductor, $fecha_inicio, $fecha_fin,$identificadorcon) ;
}
//echo json_encode($conductoresasignados);
?>
