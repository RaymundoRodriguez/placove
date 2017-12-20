<?php

/* PLACOVE: Proyecto
 */
/* Name: Irandis
 */
/* Date: 21/03/2014
 */
/* Description: Este archivo contiene los metodos que mandan a llamar al modelo para guardar los datos del proyecto
 */
require_once '../model/modelProyectos.php';
//error_reporting(0);

$nombre = $_REQUEST["nombre"];
$fe_inicio = $_REQUEST["fe_inicio"];
$fe_terminacion = $_REQUEST["fe_terminacion"];
$parametros1 = $_REQUEST["parametros1"];
$parametrosm1 = $_REQUEST["parametrosm1"];
$valoresFunction = $_REQUEST["valoresFunction"];
$contFunction = $_REQUEST["contFunction"];
$contMunicipios = $_REQUEST["contMunicipios"];
$contEstados = $_REQUEST["contEstados"];
$contKmDelegacion = $_REQUEST["contMunicipioskm"];
$kmDelegacion = $_REQUEST["kmDelegacion"];
$kmrDelegacion = $_REQUEST["kmrDelegacion"];
$coloresdelegacion=$_REQUEST["coloresdelegacion"];
$fecha_inicio_real = $_REQUEST["fecha_inicio_real"];
$fecha_fin_real=$_REQUEST["fecha_fin_real"];

//$colores= json_decode($coloresdelegacion,true);
//print_r($colores);
$objProyectos = new modelProyectos();
//foreach ($colores as $value) {
//    echo $value['colordelegacion'];
//}

$insert = $objProyectos->insertarProyecto($nombre, $fe_inicio, $fe_terminacion,$fecha_inicio_real,$fecha_fin_real);
if ($contFunction > 0) {
    foreach ($valoresFunction as $value) {

        $objProyectos->insertarFunction_Class($value["functionclass"], $value["km"]);
    }
}
if ($contEstados > 0) {
    foreach ($parametros1 as $value) {

        $objProyectos->guardarEstadosdeProyecto($value["idEstado"]);
    }
}
$i = 0;
if ($contMunicipios > 0) {
    foreach ($parametrosm1 as $value) {

        $objProyectos->guardarMunicipiosProyecto($value["idMunicipios"], $value["idestado"],$coloresdelegacion[$i]);
        $objProyectos->guardarKmDelegacion($kmDelegacion[$i]["idDelegacion"], $kmDelegacion[$i]["kmDelegacion"]);
        $objProyectos->guardarKmruteadorDelegacion($kmrDelegacion[$i]["idDelegacion"], $kmrDelegacion[$i]["kmrDelegacion"]);

        $i++;
    }
}

//for()
//if($contKmDelegacion>0){
//foreach ($kmDelegacion as $value) {
//
//    $objProyectos->guardarKmDelegacion($value["idDelegacion"], $value["kmDelegacion"]);
//}}



if ($insert) {

    echo "Proyecto insertado";
} else {
    echo "Error el proyecto no fue insertado";
}
?>