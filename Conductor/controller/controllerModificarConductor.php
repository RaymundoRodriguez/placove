


<?php
//<!--/* Program Assignment: viewCapturaConductor.php
//*/
///* Name: Carlos Hilario
//*/
///* Date: 14/03/2014.
//*/
///* Description: recibe los datos  los datos del conductor para actualizarlo
//*/-->
//error_reporting(0);
require_once '../model/modelConductores.php';

$id_conductor=$_REQUEST["id_conductor"];
$nombre = $_REQUEST["nombre"];
$ApellidoPaterno = $_REQUEST["ApellidoPaterno"];
$ApellidoMaterno = $_REQUEST["ApellidoMaterno"];
$estatus = $_REQUEST["estatus"];
$calle = $_REQUEST["calle"];
$num_ext = $_REQUEST["num_ext"];
$num_int = $_REQUEST["num_int"];
$colonia = $_REQUEST["colonia"];
$cod_postal = $_REQUEST["cod_postal"];
$calle1 = $_REQUEST["calle1"];
$calle2 = $_REQUEST["calle2"];
$referencia = $_REQUEST["referencia"];
$estadosCond = $_REQUEST["estadosCond"];
$municipiosCond = $_REQUEST["municipiosCond"];
$telf_particular = $_REQUEST["telf_particular"];
$telf_celular = $_REQUEST["telf_celular"];
$telf_referencia = $_REQUEST["telf_referencia"];
$referencia_telf = $_REQUEST["referencia_telf"];
$email1 = $_REQUEST["email1"];
$email2 = $_REQUEST["email2"];
$ArchFotoConductor = $_REQUEST["ArchFotoConductor"];
$ArchActa = $_REQUEST["ArchActa"];
$ArchIFE = $_REQUEST["ArchIFE"];
$ArchLicencia = $_REQUEST["ArchLicencia"];

$ArchFotoConductor = $_REQUEST["ArchFotoConductor"];
$ArchActa = $_REQUEST["ArchActa"];
$ArchIFE = $_REQUEST["ArchIFE"];
$ArchLicencia = $_REQUEST["ArchLicencia"];
$color = $_REQUEST["color"];


$objConductores = new modelConductores();

$insert = $objConductores->modificarDatosConductor($id_conductor,$nombre, $ApellidoPaterno, $ApellidoMaterno, $estatus, $calle,$num_ext,$num_int,$colonia,$cod_postal,$calle1,$calle2,$referencia,$estadosCond,$municipiosCond,$telf_particular,$telf_celular,$telf_referencia,$referencia_telf,$email1,$email2, $ArchFotoConductor, $ArchActa, $ArchIFE, $ArchLicencia,$color);

if ($insert) {

    echo "El conductor " . $nombre . " " . $apellidos . " fue modificado satisfactoriamente";
} else {

    echo "Error !! El conductor " . $nombre . " " . $apellidos . " no fue modificado satisfactoriamente";
}
?>
