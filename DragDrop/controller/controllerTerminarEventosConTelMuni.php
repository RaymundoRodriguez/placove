<?php

require_once '../model/modelDragDrop.php';
$objterminar = new modelDragAndDrop();

$identificador = $_REQUEST['identificador'];
$opcion = $_REQUEST['opcion'];
$id_vehiculo=$_REQUEST['id_vehiculo'];

if ($opcion == 'conductor') {
    $conductoresasignados = $objterminar->terminarEventoConductor($identificador);
    $conductoresasignados = $objterminar->cambiarestatusterminareventoconductor($identificador, $id_vehiculo);
}
if ($opcion == 'telefono') {
    $telefonosasignados = $objterminar->terminarEventoTelefono($identificador);
    $telefonosasignados = $objterminar->cambiarestatusterminareventotelefono($identificador, $id_vehiculo);
}
if ($opcion == 'municipio') {
    $municipiosasignados = $objterminar->terminarEventoMunicipio($identificador) ;
    $municipiosasignados = $objterminar->cambiarestatusterminareventomunicipio($identificador, $id_vehiculo);
}
?>
