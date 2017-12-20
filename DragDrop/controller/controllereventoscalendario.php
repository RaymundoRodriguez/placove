<?php

session_start();

require_once '../model/modelDragDrop.php';
$objbuscar = new modelDragAndDrop();

$id_proyecto = $_REQUEST['id_proyecto'];

$eventosconductores = $objbuscar->buscarEventosConductoresTrabajando($id_proyecto);
foreach ($eventosconductores as $value) {
//        $responce->rows[$key]['id'] = $key;

    if ($value['terminado'] == 1) {
        $responceconductores[] = array("id" => "con" . "$value[4]", "start" => "$value[0]", "end" => "$value[1]", "title" => "$value[2]", "resource" => "$value[3]", "identificador" => "$value[4]", "opcion" => "conductor", "terminado" => "$value[5]", "color" => "$value[6]");
    }
    else if($value['terminado'] == 0) {
        $responceconductores[] = array("id" => "con" . "$value[4]", "start" => "$value[0]", "end" => "$value[1]", "title" => "$value[2]", "resource" => "$value[3]", "identificador" => "$value[4]", "opcion" => "conductor", "terminado" => "$value[5]", "color" => "$value[6]");
    }
}

$eventostelefonos = $objbuscar->buscarEventosTelefonosTrabajando($id_proyecto);
foreach ($eventostelefonos as $value) {
//        $responce->rows[$key]['id'] = $key;

if ($value['terminado'] == 1) {

    $responceconductores[] = array("id" => "tel" . "$value[4]", "start" => "$value[0]", "end" => "$value[1]", "title" => "$value[2]", "resource" => "$value[3]", "identificador" => "$value[4]", "opcion" => "telefono", "terminado" => "$value[5]", "color" => "$value[6]");
 }
    else if($value['terminado'] == 0) {
        $responceconductores[] = array("id" => "tel" . "$value[4]", "start" => "$value[0]", "end" => "$value[1]", "title" => "$value[2]", "resource" => "$value[3]", "identificador" => "$value[4]", "opcion" => "telefono", "terminado" => "$value[5]", "color" => "$value[6]");

    }
    
}

$eventosdelegacion = $objbuscar->buscarEventosDelegacionesTrabajando($id_proyecto);
foreach ($eventosdelegacion as $value) {
//        $responce->rows[$key]['id'] = $key;


if ($value['terminado'] == 1) {

    $responceconductores[] = array("id" => "mun" . "$value[5]", "start" => "$value[0]", "end" => "$value[1]", "title" => utf8_encode($value[3]), "resource" => "$value[4]", "identificador" => "$value[5]", "opcion" => "municipio", "terminado" => "$value[6]","fechainiciod" => "$value[7]","fechafind" => "$value[8]", "color" => "$value[9]");
 }
    else if($value['terminado'] == 0) {
    
     $responceconductores[] = array("id" => "mun" . "$value[5]", "start" => "$value[0]", "end" => "$value[1]", "title" => utf8_encode($value[3]), "resource" => "$value[4]", "identificador" => "$value[5]", "opcion" => "municipio", "terminado" => "$value[6]","fechainiciod" => "$value[7]","fechafind" => "$value[8]", "color" => "$value[9]");

    }
}

    echo json_encode($responceconductores);
$_SESSION["conductor"] = $responceconductores;
//	$year = date('Y');
//	$month = date('m');
//
//	echo json_encode(array(
//	
//		array(
//			'id' => 111,
//			'title' => "Event1",
//			'start' => "$year-$month-10",
//			'url' => "http://yahoo.com/"
//		),
//		
//		array(
//			'id' => 222,
//			'title' => "Event2",
//			'start' => "$year-$month-20",
//			'end' => "$year-$month-22",
//			'url' => "http://yahoo.com/"
//		)
//	
//	));
?>
