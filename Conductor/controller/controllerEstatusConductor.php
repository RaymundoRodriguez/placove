<?php
require_once '../model/modelConductores.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$id_conductor=$_REQUEST["id"];
$estatus=$_REQUEST["estatus"];
$objConductores = new modelConductores();

$cambio= $objConductores->estatusConductor($id_conductor, $estatus);

if($cambio){
    
    echo "El conductor ";
    
}else{
    
    echo "Error";
    
}

//echo $id_conductor." --- ".$estatus;
?>
