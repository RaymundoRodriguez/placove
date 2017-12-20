<?php
session_start();



    require_once '../model/modelDragDrop.php';
    $objbuscar = new modelDragAndDrop();
    $id_proyecto = $_REQUEST['id_proyecto'];
    $vehiculosasignados = $objbuscar->buscarDatosVehiculosAsignadosparaCalendario($id_proyecto);
//echo json_encode($vehiculosasignados);
    $responce = "";


    foreach ($vehiculosasignados as $value) {
//        $responce->rows[$key]['id'] = $key;



        $responce[] = array("name" => "$value[4] - $value[3]", "id" => "$value[2]", "identificador" => "$value[0]","Identificador simbiosys"=>"$value[3]","Placa"=>"$value[4]","color"=>"red");
    }

//    echo json_encode($responce);
    $_SESSION["Variable"] = $responce;


//header('Content-type: application/json');
//echo '[{"name":"Resource 2","id":"resource1"},{"name":"Resource 1","id":"resource2"},{"name":"Resource 3","id":"resource3"}]';
//echo '[{"name":"iii","id":"iii"},{"name":"sss","id":"sss"},{"name":"qqq","id":"qqq"},{"name":"uuu","id":"uuu"},{"name":"zzzz","id":"zzzz"},{"name":"wwww","id":"wwww"}]';
?>
