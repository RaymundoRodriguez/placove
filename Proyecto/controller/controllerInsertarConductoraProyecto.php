<?php

require_once '../model/modelConductoresProyectos.php';
error_reporting(0);

$objBuscar = new modelConductoresProyectos();

$conductor = $_REQUEST["conductor"];
$vehiculo = $_REQUEST["vehiculos"];
$telefono = $_REQUEST["telefono"];
$insertar = $_REQUEST["insertar"];

 if ($conductor == "conductores") 
     {
    $resultadoCon = $objBuscar->BuscarConductores();
    echo json_encode($resultadoCon);
     }
 if ($vehiculo == "vehiculos") {
    $resultadoVe = $objBuscar->BuscarVehiculos();
   echo json_encode($resultadoVe);
} 
if ($telefono == "telefonos") {
    $resultadoTel = $objBuscar->BuscarTelefonos();

    echo json_encode($resultadoTel);
}
    



 if ($insertar == "insertar") {
    $proyecto_id_proyecto = $_REQUEST["proyecto_id_proyecto"];
    $vehiculo_id_vehiculo = $_REQUEST["vehiculo_id_vehiculo"];
    $telefono_id_telefono = $_REQUEST["telefono_id_telefono"];
    $conductor_id_conductor = $_REQUEST["conductor_id_conductor"];
    $lugar = $_REQUEST["lugar"];
    $estatus = $_REQUEST["estatus"];
    $tipo_conductor = $_REQUEST["tipo_conductor"];
    $function_class=$_REQUEST["function_class"];
    $km_ruteador=$_REQUEST["km_ruteador"];
    $km_lineales=$_REQUEST["km_lineales"];

    $insert = $objBuscar->InsertarConductorEnProyecto($proyecto_id_proyecto, $vehiculo_id_vehiculo, $telefono_id_telefono, $conductor_id_conductor, $lugar, $estatus, $tipo_conductor,$function_class,$km_ruteador,$km_lineales);

    if ($insert) {

        echo "El conductor fue insertado satisfactoriamente";
    } else {

        echo "Error !! El conductor no fue insertado satisfactoriamente";
    }
} 
?>
