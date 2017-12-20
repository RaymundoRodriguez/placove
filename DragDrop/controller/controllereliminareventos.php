<?php

require_once '../model/modelDragDrop.php';
$objeliminar = new modelDragAndDrop();
$identificador = $_REQUEST['identificador'];
$opcion = $_REQUEST['opcion'];
$id_vehiculo=$_REQUEST['id_vehiculo'];
if ($opcion == 'conductor') {
    $objeliminar->eliminareventosconductor($identificador, $id_vehiculo);
}
if ($opcion == 'telefono') {
    $objeliminar->eliminareventostelefono($identificador, $id_vehiculo);
}
if ($opcion == 'municipio') {
    $objeliminar->eliminareventosdelegacion($identificador, $id_vehiculo);
}

?>
