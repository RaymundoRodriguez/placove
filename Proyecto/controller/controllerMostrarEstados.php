<?php

/* PLACOVE: Delegación
*/
/* Name: Irandis
*/
/* Date: 26/03/2014
*/
/* Description: Este archivo contiene los metodos que mandan a llamar al modelo para mostrar los estados del la base de datos
*/
include '../model/modelProyectos.php';
//error_reporting(0);
$objbuscar = new modelProyectos();

    $estados=$objbuscar->MostrarEstados();
    foreach ($estados as $value)
    {
        echo "<option  id=".$value['id']." value=".$value['id'].">".utf8_encode($value['nombre'])."</option>";
    }
//    $id_proyecto=$_REQUEST["id_proyecto"];
//    $estados_asignados=$objbuscar->MostrarEstadosAsignados($id_proyecto);
//     foreach ($estados_asignados as $value)
//    {
//        echo "<option selected='selected' value=".$value['id_estado'].">".$value['estado']."</option>";
//    }
//    echo $resultado;


?>