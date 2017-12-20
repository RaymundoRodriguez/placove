<?php
require_once '../model/modelTelefonos.php';


$id_telefono = $_REQUEST["id_telefono"];
$numero = $_REQUEST["numero"];
$correo = $_REQUEST["correo"];
$cuenta = $_REQUEST["cuenta"];
$identificador = $_REQUEST["identificador"];
$estatus = $_REQUEST["estatus"];
$fototelefono = $_REQUEST["fototelefono"];
$color = $_REQUEST["color"];



$objTelefonos = new modelTelefonos();

$insert = $objTelefonos->modificarDatosTelefono($id_telefono,trim($numero), trim($correo), trim($cuenta),trim($identificador),trim($estatus),trim($fototelefono),$color);

if ($insert) {

    echo "El telfono con numero " . $numero .  " fue modificado satisfactoriamente";
} else {

    echo "Error !! El telefono con nuemro " . $numero .  " no fue modificado satisfactoriamente";
}
?>
