<?php
error_reporting(0);
require_once '../model/modelProyectos.php';
$objProyectos = new modelProyectos();

$opcion = $_REQUEST["opcion"];

if ($opcion == "proyecto") {
    $id_proyecto = $_REQUEST["id_proyecto"];
    $estatusp = $_REQUEST["estatusp"];



    $cambio = $objProyectos->terminarProyecto($id_proyecto,$estatusp);
    if ($cambio) {
        $act_disponibilidad = $objProyectos->act_estatus($id_proyecto);
    }
}
if ($opcion == "conductor") {
    $id_conductor = $_REQUEST["id_conductor"];
    $id_telefono = $_REQUEST["id_telefono"];
    $id_vehiculo = $_REQUEST["id_vehiculo"];
    $id_con_proyecto = $_REQUEST["id_con_proyecto"];

    $terminado = $objProyectos->terminarConductor($id_con_proyecto, $id_conductor, $id_telefono, $id_vehiculo);

    if ($terminado) {
        echo "Conductor Terminado";
    } else {
        echo "ocurrio un error";
    }
}

if ($opcion == 'suplente') {
    $id_conductor = $_REQUEST["id_conductor"];

    $id_suplente = $_REQUEST["id_suplente"];
    $id_con_proyecto = $_REQUEST["id_con_proyecto"];

    $terminado = $objProyectos->terminarConductorSuplente($id_con_proyecto, $id_conductor, $id_suplente);

    if ($terminado) {
        echo "Conductor Terminado";
    } else {
        echo "ocurrio un error";
    }
}
?>
