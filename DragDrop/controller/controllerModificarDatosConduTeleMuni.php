<?php
//error_reporting(0);
require_once '../model/modelDragDrop.php';
$objbuscar = new modelDragAndDrop();
$id_vehiculo = $_REQUEST['id_vehiculo'];
$id_conductor = $_REQUEST['id_conductor'];
$fecha_inicio = $_REQUEST['fecha_inicio'];
$fecha_fin = $_REQUEST['fecha_fin'];
$opcion = $_REQUEST['opcion'];
$terminar = $_REQUEST['terminar'];
$eventDrop = $_REQUEST['eventDrop'];



if ($opcion == 'conductor' && $eventDrop == 'drop') {
    $conductoresmodificadosdrop = $objbuscar->modificarFechasVehiculodeConductor($id_conductor, $id_vehiculo, $fecha_inicio, $fecha_fin);
}


if ($opcion == 'telefono' && $eventDrop == 'drop') {
    $conductoresmodificadosdrop = $objbuscar->modificarFechasVehiculodeTelefono($id_conductor, $id_vehiculo, $fecha_inicio, $fecha_fin);
}


if ($opcion == 'municipio' && $eventDrop == 'drop') {
    $municipiosasignadosdrop = $objbuscar->modificarFechasVehiculosDelegacion($id_conductor, $id_vehiculo,$fecha_inicio, $fecha_fin) ;
}


// metodos para actualizar cuando hace un resize
if ($opcion == 'conductor') {
    $conductoresmodificadosrender = $objbuscar->modificarFechasConductor($id_conductor, $fecha_inicio, $fecha_fin);
}


if ($opcion == 'telefono') {
    $telefonosmodificadosrender = $objbuscar->modificarFechasTelefono($id_conductor, $fecha_inicio, $fecha_fin);
}


if ($opcion == 'municipio') {
    $municipiosasignados = $objbuscar->modificarFechasDelegacion($id_conductor,$fecha_inicio, $fecha_fin) ;
}

//modificar fechas de la delegacion cuando introduce las fechas por delegacion

if ($opcion == 'municipiofe' && $terminar == 0 ) {
  
    $municipiosasignadosfe = $objbuscar->modificarFechasRealDelegacion($id_conductor,$fecha_inicio, $fecha_fin) ;
}

if ($opcion == 'municipiofe' && $terminar == 1 ) {
    $terminarmunicipio = $objbuscar->terminardelegacion($id_conductor, $fecha_fin) ;
}
?>
