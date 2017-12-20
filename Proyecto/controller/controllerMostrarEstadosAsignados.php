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


    $id_proyecto=$_REQUEST["id_proyecto"];
    $estados_asignados=$objbuscar->MostrarEstadosAsignados($id_proyecto);
     foreach ($estados_asignados as $value)
    {
        echo "<option id='".$value['id_estados']."'  value='".$value['identificador_estados']."'>".utf8_encode($value['nombre'])."</option>";
    }
//    echo $resultado;


?>