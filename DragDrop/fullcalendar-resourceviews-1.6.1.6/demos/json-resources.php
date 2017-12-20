<?php

require_once 'modelProyectos.php';
$objbuscar = new modelProyectos();
$id_proyecto = 3;
$vehiculosasignados = $objbuscar->buscarDatosVehiculosAsignados($id_proyecto);
//echo json_encode($vehiculosasignados);
$responce="";


 foreach ($vehiculosasignados as $key => $value) {
//        $responce->rows[$key]['id'] = $key;

        
       
        $responce[]= array("name" => "$value[1]", "id" => "$value[0]" );
        
    }

echo json_encode($responce);
//header('Content-type: application/json');
//echo '[{"name":"Resource 2","id":"resource1"},{"name":"Resource 1","id":"resource2"},{"name":"Resource 3","id":"resource3"}]';
//echo '[{"name":"iii","id":"iii"},{"name":"sss","id":"sss"},{"name":"qqq","id":"qqq"},{"name":"uuu","id":"uuu"},{"name":"zzzz","id":"zzzz"},{"name":"wwww","id":"wwww"}]';
?>