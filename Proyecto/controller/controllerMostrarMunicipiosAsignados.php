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
    $id_proyecto=$_REQUEST["id_proyecto"];

    $municipios=$objbuscar->MostrarMunicipiosAsignados($id_proyecto);
    foreach ($municipios as $value)
    {
        echo "<option  id_delegacion='".$value['id_delegacion']."'  id='".$value['id_estado']."'     value='".$value['identificador_delegacion']."'>".utf8_encode($value['nombre'])."</option>";
    }
?>

