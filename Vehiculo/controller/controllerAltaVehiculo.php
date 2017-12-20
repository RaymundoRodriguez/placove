<?php
/* PLACOVE: Vehiculo
*/
/* Name: Irandis
*/
/* Date: 13/03/2014
*/
/* Description: Este archivo contiene los metodos que mandan a llamar al modelo para guardar los vehiculos
*/
error_reporting(0);
require_once '../model/modelVehiculos.php';


 
$clvNokia = $_REQUEST["clvNokia"];
$tarLlave = $_REQUEST["tarLlave"];
$tarGas = $_REQUEST["tarGas"];
$tecnologia = $_REQUEST["tecnologia"];
$modelo=$_REQUEST["modelo"];
$marca=$_REQUEST["marca"];
$fotovehiculo=$_REQUEST["fotovehiculo"];
$fotoplacas=$_REQUEST["fotoplacas"];
$identificador=$_REQUEST["identificador"];
$objVehiculos = new modelVehiculos();

$insert = $objVehiculos->insertarVehiculo($clvNokia, $tarLlave, $tarGas, $tecnologia, $marca,$modelo,$fotovehiculo,$fotoplacas,$identificador);
if ($insert) {

    echo "El vehiculo con clave " . $clvNokia .  " fue insertado satisfactoriamente";
} else {

    echo "Error !! El vehiculo con clave " . $clvNokia .  " no fue insertado satisfactoriamente";
}
?>