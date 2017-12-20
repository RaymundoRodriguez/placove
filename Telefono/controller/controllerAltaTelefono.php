<?php
/* Program Assignment: controllerAltaTelefono.php
*/
/* Name: Carlos Hilario
*/
/* Date: 21/03/2014.
*/
/* Description: recibe los datos del formulario para enviarlos al modelo
*/
require_once '../model/modelTelefonos.php';
//error_reporting(0);

$numero = $_REQUEST["numero"];
$correo = $_REQUEST["correo"];
$cuenta = $_REQUEST["cuenta"];
$identificador = $_REQUEST["identificador"];
$estatus = $_REQUEST["estatus"];
$fototelefono = $_REQUEST["fototelefono"];
$color = $_REQUEST["color"];
//echo $txtTec;


$objTelefonos = new modelTelefonos();

$insert = $objTelefonos->insertarTelefono($numero, $correo, $cuenta, $identificador, $estatus, $fototelefono,$color);

if ($insert) {

    echo "El telfono con numero " . $numero .  " fue insertado satisfactoriamente";
} else {

    echo "Error !! El telfono con numero " . $numero .  " no fue insertado satisfactoriamente";
}
?>