<?php

require_once  '../model/modelBitacoras.php';

$objInsertar = new modelBitacoras();
error_reporting(0);
$id_bitacora= $_REQUEST["id_bitacora"];
$datosbitacora= $_REQUEST["datos_dinamicos"];
$id_fecha_bitacora= $_REQUEST["id_fecha_bitacora"];


//echo $datosbitacora;

foreach ($datosbitacora as $key => $valor) {
//    echo $valor["fecha"]."ddd";
    
   
    
    
   $ac= $objInsertar->insertarActividadesBitacora($valor['actividad1'],$valor['actividad2'],$valor['actividad3'],$valor['comentario'],$id_bitacora,$id_fecha_bitacora);

    
}

if($ac)
{
    echo "Se guardo correctamente";
}
else
{
    "fallo al guardar";
}



?>

