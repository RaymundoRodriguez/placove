<?php

/* PLACOVE: Delegación
*/
/* Name: Irandis
*/
/* Date: 26/03/2014
*/
/* Description: Este archivo contiene los metodos que mandan a llamar al modelo para mostrar los municipios del la base de datos
*/
include '../model/modelProyectos.php';
//error_reporting(0);
$objbuscar = new modelProyectos();

     $id_estado= $_REQUEST["id_estado"];
    $municipios=$objbuscar->MostrarMunicipios($id_estado);

    foreach ($municipios as $value)
    {
        echo "<option id=".$value['estado_id']." value=".$value['id']." name=".utf8_encode($value['nombre']).">".utf8_encode($value['nombre'])."</option>";
    }
//    echo $resultado;


?>