<?php
require_once '../model/modelVehiculos.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$id_vehiculo=$_REQUEST["id"];
$estatus=$_REQUEST["estatus"];
$objConductores = new modelVehiculos();

$cambio= $objConductores->estatusVehiculo($id_vehiculo, $estatus);

if($cambio){
    
    echo "El vehiculo ";
    
}else{
    
    echo "Error";
    
}

//echo $id_conductor." --- ".$estatus;
?>
