<?php

 header('Content-Type: text/html; charset=UTF-8');
require_once  '../model/modelBitacoras.php';

$objInsertar = new modelBitacoras();
//error_reporting(0);
$opcion=$_REQUEST["opcion"];
if($opcion=='imagenes')  // opcion que muestra las imganes que se suben a la bitacora
{
   $id_bitacora= $_REQUEST["id_bitacora"];

$km=$objInsertar->buscarImagenes($id_bitacora);

echo json_encode($km); 
}else if($opcion=='comentarios') // opcion para mostrar los comentarios del supervisor que hace al dia
{
    $id_bitacora= $_REQUEST["id_bitacora"];
    $comentarios=$objInsertar->mostrarComentariosSupervisor($id_bitacora);
    if($comentarios!=null)
    {
        foreach ($comentarios as $value) {
            $hh=  ($value['comentarios_supervisor']); 
            echo $hh;
        }
       
    }
    else if($comentarios==null)
    {
        echo "Sin comentarios";
    }
}

?>
