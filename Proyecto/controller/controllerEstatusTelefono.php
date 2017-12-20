<?php
require_once '../model/modelTelefonos.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$id_telefono=$_REQUEST["id"];
$estatus=$_REQUEST["estatus"];
$objTelefonos = new modelTelefonos();

$cambio= $objTelefonos->estatusTelefono($id_telefono, $estatus);

if($cambio){
    
    echo "El Telefono ";
    
}else{
    
    echo "Error";
    
}

//echo $id_conductor." --- ".$estatus;
?>
