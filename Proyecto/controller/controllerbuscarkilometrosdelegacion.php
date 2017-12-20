<?php
require_once '../model/modelProyectos.php';
error_reporting(0);
$objProyectos = new modelProyectos();
$id_proyecto=$_REQUEST['id_proyecto'];
$opcion=$_REQUEST['opcion'];
if($opcion==1){
$kilometrosdelegacion=$objProyectos->kilometrosdelegacion($id_proyecto);
foreach ($kilometrosdelegacion as $value) {
    $kilo[]=array("nombre" => utf8_encode($value['nombre']), "id_delegacion" => $value['id_delegacion'], "km_lineales" => $value['km_lineales'], "km_ruteador" => $value['km_ruteador'], "color_delegacion" => $value['color_delegacion']);
}

 echo json_encode($kilo);
}
else if($opcion==2){
     $km_ruteadorDelegacion=$_REQUEST['km_ruteadorDelegacion'];
    $km_delegacion=$_REQUEST['kmDelegacion'];
    $color_delegacion=$_REQUEST['color_delegacion'];
    $i=0;
foreach ($km_delegacion as $value) {
   $guardarkmdelegacion=$objProyectos->actualizarkmdelegacion($value['id_delegacion'], $value['kmDelegacion'],$color_delegacion[$i]);
    $i++;
}
foreach ($km_ruteadorDelegacion as $value) {
   $guardarkmdelegacion=$objProyectos->actualizarkm_ruteadordelegacion($value['id_delegacion'], $value['kmrDelegacion']);
    
}
if($guardarkmdelegacion){
  echo "se guardo correctamente"  ;}
}

?>
