<?php
/* PLACOVE: Vehiculo
*/
/* Name: Irandis
*/
/* Date: 17/03/2014
*/
/* Description: Este archivo contiene los metodos que mandan a llamar al modelo para modificar los datos de los vehiculos
*/
error_reporting(0);
require_once '../model/modelVehiculos.php';

$id_vehiculo=$_REQUEST["id_vehiculo"];
$clvNokia = $_REQUEST["clvNokia"];
$tarLlave = $_REQUEST["tarLlave"];
$tarGas = $_REQUEST["tarGas"];
$tecnologia = $_REQUEST["tecnologia"];
$modelo=$_REQUEST["modelo"];
$marca=$_REQUEST["marca"];
$fotovehiculo=$_REQUEST["fotovehiculo"];
$fotoplacas=$_REQUEST["fotoplacas"];
$estatus=$_REQUEST["estatus"];
$identificador=$_REQUEST["identificador"];




$objConductores = new modelVehiculos();

$insert = $objConductores->modificarDatosVehiculo($id_vehiculo,trim($clvNokia), trim($tarLlave), trim($tarGas), trim($tecnologia),trim($marca),  trim($modelo),  trim($fotovehiculo),  trim($fotoplacas),  trim($estatus),trim($identificador));

if ($insert) {

    echo "El vehiculo con clave " . $clvNokia .  " fue modificado satisfactoriamente";
} else {

    echo "Error !! El vehiculo con clave " . $clvNokia .  " no fue modificado satisfactoriamente";
}
?>
