<?php
require_once '../model/modelProyectos.php';
$objListaCon_y_Del =new modelProyectos();
$id_proyecto=$_REQUEST['id_proyecto'];
$opcion=$_REQUEST['opcion'];
$Lista="";
if($opcion==1)
{
    $listaconductores=$objListaCon_y_Del->listaConductoresEnProyecto($id_proyecto);
    $Lista .=":Todos;";
    
    foreach($listaconductores as $value)
    {
        //esta es porque al subirlo no se requiere de codificacion utf8$Lista .=utf8_encode($value[0]).":".utf8_encode($value[1])." ".utf8_encode($value[2])." ".utf8_encode($value[3]).";";
        $Lista .=($value[0]).":".($value[1])." ".($value[2])." ".($value[3]).";";
    }
    $listaenviar = substr($Lista, 0, -1);// para eliminar el ultimo ;
//    $listaenviar = trim($Lista, ';');// tambien funciona con trim
    echo $listaenviar;
}
elseif($opcion==2)
{
    $listamunicipios=$objListaCon_y_Del->ListaMunicipios($id_proyecto);
      $Lista .=":Todos;";
    
    foreach($listamunicipios as $value1)
    {
        $Lista .=utf8_encode($value1['nombre']).":".utf8_encode($value1['nombre']).";";
    }
    $listaenviar = substr($Lista, 0, -1);// para eliminar el ultimo ;
//    $listaenviar = trim($Lista, ';');// tambien funciona con trim
    echo $listaenviar;
    
}
?>